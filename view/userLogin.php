<?php 
    include('../include/header.php');
    include('../Users.php');

    $user = new User();
    $data = [];
    if(isset($_POST['sub-login'])) {
        $data = $user->login($_POST['txt-num-phone'], $_POST['txt-pass']);
    }


?>
<div class="container col-lg-7 mx-auto">
<h1 style="text-align: center; margin-top: 15px; " >Log in</h1>
<form method="POST" >
  <div class="mb-3">
    <label 
        for="exampleInputEmail1" 
        class="form-label">Number phone</label>
    <input 
        name ="txt-num-phone" 
        type="text" 
        class="form-control"  
        value="<?php echo count($data) > 0 ? $data['num_phone'] : ''; ?>"
        aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input 
        name="txt-pass" 
        type="password" 
        class="form-control"
        value="<?php echo count($data) > 0 ? $data['password'] : ''; ?>" 
        id="exampleInputPassword1"  >
    <label onclick="hideShowPw(this)">show password</label>
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
  <button 
    style = "margin: 20px 350px" 
    type="submit" 
    name="sub-login" 
    class="btn btn-primary">Đăng nhập</button>
</div>
</form>

<script>
    function hideShowPw(e) {
        let pw = document.getElementById('exampleInputPassword1');
        if(pw.getAttribute('type') == 'password') {
            pw.setAttribute('type', 'text');
            e.textContent = "Hide password";
        } else {
            pw.setAttribute('type', 'password');
            e.textContent = "Show password";
        }
    }

</script>


<?php include('../include/footer.php') ?>