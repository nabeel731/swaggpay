<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SwaggPay</title>
    <link rel="stylesheet" href="assets/css/custom/signUp.css"/>
  </head>

  <body>
    <main style="padding-block: 0rem;">
      <form action="register" method="post">
      <div class="logo">
        <img src="assets/img/logo/logo.png"style="width:350px;height:auto;margin-bottom:-63px;">
        </div>
        <label for="name">Name</label>
        <input required type="text" name="name" id="name" />
        <label for="email">Email</label>
        <input required type="email" name="email" id="email" />
        <label for="">Gender</label>
        <span>
          <input required type="radio" id="male" name="gender" value="male" />
          <label for="male">Male</label>
          <input required type="radio" id="female" name="gender" value="female" />
          <label for="female">Female</label>
        </span>
        <label for="phone">Phone</label>
        <input  required type="tel" name="phone" id="phone" />
        <label  for="password">Password</label>
        <input  required type="password" name="password" id="password" />
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" />
        <label for="account">Select Account</label>
        <select name="account_name" id="">
          <option value="jazzcash">JazzCash</option>
          <option value="easypaisa">EasyPaisa</option>
          <option value="">Paytm</option>
        </select>
        <label for="phone">City</label>
        <input  required type="text" name="city" id="phone" />
        <?php if (isset($invitee['name'])) { ?>
				<label style="Color:red">Referral Name</label>
				<input type="hidden" class="form-control" minlength="1" value="<?= $invitee['id'] ?>" name="invitee_id">
				
					<input type="text" readonly value="<?= $invitee['name'] ?>" placeholder="Refral Name" required class="">
			<?php } ?>
        <button type="submit">Sign Up</button>
      </form>
    </main>
  </body>
</html>
<?php include_once 'layout/responses.php' ?>
    <?php include_once 'layout/scripts.php' ?>
