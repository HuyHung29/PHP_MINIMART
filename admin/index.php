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
    <title>Trang quản trị</title>
</head>

<body>
    <div fluid class='container-fluid admin'>
        <div class="row">
            <div class="header--admin">
                <div class="header--admin__side">
                    <a href="./../../admin/">
                        <img src="https://bizweb.dktcdn.net/100/322/163/themes/853119/assets/logo_footer.png?1646209470651"
                            alt="anh" class="header--admin__logo" />
                    </a>
                    <h1 class="header--admin__heading">Trang quản trị</h1>
                </div>
                <div class="header--admin__side">
                    <div class="header--admin__user">
                        <i class="fas fa-user-circle"></i>
                        <p>huy hung</p>
                    </div>
                    <div class="header--admin__task">
                        <div class="header--admin__task__list">
                            <i class="fas fa-bars"></i>

                            <div class="header--admin__task__menu">
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/products" class="header--admin__task__menu__icon blue">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                    <p class="header--admin__task__menu__title">
                                        Sản phẩm
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/categories" class="header--admin__task__menu__icon green">
                                        <i class="fas fa-list-ul"></i>
                                    </a>
                                    <p class="header--admin__task__menu__title">
                                        Danh mục
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/purchase" class="header--admin__task__menu__icon orange">
                                        <i class="fas fa-box"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Đơn hàng
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/posts" class="header--admin__task__menu__icon sky">
                                        <i class="fab fa-megaport"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Bài viết
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/info" class="header--admin__task__menu__icon grey">
                                        <i class="fas fa-cog"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Tài khoản
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/" class="header--admin__task__menu__icon yellow">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Trang chủ
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p class="header--admin__task__notification">
                            <i class="far fa-bell"></i>
                        </p>
                        <p class="header--admin__task__button">Minimart</p>
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
                                    <i class="fas fa-clipboard"></i> Quản lý đơn hàng
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./order/" class="navbar--admin__sublink">
                                        Tất cả đơn hàng
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./order/?status=processing" class="navbar--admin__sublink">
                                        Đang xử lý
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./order/?status=completed" class="navbar--admin__sublink">
                                        Đã giao
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-box"></i> Quản lý sản phẩm
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./product/" class="navbar--admin__sublink">
                                        Tất cả sản phẩm
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./product/add" class="navbar--admin__sublink">
                                        Thêm sản phẩm
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fab fa-megaport"></i> Quản lý phẩn hồi
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./feedback/" class="navbar--admin__sublink">
                                        Tất cả phản hồi
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-thumbtack"></i> Quản lý danh mục
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./category/" class="navbar--admin__sublink">
                                        Tất cả danh mục
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./category/add" class="navbar--admin__sublink">
                                        Thêm danh mục
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar--admin__item">
                            <div class="navbar--admin__item--wrap">
                                <p class="navbar--admin__item__title">
                                    <i class="fas fa-user-cog"></i> Quản lý tài khoản
                                </p>
                                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
                            </div>

                            <ul class="navbar--admin__subnav">
                                <li class="navbar--admin__subitem">
                                    <a href="./user/" class="navbar--admin__sublink">
                                        Tài khoản
                                    </a>
                                </li>
                                <li class="navbar--admin__subitem">
                                    <a href="./user/" class="navbar--admin__sublink">
                                        Mật khẩu
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col admin__has-side">
                <div class="row">
                    <div class='col admin__component'>
                        hello world
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
    </script>
</body>

</html>