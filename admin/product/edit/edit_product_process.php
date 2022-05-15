<?php
// Database
require_once '../../../database/dbhelper.php';
require_once '../../../ultils/ultility.php';

$errors = array();
$cate_id = $title = $price = $unit = $country = $discount = $description = "";
$date = date('Y-m-d H:i:s');

$product_id = "";
if (!empty($_GET)) {
    $product_id = getGet('id');
}

$get = "SELECT product.id, cate_id, title, unit,discount, description, country, price, deleted, name FROM product INNER JOIN category ON product.cate_id = category.id";

$product = executeResult($get, true);

if (!empty($product)) {
    $cate_id = $product['cate_id'];
    $title = $product['title'];
    $price = $product['price'];
    $unit = $product['unit'];
    $country = $product['country'];
    $discount = $product['discount'];
    $description = $product['description'];
}

if (!empty($_POST)) {

    $cate_id = getPost('category');
    $title = getPost('title');
    $price = getPost('price');
    $unit = getPost('unit');
    $country = getPost('country');
    $discount = getPost('discount');
    $description = getPost('description');

    if (empty($cate_id)) {
        $errors['category'] = "Vui lòng nhập trường này!";
    }

    if (empty($title)) {
        $errors['title'] = "Vui lòng nhập trường này!";
    }

    if (empty($price)) {
        $errors['price'] = "Vui lòng nhập trường này!";
    } elseif (!preg_match('/^[0-9]+$/', $price) || (float) $price < 0) {
        $errors['price'] = "Giá phải là số và lớn hơn 0";
    }

    if (empty($unit)) {
        $errors['unit'] = "Vui lòng nhập trường này!";
    }

    if (empty($country)) {
        $errors['country'] = "Vui lòng nhập trường này!";
    }

    if (empty($discount)) {
        $errors['discount'] = "Vui lòng nhập trường này!";
    } elseif (!preg_match('/^[0-9]+$/', $discount) || (int) $discount < 0) {
        $errors['discount'] = "Giảm giá phải là số và lớn hơn 0";
    }

    if (empty($description)) {
        $errors['description'] = "Vui lòng nhập trường này!";
    }

    if (empty(array_filter($_FILES['thumbnails']['name']))) {
        $errors['thumbnail'] = "Vui lòng chọn ảnh";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO product (cate_id, title, price, unit, country, discount, description, created_At,
        updated_At) VALUES ('$cate_id', '$title', '$price', '$unit', '$country', '$discount', '$description', '$date', '$date')";

        $sql = "UPDATE product
                SET cate_id = '$cate_id',
                    title = '$title',
                    price = '$price',
                    unit = '$unit',
                    country = '$country',
                    discount = '$discount',
                    description = '$description',
                    updated_At = '$date'
                WHERE id = $product_id";

        $response = execute($sql);

        if ($response) {
            $delete = "DELETE FROM galery WHERE product_id = $product_id";

            $isDeleted = execute($delete);

            if ($isDeleted) {
                $uploadsDir = "../../../assets/thumbnail/";
                $allowedFileType = array('jpg', 'png', 'jpeg');

                // Validate if files exist
                if (!empty(array_filter($_FILES['thumbnails']['name']))) {

                    // Loop through file items
                    foreach ($_FILES['thumbnails']['name'] as $id => $val) {
                        // Get files upload path
                        $fileName = $_FILES['thumbnails']['name'][$id];
                        $tempLocation = $_FILES['thumbnails']['tmp_name'][$id];
                        $targetFilePath = $uploadsDir . $fileName;
                        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                        $uploadDate = date('Y-m-d H:i:s');
                        $uploadOk = 1;
                        if (in_array($fileType, $allowedFileType)) {
                            if (move_uploaded_file($tempLocation, $targetFilePath)) {
                                $sqlVal = "('$product_id', '" . $fileName . "', '" . $uploadDate . "')";
                            } else {
                                $errors['thumbnail'] = "Không tải được file";
                            }

                        } else {
                            $errors['thumbnail'] = "Chỉ nhận file ảnh có đuôi .jpg, .jpeg và .png";
                        }
                        // Add into MySQL database
                        if (!empty($sqlVal)) {
                            $insert = "INSERT INTO galery (product_id,thumbnail, created_At) VALUES $sqlVal";

                            $check = execute($insert);

                            if (!$check) {
                                echo "<script>alert('Có lỗi với hệ thống vui lòng thử lại sau')</script>";
                            }
                        }
                    }
                } else {
                    $errors['thumbnail'] = "Vui lòng chọn ảnh";
                }
            }
        }

        if (!empty($errors['thumbnail'])) {
            $delete = "DELETE FROM product WHERE id = $product_Id";
            execute($delete);
        } else {
            header('location: ../index.php');
            die();
        }
    }
}