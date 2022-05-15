<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ./users/login');
    die();
}

if (!empty($user) && $user['role'] == "admin") {
    header('location: ../MiniMart/admin');
    die();
}

require_once './database/dbhelper.php';
require_once './ultils/ultility.php';

$mode = "profile";

if (!empty($_GET)) {
    $mode = getGet('mode');
    require_once './users/change_password__process.php';
} else {
    require_once './users/change_user_info_process.php';
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
    <title>Tài khoản</title>
</head>
<?php
include "./header.php";
?>
<div class="user container">
    <div class="row">
        <div class="col-md-2">
            <div class="user__nav">
                <div class="user__nav__header">
                    <div class="user__nav__img"><i class="fas fa-user"></i></div>
                    <div class="user__nav__basic-info">
                        <p class="user__nav__text">duc</p><span class="user__nav__sub-text"><i class="fas fa-pen"></i>
                            Sửa
                            hồ sơ</span>
                    </div>
                </div>
                <ul class="user__nav__list">
                    <li class="user__nav__item"><i class="fas fa-user"></i>Tài khoản của
                        tôi
                        <ul class="user__nav__sub-nav open">
                            <li class="user__nav__item sub-item">
                                <a aria-current="page" class="user__nav__link <?=$mode == "profile" ? 'active' : ""?>"
                                    href="./user.php">Hồ sơ</a>
                            </li>
                            <li class="user__nav__item sub-item">
                                <a class="user__nav__link <?=$mode == "password" ? 'active' : ""?>"
                                    href="?mode=password">Đổi
                                    mật khẩu</a>
                            </li>
                        </ul>
                    </li>
                    <li class="user__nav__item"><i class="fas fa-clipboard"></i><a class="user__nav__link"
                            href="/user/purchase">Đơn hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="user__content">
                <div class="profile">
                    <?php
if ($mode == "profile") {
    echo '<div class="profile__header">
                <h2 class="profile__heading">Hồ sơ của tôi</h2>
                <p class="profile__sub-heading">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
        <form id="profile-form" class="profile__user" method="POST">
            <input type="password" name="id" value="' . $user['id'] . '" class="d-none">
            <div class="profile__user__field">
                <p class="profile__user__label">Tên</p>
                <div class="input mb-3">
                    <input name="name" placeholder="Tên" type="password"
                    class="input__control form-control ' . (empty($errors['name']) ? '' : 'is-invalid') . '"
                            aria-invalid="false" value="' . $user['name'] . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['name']) ? '' : 'input__error') . '">
                            ' . (empty($errors['name']) ? "" : $errors['name']) . '
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                        <p class="profile__user__label">Số điện thoại</p>
                        <div class="input mb-3">
                            <input name="phone" placeholder="Số điện thoại" type="password"
                                class="input__control form-control ' . (empty($errors['phone']) ? '' : 'is-invalid') . '"
                                aria-invalid="false" value="' . $user['phone'] . '">
                            <div class="invalid-feedback mt-3 ' . (empty($errors['phone']) ? '' : 'input__error') . '">
                                    ' . (empty($errors['phone']) ? "" : $errors['phone']) . '
                            </div>
                        </div>
                </div>
                <div class="profile__user__field">
                        <p class="profile__user__label">Email</p>
                        <div class="input mb-3">
                            <input name="email" placeholder="Email" type="password"
                                class="input__control form-control ' . (empty($errors['email']) ? '' : 'is-invalid') . '"
                                aria-invalid="false" value="' . $user['email'] . '">
                            <div class="invalid-feedback mt-3 ' . (empty($errors['email']) ? '' : 'input__error') . '">
                                ' . (empty($errors['email']) ? "" : $errors['email']) . '
                            </div>
                        </div>
                </div><button type="submit" class="profile__user__action btn btn-secondary">Lưu</button>
        </form>';
} elseif ($mode == "password") {
    echo '<div class="profile__header">
            <h2 class="profile__heading">Đổi mật khẩu</h2>
            <p class="profile__sub-heading">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho
                người khác</p>
        </div>
        <form id="profile-form" class="profile__user d-flex" method="POST">
            <input type="password" name="id" value="' . $user['id'] . '" class="d-none">
            <div class="profile__user__contain">
                <div class="profile__user__field">
                    <p class="profile__user__label xl">Mật khẩu hiện tại</p>
                    <div class="input mb-3">
                        <input name="password"
                            type="password" class="input__control form-control ' . (empty($errors['password']) ? '' : 'is-invalid') . '" aria-invalid="false"
                            value="' . $password . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['password']) ? '' : 'input__error') . '">
                            ' . (empty($errors['password']) ? "" : $errors['password']) . '
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                    <p class="profile__user__label xl">Mật khẩu mới</p>
                    <div class="input mb-3">
                        <input name="newPassword"
                            type="password" class="input__control form-control ' . (empty($errors['newPassword']) ? '' : 'is-invalid') . '" aria-invalid="false"
                            value="' . $newPassword . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['newPassword']) ? '' : 'input__error') . '">
                            ' . (empty($errors['newPassword']) ? "" : $errors['newPassword']) . '
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                    <p class="profile__user__label xl">Xác nhận mật khẩu</p>
                    <div class="input mb-3">
                        <input name="confirmNewPassword" type="password" class="input__control form-control ' . (empty($errors['confirmPassword']) ? '' : 'is-invalid') . '"
                            aria-invalid="false" value="' . $confirmPassword . '">
                        <div class="invalid-feedback mt-3 ' . (empty($errors['confirmPassword']) ? '' : 'input__error') . '">
                            ' . (empty($errors['confirmPassword']) ? "" : $errors['confirmPassword']) . '
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="profile__user__action xl btn btn-secondary">Xác nhận</button>
            </div>
            <p class="forget-password">Quên mật khẩu?</p>
        </form>';
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./footer.php";
?>