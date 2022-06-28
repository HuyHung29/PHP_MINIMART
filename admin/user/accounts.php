<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ../../users/login');
}

if (empty($user) || $user['role'] != "admin") {
    header('location: ../../users/login');
}

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$getUsers = "SELECT * FROM user WHERE role != 'admin'";

$users = executeResult($getUsers);

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
                <h2 class="profile__heading">Quản lý tài khoản người dùng</h2>
                <p class="profile__sub-heading">Xem thông tin và quản lý tài khoản người dùng của bạn</p>
            </div>
            <div class="account-product__action">
                <div class="account-product__action__header">
                    <h3><?=count($users)?> người dùng</h3>
                </div>


            </div>

            <div class="account">
                <div class="account__header">
                    <div class="account__name">
                        <p>Tên người dùng</p>
                    </div>
                    <div class="account__email">
                        <p>Email</p>
                    </div>
                    <div class="account__phone">
                        <p>Số điện thoại</p>
                    </div>
                    <div class="account__order">
                        <p>Đơn hàng đã mua</p>
                    </div>
                    <div class="account__feedback">
                        <p>Số lượng phản hồi</p>
                    </div>
                    <div class="account__status">
                        <p>Trạng thái</p>
                    </div>
                    <div class="account__action">
                        <p>Hành động</p>
                    </div>
                </div>
                <div class="account__body">
                    <?php
foreach ($users as $row) {?>
                    <div class="account__item">
                        <div class="account__name">
                            <p><?=$row['name']?></p>
                        </div>
                        <div class="account__email">
                            <p><?=$row['email']?></p>
                        </div>
                        <div class="account__phone">
                            <p><?=$row['phone']?></p>
                        </div>
                        <div class="account__order">
                            <a href="../order/index.php?id=<?=$row['id']?>"><?php
$sql = "SELECT * FROM orders WHERE user_id =" . $row['id'];
    echo count(executeResult($sql));
    ?> đơn hàng</a>
                        </div>
                        <div class="account__feedback">
                            <a href="../feedback/index.php?id=<?=$row['id']?>"><?php
$sql = "SELECT * FROM feedback WHERE user_id =" . $row['id'];
    echo count(executeResult($sql));
    ?> phản hồi</a>
                        </div>
                        <div class="account__status">
                            <p><?=$row['disable'] == 0 ? "Hoạt động" : "Bị khóa"?></p>
                        </div>
                        <div class="account__action account__action--body">
                            <a href="<?=$row['disable'] == 0 ? "./delete_account_process.php?id=" . $row['id'] . "&status=1" : "./delete_account_process.php?id=" . $row['id'] . "&status=0"?>"
                                class="<?=$row['disable'] == 0 ? "delete" : "active"?>">
                                <button
                                    class="btn btn-secondary <?=$row['disable'] == 0 ? "account__action__btn" : "account__action__btn--enable "?> shadow-none">
                                    <?=$row['disable'] == 0 ? "Khóa tài khoản" : "Kích hoạt"?>
                                </button>
                            </a>
                        </div>
                    </div>
                    <?php
}?>
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
const delete_btns = document.querySelectorAll(".delete");
const active_btns = document.querySelectorAll(".active");

delete_btns.forEach(btn => {
    btn.addEventListener("click", (e) => {
        if (!confirm("Bạn có muốn khóa tài khoản này?")) {
            e.preventDefault();
        }
    })
})

active_btns.forEach(btn => {
    btn.addEventListener("click", (e) => {
        if (!confirm("Bạn có muốn kích hoạt tài khoản này?")) {
            e.preventDefault();
        }
    })
})
</script>
</body>

</html>