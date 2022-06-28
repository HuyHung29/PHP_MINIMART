<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../../users/login');
    die();
}

if (empty($user) || $user['role'] != "admin") {
    header('location: ../../../users/login');
    die();
}

require_once './add_product_process.php';

$sql = "SELECT * FROM category";

$categories = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../../../assets/pic/icon.jpeg" />
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
    <link rel="stylesheet" href="../../../dist/css/style.css" />
    <title>Thêm sản phẩm</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="header--admin">
                <div class="header--admin__side">
                    <a href="./../../../admin/">
                        <img src="https://bizweb.dktcdn.net/100/322/163/themes/853119/assets/logo_footer.png?1646209470651"
                            alt="anh" class="header--admin__logo" />
                    </a>
                    <h1 class="header--admin__heading">Trang quản trị</h1>
                </div>
                <div class="header--admin__side">
                    <div class="header--admin__user">
                        <i class="fas fa-user-circle"></i>
                        <p><?=$user['name']?></p>
                    </div>
                    <div class="header--admin__task">
                        <div class="header--admin__task__list">
                            <i class="fas fa-bars"></i>

                            <div class="header--admin__task__menu">
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/products" class="header--admin__task__menu__icon blue">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                    <p class="header--admin__task__menu__title">
                                        Sản phẩm
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/categories" class="header--admin__task__menu__icon green">
                                        <i class="fas fa-list-ul"></i>
                                    </a>
                                    <p class="header--admin__task__menu__title">
                                        Danh mục
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/purchase" class="header--admin__task__menu__icon orange">
                                        <i class="fas fa-box"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Đơn hàng
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/posts" class="header--admin__task__menu__icon sky">
                                        <i class="fab fa-megaport"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Bài viết
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/admin/info" class="header--admin__task__menu__icon grey">
                                        <i class="fas fa-cog"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Tài khoản
                                    </p>
                                </div>
                                <div class="header--admin__task__menu__item">
                                    <a href="/" class="header--admin__task__menu__icon yellow">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <p class="header--admin__task__menu__title">
                                        Trang chủ
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p class="header--admin__task__notification">
                            <i class="far fa-bell"></i>
                        </p>
                        <p class="header--admin__task__button">Minimart</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row admin__content">
            <div class="admin__has-side mx-0 col">
                <div class="row">
                    <div class="admin__component col">
                        <div class="container">
                            <div class="row">
                                <div class="bg-white shadow-sm p-5 col">
                                    <div class="add-edit__header">
                                        <h1 class="add-edit__heading">
                                            Thêm 1 sản phẩm mới
                                        </h1>
                                        <p class="add-edit__sub-heading">
                                            Vui lòng điền thông tin sản phẩm
                                        </p>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="title" class="input__label form-label">Tiêu
                                                        đề</label><input name="title" type="text"
                                                        class="input__control form-control <?=empty($errors['title']) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false" value="<?=$title?>" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['title']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['title']) ? "" : $errors['title']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="price" class="input__label form-label">Giá sản
                                                        phẩm</label><input name="price" type="text"
                                                        class="input__control form-control <?=empty($errors['price']) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false" value="<?=$price?>" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['price']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['price']) ? "" : $errors['price']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="discount" class="input__label form-label">Giảm
                                                        giá</label><input name="discount" type="text"
                                                        class="input__control form-control <?=empty($errors['discount']) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false" value="<?=$discount?>" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['discount']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['discount']) ? "" : $errors['discount']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="country" class="input__label form-label">Xuất
                                                        xứ</label><input name="country" type="text"
                                                        class="input__control form-control <?=empty($errors['country']) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false" value="<?=$country?>" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['country']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['country']) ? "" : $errors['country']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="unit" class="input__label form-label">Đơn vị
                                                        tính</label>
                                                    <select
                                                        class="form-select input__control form-control <?=empty($errors['unit']) ? '' : 'is-invalid'?>"
                                                        aria-label="Default select example" name="unit">
                                                        <option <?=empty($unit) ? 'selected' : ''?> value=""></option>
                                                        <option value="kg" <?=$unit == "kg" ? 'selected' : ''?>>
                                                            Kg
                                                        </option>
                                                        <option value="gam" <?=$unit == "gam" ? 'selected' : ''?>>
                                                            Gam
                                                        </option>
                                                    </select>
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['unit']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['unit']) ? "" : $errors['unit']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="unit" class="input__label form-label">Phân loại</label>
                                                    <select
                                                        class="form-select input__control form-control <?=empty($errors['category']) ? '' : 'is-invalid'?>"
                                                        aria-label="Default select example" name="category">
                                                        <option <?=empty($cate_id) ? 'selected' : ''?> value="">
                                                        </option>
                                                        <?php
foreach ($categories as $row) {
    if ($row['id'] == $cate_id) {
        echo ' <option selected value="' . $row['id'] . '">
        ' . $row['name'] . '
    </option>';
    } else {
        echo ' <option value="' . $row['id'] . '">
                ' . $row['name'] . '
            </option>';
    }
}
?>
                                                    </select>
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['category']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['category']) ? "" : $errors['category']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label class="input__label form-label">Ảnh minh họa</label>
                                                    <input name="thumbnails[]" type="file" multiple
                                                        class="form-control input__control <?=empty($errors['thumbnail']) ? '' : 'is-invalid'?>"
                                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                                        accept="image/*" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['thumbnail']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['thumbnail']) ? "" : $errors['thumbnail']?>
                                                    </div>
                                                    <div class="preview">
                                                        <ul class="preview__list">
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input mb-3">
                                                    <label for="country" class="input__label form-label">Số
                                                        lượng</label><input name="quantity" type="text"
                                                        class="input__control form-control <?=empty($errors['quantity']) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false" value="<?=$quantity?>" />
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['quantity']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['quantity']) ? "" : $errors['quantity']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input mb-3">
                                                    <label for="discount" class="input__label form-label">Mô
                                                        tả</label>
                                                    <textarea id="editor" name="description"
                                                        class="input__control form-control <?=empty($errors['description']) ? '' : 'is-invalid'?>"
                                                        aria-invalid="false"
                                                        rows="10"><?=$description = str_replace('&', '&amp;', $description)?></textarea>
                                                    <div
                                                        class="invalid-feedback mt-3 <?=empty($errors['description']) ? '' : 'input__error'?>">
                                                        <?=empty($errors['description']) ? "" : $errors['description']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center col-md-12">
                                                <button type="submit"
                                                    class="form__btn form__btn--success btn btn-secondary">
                                                    Tạo mới</button>
                                                <button type="reset"
                                                    class="form__btn form__btn--danger btn btn-secondary exit-btn">
                                                    Hủy
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <script>
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            console.log(editor);
        })
        .catch((error) => {
            console.error(error);
        });

    const thumbnails = document.querySelector('input[name="thumbnails[]"]');
    const previewList = document.querySelector(".preview__list");
    let files = [];

    thumbnails.addEventListener("change", (e) => {
        files = e.target.files;
        previewList.innerHTML = "";
        [...files].forEach((file) => {
            const li = document.createElement("li");
            const img = document.createElement("img");
            img.setAttribute("class", "preview__img");
            img.setAttribute("src", URL.createObjectURL(file));
            li.appendChild(img);
            previewList.appendChild(li);
        });
    });

    document.querySelector('.exit-btn')?.addEventListener("click", () => {
        history.back();
    })
    </script>
</body>

</html>