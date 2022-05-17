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

$productID = "";

if (!empty($_GET)) {
    $productID = getGet('id');
}

$sql = "SELECT product.id, title, country, price, discount, description, name FROM product INNER JOIN category ON product.cate_id = category.id WHERE deleted = 0 AND product.id = '$productID'";

$product = executeResult($sql, true);
$oldPrice = (int) $product['price'];
$newPrice = $oldPrice - $oldPrice * (int) $product['discount'] / 100;

$img = "SELECT * FROM galery WHERE product_id = '$productID'";
$thumbnail = executeResult($img);

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

<div class="product-detail container">
    <div class="row">
        <div class="col-md-12">
            <section class="bg-white product-detail__page">
                <div class="row">
                    <div class="col-md-4">
                        <div class="product-detail__page__thumbnail">
                            <div class="current-img--wrap">
                                <img class="current-img" src="" alt="anh">
                            </div>
                            <div class="list-thumbnail">
                                <?php
foreach ($thumbnail as $img) {
    echo '<img class="list-thumbnail__item" src="./assets/thumbnail/' . $img['thumbnail'] . '" alt="anh">';
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form method="POST" class="product-detail__page__info">
                            <h2><?=$product['title']?></h2>
                            <div class="product-detail__page__info__evaluate">
                                <div class="product-detail__page__info__evaluate__item">
                                    <p>5 <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i></p>
                                </div>
                            </div>
                            <div class="product-detail__page__info__bg">
                                <?php
if ($product['discount'] != 0) {
    echo ' <p class="product__price--old product__price--detail--old">
            <sup>đ</sup>' . number_format($oldPrice) . '
            </p>
            <p class="product__price product__price--detail">
                <sup>đ</sup>' . number_format($newPrice) . '
            </p><span class="product__price__discount">' . $product['discount'] . '% GIẢM</span>';
} else {
    echo '<p class="product__price product__price--detail">
                <sup>đ</sup>' . number_format($product['price']) . '
            </p>';
}

?>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <p class="product-detail__page__info__text">Phân loại </p>
                                <p class="product-detail__page__info__text--dark"><?=$product['name']?></p>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <p class="product-detail__page__info__text">Xuất sứ</p>
                                <p class="product-detail__page__info__text--dark"><?=$product['country']?></p>
                            </div>
                            <div class="product-detail__page__info__quantity">
                                <p class="product-detail__page__info__text">Số lượng </p>
                                <div class="product__quantity">
                                    <p class="product__quantity__btn minus"><i class="fas fa-minus"></i></p>
                                    <input type="text" name="quantity" class="product__quantity__value" value="1">
                                    <p class="product__quantity__btn plus"><i class="fas fa-plus"></i></p>
                                </div>
                            </div>
                            <input type="text" class="d-none" name="id" value="<?=$product['id']?>">
                            <input type="text" class="d-none" name="title" value="<?=$product['title']?>">
                            <input type="text" class="d-none" name="thumbnail" value="<?=$thumbnail[0]['thumbnail']?>">
                            <input type="text" class="d-none" name="price" value="<?=$newPrice?>">
                            <button type="submit" class="add-cart-btn shadow-none btn btn-secondary">Thêm
                                vào giỏ
                                hàng
                            </button>
                            <div class="product-detail__page__info__share">
                                <h3 class="product-detail__page__info__share__title">Chia sẻ</h3>
                                <div class="product-detail__page__info__share__list">
                                    <p class="product-detail__page__info__share__item"><i
                                            class="fab fa-facebook-messenger"></i></p>
                                    <p class="product-detail__page__info__share__item"><i class="fab fa-twitter"></i>
                                    </p>
                                    <p class="product-detail__page__info__share__item"><i class="fab fa-facebook-f"></i>
                                    </p>
                                    <p class="product-detail__page__info__share__item"><i class="fab fa-pinterest"></i>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12">
            <section class="bg-white product-detail__page">
                <div class="product-detail__page__info__bg">
                    <h2>Mô tả sản phẩm</h2>
                </div>
                <div class="description">
                    <?=$product['description']?>
                </div>
            </section>
        </div>
    </div>
</div>


<script>
// Handle actice thumbnail
const thumbnails = document.querySelectorAll(".list-thumbnail__item");
const currThumbnail = document.querySelector(".current-img");
thumbnails[0].classList.add('active');
currThumbnail.setAttribute("src", thumbnails[0].getAttribute("src"));

thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
        const activeThumbnail = document.querySelector(".list-thumbnail__item.active");
        activeThumbnail.classList.remove('active');
        thumbnail.classList.add("active");
        currThumbnail.setAttribute("src", thumbnail.getAttribute("src"));
    })
})

// Handle change quantity
const minus = document.querySelector('.minus');
const plus = document.querySelector('.plus');
const quantity = document.querySelector('.product__quantity__value');

minus.addEventListener("click", () => {
    if (quantity.value > 1) {
        quantity.value = +quantity.value - 1;
    } else if (quantity.value == 0) {
        quantity.value = 1;
    }
})

plus.addEventListener("click", () => {
    quantity.value = +quantity.value + 1;
})
</script>
<?php
include "./footer.php";
?>