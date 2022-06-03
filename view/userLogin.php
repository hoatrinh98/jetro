<?php 
    include('../include/header.php');
    include('../Users.php');



?>
<div class="container col-lg-7 mx-auto">
<h1 >Đăng nhập</h1>
<form method="POST" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name ="txt-email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="txt-pass" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="flex-sb-m w-full p-b-30">

                <div>
                    <a href="forgotPassword.php" class="txt1">
                        Quên mật khẩu
                    </a>
					<a style = "margin-left: 650px" href="register.php" class="txt1">
                        Đăng ký
                    </a>
                </div>
            </div>
  <button style = "margin: 20px 350px" type="submit" name="sub-login" class="btn btn-primary">Đăng nhập</button>
</div>
</form>
<?php include('../include/footer.php') ?>