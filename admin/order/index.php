<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../users/login/');
}

if (empty($user) || $user['role'] != "admin") {
    header('location: ../../users/login');
}

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$status = "";
$user_id = "";
if (!empty($_GET)) {
    $status = getGet('status');
    $user_id = getGet("id");
}

$getOrder = "";

if (empty($status) && $status != 0) {
    $getOrder = "SELECT * FROM orders";
} else {
    if (!empty($user_id)) {
        $getOrder = "SELECT * FROM orders WHERE status = '$status' AND user_id =" . $user_id;
    } else {
        $getOrder = "SELECT * FROM orders WHERE status = '$status'";
    }
}

$orders = executeResult($getOrder);

$getOrderDetail = "SELECT order_id, product_id, title, order_detail.quantity FROM order_detail INNER JOIN product ON order_detail.product_id = product.id";

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
    <link rel="stylesheet" href="./../../dist/css/style.css" />
    <title>Đơn hàng</title>
</head>
<?php
require_once './../inc/header.php';
?>

<body>
    <div class="row">
        <div class="col admin__component">
            <div class="container">
                <div class="row">
                    <div class="col orders shadow-sm">
                        <div class="orders__header">
                            <ul class="orders__tab">
                                <li class="orders__tab__item <?=$status == "" ? "active" : ""?>">
                                    <a href="./index.php<?=empty($user_id) ? "" : "?id=$user_id"?>">Tất cả</a>
                                </li>
                                <li class="orders__tab__item <?=$status == 0 ? "active" : ""?>">
                                    <a href="?status=0<?=empty($user_id) ? "" : "&id=$user_id"?>">Chờ xác nhận</a>
                                </li>
                                <li class="orders__tab__item <?=$status == 1 ? "active" : ""?>">
                                    <a href="?status=1<?=empty($user_id) ? "" : "&id=$user_id"?>">Đang giao</a>
                                </li>
                                <li class="orders__tab__item <?=$status == 2 ? "active" : ""?>">
                                    <a href="?status=2<?=empty($user_id) ? "" : "&id=$user_id"?>">Đã giao</a>
                                </li>
                                <li class="orders__tab__item <?=$status == 3 ? "active" : ""?>">
                                    <a href="?status=3<?=empty($user_id) ? "" : "&id=$user_id"?>">Đã hủy</a>
                                </li>
                                <div class="orders__tab__line"></div>
                            </ul>
                        </div>

                        <div class="orders__body">
                            <div class="orders__list">
                                <?php
if (count($orders) > 0) {
    echo '<div class="orders__list__header">
            <h2>' . count($orders) . ' Đơn hàng</h2>
        </div>';
}
?>

                                <div class="orders__list__body">
                                    <?php
