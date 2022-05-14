<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="icon"
			type="image/png"
			href="../../../MiniMart/assets/pic/icon.jpeg"
		/>
		<!-- CSS only -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
			crossorigin="anonymous"
		/>
		<!-- JavaScript Bundle with Popper -->
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"
		></script>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link rel="stylesheet" href="../../../MiniMart/dist/css/style.css" />
		<title>MiniMart</title>
	</head>
	<body>
		<div class="header" id="header">
			<div class="container">
				<div class="row py-4">
					<div class="col">
						<div
							class="header__top d-flex justify-content-start align-items-center"
						>
							<p class="header__top__item">Trang quản trị</p>
							<p class="header__top__item">
								Kết nối
								<span
									><i class="fa-brands fa-facebook"></i
								></span>
								<span
									><i class="fa-brands fa-instagram"></i
								></span>
							</p>
						</div>
					</div>
					<div class="col">
						<div
							class="header__top d-flex justify-content-end align-items-center"
						>
<?php
if (!empty($user)) {
    echo "<a
			href='../../../MiniMart/logout.php'
			class='header__top__item'
			> Đăng xuất
		</a>";
    echo "<a
			href='../../../MiniMart/users/login/'
			class='header__top__item'>" .
        $user['name'] .
        "</a>";
} else {
    echo "<a
			href='../../../MiniMart/users/signup/'
			class='header__top__item'
			>Đăng ký
		</a>";
    echo "<a
			href='../../../MiniMart/users/login/'
			class='header__top__item'
			>Đăng nhập
		</a>";
}
?>
						</div>
					</div>
				</div>
				<div class="row pt-2 pb-4">
					<div class="col-3">
						<img
							src="../../../MiniMart/assets/pic/logo.png"
							alt="logo"
						/>
					</div>
					<div class="col d-flex align-items-center">
						<form method="post" class="header__search">
							<input
								type="text"
								name="search"
								class="header__search__input"
								autocomplete="off"
							/>
							<button class="btn header__search__btn">
								<i class="fa-solid fa-magnifying-glass"></i>
							</button>
						</form>
					</div>
					<div
						class="col-2 d-flex align-items-center justify-content-center"
					>
						<div class="header__cart">
							<a href="#">
								<i class="fa-solid fa-cart-shopping"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
