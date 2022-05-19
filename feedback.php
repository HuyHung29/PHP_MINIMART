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

require_once './admin/feedback/add_feedback_process.php';

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
    <title>Phản hồi</title>
</head>
<?php
include "./header.php";
?>
<div class="container my-5">
    <div class="row">
        <div class="bg-white shadow-sm p-5 col">
            <div class="add-edit__header">
                <h1 class="add-edit__heading">
                    Liên hệ với chúng tôi
                </h1>
                <p class="add-edit__sub-heading">
                    Vui lòng điền thông tin phản hồi
                </p>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="id" class="d-none" value="<?=$user['id']?>">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input mb-3">
                                    <input name="name" type="text" placeholder="Họ và tên"
                                        class="input__control form-control <?=empty($errors['name']) ? '' : 'is-invalid'?>"
                                        aria-invalid="false" value="<?=$name?>" />
                                    <div
                                        class="invalid-feedback mt-3 <?=empty($errors['name']) ? '' : 'input__error'?>">
                                        <?=empty($errors['name']) ? "" : $errors['name']?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input mb-3">
                                    <input name="email" type="text" placeholder="Email"
                                        class="input__control form-control <?=empty($errors['email']) ? '' : 'is-invalid'?>"
                                        aria-invalid="false" value="<?=$email?>" />
                                    <div
                                        class="invalid-feedback mt-3 <?=empty($errors['email']) ? '' : 'input__error'?>">
                                        <?=empty($errors['email']) ? "" : $errors['email']?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input mb-3">
                                    <input name="phone" type="text" placeholder="Số điện thoại"
                                        class="input__control form-control <?=empty($errors['phone']) ? '' : 'is-invalid'?>"
                                        aria-invalid="false" value="<?=$phone?>" />
                                    <div
                                        class="invalid-feedback mt-3 <?=empty($errors['phone']) ? '' : 'input__error'?>">
                                        <?=empty($errors['phone']) ? "" : $errors['phone']?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input mb-3">
                                    <textarea name="feedback" placeholder="Nội dung phản hồi"
                                        class="input__control form-control <?=empty($errors['feedback']) ? '' : 'is-invalid'?>"
                                        rows="10"><?=$feedback?></textarea>
                                    <div
                                        class="invalid-feedback mt-3 <?=empty($errors['feedback']) ? '' : 'input__error'?>">
                                        <?=empty($errors['feedback']) ? "" : $errors['feedback']?>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center col-md-12">
                                <button type="submit" class="form__btn form__btn--success btn btn-secondary">
                                    Gửi</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="map" style="padding:0 20px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.473663078438!2d105.73291811455383!3d21.05373599230189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1652628260636!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

include "./footer.php";
?>