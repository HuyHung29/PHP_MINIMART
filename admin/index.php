<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ./../users/login');
}

if (empty($user) || $user['role'] != "admin") {
    header('location: ./../users/login');
}

require_once '../database/dbhelper.php';
require_once '../ultils/ultility.php';

$date = $month = $year = $quarter = $start = $end = "";

$sql = "SELECT * FROM orders";

if (!empty($_GET)) {
    $date = getGet('date');
    $month = getGet('month');
    $year = getGet('year');
    $quarter = getGet('quarter');
    $start = getGet('start');
    $end = getGet('end');

    if (!empty($date)) {
        $sql = "SELECT * FROM orders WHERE DATE(order_date) = '$date'";
    }

    if (!empty($month)) {
        $sql = "SELECT * FROM orders WHERE DATE_FORMAT(order_date, '%Y-%m') = '$month'";
    }

    if (!empty($year) && !empty($quarter)) {
        $str = "";
        switch ($quarter) {
            case '1':
                $str = "BETWEEN 1 AND 3";
                break;
            case '2':
                $str = "BETWEEN 4 AND 6";
                break;
            case '3':
                $str = "BETWEEN 7 AND 9";
                break;
            case '4':
                $str = "BETWEEN 10 AND 12";
                break;

            default:
                break;
        }
        $sql = "SELECT * FROM orders WHERE MONTH(order_date) $str AND YEAR(order_date) = '$year'";
    }

    if (!empty($start) && !empty($end)) {
        $sql = "SELECT * FROM orders WHERE DATE(order_date)  BETWEEN '$start' AND '$end'";
    }
}

$orders = executeResult($sql);

$wait = array();
foreach ($orders as $row) {
    if ($row['status'] == 0) {
        $wait[] = $row;
    }
}

$do = array();
foreach ($orders as $row) {
    if ($row['status'] == 1) {
        $do[] = $row;
    }
}

$done = array();
foreach ($orders as $row) {
    if ($row['status'] == 2) {
        $done[] = $row;
    }
}

$deleted = array();
foreach ($orders as $row) {
    if ($row['status'] == 3) {
        $deleted[] = $row;
    }
}

$products = executeResult("SELECT * FROM product");

$disableProduct = array();

foreach ($products as $row) {
    if ($row['deleted'] == 1) {
        $disableProduct[] = $row;
    }
}

$categories = executeResult("SELECT * FROM category");

$feedbacks = executeResult("SELECT * FROM feedback");

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
    <link rel="stylesheet" href="./../dist/css/style.css" />
    <title>Trang qu???n tr???</title>
</head>

