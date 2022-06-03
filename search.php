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

$limit = 10;
$page = 0;

if (!empty($_GET)) {
    $page = getGet('page');
    if (empty($page)) {
        $page = 1;
    }
} else {
    $page = 1;
}

$title = "";

if (!empty($_GET)) {
    $title = strtolower(getGet("search"));
}

$page_first_result = ($page - 1) * $limit;

$quantity = count(executeResult("SELECT * FROM product INNER JOIN category ON product.cate_id = category.id WHERE deleted = 0 AND LOWER(title) LIKE '%$title%'"));

$number_page = ceil($quantity / $limit);

// Get product
$products = array();
$sql = "SELECT product.id, title, unit, price, discount, quantity, name FROM product INNER JOIN category ON product.cate_id = category.id WHERE deleted = 0 AND LOWER(title) LIKE '%$title%' LIMIT " . $page_first_result . "," . $limit;
$products = executeResult($sql);

//Get thumbnail
$img = "SELECT * FROM galery";
$list = executeResult($img);

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
    <title>Sản phẩm</title>
</head>
<?php
include "./header.php";
include "./navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-5" style="font-size: 2.4rem; font-weight:500;">Có <?=$quantity?> kết quả tìm kiếm phù hợp</h1>
            <div class="row" style="row-gap: 20px; margin-bottom: 30px;">
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
        echo '<form class="product-card--wrap col-2-4 col-md" method="POST">
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
            <div class="add-cart-btn--wrap">';
        echo $row['quantity'] == 0 ? '<button type="button" class="add-cart-btn shadow-none btn btn-secondary">Hết hàng</button>' : '<button type="submit" class="add-cart-btn shadow-none btn btn-secondary">Thêm vào giỏ
            hàng</button>';
        echo '</div>
        </div>
        </form>';
    } else {
        echo '<form class="product-card--wrap col-2-4 col-md" method="POST">
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
            <div class="add-cart-btn--wrap">';
        echo $row['quantity'] == 0 ? '<button type="button" class="add-cart-btn shadow-none btn btn-secondary">Hết hàng</button>' : '<button type="submit" class="add-cart-btn shadow-none btn btn-secondary">Thêm vào giỏ
            hàng</button>';
        echo '</div>
        </div>
        </form>';
    }
}
?>
                <nav class="pagination--wrap" aria-label="pagination">
                    <ul class="pagination pagination-lg">
                        <li class="page-item <?=$page == 1 ? 'disabled' : ''?>">
                            <a class="page-link" aria-label="Previous" href="?&page=<?=$page - 1?>">
                                <span aria-hidden="true" class="pagination-previous"><i class="fas fa-chevron-left"></i>
                                </span>
                            </a>
                        </li>
                        <?php
for ($i = 1; $i <= $number_page; $i++) {
    if ($i == $page) {
        echo '<li class="page-item active">
                <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
            </li>';
    } else {
        echo '<li class="page-item">
                <a class="page-link" href="&page=' . $i . '">' . $i . '</a>
            </li>';
    }
}
?>
                        <li class="page-item <?=$page == $number_page ? 'disabled' : ''?>">
                            <a class="page-link" aria-label="Next" href="?page=<?=$page + 1?>">
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

    <?php
include "./footer.php";
?>