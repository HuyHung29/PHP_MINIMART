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

$cart = array();

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $product_ids = array();
    foreach ($_SESSION['cart'] as $row) {
        $product_ids[] = $row['pro_id'];
    }
    $list_id = "(" . implode(",", $product_ids) . ")";

    $sql = "SELECT id, quantity FROM product WHERE id IN $list_id";
    $products = executeResult($sql);
}

require_once './ultils/change_quantity.php';

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
    <title>Giỏ hàng</title>
</head>
<?php
include "./header.php";
include "./navbar.php";
?>
<div class="cart-page  container">
    <div class="row">
        <?php
if (!(count($cart) > 0)) {
    echo ' <div class="cart-page--empty"><img src="./assets/emptyCart.png" alt="empty">
                <p>Giỏ hàng của bạn trống</p><a class="btn-normal" href="./products.php">Mua ngay</a>
            </div>';
}
?>

        <div class="col-md-12 <?=count($cart) > 0 ? "" : "d-none"?>">
            <div class="cart-page__item cart-page--margin bg-white ">
                <div class="cart-page__item__product">Sản phẩm</div>
                <div class="cart-page__item__price">Đơn giá</div>
                <div class="cart-page__item__quantity">Số lượng</div>
                <div class="cart-page__item__total">Thành tiền</div>
                <div class="cart-page__item__action">Thao tác</div>
            </div>
            <div class="cart-page__list bg-white">
                <?php
$sum = 0;
foreach ($cart as $row) {
    $count = 0;
    foreach ($products as $item) {
        if ($row['pro_id'] == $item['id']) {
            $count = $item['quantity'];
            break;
        }
    }
    $sum += (int) $row['total'];
    echo '<div class="cart-page__item">
            <div class="cart-page__item__product">
                <a>
                    <img
                        src="./assets/thumbnail/' . $row['thumbnail'] . '"
                        alt="anh">
                </a>
                <a>
                        <p>' . $row['title'] . '</p>
                </a>
            </div>
            <div class="cart-page__item__price">
                <p>' . number_format((int) $row['price']) . '<sup>đ</sup></p>
            </div>
            <div class="cart-page__item__quantity">
                <form method="POST" class="cart-page__item__quantity__calculate">
                    <input name="id" type="hidden" value="' . $row['pro_id'] . '">
                    <input data-quantity=' . $count . ' name="quantity" type="number" value="' . $row['quantity'] . '">
                    <button type="submit" class="btn btn-secondary btn-change-quantity">Đổi</button>
                </form>
            </div>
            <div class="cart-page__item__total">
                <p>' . number_format((int) $row['total']) . '<sup>đ</sup></p>
            </div>
            <div class="cart-page__item__action">
                <a class="cart-page__item__action__link" href="./ultils/delete_cart_process.php?id=' . $row['pro_id'] . '"><i class="fas fa-times"></i></a>
            </div>
            </div>';
}
?>
            </div>
            <div class="cart-page__item cart-page--margin bg-white ">
                <div class="cart-page__item__summary">
                    <p>Tổng thanh toán (<?=count($cart)?> Sản phẩm): <span><sup>đ</sup><?=number_format($sum)?></span>
                    </p>
                    <a href="./ultils/delete_cart_process.php?delete=all"
                        class="btn btn-secondary add-cart-btn mt-0 delete-all">Xóa tất cả sản phẩm</a>
                    <a href="./order.php">
                        <button class="buy-btn shadow-none  buy-btn--mr0 btn btn-secondary">Mua hàng</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const inputs = document.querySelectorAll('input[name="quantity"]');

inputs?.forEach(input => {
    input.addEventListener("blur", () => {
        if (input.value <= 0) {
            input.value = 1;
        } else if (+input.value > +input.dataset.quantity) input.value = +input.dataset.quantity;
    })
})


const cartBtns = document.querySelectorAll('.cart-page__item__action__link');

cartBtns.forEach(btn => {
    btn.addEventListener("click", (e) => {
        if (!confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?")) {
            e.preventDefault();
        }
    })
})

const deleteAll = document.querySelector(".delete-all");
deleteAll.addEventListener("click", (e) => {
    if (!confirm("Bạn có chắc chắc muốn xóa tất cả sản phẩm khỏi giỏ hàng?")) {
        e.preventDefault();
    }
})
</script>

<?php
include "./footer.php";
?>