if (count($orders) > 0) {
    echo "";
} else {
    echo '<div class="orders__list__body--empty">
    <i class="orders__list__empty">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94 93">
            <g fill="none" fillRule="evenodd" transform="translate(-2)">
                <rect width="96" height="96"></rect>
                <ellipse cx="47" cy="87" fill="#F2F2F2" rx="45" ry="6"></ellipse>
                <path fill="#FFF" stroke="#D8D8D8"
                    d="M79,55.5384191 L79,84.1647059 C79,85.1783108 78.1452709,86 77.0909091,86 L17.9090909,86 C16.8547291,86 16,85.1783108 16,84.1647059 L16,9.83529412 C16,8.82168917 16.8547291,8 17.9090909,8 L77.0909091,8 C78.1452709,8 79,8.82168917 79,9.83529412 L79,43.6504538 L79,55.5384191 Z">
                </path>
                <path fill="#FAFAFA" stroke="#D8D8D8"
                    d="M64.32,4.0026087 L56.62,4.0026087 L56.62,3.5026087 C56.62,2.92262436 56.214985,2.5 55.68,2.5 L40.32,2.5 C39.785015,2.5 39.38,2.92262436 39.38,3.5026087 L39.38,4.0026087 L31.68,4.0026087 C31.433015,4.0026087 31.22,4.22488523 31.22,4.50434783 L31.22,12.5182609 C31.22,12.7977235 31.433015,13.02 31.68,13.02 L64.32,13.02 C64.566985,13.02 64.78,12.7977235 64.78,12.5182609 L64.78,4.50434783 C64.78,4.22488523 64.566985,4.0026087 64.32,4.0026087 Z">
                </path>
                <g fill="#D8D8D8" transform="translate(83)">
                    <circle cx="10" cy="13" r="3" opacity=".5"></circle>
                    <circle cx="2" cy="9" r="2" opacity=".3"></circle>
                    <path
                        d="M8.5,1 C7.67157288,1 7,1.67157288 7,2.5 C7,3.32842712 7.67157288,4 8.5,4 C9.32842712,4 10,3.32842712 10,2.5 C10,1.67157288 9.32842712,1 8.5,1 Z M8.5,7.10542736e-15 C9.88071187,7.10542736e-15 11,1.11928813 11,2.5 C11,3.88071187 9.88071187,5 8.5,5 C7.11928813,5 6,3.88071187 6,2.5 C6,1.11928813 7.11928813,7.10542736e-15 8.5,7.10542736e-15 Z"
                        opacity=".3"></path>
                </g>
                <path fill="#D8D8D8"
                    d="M48.5,43 C48.7761424,43 49,43.2238576 49,43.5 C49,43.7761424 48.7761424,44 48.5,44 L26.5,44 C26.2238576,44 26,43.7761424 26,43.5 C26,43.2238576 26.2238576,43 26.5,43 L48.5,43 Z M68.5,34 C68.7761424,34 69,34.2238576 69,34.5 C69,34.7761424 68.7761424,35 68.5,35 L26.5,35 C26.2238576,35 26,34.7761424 26,34.5 C26,34.2238576 26.2238576,34 26.5,34 L68.5,34 Z M68.5,25 C68.7761424,25 69,25.2238576 69,25.5 C69,25.7761424 68.7761424,26 68.5,26 L26.5,26 C26.2238576,26 26,25.7761424 26,25.5 C26,25.2238576 26.2238576,25 26.5,25 L68.5,25 Z">
                </path>
            </g>
        </svg>
    </i>
    <p>Không tìm thấy đơn hàng</p>
</div>';
}
?>
                                    <div class="orders__list__body__arr <?=count($orders) > 0 ? "" : "d-none"?>">
                                        <div class="orders__list__body__item orders__list__body__item--header">
                                            <div class="orders__list__body__item__products">
                                                <p>Sản phẩm</p>
                                            </div>
                                            <div class="orders__list__body__item__summary">
                                                <p>Tổng hóa đơn</p>
                                            </div>
                                            <div class="orders__list__body__item__address">
                                                <p>Địa chỉ giao hàng</p>
                                            </div>
                                            <div class="orders__list__body__item__info text-center">
                                                <p>Thông tin đặt hàng</p>
                                            </div>
                                            <div class="orders__list__body__item__status text-center">
                                                <p>Trạng thái</p>
                                            </div>
                                        </div>
                                        <?php
