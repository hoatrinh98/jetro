<!DOCTYPE HTML>
<html>
<?php session_start() ?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/header-footer.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>JETRO</title>
</head>

<body>
	<!-- header -->
	<header>
		<nav>
			<ul>
				<li class="logo"><a href="page1.php">
						<h1>JET<span>RO</span></h1>
					</a></li>
				<li><a href="index.php">HOME</a></li>
				<!-- <li><a href="about.php">ABOUT US</a></li> -->
				<!-- <li><a href="blog.php">BLOG</a></li> -->
				<li><a href="portfolio.php">News</a></li>
				<li><a href="postList.php">Write</a></li>

			<?php if(isset($_SESSION['role'])): ?>

					<li>
						<div class="text-end">
							<div class="dropdown text-end">
								<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="<?php echo '../img/avatar/' . $_SESSION['avatar'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
								</a>
								<ul style="height: unset;" class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
									<li><a style="font-family: unset" class="dropdown-item" href="/edit/hoang-duc-1.html"><?php echo $_SESSION['username'] ?></a></li>
									<?php if($_SESSION['role'] == 2):?>
										<li><a style="font-family: unset" class="dropdown-item text-danger" href="./userList.php">Quản trị viên</a></li>
									<?php endif; ?>
									<li><a style="font-family: unset" class="dropdown-item" href="/edit/hoang-duc-1.html">Thông tin cá nhân</a></li>
									<li><a style="font-family: unset" class="dropdown-item" href="../userUpdate.php">Thiết lập</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a style="font-family: unset" class="dropdown-item" href="./userLogout.php">Đăng xuất</a></li>
								</ul>
							</div>
						</div>
					</li>
				<?php else: ?>
			 		<a href="./userLogin.php"><button style="margin: 0px 10px" type="button" class="btn btn-outline-secondary me-2">Đăng Nhập</button></a>
                    <a href="./userRegister.php"><button type="button" class="btn btn-secondary"> Đăng Ký</button></a>;
				<?php endif; ?>
				<!-- <li>
					<a href="../users/register.php">
						<button type="button" class="btn btn-secondary">Logout</button>
					</a>
				</li> -->
				<!-- <li>
					<a href="../users/login.php">
						<button type="button" class="btn btn-outline-secondary me-2">Log In</button>
					</a>
				</li>
				<li>
					<a href="../users/register.php">
						<button type="button" class="btn btn-secondary">Sign Up</button>
					</a>
				</li> -->
			</ul>
			<!-- <div class="col-md-3 text-end">
                <a href="../users/login.php"><button type="button" class="btn btn-outline-secondary me-2">Log In</button></a>
                <a href="../users/register.php"><button type="button" class="btn btn-secondary">Sign Up</button></a>            
		</div> -->
		</nav>

		<div class="header-bottom"></div>
	</header>