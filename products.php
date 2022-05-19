<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
}

if (!empty($user) && $user['role'] == "admin") {
    header('location: ../MiniMart/admin');
    die();
}

require_once './database/dbhelper.php';
require_once './ultils/ultility.php';

$limit = 12;
$page = 0;
$cateName = "";

if (!empty($_GET)) {
    $page = getGet('page');
    if (empty($page)) {
        $page = 1;
    }
    $cateName = urldecode(getGet('cate'));
} else {
    $page = 1;
}

$page_first_result = ($page - 1) * $limit;

$quantity = count(executeResult("SELECT * FROM product"));

$number_page = ceil($quantity / $limit);

// Get product
$products = array();
if (empty($cateName)) {
    $sql = "SELECT product.id, title, unit, price, discount, name FROM product INNER JOIN category ON product.cate_id = category.id WHERE deleted = 0 LIMIT " . $page_first_result . "," . $limit;
} else {
    $sql = "SELECT product.id, title, country, unit, price, discount, name FROM product INNER JOIN category ON product.cate_id = category.id WHERE deleted = 0 AND name = '$cateName' LIMIT " . $page_first_result . "," . $limit;
}
$products = executeResult($sql);

//Get thumbnail
$img = "SELECT * FROM galery";
$list = executeResult($img);

//Get category
$cate = "SELECT * FROM category";
$categories = executeResult($cate);

require_once './ultils/add_cart_process.php';

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
    <title><?=empty($cateName) ? "Sản phẩm" : $cateName?></title>
</head>
<?php
include "./header.php";
include "./navbar.php";
?>
<div class="product-list--wrap container">
    <div class="row">
        <div class="col-md-2">
            <h3 class="product-list__title">Danh mục sản phẩm</h3>
            <div class="sub-menu">
                <ul class="sub-menu__list">
                    <li class="sub-menu__item"><a class="sub-menu__link" href="./index.php">Trang chủ</a></li>
                    <li class="sub-menu__item"><a aria-current="page" class="sub-menu__link sub-menu__link--not">Sản
                            phẩm <i class="fas fa-chevron-right sub-menu__icon"></i></a>
                        <ul class="second-menu">
                            <?php
foreach ($categories as $row) {
    echo '<li class="second-menu__item"><a href="?cate=' . urlencode($row['name']) . '">' . $row['name'] . '</a></li>';
}
?>
                        </ul>
                    </li>
                    <li class="sub-menu__item"><a class="sub-menu__link" href="./feedback.php">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <h3 class="product-list__title"><?=empty($cateName) ? "Tất cả sản phẩm" : $cateName?></h3>
            <div class="product-list row">
                <?php
