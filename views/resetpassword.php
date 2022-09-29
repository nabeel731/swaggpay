<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SwaggPay</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/custom/login.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
        <!-- <style>
          main{
            padding-block: 0rem;
          }
          input{
            outline: none;
          }
          main form input:focus span{
            background-color: red;
          }
          main form{
            min-width: auto;
          }
          @media screen and (max-width: 480px){
            main{
              align-items: flex-start !important;
            }
          }
        </style> -->
  </head>
<body>
    <main>
      <form action="reset-password?email=<?=$_GET['email']?>&token=<?=$_GET['token']?>"  method="POST">
        <div class="logo">
        <img src="assets/img/logo/logo.png"style="width:350px;height:auto;margin-bottom:-63px;">
        </div>
        <label for="email">Password</label>
        <span>
          <i class="fa-regular fa-envelope"></i>
          <input
            type="password"
            name="password"
            id="email" required
            placeholder="Type Your Password"
          />
        </span>

        <label for="password">Confirm Password</label>
        <span>
          <i class="fa-solid fa-lock"></i>
          <input
            type="password"
            required
            name="password_confirmation"
            id="password"
            placeholder="Type Your Password"
          />
        </span>
        <button type="submit">Update</button>
      </form>
    </main>

<?php include_once 'layout/responses.php'?>
<?php include_once 'layout/scripts.php'?>
</body>
</html>
