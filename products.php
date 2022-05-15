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
?>
<div class="product-list--wrap container">
    <div class="row">
        <div class="col-md-2">
            <h3 class="product-list__title">Danh mục sản phẩm</h3>
            <div class="sub-menu">
                <ul class="sub-menu__list">
                    <li class="sub-menu__item"><a class="sub-menu__link" href="/">Trang chủ</a></li>
                    <li class="sub-menu__item"><a class="sub-menu__link" href="/about-us">Giới thiệu</a></li>
                    <li class="sub-menu__item"><a aria-current="page" class="sub-menu__link sub-menu__link--not active"
                            href="/products">Sản phẩm <i class="fas fa-chevron-right sub-menu__icon "></i></a>
                        <ul class="second-menu ">
                            <li class="second-menu__item">Rau củ</li>
                            <li class="second-menu__item">Hải sản</li>
                            <li class="second-menu__item">Hoa quả trong nước</li>
                            <li class="second-menu__item">Hoa quả nhập khẩu</li>
                            <li class="second-menu__item">Hoa quả sấy</li>
                            <li class="second-menu__item">Thịt các loại</li>
                            <li class="second-menu__item">Củ các loại</li>
                            <li class="second-menu__item">Hạt các loại</li>
                        </ul>
                    </li>
                    <li class="sub-menu__item"><a class="sub-menu__link" href="/news">Tin tức</a></li>
                    <li class="sub-menu__item"><a class="sub-menu__link" href="/contact">Liên hệ</a></li>
                </ul>
            </div>
            <h3 class="product-list__title">Tìm theo giá</h3>
            <ul class="sort-price">
                <li class="sort-price__item"><input name="price" id="price-1" type="radio"
                        class="form-check-input"><label for="price-1" class="form-label">Giá dưới
                        100.000<sup>đ</sup></label></li>
                <li class="sort-price__item"><input name="price" id="price-2" type="radio"
                        class="form-check-input"><label for="price-2" class="form-label">100.000<sup>đ</sup> -
                        200.000<sup>đ</sup></label></li>
                <li class="sort-price__item"><input name="price" id="price-3" type="radio"
                        class="form-check-input"><label for="price-3" class="form-label">200.000<sup>đ</sup> -
                        300.000<sup>đ</sup></label></li>
                <li class="sort-price__item"><input name="price" id="price-4" type="radio"
                        class="form-check-input"><label for="price-4" class="form-label">300.000<sup>đ</sup> -
                        500.000<sup>đ</sup></label></li>
                <li class="sort-price__item"><input name="price" id="price-5" type="radio"
                        class="form-check-input"><label for="price-5" class="form-label">200.000<sup>đ</sup> -
                        1.000.000<sup>đ</sup></label></li>
                <li class="sort-price__item"><input name="price" id="price-6" type="radio"
                        class="form-check-input"><label for="price-6" class="form-label">Giá trên
                        1.000.000<sup>đ</sup></label></li>
            </ul>
        </div>
        <div class="col">
            <h3 class="product-list__title">Tất cả sản phẩm</h3>
            <div class="product-list row">
                <div class="product-card--wrap col-md-3">
                    <div class="product-card">
                        <a class="product-card__link" href="/products/Vải-thiều-Thanh-Hà?id=61e1b0f981a13684f482118c">
                            <div class="product-card__img">
                                <img src="https://res.cloudinary.com/dt5zd3iz4/image/upload/v1642180856/MiniMart/Product/vpfk5ma4i1mo8ckbz4n1.jpg"
                                    alt="anh">
                            </div>
                            <div class="product-card__info">
                                <div class="product-card__name" style="-webkit-line-clamp: 1; display: -webkit-box;">Vải
                                    thiều Thanh Hà</div>
                                <div class="product-card__price--wrap">
                                    <p class="product__price">39.500 <sup>đ</sup>/kg</p>
                                    <p class="product__price--old">79.000 <sup>đ</sup>/kg</p>
                                </div>
                            </div>
                        </a>
                        <p class="product-card__view--btn"><i class="fas fa-eye"></i></p>
                        <p class="product-card__favorite--btn"><i class="far fa-heart"></i></p>
                        <div class="add-cart-btn--wrap">
                            <button type="button" class="add-cart-btn shadow-none btn btn-secondary">Thêm vào giỏ
                                hàng</button>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="pagination--wrap" aria-label="pagination">
                <ul class="pagination pagination-lg">
                    <li class="page-item disabled"><a class="page-link" aria-label="Previous"
                            href="/products?page=undefined"> <span aria-hidden="true" class="pagination-previous"><i
                                    class="fas fa-chevron-left"></i></span></a></li>
                    <li class="page-item active"><a class="page-link" href="/products?page=1">1</a></li>
                    <li class="page-item">
                        <a class="page-link" href="/products?page=2">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="/products?page=3">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="/products?page=4">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" aria-label="Next" href="/products?page=2">
                            <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
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