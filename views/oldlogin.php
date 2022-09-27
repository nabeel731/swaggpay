<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <?php include_once('layout/head.php'); ?>
   <body>
      <section class="sign-part">
         <div class="sign-content">
            <div class="content-cover">
               <a href="#"><img src="assets/img/logo/logo.png" alt="logo"></a>
               <h1>Biggest Fish supplier in India.</h1>
            </div>
         </div>
         <div class="sign-form">
            <div class="back-arrow"><a href="#"><img src="assets/img/logo/logo.png" alt="logo"></a><a href="home"><i class="fas fa-arrow-left"></i></a></div>
            <div class="sign-cate">
               <ul class="nav nav-tabs">
                  <li><a href="#signin" class="nav-link active" data-toggle="tab">sign in</a></li>
                  <li><a href="#signup" class="nav-link" data-toggle="tab">sign up</a></li>
               </ul>
            </div>
            <div class="tab-pane active" id="signin">
               <div class="sign-heading">
                  <h2>Login</h2>
                  <p>Use credentials to access your account.</p>
               </div>
               <form class="form" action="loginSubmit" method="post">
                  <label class="form-label"><input type="text" name="email"placeholder="Email"required></label>
				  <label class="form-label"><input type="password" name="password" id="pass" placeholder="Password"required></label>
                  <label class="form-link">
                     <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="signin-check">
                  <label class="custom-control-label" for="signin-check">Remember me</label></div><a href="#">Forgot password?</a></label><label class="form-btn"><button type="submit" class="btn btn-outline">sign in now</button></label>
               </form>
               <div class="form-bottom">
                  <p>Don't have an account? click on the <span>( sign up )</span>button above.</p>
               </div>
            </div>
            <div class="tab-pane" id="signup">
               <div class="sign-heading">
                  <h2>Register</h2>
                  <p>Setup a new account in a minute.</p>
               </div>
               <form class="form" action="register" method="post">
			   <label class="form-label"><input type="email" name="email" placeholder="Email"required></label>
			   <label class="form-label"><input type="text" name="name" placeholder="Enter Name"required></label>
                  <label class="form-label"><input type="text" name="phone" placeholder="Phone number"required></label>
				
				  <label class="form-label"><input type="text" name="address"id="pass" placeholder="Enter Address"required></label>
				  <label class="form-label"><input type="password" name="password" placeholder="Password"required></label>
				  <label class="form-label"><input type="password" name="confirm_password"id="pass" placeholder="Repeat Password"required></label>
                  <div class="form-link">
                     <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="signup-check"><label class="custom-control-label" for="signup-check">I agree to the all <a href="#">terms & consitions</a>of bebostha.</label></div>
                  </div>
                  <div class="form-btn"><button type="submit" class="btn btn-outline">sign up free</button></div>
               </form>
               <div class="form-bottom">
                  <p>Already have an account? click on the <span>( sign in )</span>button above.</p>
               </div>
            </div>
         </div>
      </section>
	  <?php include_once('layout/responses.php'); ?>
      <?php include_once('layout/scripts.php'); ?>
   </body>
</html>