<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../users/login');
}
require_once './edit_category_process.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="./../../../assets/pic/icon.jpeg" />
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
    <link rel="stylesheet" href="./../../../dist/css/style.css" />
    <title>Sửa danh mục</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="header--admin">
                <div class="header--admin__side">
                    <a href="./../../../admin/">
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
        <div class="row admin__content">
            <div class="admin__has-side mx-0 col">
                <div class="row">
                    <div class="admin__component col">
                        <div class="container">
                            <div class="row">
                                <div class="bg-white shadow-sm p-5 col">
                                    <div class="add-edit__header">
                                        <h1 class="add-edit__heading">
                                            Sửa thông tin danh mục
                                        </h1>
                                        <p class="add-edit__sub-heading">
                                            Vui lòng điền thông tin danh mục
                                        </p>
                                    </div>
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input mb-3">
                                                    <label for="name" class="input__label form-label">Tên danh
                                                        mục</label>
                                                    <input name="name" type="text"
                                                        class="input__control form-control <?=empty($error) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false" value="<?=$name?>" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($error) ? '' : 'input__error'?>">
                                                        <?=empty($error) ? "" : $error?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center col-md-12">
                                                <button type="submit"
                                                    class="form__btn form__btn--success btn btn-secondary">
                                                    Lưu lại</button>
                                                <button type="reset"
                                                    class="form__btn form__btn--danger btn btn-secondary">
                                                    <a href="./../index.php">Hủy</a>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>