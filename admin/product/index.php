<?php
require_once '../../database/dbhelper.php';
$sql = 'SELECT product.id, cate_id, title, price, deleted, name FROM product INNER JOIN category ON product.cate_id = category.id';

$result = executeResult($sql);
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
                            <h3>{total} sản phẩm</h3>
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
                                        <a href="" class="filter-task__link">
                                            Giá từ cao đến thấp
                                            <i class="fas fa-sort-amount-down"></i>
                                        </a>
                                    </li>
                                    <li class="filter-task__item">
                                        <a href="" class="filter-task__link">
                                            Giá từ thấp đến cao
                                            <i class="fas fa-sort-amount-up"></i>
                                        </a>
                                    </li>
                                    <li class="filter-task__item">
                                        <a href="" class="filter-task__link">
                                            Tên từ A - Z
                                            <i class="fas fa-sort-alpha-down"></i>
                                        </a>
                                    </li>
                                    <li class="filter-task__item">
                                        <a href="" class="filter-task__link">
                                            Tên từ Z - S
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
if (!empty($result)) {
    foreach ($result as $row) {
        if ((int) $row['deleted'] == 0) {
            echo '<div class="list__item">
                <div class="list__name list__name--body">
                    <p>' . $row['title'] . '</p>
                </div>
                <div class="list__pictures list__pictures--body">';
            $img = "SELECT * FROM galery WHERE product_id = " . $row['id'];
            $list = executeResult($img);
            foreach ($list as $row1) {
                echo "<img src='" . $row1['thumnail'] . "' alt='anh' class='img' />";
            }
            echo '</div>
                <div class="list__cate list__cate--body">
                    <p>' . $row['name'] . '</p>
                </div>
                <div class="list__price list__price--body">
                    <p>' . $row['price'] . ' <sup>đ</sup></p>
                </div>
                <div class="list__origin list__origin--body">
                    <p>country</p>
                </div>
                <div class="list__action list__action--body">
                    <a href="">
                        <button class="btn btn-secondary list__action__btn shadow-none">
                            Sửa
                        </button>
                    </a>
                    <button class="btn btn-secondary list__action__btn shadow-none">
                        Xóa
                    </button>
                </div>
                </div>';
        }
    }
} else {
    echo "<div class='list__body--empty'>
        <img src='./../../assets/list-empty.png' alt='anh' />
        <p>Không tìm thấy sản phẩm</p>
        </div>";
}
?>
                            <!-- <div class="list__item">
                                <div class="list__name list__name--body">
                                    <p>{product.title}</p>
                                </div>
                                <div class="list__pictures list__pictures--body">
                                    {product.pictures.map((img, i) => (
                                        <img src={img} key={i} alt='anh' class='img' />
                                    ))}
                                </div>
                                <div class="list__cate list__cate--body">
                                    <p>category</p>
                                </div>
                                <div class="list__price list__price--body">
                                    <p>price <sup>đ</sup></p>
                                </div>
                                <div class="list__origin list__origin--body">
                                    <p>country</p>
                                </div>
                                <div class="list__action list__action--body">
                                    <a href="">
                                        <button class="btn btn-secondary list__action__btn shadow-none">
                                            Sửa
                                        </button>
                                    </a>
                                    <button class="btn btn-secondary list__action__btn shadow-none">
                                        Xóa
                                    </button>
                                </div>
                            </div> -->
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