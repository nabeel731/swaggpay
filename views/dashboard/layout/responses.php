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
		else if($error=='TITLE_TAKEN')
		printMessage('CATEGORY Taken','This Tile already exists!');
	else if($error=='FIELDS_REQUIRED')
		printMessage('FIELDS_REQUIRED','All Necessary fileds are required!');
	else if(strtolower($error)=='incorrectemail')
		printMessage('Success','Oooops Email You Entered is Incorrect!');
	else if($error=='PRODUCT_TAKEN')
		printMessage('Name Exists','Product with this name already exists!');
	else if($error=='PASSWORD_MISMATCH')
		printMessage('Error','password and confirm password are different!');
	else if($error=='INCORRECT_OLD_PASSWORD')
		printMessage('Incorrect Password','old Password is incorrect!');
	else
		printMessage('',$_GET['error']);
		
}
elseif(isset($_GET['success']))
{
	
	echo $success=$_GET['success'];
	if(strtolower($success)=='created')
		printMessage('Success','Added Successfully!','success');
	if(strtolower($success)=='deleted')
		printMessage('Success','Deleted Successfully!','success');
	elseif(strtolower($success)=='updated')
		printMessage('Success','Updated Successfully!','success');
	elseif($success=='PASSWORD_UPDATED')
		printMessage('Password Updated','Password updated successfully, Login with new credentials','success');
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