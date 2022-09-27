<!DOCTYPE html>
<html lang="en">

<?php 

include_once'layout/head.php'?>
<body>
<section class="register">
<div class="container">
            <div class="row justify-content-center">
                 <div class="col-md-6 text-center mb-5">
                    <img src="https://raw.githubusercontent.com/nabeel731/suzbibitassests/main/images/logo.jpg"style="width:300px;height:90px;">
                </div>
            </div>
<div class="row justify-content-center">
<div class="col-lg-5 col-md-12 col-xs-12">
<div class="register-form login-area">
<h3>
Reset Password
</h3>
<form class="login-form" action="reset-password?email=<?=$_GET['email']?>&token=<?=$_GET['token']?>" method="POST">
<div class="form-group">
<span>New Password</span>
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" name="password"class="form-control" placeholder="New Password" required>
</div>
</div>
<div class="form-group">
<span>Retype Password</span>
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" class="form-control"  name="password_confirmation" placeholder="Retype Password" required>
</div>
</div>
<div class="text-center">
<button class="btn btn log-btn" style="background-color:green;color:white">Update</button>
</div>
</form>
</div>
 </div>
</div>
</div>
</section>
<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>
<?php include_once'layout/responses.php'?>
<?php include_once'layout/scripts.php'?>
</body>

<!-- Mirrored from preview.uideck.com/items/classixer-1.1/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Dec 2020 08:32:27 GMT -->
</html>