<body>
    <div fluid class='container-fluid admin'>
        <div class="row">
            <div class="header--admin">
                <div class="header--admin__side">
                    <a href="">
                        <img src="https://bizweb.dktcdn.net/100/322/163/themes/853119/assets/logo_footer.png?1646209470651"
                            alt="anh" class="header--admin__logo" />
                    </a>
                    <h1 class="header--admin__heading">Trang qu???n tr???</h1>
                </div>
                <div class="header--admin__side">
                    <div class="header--admin__user">
                        <i class="fas fa-user-circle"></i>
                        <p><?=$user['name']?></p>
                    </div>
                    <div class="header--admin__task">
                        <div class="header--admin__task__list">
                            <i class="fas fa-bars"></i>

                            <div class="header--admin__task__menu">
                                <div class="header--admin__task__menu__item">
                                    <a href="./product" class="header--admin__task__menu__icon blue">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                    <p class="header--admin__task__menu__title">
                                        S???n ph???m
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="./category" class="header--admin__task__menu__icon green">
                                        <i class="fas fa-list-ul"></i>
                                    </a>
                                    <p class="header--admin__task__menu__title">
                                        Danh m???c
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="./order/" class="header--admin__task__menu__icon orange">
                                        <i class="fas fa-box"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        ????n h??ng
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="./feedback/" class="header--admin__task__menu__icon sky">
                                        <i class="fab fa-megaport"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Ph???n h???i
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="./user/" class="header--admin__task__menu__icon grey">
                                        <i class="fas fa-cog"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        T??i kho???n
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="./index.php" class="header--admin__task__menu__icon yellow">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Trang ch???
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p class="header--admin__task__notification">
                            <i class="far fa-bell"></i>
                        </p>
                        <a href="../logout.php" class="header--admin__task__button">????ng xu???t</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='row admin__content'>
            <div class="col-2 admin__side">
                <div class="navbar--admin">
                    <ul class="navbar--admin__list">
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-clipboard"></i> Qu???n l?? ????n h??ng
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./order/" class="navbar--admin__sublink">
                                        T???t c??? ????n h??ng
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./order/?status=1" class="navbar--admin__sublink">
                                        ??ang giao
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./order/?status=2" class="navbar--admin__sublink">
                                        ???? giao
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-box"></i> Qu???n l?? s???n ph???m
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./product/" class="navbar--admin__sublink">
                                        T???t c??? s???n ph???m
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./product/add" class="navbar--admin__sublink">
                                        Th??m s???n ph???m
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fab fa-megaport"></i> Qu???n l?? ph???n h???i
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./feedback/" class="navbar--admin__sublink">
                                        T???t c??? ph???n h???i
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-thumbtack"></i> Qu???n l?? danh m???c
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./category/" class="navbar--admin__sublink">
                                        T???t c??? danh m???c
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./category/add" class="navbar--admin__sublink">
                                        Th??m danh m???c
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-user-cog"></i> Qu???n l?? t??i kho???n
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./user/" class="navbar--admin__sublink">
                                        T??i kho???n
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./user/password.php" class="navbar--admin__sublink">
                                        M???t kh???u
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./user/accounts.php" class="navbar--admin__sublink">
                                        T??i kho???n ng?????i d??ng
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col admin__has-side">
                <div class="row">
                    <div class='col-12 admin__component'>
                        <div class="admin__home">
                            <h2 class="admin__home__heading">
                                Th??ng s??? v??? website
                            </h2>
                            <p class="admin__home__sub-heading">S??? li???u v??? trang web c???a b???n</p>

                            <div class="admin__home__info">
                                <a href="./order/?status=0" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($wait)?></p>
                                    <p class="admin__home__item__text">Ch??? x??c nh???n</p>
                                </a>
                                <a href="./order/?status=1" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($do)?></p>
                                    <p class="admin__home__item__text">??ang giao h??ng</p>
                                </a>
                                <a href="./order/?status=2" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($done)?></p>
                                    <p class="admin__home__item__text">???? giao</p>
                                </a>
                                <a href="./order/?status=3" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($deleted)?></p>
                                    <p class="admin__home__item__text">????n h???y</p>
                                </a>
                                <a href="./product/" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($products)?></p>
                                    <p class="admin__home__item__text">S???n ph???m</p>
                                </a>
                                <a href="./product/" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($disableProduct)?></p>
                                    <p class="admin__home__item__text">S???n ph???m t???m kh??a</p>
                                </a>
                                <a href="./category/" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($categories) - 1?></p>
                                    <p class="admin__home__item__text">Danh m???c</p>
                                </a>
                                <a href="./feedback/" class="admin__home__item">
                                    <p class="admin__home__item__number"><?=count($feedbacks)?></p>
                                    <p class="admin__home__item__text">Ph???n h???i</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 admin__component'>
                        <div class="admin__home">
                            <h2 class="admin__home__heading">
                                Th??ng s??? v??? doanh thu
                            </h2>
                            <p class="admin__home__sub-heading">S??? li???u v??? doanh thu c???a si??u th???</p>

                            <div class="revenue">
                                <div class="revenue__by">
                                    <div class="revenue__by__item">
                                        <a href="./index.php"
                                            class="revenue__by__link <?=empty($month) && empty($date) && empty($quarter) && empty($start) ? "active" : ""?>">
                                            T???ng quan</a>
                                    </div>
                                    <div class="revenue__by__item">
                                        <p class="revenue__by__link <?=!empty($month) ? "active" : ""?>">Theo th??ng</p>
                                    </div>
                                    <div class="revenue__by__item">
                                        <p class="revenue__by__link <?=!empty($date) ? "active" : ""?>">Theo ng??y th??ng
                                            n??m</p>
                                    </div>
                                    <div class="revenue__by__item">
                                        <p class="revenue__by__link <?=!empty($quarter) ? "active" : ""?>">Theo qu??</p>
                                    </div>
                                    <div class="revenue__by__item">
                                        <p class="revenue__by__link <?=!empty($start) ? "active" : ""?>">Theo kho???n th???i
                                            gian</p>
                                    </div>
                                    <div class="revenue__line"></div>
                                </div>
                                <form method="GET" class="revenue__form _1 <?=!empty($month) ? "active" : ""?>">
                                    <input type="month" class="form-control" name="month" required value="<?=$month?>">
                                    <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">??p
                                        d???ng</button>
                                </form>
                                <form method="GET" class="revenue__form _2 <?=!empty($date) ? "active" : ""?>">
                                    <input type="date" class="form-control" name="date" required value="<?=$date?>">
                                    <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">??p
                                        d???ng</button>
                                </form>
                                <form method="GET" class="revenue__form _3 <?=!empty($quarter) ? "active" : ""?>">
                                    <select class="form-select" aria-label="Default select example" name="quarter"
                                        required>
                                        <option selected>Ch???n m???t qu?? trong n??m</option>
                                        <option <?=$quarter == 1 ? "selected" : ""?> value="1">Qu?? 1</option>
                                        <option <?=$quarter == 2 ? "selected" : ""?> value="2">Qu?? 2</option>
                                        <option <?=$quarter == 3 ? "selected" : ""?> value="3">Qu?? 3</option>
                                        <option <?=$quarter == 4 ? "selected" : ""?> value="4">Qu?? 4</option>
                                    </select>
                                    <select class="form-select" name="year" required>
                                        <?php
