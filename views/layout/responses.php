<?php
if (isset($_GET['error'])) {
	$error = $_GET['error'];
	if ($error == 'INVALID_CREDENTIALS')
		printMessage('Invalid Credentials', 'Email or password is incorrect!');
	else if (strtolower($error) == 'not_created')
		printMessage('Success', 'Oooops Could Not be added For Some Reason!');
	else if (strtolower($error) == 'not_updated')
		printMessage('Error', 'Oooops Could Not be Updated For Some Reason!');
	else if (strtolower($error) == 'insuficent_balance')
		printMessage('Success', 'Oooops Insufficient Balance!');
	else if ($error == 'PHONE_TAKEN')
		printMessage('Phone Taken', 'This Phone Number is already registered!');
	else if ($error == 'MESSAGE_ALREADY')
		printMessage('Message Alraedy', 'Your Message Alraedy Pending!');
	else if ($error == 'TXT_TAKEN')
		printMessage('TXT_ID TAKEN ', 'This TXT ID is already Used!');
	else if ($error == 'Blocked')
		printMessage('Blocked', 'Please Contact to Admin,Your Account Has Been Blocked!');
	else if ($error == 'INVALID_PHONE')
		printMessage('INVALID PHONE', 'This PHONE is INVALID!');
	else if ($error == 'EMAIL TAKEN')
		printMessage('Email Taken', 'This Email is already registered!');
	else if ($error == 'ALREADY TAKEN')
		printMessage('ALREADY TAKEN', 'YOU HAVE ENTER TXTID ALREADY');
	else if (strtolower($error) == 'incorrectemail')
		printMessage('Success', 'Oooops Email You Entered is Incorrect!');
	else if ($error == 'UNDER_AGE')
		printMessage('Under age', 'Age cannot be less than 16!');
	else if ($error == 'PASSWORD_MISMATCH')
		printMessage('Error', 'password and confirm password are different!');
	else if ($error == 'INCORRECT_OLD_PASSWORD')
		printMessage('Incorrect Password', 'old Password is incorrect!');
	else if ($error == 'PAYMENT REQUEST ERROR')
		printMessage('PAYMENT REQUEST ERROR', 'Please Enter Valid Amount!');
	else if ($error == 'PAYMENT REQUEST ALREADY')
		printMessage('PAYMENT REQUEST Pending', 'Your Payments Request Already Pending!');
	else if ($error == 'LIMIT1')
		printMessage('PAYMENT REQUEST Limit', 'Please Join 3 Member For WithDraw !');

	else if ($error == 'Blocked_Account')
		printMessage('Blocked', 'Please Contact to Admin,Your Account Has Been Blocked!');

	else if ($error == 'Deleted_Account')
		printMessage('Account Deleted', 'Your Account Has Been Deletd,Please Contact to Admin!');
	else if (strtolower($error) == 'second_payment')
		printMessage('error', 'Oooops  You Can  Only Withdraw  1500 Rs');
	else if (strtolower($error) == 'first_payment')
		printMessage('error', 'Oooops  You Can  Withdraw Only 700 Rs For First Time');

		else if (strtolower($error) == 'payment_today')
		printMessage('error', 'Oooops Today Withdrawal Limit Is Over');


	else if ($error == 'EMAIL_NOT_FOUND')
		printMessage('Email Not Found', 'Your Email Is Not Found');
	elseif ($error == 'NOT_PASSWORD_UPDATED')
		printMessage('Oooops', ' Password Could Not be Updated Due to some system error', 'error');
	elseif ($error == 'NOT_Authorized')
		printMessage('Oooops', 'you are Not Authorized To  change the password', 'error');
	elseif ($error == 'Invalid_Token')
		printMessage('Oooops', 'Token is Invalid or expired, NOTE: You can only change password  within 2 hours of request', 'error');
	elseif ($error == 'Expired_Token')
		printMessage('Oooops', 'Token is Expired,You can only change password  within 2 hours of  request, Request again', 'error');
	elseif ($error == 'TXT_ID')
		printMessage('Oooops', 'Please Enter Correct Txt Id', 'error');
} elseif (isset($_GET['success'])) {
	$success = $_GET['success'];
	if (strtolower($success) == 'created')
		printMessage('Success', 'Added Successfully!', 'success');
	elseif (strtolower($success) == 'updated')
		printMessage('Success', 'Updated Successfully!', 'success');
	elseif ($success == 'PASSWORD_UPDATED')
		printMessage('Password Updated', 'Password updated successfully, Login with new credentials', 'success');
	elseif ($success == 'Login SuccessFully')
		printMessage('Information Saved', 'Put Trxt Id To Approve Your Account', 'success');
	elseif ($success == 'Request Received')
		printMessage('Request Send', 'You will Received Your Amount With In Some Moments', 'success');

	elseif ($success == 'FORGET_EMAIL_SENT')
		printMessage('Email Sent', 'Email with reset link has been sent to you', 'success');
	elseif ($success == 'PASSWORD_UPDATED')
		printMessage('Password Updated', 'Password Updated,Now You Can Log In with new Password', 'success');
}


function printMessage($title, $text, $icon = "error")
{
	echo "
		<script>
		  Swal.fire({
		  icon: '" . $icon . "',
		  title: '" . $title . "',
		  text: '" . $text . "'
		})
		if (window.location.href.indexOf('?') > -1) 
			history.pushState('', document.title, window.location.pathname);
		</script>";
}
