<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SwaggPay</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/custom/login.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="assets/admin/plugins/fontawesome-free/css/all.min.css">
    <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
        <style>
          .whats-app {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 70px;
    right: 45px;

}

.my-float {
    margin-top: 16px;
}
        </style>
  </head>
<body>
    <main>
      <form action="loginSubmit"  method="POST">
        <div class="logo">
        <img src="assets/img/logo/logo.png"style="width:350px;height:auto;margin-bottom:-63px;">
        </div>
        <label for="email">Email</label>
        <span>
          <i class="fa-regular fa-envelope"></i>
          <input
            type="email"
            name="email"
            id="email" required
            placeholder="Type Your Email"
          />
        </span>

        <label for="password">Password</label>
        <span>
          <i class="fa-solid fa-lock"></i>
          <input
            type="password"
            required
            name="password"
            id="password"
            placeholder="Type Your Password"
          />
        </span>
        <div>

          <a href="signup" st>Create Account?</a>
          <a href="forgetpassword">Forget Password?</a>
        </div>
        <button type="submit">Login</button>
      </form>
      <a  class="whats-app" href="whatsapp://send?text=Hello World!&phone=+9198********1">
      <i class="fab fa-whatsapp my-float" style="font-size:80px;color:#007da1" aria-hidden="true"></i>
        </a>
    </main>
  

<?php include_once 'layout/responses.php'?>
<?php include_once 'layout/scripts.php'?>
</body>
</html>
