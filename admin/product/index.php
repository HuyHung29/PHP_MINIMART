<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../users/login');
}

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$order_by = $sort = "";

// Handle pagination
$limit = 10;
$page = 0;

if (!empty($_GET)) {
    $order_by = getGet('order');
    if (empty($order_by)) {
        $order_by = 'price';
    }
    $sort = getGet('sort');
    if (empty($sort)) {
        $sort = "ASC";
    }
    $page = getGet('page');
    if (empty($page)) {
        $page = 1;
    }
} else {
    $page = 1;
    $order_by = "price";
    $sort = "DESC";
}

$page_first_result = ($page - 1) * $limit;

$quantity = count(executeResult("SELECT * FROM product"));

$number_page = ceil($quantity / $limit);

// Get product
$products = array();
$sql = "SELECT product.id, cate_id, title, country, price, deleted, name FROM product INNER JOIN category ON product.cate_id = category.id WHERE deleted = 0 ORDER BY $order_by $sort LIMIT " . $page_first_result . "," . $limit;
$products = executeResult($sql);

//Get thumbnail
$img = "SELECT * FROM galery";
$list = executeResult($img);
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
    <title>Sản phẩm</title>
</head>
<?php
require_once './../inc/header.php';
?>
<div class="row">
    <div class="col admin__component">
        <div class="container">
            <div class="row">
                <div class="col list-product shadow-sm">
                    <div class="list-product__header">
                        <h2>Tất cả sản phẩm</h2>
                    </div>

                    <div class="list-product__action">
                        <div class="list-product__action__header">
                            <h3><?=count($products)?> / <?=$quantity?> sản phẩm</h3>
                        </div>

                        <div class="filter">
                            <a href="./add/">
                                <button class="shadow-none list-product__action__add btn btn-secondary">
                                    <i class="fas fa-plus"></i>
                                    Thêm 1 sản phẩm mới
                                </button>
                            </a>
                            <div class="filter-task">
                                <i class="fas fa-filter"></i>

                                <ul class="filter-task__list shadow-lg">
                                    <li class="filter-task__item">
                                        <a href="?order=price&sort=DESC"
                                            class="filter-task__link <?=($order_by == 'price' && $sort == 'DESC') ? 'filter-task__link--active' : ''?>">
                                            Giá từ cao đến thấp
                                            <i class="fas fa-sort-amount-down"></i>
                                        </a>
                                    </li>
                                    <li class="filter-task__item">
                                        <a href="?order=price&sort=ASC"
                                            class="filter-task__link <?=($order_by == 'price' && $sort == 'ASC') ? 'filter-task__link--active' : ''?>">
                                            Giá từ thấp đến cao
                                            <i class="fas fa-sort-amount-up"></i>
                                        </a>
                                    </li>
                                    <li class="filter-task__item">
                                        <a href="?order=title&sort=ASC"
                                            class="filter-task__link <?=($order_by == 'name' && $sort == 'ASC') ? 'filter-task__link--active' : ''?>">
                                            Tên từ A - Z
                                            <i class="fas fa-sort-alpha-down"></i>
                                        </a>
                                    </li>
                                    <li class="filter-task__item">
                                        <a href="?order=title&sort=DESC"
                                            class="filter-task__link <?=($order_by == 'name' && $sort == 'DESC') ? 'filter-task__link--active' : ''?>">
                                            Tên từ Z - A
                                            <i class="fas fa-sort-alpha-up"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="list">
                        <div class="list__header">
                            <div class="list__name">
                                <p>Tên sản phẩm</p>
                            </div>
                            <div class="list__pictures">
                                <p>Ảnh minh họa</p>
                            </div>
                            <div class="list__cate">
                                <p>Phân loại hàng</p>
                            </div>
                            <div class="list__price">
                                <p>Giá</p>
                            </div>
                            <div class="list__origin">
                                <p>Xuất sứ</p>
                            </div>
                            <div class="list__action">
                                <p>Hành động</p>
                            </div>
                        </div>
                        <div class="list__body">
                            <?php
if (!empty($products)) {
    foreach ($products as $row) {
        echo '<div class="list__item">
            <div class="list__name list__name--body">
                <p>' . $row['title'] . '</p>
            </div>
            <div class="list__pictures list__pictures--body">';
        foreach ($list as $item) {
            if ($item['product_id'] == $row['id']) {
                echo "<img src='../../assets/thumbnail/" . $item['thumbnail'] . "' alt='anh' class='img' />";
            }
        }
        echo '</div>
            <div class="list__cate list__cate--body">
                <p>' . $row['name'] . '</p>
            </div>
            <div class="list__price list__price--body">
                <p>' . $row['price'] . ' <sup>đ</sup></p>
            </div>
            <div class="list__origin list__origin--body">
                <p>' . $row['country'] . '</p>
            </div>
            <div class="list__action list__action--body">
                <a href="./edit/?id=' . $row['id'] . '">
                    <button class="btn btn-secondary list__action__btn shadow-none">
                        Sửa
                    </button>
                </a>
                <a href="./delete_product_process.php/?id=' . $row['id'] . '"  class="delete">
                    <button class="btn btn-secondary list__action__btn shadow-none">
                        Xóa
                    </button>
                </a>

            </div>
            </div>';
    }
} else {
    echo "<div class='list__body--empty'>
        <img src='./../../assets/list-empty.png' alt='anh' />
        <p>Không tìm thấy sản phẩm</p>
        </div>";
}
?>
                        </div>
                    </div>
                    <nav class="pagination--wrap" aria-label="pagination">
                        <ul class="pagination pagination-lg">
                            <li class="page-item <?=$page == 1 ? 'disabled' : ''?>">
                                <a class="page-link" aria-label="Previous"
                                    href="?order=<?=$order_by?>&sort=<?=$sort?>&page=<?=$page - 1?>">
                                    <span aria-hidden="true" class="pagination-previous"><i
                                            class="fas fa-chevron-left"></i>
                                    </span>
                                </a>
                            </li>
                            <?php
for ($i = 1; $i <= $number_page; $i++) {
    if ($i == $page) {
        echo '<li class="page-item active">
                <a class="page-link" href="?order=' . $order_by . '&sort=' . $sort . '&page=' . $i . '">' . $i . '</a>
            </li>';
    } else {
        echo '<li class="page-item">
                <a class="page-link" href="?order=' . $order_by . '&sort=' . $sort . '&page=' . $i . '">' . $i . '</a>
            </li>';
    }
}
?>
                            <li class="page-item <?=$page == $number_page ? 'disabled' : ''?>">
                                <a class="page-link" aria-label="Next"
                                    href="?order=<?=$order_by?>&sort=<?=$sort?>&page=<?=$page + 1?>">
                                    <span aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
const deletes = document.querySelectorAll(".delete");

deletes.forEach(item => {
    item.addEventListener("click", (e) => {
        if (!confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
            e.preventDefault();
        }
    })
});
</script>
</body>

</html>