foreach ($products as $row) {
    $newPrice = (int) $row['price'] - (int) $row['price'] * (int) $row['discount'] / 100;
    $thumbnail = "";
    foreach ($list as $img) {
        if ($img['product_id'] == $row['id']) {
            $thumbnail = $img['thumbnail'];
            break;
        }
    }
    if ($row['discount'] != 0) {
        echo '<form class="product-card--wrap col-md-3" method="POST">
        <div class="product-card">
            <a class="product-card__link" href="./productDetail.php?id=' . $row['id'] . '">
                <div class="product-card__img">
                    <img src="./assets/thumbnail/' . $thumbnail . '"
                        alt="anh">
                </div>
                <div class="product-card__info">
                    <div class="product-card__name" style="-webkit-line-clamp: 1; display: -webkit-box;">' . $row['title'] . '</div>
                    <div class="product-card__price--wrap">
                        <p class="product__price">' . number_format($newPrice) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
                        <p class="product__price--old">' . number_format((int) $row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
                    </div>
                </div>
            </a>
            <p class="product-card__view--btn"><i class="fas fa-eye"></i></p>
            <p class="product-card__favorite--btn"><i class="far fa-heart"></i></p>
            <input type="text" class="d-none" name="id" value="' . $row['id'] . '">
            <input type="text" class="d-none" name="title" value="' . $row['title'] . '">
            <input type="text" class="d-none" name="thumbnail" value="' . $thumbnail . '">
            <input type="text" class="d-none" name="price" value="' . $newPrice . '">
            <input type="text" class="d-none" name="quantity" value="1">
            <div class="add-cart-btn--wrap">
                <button type="submit" class="add-cart-btn shadow-none btn btn-secondary">Thêm vào giỏ
                    hàng</button>
            </div>
        </div>
        </form>';
    } else {
        echo '<form class="product-card--wrap col-md-3" method="POST">
        <div class="product-card">
            <a class="product-card__link" href="./productDetail.php?id=' . $row['id'] . '">
                <div class="product-card__img">
                    <img src="./assets/thumbnail/' . $thumbnail . '"
                        alt="anh">
                </div>
                <div class="product-card__info">
                    <div class="product-card__name" style="-webkit-line-clamp: 1; display: -webkit-box;">' . $row['title'] . '</div>
                    <div class="product-card__price--wrap">
                        <p class="product__price">' . number_format((int) $row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
                    </div>
                </div>
            </a>
            <p class="product-card__view--btn"><i class="fas fa-eye"></i></p>
            <p class="product-card__favorite--btn"><i class="far fa-heart"></i></p>
            <input type="text" class="d-none" name="id" value="' . $row['id'] . '">
            <input type="text" class="d-none" name="title" value="' . $row['title'] . '">
            <input type="text" class="d-none" name="thumbnail" value="' . $thumbnail . '">
            <input type="text" class="d-none" name="price" value="' . $newPrice . '">
            <input type="text" class="d-none" name="quantity" value="1">
            <div class="add-cart-btn--wrap">
                <button type="submit" class="add-cart-btn shadow-none btn btn-secondary">Thêm vào giỏ
                    hàng</button>
            </div>
        </div>
        </form>';
    }

}
?>
            </div>
            <nav class="pagination--wrap" aria-label="pagination">
                <ul class="pagination pagination-lg">
                    <li class="page-item <?=$page == 1 ? 'disabled' : ''?>">
                        <a class="page-link" aria-label="Previous" href="?cate=<?=$cateName?>&page=<?=$page - 1?>">
                            <span aria-hidden="true" class="pagination-previous"><i class="fas fa-chevron-left"></i>
                            </span>
                        </a>
                    </li>
                    <?php
for ($i = 1; $i <= $number_page; $i++) {
    if ($i == $page) {
        echo '<li class="page-item active">
                <a class="page-link" href="?cate=' . $cateName . '&page=' . $i . '">' . $i . '</a>
            </li>';
    } else {
        echo '<li class="page-item">
                <a class="page-link" href="?cate=' . $cateName . '&page=' . $i . '">' . $i . '</a>
            </li>';
    }
}
?>
                    <li class="page-item <?=$page == $number_page ? 'disabled' : ''?>">
                        <a class="page-link" aria-label="Next" href="?cate=<?=$cateName?>&page=<?=$page + 1?>">
                            <span aria-hidden="true">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
const menu = document.querySelector('.sub-menu__link--not');
const subMenu = document.querySelector('.second-menu');
const icon = document.querySelector('.sub-menu__icon');
const heart = document.querySelector('.product-card__favorite--btn');
const heartIcon = document.querySelector('.fa-heart');

menu.addEventListener("click", () => {
    menu.classList.toggle('active');
    subMenu.classList.toggle('active');
    icon.classList.toggle('active');
})

heart.addEventListener("click", () => {
    if (heartIcon.classList.contains('far')) {
        heartIcon.classList.remove('far');
        heartIcon.classList.add('fas');
    } else {
        heartIcon.classList.remove('fas');
        heartIcon.classList.add('far');
    }
})
</script>

<?php
include "./footer.php";
?>