foreach ($orders as $row) {
    $status = "";
    $order_date = date_create($row['order_date']);
    switch ($row['status']) {
        case 0:
            $status = "Chờ xác nhận";
            break;
        case 1:
            $status = "Đang giao";
            break;
        case 2:
            $status = "Đã giao";
            break;
        case 3:
            $status = "Đã hủy";
            break;
    }
    echo '<div class="orders__list__body__item">
                <div class="orders__list__body__item__products">';
    foreach ($orderDetails as $item) {
        if ($item['order_id'] == $row['id']) {
            $thumbnail = "";
            foreach ($thumbnails as $img) {
                if ($img['product_id'] == $item['product_id']) {
                    $thumbnail = $img['thumbnail'];
                    break;
                }
            }
            echo '<div class="order__product">
                    <div class="d-flex align-items-center flex-grow-1 px-4">
                        <p class="order__product__title">
                            ' . $item['title'] . '
                        </p>
                        <img src="../../assets/thumbnail/' . $thumbnail . '" alt="anh"
                            class="order__product__pic" />
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="fas fa-times"></i>
                        <p class="order__product__quantity">
                            ' . $item['quantity'] . '
                        </p>
                    </div>
                </div>';
        }
    }
    echo '</div>
                <div class="orders__list__body__item__summary text-center">
                    <p>
                        ' . number_format((int) $row['total_money']) . '
                        <sup>đ</sup>
                    </p>
                </div>
                <div class="orders__list__body__item__address">
                    <p>
                        ' . $row['address'] . '
                    </p>
                </div>
                <div class="orders__list__body__item__info">
                    <p>Họ tên: ' . $row['name'] . '</p>
                    <p>Email: ' . $row['email'] . '</p>
                    <p>Số điện thoại: ' . $row['phone'] . '</p>
                    <p>Ghi chú: ' . $row['note'] . '</p>
                    <p>Ngày tạo đơn: ' . date_format($order_date, "d-m-Y") . '</p>
                </div>
                <div class="orders__list__body__item__status text-center">';
    echo !empty($row['reason']) ? '<p class="reason">Lí do hủy đơn: ' . $row['reason'] . '</p>' : "";
    echo '<p class="status _' . $row['status'] . '">' . $status . '</p>';
    if ($row['status'] == 0) {
        echo '<div class="change-status shadow-lg">
                        <div class="change-status__heading">
                            Thay đổi trạng thái sản phẩm
                        </div>
                        <div class="change-status__item">
                            <a href="./change_order_status.php?id=' . $row['id'] . '&status=1" class="status _1">Đang giao hàng</a>
                        </div>
                        <div class="change-status__item">
                            <a href="./change_order_status.php?id=' . $row['id'] . '&status=2" class="status _2">Đã giao</a>
                        </div>
                        <div class="change-status__item">
                            <p data-id="' . $row['id'] . '" class="status _3 delete">Đã hủy</p>
                        </div>
                    </div>';
    } elseif ($row['status'] == 1) {
        echo '<div class="change-status shadow-lg">
                        <div class="change-status__heading">
                            Thay đổi trạng thái sản phẩm
                        </div>
                        <div class="change-status__item mx-auto">
                            <a href="./change_order_status.php?id=' . $row['id'] . '&status=2" class="status _2">Đã giao</a>
                        </div>
                        <div class="change-status__item mx-auto">
                            <p data-id="' . $row['id'] . '" class="status _3 delete">Đã hủy</p>
                        </div>
                    </div>';
    }
    echo '</div>
            </div>';
}
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script>
    const tabs = document.querySelectorAll('.orders__tab__item');
    let tabActive = document.querySelector(".orders__tab__item.active");
    const line = document.querySelector(".orders__tab__line");

    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            tabActive = document.querySelector(".orders__tab__item.active");

            if (tabActive) {
                tabActive.classList.remove('active');
            }

            tab.classList.add('active');
            line.style.left = tab.offsetLeft + "px";
            line.style.width = tab.offsetWidth + "px";
        })
    });

    const delete_btns = document.querySelectorAll(".delete");

    delete_btns?.forEach(btn => {
        btn.addEventListener("click", (e) => {
            if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')) {
                const mess = prompt('Nhập lí do hủy đơn');
                if (mess) {
                    window.location =
                        `./delete_order_process.php?id=${btn.dataset.id}&mess=${encodeURI(mess)}`;
                } else alert("Vui lòng nhập lí do hủy đơn");
            }
        })
    })
    </script>
</body>

</html>