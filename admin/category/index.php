<?php

session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../users/login');
    die();
}

if (empty($user) || $user['role'] != "admin") {
    header('location: ../../users/login');
    die();
}

require_once '../../database/dbhelper.php';
$sql = "SELECT * FROM category";

$categories = executeResult($sql);
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
                            <h2>Danh mục các sản phẩm</h2>
                            <p>Thông tin các danh mục của bạn</p>
                        </div>

                        <div class="category-list__content__body">
                            <div class="category-list__content__body__header">
                                <h3>
                                    <?=count($categories) - 1?> danh mục
                                </h3>
                                <a href="./add/">
                                    <button class="category-list__content__body__header__add btn btn-secondary">
                                        <i class="fas fa-plus"></i> Thêm 1 danh
                                        mục
                                    </button>
                                </a>
                            </div>

                            <div class="category-list__content__body__list">
                                <div class="category-list__content__body__list__header">
                                    <div class="category-list__content__body__list__item__index">
                                        <p>Số thứ tự</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__id">
                                        <p>Mã danh mục</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__name">
                                        <p>Tên danh mục</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__create">
                                        <p>Ngày tạo</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__update">
                                        <p>Ngày cập nhật</p>
                                    </div>
                                    <div class="category-list__content__body__list__item__action">
                                        <p>Hành động</p>
                                    </div>
                                </div>
                                <?php
$index = 1;
foreach ($categories as $row) {
    if ($row['id'] == 1) {
        continue;
    }

    $created_date = date_create($row['created_At']);
    $updated_date = date_create($row['updated_At']);
    echo '<div class="category-list__content__body__list__item">
                                <div class="category-list__content__body__list__item__index">
                                    <p>' . $index++ . '</p>
                                </div>
                                <div class="category-list__content__body__list__item__id">
                                    <p>' . $row['id'] . '</p>
                                </div>
                                <div class="category-list__content__body__list__item__name">
                                    <p>' . $row['name'] . '</p>
                                </div>
                                <div class="category-list__content__body__list__item__create">
                                    <p>
                                        ' . date_format($created_date, 'd/m/Y') . '
                                    </p>
                                </div>
                                <div class="category-list__content__body__list__item__update">
                                    <p>
                                        ' . date_format($updated_date, 'd/m/Y') . '
                                    </p>
                                </div>
                                <div class="category-list__content__body__list__item__action">
                                    <a href="./edit?id=' . $row['id'] . '">
                                        <button class="btn btn-secondary list__action__btn shadow-none">
                                            Sửa
                                        </button>
                                        </a>
                                    <a href="./delete_category_process.php?id=' . $row['id'] . '">
                                        <button class="btn btn-secondary list__action__btn shadow-none delete_btn">
                                            Xóa
                                        </button>
                                        </a>
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

<script>
const delete_btns = document.querySelectorAll('.delete_btn');

delete_btns.forEach(del_btn => {
    del_btn.addEventListener("click", (e) => {
        if (!confirm("Bạn có chắc chắc muốn xóa danh mục này không?")) {
            e.preventDefault();
        }
    })
})
</script>
</body>

</html>