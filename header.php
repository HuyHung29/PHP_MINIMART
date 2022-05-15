<body>
    <div class="layout">
        <div class="layout__content__background">
            <div class="header" id="header">
                <div class="container">
                    <div class="row py-4">
                        <div class="col">
                            <div class="header__top d-flex justify-content-start align-items-center">
                                <p class="header__top__item">Trang quản trị</p>
                                <p class="header__top__item">
                                    Kết nối
                                    <span><i class="fa-brands fa-facebook"></i></span>
                                    <span><i class="fa-brands fa-instagram"></i></span>
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
                        <a href=''>Đơn mua</a>
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
                            <form method="post" class="header__search">
                                <input type="text" name="search" class="header__search__input" autocomplete="off" />
                                <button class="btn header__search__btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center">
                            <div class="header__cart">
                                <a href="#">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>