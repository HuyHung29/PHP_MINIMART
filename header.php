<body>
    <div class="layout">
        <div class="layout__content__background">
            <div class="header" id="header">
                <div class="container">
                    <div class="row py-4">
                        <div class="col">
                            <div class="header__top d-flex justify-content-start align-items-center">
                                <p class="header__top__item">
                                    Kết nối
                                    <a href="https://www.facebook.com/profile.php?id=100011702486663" target="_blank"><i
                                            class="fa-brands fa-facebook mx-2"></i></a>
                                    <a href="https://www.instagram.com/huyhung29901/" target="_blank"><i
                                            class="fa-brands fa-instagram"></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="header__top d-flex justify-content-end align-items-center">
                                <?php
if (!empty($user)) {
    echo "<div class='header__top__item'>
            <i class='header__top__icon fas fa-user-circle'></i>
            <p>" . $user['name'] . "
                <ul class='header__top__item--sub'>
                    <li class='header__top__item--sub__item'>
                        <a href='./user.php'>Tài khoản của tôi</a>
                    </li>
                    <li class='header__top__item--sub__item'>
                        <a href='./user.php?mode=order'>Đơn mua</a>
                    </li>
                    <li class='header__top__item--sub__item'>
                        <a href='./logout.php'>Đăng xuất</a>
                    </li>
                </ul>

            </p>
        </div>";
} else {
    echo "<a
			href='../../../MiniMart/users/signup/'
			class='header__top__item'
			>Đăng ký
		</a>";
    echo "<a
			href='../../../MiniMart/users/login/'
			class='header__top__item'
			>Đăng nhập
		</a>";
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2 pb-4">
                        <div class="col-3">
                            <a href='./index.php'>
                                <img src=" ../../MiniMart/assets/pic/logo.png" alt="logo" />
                            </a>
                        </div>
                        <div class="col d-flex align-items-center">
                            <form method="get" class="header__search" action="./search.php">
                                <input type="text" name="search" class="header__search__input" autocomplete="off"
                                    placeholder="Tìm kiếm sản phẩm" />
                                <button class="btn header__search__btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <div class="header__cart">
                                <div class="cart">
                                    <div class="cart__group"><a class="cart__button" href="./cart.php"
                                            style="background-image: url(./assets/pic/bg_search.png);"><i
                                                class="fas fa-shopping-bag"></i>
                                            <p>GIỎ HÀNG <span
                                                    class="cart__quantity">(<?=(isset($_SESSION['cart']) && count(($_SESSION['cart'])) > 0) ? count($_SESSION['cart']) : "0"?>)</span>
                                            </p>
                                        </a>
                                        <div class="cart__group__menu">
                                            <?php
$cart = array();
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

if (count($cart) > 0) {
    $total = 0;
    echo ' <ul class="cart__list">';
    foreach ($cart as $row) {
        $total += (int) $row['price'];
        echo '<li class="cart__item">
                    <p class="cart__item__img"><img
                                src="./assets/thumbnail/' . $row['thumbnail'] . '"
                                alt="anh">
                    </p>
                        <div class="cart__item__info">
                            <div class="cart__item__info--wrap">
                                <h3 class="cart__item__name"><p>' . $row['title'] . '</p></h3>
                                <p class="cart__item__price">' . number_format((int) $row['price']) . ' <small>đ/kg</small></p>
                                <p class="cart__item__quantity">Số lượng: ' . $row['quantity'] . '</p>
                            </div>
                            <a href="./ultils/delete_cart_process.php?id=' . $row['pro_id'] . '" class="cart__item__action"><i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </li>';
    }
    echo '</ul>
            <div class="cart__bottom">
                <div class="cart__total-price">
                    <p>Tổng tiền</p><span>' . number_format($total) . '<small>đ</small></span>
                </div><a href="./order.php" class="buy-btn shadow-none  w-100 btn btn-secondary">Tiến
                    hành đặt hàng</a>
            </div>';
} else {
    echo '<div class="cart--empty"><img src="./assets/emptyCart.png" alt="empty cart">
                <p>Chưa có sản phẩm</p>
            </div>';
}
?>
                                            <script>
                                            const btns = document.querySelectorAll('.cart__item__action');
                                            btns.forEach(btn => {
                                                btn.addEventListener("click", (e) => {
                                                    if (!confirm(
                                                            "Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?"
                                                        )) {
                                                        e.preventDefault();
                                                    }
                                                })
                                            })
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>