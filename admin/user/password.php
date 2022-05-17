<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../users/login');
}
require_once "./change_password__process.php";
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
    <link rel="stylesheet" href="./../../dist/css/style.css" />
    <title>Tài khoản</title>
</head>
<?php
require_once './../inc/header.php';
?>
<div class="row">
    <div class="col admin__component">
        <div class="profile">
            <div class="profile__header">
                <h2 class="profile__heading">Đổi mật khẩu</h2>
                <p class="profile__sub-heading">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
            </div>
            <form id="profile-form" class="profile__user d-flex" method="POST">
                <input type="text" name="id" value="<?=$user['id']?>" class="d-none">
                <div class="profile__user__contain">
                    <div class="profile__user__field">
                        <p class="profile__user__label xl">Mật khẩu hiện tại</p>
                        <div class="input mb-3">
                            <input name="password" type="password"
                                class="input__control form-control <?=empty($errors['password']) ? '' : 'is-invalid'?>"
                                aria-invalid="false" value="<?=$password?>">
                            <div class="invalid-feedback mt-3 <?=empty($errors['password']) ? '' : 'input__error'?>">
                                <?=empty($errors['password']) ? "" : $errors['password']?>
                            </div>
                        </div>
                    </div>
                    <div class="profile__user__field">
                        <p class="profile__user__label xl">Mật khẩu mới</p>
                        <div class="input mb-3">
                            <input name="newPassword" type="password"
                                class="input__control form-control <?=empty($errors['newPassword']) ? '' : 'is-invalid'?>"
                                aria-invalid="false" value="<?=$newPassword?>">
                            <div class="invalid-feedback mt-3 <?=empty($errors['newPassword']) ? '' : 'input__error'?>">
                                <?=empty($errors['newPassword']) ? "" : $errors['newPassword']?>
                            </div>
                        </div>
                    </div>
                    <div class="profile__user__field">
                        <p class="profile__user__label xl">Xác nhận mật khẩu</p>
                        <div class="input mb-3">
                            <input name="confirmNewPassword" type="password"
                                class="input__control form-control <?=empty($errors['confirmPassword']) ? '' : 'is-invalid'?>"
                                aria-invalid="false" value="<?=$confirmPassword?>">
                            <div
                                class="invalid-feedback mt-3 <?=empty($errors['confirmPassword']) ? '' : 'input__error'?>">
                                <?=empty($errors['confirmPassword']) ? "" : $errors['confirmPassword']?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="profile__user__action xl btn btn-secondary ">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>

</html>