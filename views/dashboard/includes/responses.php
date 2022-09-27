<?php
if(isset($_GET['error']))
{
	$error=$_GET['error'];
	if($error=='INVALID_CREDENTIALS')
		printMessage('Invalid Credentials','Email or password is incorrect!');
	else if(strtolower($error)=='not_created')
		printMessage('Success','Oooops Could Not be added For Some Reason!');
	else if(strtolower($error)=='not_updated')
		printMessage('Success','Oooops Could Not be Updated For Some Reason!');
	else if($error=='EMAIL_TAKEN')
		printMessage('Email Taken','This Email is already taken!');
	else if($error=='PHONE_TAKEN')
		printMessage('PHONE TAKEN','This Phone is already taken!');
		else if($error=='CATEGORY_TAKEN')
		printMessage('CATEGORY Taken','This CATEGORY NAME is already taken!');
	else if($error=='FIELDS_REQUIRED')
		printMessage('FIELDS_REQUIRED','All Necessary fileds are required!');
	else if(strtolower($error)=='incorrectemail')
		printMessage('Success','Oooops Email You Entered is Incorrect!');
	else if($error=='UNDER_AGE')
		printMessage('Under age','Age cannot be less than 16!');
	else if($error=='PASSWORD_MISMATCH')
		printMessage('Error','password and confirm password are different!');
	else if($error=='INCORRECT_OLD_PASSWORD')
		printMessage('Incorrect Password','old Password is incorrect!');
	else if($error=='PAYMENT REQUEST ERROR')
		printMessage('PAYMENT REQUEST ERROR','This Has Not Valid Amount!');
}
elseif(isset($_GET['success']))
{
	$success=$_GET['success'];
	if(strtolower($success)=='created')
		printMessage('Success','Added Successfully!','success');
	if(strtolower($success)=='deleted')
		printMessage('Success','Deleted Successfully!','success');
	elseif(strtolower($success)=='updated')
		printMessage('Success','Updated Successfully!','success');
	elseif($success=='PASSWORD_UPDATED')
		printMessage('Password Updated','Password updated successfully, Login with new credentials','success');
		
		elseif($success=='Payment Approved')
		printMessage('Payment Approved','Payment Approved successfully','success');
		
		
}


function printMessage($title,$text,$icon="error"){
		echo"
		<script>
		  Swal.fire({
		  icon: '".$icon."',
		  title: '".$title."',
		  text: '".$text."'
		})
		if (window.location.href.indexOf('?') > -1) 
			history.pushState('', document.title, window.location.pathname);
		</script>";
	}