<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ./users/login');
    die();
}

if (!empty($user) && $user['role'] == "admin") {
    header('location: ../MiniMart/admin');
    die();
}

require_once './database/dbhelper.php';
require_once './ultils/ultility.php';

$mode = "profile";
$status = "";

if (!empty($_GET)) {
    $mode = getGet('mode');
    $status = getGet('status');
    require_once './users/change_password__process.php';
} else {
    require_once './users/change_user_info_process.php';
}

if (empty($status) && $status != 0) {
    $getOrder = "SELECT * FROM orders WHERE user_id = " . $user['id'];
} else {
    $getOrder = "SELECT * FROM orders WHERE user_id = " . $user['id'] . " AND status = $status";
}

$orders = executeResult($getOrder);

$list_id = array();
$ids = "";

if (!empty($orders)) {
    foreach ($orders as $row) {
        $list_id[] = $row['id'];
    }

    $ids = "(" . implode(',', $list_id) . ")";
}

$getOrderDetail = "";

if (!empty($ids)) {
    $getOrderDetail = "SELECT order_id, product_id, title, order_detail.price, order_detail.quantity, total FROM order_detail INNER JOIN product ON order_detail.product_id = product.id WHERE order_id IN $ids";
} else {
    $getOrderDetail = "SELECT order_id, product_id, title, order_detail.price, order_detail.quantity, total FROM order_detail INNER JOIN product ON order_detail.product_id = product.id";
}

$orderDetails = executeResult($getOrderDetail);

$pro_ids = array();
$id_pro = "";
if (!empty($orderDetails)) {
    foreach ($orderDetails as $row) {
        $pro_ids[] = $row['product_id'];
    }

    $id_pro = "(" . implode(',', $pro_ids) . ")";
}

