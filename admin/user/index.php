<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../users/login');
}

require_once "./change_user_info_process.php";
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
                <h2 class="profile__heading">Hồ sơ của tôi</h2>
                <p class="profile__sub-heading">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </div>
            <form id="profile-form" class="profile__user" method="POST">
                <input type="text" class="d-none" value="<?=$user['id']?>" name="id">
                <div class="profile__user__field">
                    <p class="profile__user__label">Tên</p>
                    <div class="input mb-3">
                        <input name="name" placeholder="Tên" type="text"
                            class="input__control form-control <?=empty($errors['name']) ? '' : 'is-invalid'?>"
                            aria-invalid="false" value="<?=$user['name']?>">
                        <div class="invalid-feedback mt-3 <?=empty($errors['name']) ? '' : 'input__error'?>">
                            <?=empty($errors['name']) ? "" : $errors['name']?>
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                    <p class="profile__user__label">Số điện thoại</p>
                    <div class="input mb-3">
                        <input name="phone" placeholder="Số điện thoại" type="text"
                            class="input__control form-control <?=empty($errors['phone']) ? '' : 'is-invalid'?>"
                            aria-invalid="false" value="<?=$user['phone']?>">
                        <div class="invalid-feedback mt-3 <?=empty($errors['phone']) ? '' : 'input__error'?>">
                            <?=empty($errors['phone']) ? "" : $errors['phone']?>
                        </div>
                    </div>
                </div>
                <div class="profile__user__field">
                    <p class="profile__user__label">Email</p>
                    <div class="input mb-3">
                        <input name="email" placeholder="Email" type="text"
                            class="input__control form-control <?=empty($errors['email']) ? '' : 'is-invalid'?>"
                            aria-invalid="false" value="<?=$user['email']?>">
                        <div class="invalid-feedback mt-3 <?=empty($errors['email']) ? '' : 'input__error'?>">
                            <?=empty($errors['email']) ? "" : $errors['email']?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="profile__user__action btn btn-secondary">Lưu</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>

</html>