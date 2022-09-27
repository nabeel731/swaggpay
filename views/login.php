<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SwaggPay</title>
<link rel="stylesheet" href="assets/css/custom/login.css"/>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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

        <a href="">Forget Password?</a>
        <button type="submit">Login</button>
      </form>
    </main>

<?php include_once 'layout/responses.php'?>
</body>
</html>
