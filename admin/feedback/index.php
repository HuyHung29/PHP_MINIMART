<?php

session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../users/login');
}

require_once '../../database/dbhelper.php';
$sql = "SELECT * FROM feedback";

$feedbacks = executeResult($sql);
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
    <title>Danh mục</title>
</head>
<?php
require_once './../inc/header.php';
?>
<div class="row">
    <div class="col admin__component">
        <div class="container">
            <div class="row">
                <div class="col category-list shadow-sm">
                    <div class="category-list__content">
                        <div class="category-list__content__header">
                            <h2>Phản hồi của khách hàng</h2>
                            <p>Thông tin các phản hồi của khách hàng</p>
                        </div>

                        <div class="category-list__content__body">
                            <div class="category-list__content__body__header">
                                <h3>
                                    <?=count($feedbacks)?> phản hồi
                                </h3>
                            </div>

                            <div class="category-list__content__body__list">
                                <div class="category-list__content__body__list__header">
                                    <div class="category-list__content__body__list__item__index">
                                        <p>Số thứ tự</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__id">
                                        <p>Họ tên khách hàng</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__name">
                                        <p>Email</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__create">
                                        <p>Số điện thoại</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__update"
                                        style="flex: 0 0 35%; max-width: 35%;">
                                        <p>Nội dung</p>
                                    </div>
                                </div>
                                <?php
$index = 1;
foreach ($feedbacks as $row) {
    echo '<div class="category-list__content__body__list__item">
                                <div class="category-list__content__body__list__item__index">
                                    <p>' . $index++ . '</p>
                                </div>
                                <div class="category-list__content__body__list__item__id">
                                    <p>' . $row['name'] . '</p>
                                </div>
                                <div class="category-list__content__body__list__item__name">
                                    <p>' . $row['email'] . '</p>
                                </div>
                                <div class="category-list__content__body__list__item__create">
                                    <p>
                                        ' . $row['phone'] . '
                                    </p>
                                </div>
                                <div class="category-list__content__body__list__item__update" style="flex: 0 0 35%; max-width: 35%; text-align: left;">
                                    <p>
                                        ' . $row['feedback'] . '
                                    </p>
                                </div>
            </div>';
}
?>
                            </div>
                        </div>
                    </div>
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