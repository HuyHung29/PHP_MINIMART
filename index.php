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
    <title>MiniMart</title>
</head>
<?php
include "./header.php";
include "./navbar.php";
?>
<div class="top-slider"><img src="./assets/pic/slider_1.jpeg" alt="slider"></div>
<div class="home container">
    <div class="home__banner row">
        <div class="col">
            <div class="home__banner__item"><img src="./assets/pic/banner_1.jpg" alt="banner" class="home__banner__img">
            </div>
        </div>
        <div class="col">
            <div class="home__banner__item"><img src="./assets/pic/banner_2.jpg" alt="banner" class="home__banner__img">
            </div>
        </div>
        <div class="col">
            <div class="home__banner__item"><img src="./assets/pic/banner_3.jpg" alt="banner" class="home__banner__img">
            </div>
        </div>
        <div class="home__slider col-md-12">
            <div class="home__link--wrap">
                <a class="home__link"
                    href="./products.php?cate=<?=urlencode($categories[0]['name'])?>"><?=$categories[0]['name']?></a>
            </div>
            <div class="row">
                <?php
$selectProduct = "SELECT * FROM product WHERE cate_id = '" . $categories[0]['id'] . "' LIMIT 5";
$products = executeResult($selectProduct);
foreach ($products as $row) {
    $newPrice = $row['price'] - $row['price'] * $row['discount'] / 100;
    $thumbnail = "";
    foreach ($list as $img) {
        if ($img['product_id'] == $row['id']) {
            $thumbnail = $img['thumbnail'];
            break;
        }
    }
    if ($row['discount'] != 0) {
        echo '<form class="product-card--wrap col" method="POST">
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
                        <p class="product__price--old">' . number_format($row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
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
        echo '<form class="product-card--wrap col" method="POST">
        <div class="product-card">
            <a class="product-card__link" href="./productDetail.php?id=' . $row['id'] . '">
                <div class="product-card__img">
                    <img src="./assets/thumbnail/' . $thumbnail . '"
                        alt="anh">
                </div>
                <div class="product-card__info">
                    <div class="product-card__name" style="-webkit-line-clamp: 1; display: -webkit-box;">' . $row['title'] . '</div>
                    <div class="product-card__price--wrap">
                        <p class="product__price">' . number_format($row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
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
        </div>
        <div class="home__slider col-md-12">
            <div class="home__link--wrap">
                <a class="home__link"
                    href="./products.php?cate=<?=urlencode($categories[5]['name'])?>"><?=$categories[5]['name']?></a>
            </div>
            <div class="row">
                <?php
$selectProduct = "SELECT * FROM product WHERE cate_id = '" . $categories[5]['id'] . "' LIMIT 5";
$products = executeResult($selectProduct);
foreach ($products as $row) {
    $newPrice = $row['price'] - $row['price'] * $row['discount'] / 100;
    $thumbnail = "";
    foreach ($list as $img) {
        if ($img['product_id'] == $row['id']) {
            $thumbnail = $img['thumbnail'];
            break;
        }
    }
    if ($row['discount'] != 0) {
        echo '<form class="product-card--wrap col" method="POST">
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
                        <p class="product__price--old">' . number_format($row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
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
        echo '<form class="product-card--wrap col" method="POST">
        <div class="product-card">
            <a class="product-card__link" href="./productDetail.php?id=' . $row['id'] . '">
                <div class="product-card__img">
                    <img src="./assets/thumbnail/' . $thumbnail . '"
                        alt="anh">
                </div>
                <div class="product-card__info">
                    <div class="product-card__name" style="-webkit-line-clamp: 1; display: -webkit-box;">' . $row['title'] . '</div>
                    <div class="product-card__price--wrap">
                        <p class="product__price">' . number_format($row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
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
        </div>
        <div class="home__slider col-md-12">
            <div class="home__link--wrap">
                <a class="home__link"
                    href="./products.php?cate=<?=urlencode($categories[2]['name'])?>"><?=$categories[2]['name']?></a>
            </div>
            <div class="row">
                <?php
$selectProduct = "SELECT * FROM product WHERE cate_id = '" . $categories[2]['id'] . "' LIMIT 5";
$products = executeResult($selectProduct);
foreach ($products as $row) {
    $newPrice = $row['price'] - $row['price'] * $row['discount'] / 100;
    $thumbnail = "";
    foreach ($list as $img) {
        if ($img['product_id'] == $row['id']) {
            $thumbnail = $img['thumbnail'];
            break;
        }
    }
    if ($row['discount'] != 0) {
        echo '<form class="product-card--wrap col" method="POST">
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
                        <p class="product__price--old">' . number_format($row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
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
        echo '<form class="product-card--wrap col" method="POST">
        <div class="product-card">
            <a class="product-card__link" href="./productDetail.php?id=' . $row['id'] . '">
                <div class="product-card__img">
                    <img src="./assets/thumbnail/' . $thumbnail . '"
                        alt="anh">
                </div>
                <div class="product-card__info">
                    <div class="product-card__name" style="-webkit-line-clamp: 1; display: -webkit-box;">' . $row['title'] . '</div>
                    <div class="product-card__price--wrap">
                        <p class="product__price">' . number_format($row['price']) . ' <sup>đ</sup>/' . $row['unit'] . '</p>
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
        </div>
    </div>
</div>

<?php
include "./footer.php"
?>