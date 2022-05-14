<?php
include "./signup_process.php";

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
		<link rel="stylesheet" href="../../dist/css/style.css" />
		<title>Đăng ký</title>
	</head>
	<body>
		<div class="authen">
			<div class="authen__header">
				<div class="container">
					<div
						class="d-flex align-items-center justify-content-between"
					>
						<div class="d-flex align-items-center">
							<a href="../../../MiniMart/">
								<img
									src="../../assets/pic/logo_footer.png"
									alt="logo"
								/>
							</a>
							<h1 class="authen__header__title">Đăng ký</h1>
						</div>
						<p class="authen__header__text">
							Đăng ký tài khoản mới !
						</p>
					</div>
				</div>
			</div>

			<div class="authen__content">
				<div class="container">
					<form method="POST" class="authen__form">
						<h2 class="authen__form__title">Đăng ký</h2>
						<div class="mb-4">
							<label for="name" class="form-label"
								>Họ và tên</label
							>
							<input
								type="text"
								class="form-control <?=empty($error['name']) ? "" : 'is-invalid'?>"
								id="name"
								aria-describedby="emailHelp"
								name="name"
								value="<?=$name?>"
							/>
							<div class="invalid-feedback mt-3">
								<?=empty($error['name']) ? "" : $error['name']?>
							</div>
						</div>
						<div class="mb-4">
							<label for="phone" class="form-label"
								>Số điện thoại</label
							>
							<input
								type="text"
								class="form-control <?=empty($error['phone']) ? "" : 'is-invalid'?>"
								id="phone"
								name="phone"
								value="<?=$phone?>"
							/>
							<div class="invalid-feedback mt-3">
								<?=empty($error['phone']) ? "" : $error['phone']?>
							</div>
						</div>
						<div class="mb-4">
							<label for="email" class="form-label">Email</label>
							<input
								type="text"
								class="form-control <?=empty($error['email']) ? "" : 'is-invalid'?>"
								id="email"
								aria-describedby="emailHelp"
								name="email"
								value="<?=$email?>"
							/>
							<div class="invalid-feedback mt-3">
								<?=empty($error['email']) ? "" : $error['email']?>
							</div>
						</div>
						<div class="mb-4 authen__password <?=empty($error['password']) ? "" : 'is-invalid'?>">
							<label for="password" class="form-label"
								>Mật khẩu</label
							>
							<input
								type="password"
								class="form-control <?=empty($error['password']) ? "" : 'is-invalid'?>"
								id="password"
								name="password"
								value="<?=$password?>"
							/>
							<div class="invalid-feedback mt-3">
								<?=empty($error['password']) ? "" : $error['password']?>
							</div>
							<i class="fa-solid fa-eye-slash eye--close"></i>
							<i class="fa-solid fa-eye eye--open"></i>
						</div>
						<div
							class="mb-4 authen__password authen__password--confirm <?=empty($error['confirmPassword']) ? "" : 'is-invalid'?>"
						>
							<label for="confirm-password" class="form-label"
								>Xác minh mật khẩu</label
							>
							<input
								type="password"
								class="form-control <?=empty($error['confirmPassword']) ? "" : 'is-invalid'?>"
								id="confirm-password"
								name="confirm-password"
								value="<?=$confirmPassword?>"
							/>
							<div class="invalid-feedback mt-3">
								<?=empty($error['confirmPassword']) ? "" : $error['confirmPassword']?>
							</div>
							<i
								class="fa-solid fa-eye-slash eye--close eye--close--confirm"
							></i>
							<i
								class="fa-solid fa-eye eye--open eye--open--confirm"
							></i>
						</div>
						<div class="my-4">
							<button type="submit" class="btn authen__btn">
								đăng ký
							</button>
						</div>

						<p class="authen__text">
							Bạn đã có tài khoản?
							<a href="../login/" class="authen__link"
								>Đăng nhập</a
							>
						</p>
					</form>
				</div>
			</div>
		</div>

		<script>
			const password = document.querySelector(".authen__password");
			const passwordConfirm = document.querySelector(
				".authen__password--confirm"
			);
			const eyeClose = document.querySelector(".eye--close");
			const eyeOpen = document.querySelector(".eye--open");
			const eyeCloseCon = document.querySelector(".eye--close--confirm");
			const eyeOpenCon = document.querySelector(".eye--open--confirm");
			const passwordInput = document.getElementById("password");

			const passwordInputConfirm =
				document.getElementById("confirm-password");

			eyeClose.addEventListener("click", () => {
				password.classList.add("active");
				passwordInput.setAttribute("type", "text");
			});

			eyeOpen.addEventListener("click", () => {
				password.classList.remove("active");
				passwordInput.setAttribute("type", "password");
			});

			eyeCloseCon.addEventListener("click", () => {
				passwordConfirm.classList.add("active");
				passwordInputConfirm.setAttribute("type", "text");
			});

			eyeOpenCon.addEventListener("click", () => {
				passwordConfirm.classList.remove("active");
				passwordInputConfirm.setAttribute("type", "password");
			});
		</script>
	</body>
</html>