for ($y = (int) date('Y'); 1900 <= $y; $y--): ?>
                                        <option <?=$year == $y ? "selected" : ""?> value="<?=$y;?>"><?=$y;?></option>
                                        <?php endfor;?>
                                    </select>
                                    <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">??p
                                        d???ng</button>
                                </form>
                                <form method="GET" class="revenue__form _4 <?=!empty($start) ? "active" : ""?>">
                                    <input placeholder="Ng??y b???t ?????u" type="text" onfocus="(this.type = 'date')"
                                        class="form-control" name="start" required value="<?=$start?>">
                                    <input placeholder="Ng??y k???t th??c" type="text" onfocus="(this.type = 'date')"
                                        class="form-control" name="end" required value="<?=$end?>">
                                    <button type="submit" class="btn btn-secondary list__action__btn shadow-none m-0">??p
                                        d???ng</button>
                                </form>
                                <div class="revenue__info">
                                    <p class="revenue__info__unit">????n v??? t??nh: VN??</p>
                                    <div class="revenue__info__item">
                                        <div class="revenue__info__circle revenue__info__circle--delete">
                                            <p><?php
$total = 0;
foreach ($deleted as $row) {
    $total += (int) $row['total_money'];
}

echo number_format($total);
?></p>
                                        </div>
                                        <p class="revenue__info__item__title">Gi?? tr??? c??c ????n h???y</p>
                                    </div>
                                    <div class="revenue__info__item">
                                        <div class="revenue__info__circle revenue__info__circle--done">
                                            <p><?php
$total = 0;
foreach ($done as $row) {
    $total += (int) $row['total_money'];
}

echo number_format($total);
?></p>
                                        </div>
                                        <p class="revenue__info__item__title">T???ng doang thu (ch??? t??nh c??c ????n ???? giao)
                                        </p>
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
    const items = document.querySelectorAll(".navbar--admin__item--wrap");
    const subnav = document.querySelectorAll(".navbar--admin__subnav");
    const icons = document.querySelectorAll(".navbar--admin__item__icon");

    items.forEach((item, index) => {
        item.addEventListener("click", () => {
            subnav[index].classList.toggle("active");
            icons[index].classList.toggle("active");
        });
    });

    const revenue_items = document.querySelectorAll('.revenue__by__link');
    let active_item = document.querySelector('.revenue__by__link.active');
    const line = document.querySelector('.revenue__line');

    line.style.left = active_item.offsetLeft + "px";
    line.style.width = active_item.offsetWidth + "px";

    revenue_items?.forEach((item, index) => {
        item.addEventListener("click", () => {
            active_item = document.querySelector('.revenue__by__link.active');
            active_item.classList.remove('active');
            item.classList.add('active');
            line.style.left = item.offsetLeft + "px";
            line.style.width = item.offsetWidth + "px";

            const form = document.querySelector(`.revenue__form._${index}`);
            const form_active = document.querySelector(`.revenue__form.active`);
            form_active?.classList.remove('active');
            form.classList.add('active');
        })
    })
    </script>
</body>

</html>