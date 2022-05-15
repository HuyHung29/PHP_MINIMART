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

$home = true;
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
    <title>MiniMart</title>
</head>
<?php
include "./header.php";
include "./navbar.php";
?>
<div class="top-slider"><img src="./assets/pic/slider_1.jpeg" alt="slider"></div>
<div class="home container">
    <div class="home__banner row">
        <div class="col">
            <div class="home__banner__item"><img src="./assets/pic/banner_1.jpg" alt="banner" class="home__banner__img">
            </div>
        </div>
        <div class="col">
            <div class="home__banner__item"><img src="./assets/pic/banner_2.jpg" alt="banner" class="home__banner__img">
            </div>
        </div>
        <div class="col">
            <div class="home__banner__item"><img src="./assets/pic/banner_3.jpg" alt="banner" class="home__banner__img">
            </div>
        </div>
        <div class="home__slider col-md-12">
            <div class="home__link--wrap"><a class="home__link" href="/products">Sản phẩm bán chạy</a></div>
        </div>
    </div>
</div>

<?php
include "./footer.php"
?>