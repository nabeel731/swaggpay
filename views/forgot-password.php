<!DOCTYPE html>
<html lang="en">
<?php include_once 'layout/head.php'?>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                 <div class="col-md-6 text-center mb-5">
                    <img src="assets/img/logo/logo.jpg"style="width:300px;height:90px;">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                    <form action="forgetpassword" class="login-form" method="POST">
                        <div class="form-group">
                             <input type="text" class="form-control rounded-left" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group d-md-flex">
                        <div class="">
                            <span>Already have an account?</span><a href="login">Back To Login</a>
                        </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary rounded  p-3 px-5">Continue</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
</div>
</section>
<?php include_once 'layout/responses.php'?>
</body>
</html>