if (!empty($id_pro)) {
    $thumbnails = executeResult("SELECT * FROM galery WHERE product_id IN $id_pro");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../../../MiniMart/assets/pic/icon.jpeg" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./dist/css/style.css" />
    <title><?php
if ($mode == "profile") {
    echo "T??i kho???n";
}

if ($mode == "password") {
    echo "M???t kh???u";
}

if ($mode == "order") {
    echo "????n h??ng";
}

?></title>
</head>
<?php
include "./header.php";
?>
<div class="user container">
    <div class="row">
        <div class="col-md-2">
            <div class="user__nav">
                <div class="user__nav__header">
                    <div class="user__nav__img"><i class="fas fa-user"></i></div>
                    <div class="user__nav__basic-info">
                        <p class="user__nav__text"><?=$user['name']?></p><span class="user__nav__sub-text"><i
                                class="fas fa-pen"></i>
                            S???a
                            h??? s??</span>
                    </div>
                </div>
                <ul class="user__nav__list">
                    <li class="user__nav__item"><i class="fas fa-user"></i>T??i kho???n c???a
                        t??i
                        <ul class="user__nav__sub-nav open">
                            <li class="user__nav__item sub-item">
                                <a aria-current="page" class="user__nav__link <?=$mode == "profile" ? 'active' : ""?>"
                                    href="./user.php">H??? s??</a>
                            </li>
                            <li class="user__nav__item sub-item">
                                <a class="user__nav__link <?=$mode == "password" ? 'active' : ""?>"
                                    href="?mode=password">?????i
                                    m???t kh???u</a>
                            </li>
                        </ul>
                    </li>
                    <li class="user__nav__item"><i class="fas fa-clipboard"></i><a
                            class="user__nav__link <?=$mode == "order" ? 'active' : ""?>" href="?mode=order">????n
                            h??ng</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="user__content" <?=$mode == "order" ? "style='padding: 20px;'" : ""?>>
                <div class="profile">
                    <?php
if ($mode == "profile") {
    echo '<div class="profile__header">
                <h2 class="profile__heading">H??? s?? c???a t??i</h2>
                <p class="profile__sub-heading">Qu???n l?? th??ng tin h??? s?? ????? b???o m???t t??i kho???n</p>
        </div>
        <form id="profile-form" class="profile__user" method="POST">
            <input type="text" name="id" value="' . $user['id'] . '" class="d-none">
            <div class="profile__user__field">
                <p class="profile__user__label">T??n</p>
                <div class="input mb-3">
                    <input name="name" placeholder="T??n" type="text"
                    class="input__control form-control ' . (empty($errors['name']) ? '' : 'is-invalid') . '"
                            aria-invalid="false" value="' . $user['name'] . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['name']) ? '' : 'input__error') . '">
                            ' . (empty($errors['name']) ? "" : $errors['name']) . '
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                        <p class="profile__user__label">S??? ??i???n tho???i</p>
                        <div class="input mb-3">
                            <input name="phone" placeholder="S??? ??i???n tho???i" type="text"
                                class="input__control form-control ' . (empty($errors['phone']) ? '' : 'is-invalid') . '"
                                aria-invalid="false" value="' . $user['phone'] . '">
                            <div class="invalid-feedback mt-3 ' . (empty($errors['phone']) ? '' : 'input__error') . '">
                                    ' . (empty($errors['phone']) ? "" : $errors['phone']) . '
                            </div>
                        </div>
                </div>
                <div class="profile__user__field">
                        <p class="profile__user__label">Email</p>
                        <div class="input mb-3">
                            <input name="email" placeholder="Email" type="text"
                                class="input__control form-control ' . (empty($errors['email']) ? '' : 'is-invalid') . '"
                                aria-invalid="false" value="' . $user['email'] . '">
                            <div class="invalid-feedback mt-3 ' . (empty($errors['email']) ? '' : 'input__error') . '">
                                ' . (empty($errors['email']) ? "" : $errors['email']) . '
                            </div>
                        </div>
                </div><button type="submit" class="profile__user__action btn btn-secondary">L??u</button>
        </form>';
} elseif ($mode == "password") {
    echo '<div class="profile__header">
            <h2 class="profile__heading">?????i m???t kh???u</h2>
            <p class="profile__sub-heading">????? b???o m???t t??i kho???n, vui l??ng kh??ng chia s??? m???t kh???u cho
                ng?????i kh??c</p>
        </div>
        <form id="profile-form" class="profile__user d-flex" method="POST">
            <input type="password" name="id" value="' . $user['id'] . '" class="d-none">
            <div class="profile__user__contain">
                <div class="profile__user__field">
                    <p class="profile__user__label xl">M???t kh???u hi???n t???i</p>
                    <div class="input mb-3">
                        <input name="password"
                            type="password" class="input__control form-control ' . (empty($errors['password']) ? '' : 'is-invalid') . '" aria-invalid="false"
                            value="' . $password . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['password']) ? '' : 'input__error') . '">
                            ' . (empty($errors['password']) ? "" : $errors['password']) . '
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                    <p class="profile__user__label xl">M???t kh???u m???i</p>
                    <div class="input mb-3">
                        <input name="newPassword"
                            type="password" class="input__control form-control ' . (empty($errors['newPassword']) ? '' : 'is-invalid') . '" aria-invalid="false"
                            value="' . $newPassword . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['newPassword']) ? '' : 'input__error') . '">
                            ' . (empty($errors['newPassword']) ? "" : $errors['newPassword']) . '
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                    <p class="profile__user__label xl">X??c nh???n m???t kh???u</p>
                    <div class="input mb-3">
                        <input name="confirmNewPassword" type="password" class="input__control form-control ' . (empty($errors['confirmPassword']) ? '' : 'is-invalid') . '"
                            aria-invalid="false" value="' . $confirmPassword . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['confirmPassword']) ? '' : 'input__error') . '">
                            ' . (empty($errors['confirmPassword']) ? "" : $errors['confirmPassword']) . '
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="profile__user__action xl btn btn-secondary">X??c nh???n</button>
            </div>
        </form>';
} elseif ($mode = "order") {
    echo '<div class="user__purchase">
            <div class="user__purchase__header">
                <ul class="user__purchase__header__tab">
                    <li class="user__purchase__header__item"><a href="./user.php?mode=order" class="user__purchase__header__link ' . ($status == "" ? "active" : "") . '"
                           >T???t c???</a></li>
                    <li class="user__purchase__header__item"><a href="./user.php?mode=order&status=0" class="user__purchase__header__link ' . ($status == 0 ? "active" : "") . '"
                           >Ch??? x??c nh???n</a></li>
                    <li class="user__purchase__header__item"><a href="./user.php?mode=order&status=1" class="user__purchase__header__link ' . ($status == 1 ? "active" : "") . '"
                           >??ang giao</a></li>
                    <li class="user__purchase__header__item"><a href="./user.php?mode=order&status=2" class="user__purchase__header__link ' . ($status == 2 ? "active" : "") . '"
                           >???? giao</a></li>
                    <li class="user__purchase__header__item"><a href="./user.php?mode=order&status=3" class="user__purchase__header__link ' . ($status == 3 ? "active" : "") . '"
                           >???? h???y</a></li>
                    <div class="user__purchase__header__line"></div>
                </ul>
            </div>
        </div>';
}
?>
                </div>
            </div>
            <div class="user__purchase__list <?=$mode == "order" ? "" : "d-none"?>">
                <?php
foreach ($orders as $row) {
    $status = "";
    switch ($row['status']) {
        case 0:
            $status = "Ch??? x??c nh???n";
            break;
        case 1:
            $status = "??ang giao";
            break;
        case 2:
            $status = "???? giao";
            break;
        case 3:
            $status = "???? h???y";
            break;
    }
    echo '<div class="user__purchase__item">
            <p class="user__purchase__item__status _' . $row['status'] . '">
                ' . $status . '
            </p>';
    foreach ($orderDetails as $item) {
        if ($item['order_id'] == $row['id']) {
            $thumbnail = "";
            foreach ($thumbnails as $img) {
                if ($img['product_id'] == $item['product_id']) {
                    $thumbnail = $img['thumbnail'];
                    break;
                }
            }
            echo '<div class="user__purchase__product">
                        <div class="user__purchase__product__item">
                            <img src="./assets/thumbnail/' . $thumbnail . '" alt="anh"
                                class="user__purchase__product__item__thumbnail">
                            <div class="user__purchase__product__item__info">
                                <p class="user__purchase__product__item__name">' . $item['title'] . '</p>
                                <p class="user__purchase__product__item__quantity">x' . $item['quantity'] . '</p>
                            </div>
                            <p class="user__purchase__product__item__total">
                                ' . number_format($item['total']) . '<sup>??</sup>
                            </p>
                        </div>
                    </div>';
        }
    }
    echo '<div class="user__purchase__item__action">';
    echo $row['status'] != 2 && $row['status'] != 3 ? '<p data-id="' . $row['id'] . '" class="delete--btn btn btn-secondary buy-btn mt-0">H???y ????n</p>' : "";
    echo '<p class="user__purchase__item__sum">T???ng s??? ti???n: <span>' . number_format($row['total_money']) . '<sup>??</sup></span></p>
            </div>
        </div>';
}
?>
            </div>
        </div>
    </div>
</div>

<script>
const links = document.querySelectorAll('.user__purchase__header__link');
const line = document.querySelector('.user__purchase__header__line');
let active = document.querySelector('.user__purchase__header__link.active');
line.style.left = active.offsetLeft + "px";
line.style.width = active.offsetWidth + "px";


links.forEach(link => {
    link.addEventListener("click", () => {
        active = document.querySelector('.user__purchase__header__link.active');
        active.classList.remove('active');
        link.classList.add('active');
        line.style.left = link.offsetLeft + "px";
        line.style.width = link.offsetWidth + "px";
    })
})


const delete_btns = document.querySelectorAll('.delete--btn');

delete_btns.forEach(btn => {
    btn.addEventListener("click", (e) => {
        if (confirm('B???n c?? ch???c ch???n mu???n h???y ????n h??ng n??y?')) {
            const mess = prompt('Nh???p l?? do h???y ????n');
            if (mess) {
                window.location =
                    `./admin/order/delete_order_process.php?id=${btn.dataset.id}&mess=${encodeURI(mess)}`;
            } else alert("Vui l??ng nh???p l?? do h???y ????n");
        }
    })
})
</script>
<?php
include "./footer.php";
?>