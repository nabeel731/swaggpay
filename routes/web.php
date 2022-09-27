<?php
//print_r($_SESSION);die;
// Classes & Models
require_once 'classes/Email.php';

//print_r($_SESSION);die;
$onlyAllowedAfterLogin=['/','profile','product_detail','about-us','monthly_salary','about','nextteam','team','products','recharge','payments','wallet','messages'];

if($_GET['route']=="login")
{
	if(isset($_SESSION['user_id']))
	{
		echo "<script>location.href='products'</script>";
		die;
	}
}

if(in_array($_GET['route'],$onlyAllowedAfterLogin))
{
	
	if(!isset($_SESSION['user_id']))
	{
		
		echo "<script>location.href='login'</script>";
		die;
	}

}
// Controllers
require_once 'controller/Controller.php';
if(in_array($_GET['route'],['register','forgetpassword','loginSubmit','logout','resetPassword','invite']))
{
	require_once 'controller/AuthController.php';
    $auth=new AuthController();
}
else if(in_array($_GET['route'],['about-us','monthly_salary','dailytask','profile','updateprofile','about','contactus','complaint','team','nextteam','CollectReward','complaint','daily_task','earnmoney']))
{
	require_once 'controller/UserController.php';
	$user=new UserController();
}

else if(in_array($_GET['route'],['login','home','signup']))
{
	require_once 'controller/LandingController.php';
	$landing=new LandingController();
}

else if(in_array($_GET['route'],['products','product_detail','orders']))
{
    require_once 'controller/ProductController.php';
	$product=new ProductController();
}

else
{
	require_once 'controller/PaymentController.php';
	$payment=new PaymentController();
}

	
	


switch($_GET['route'])
{
	
	// AUTH
	case "login" :
	     $landing->login();
		break;
	case "home" :
	     $landing->home();
		break;
	case "loginSubmit" :
		$auth->login();
		break;
		case "signup" :
      $landing->signup();
		break;
	case "logout" :
		$auth->logout();
		break;
	case "forgetpassword" :
		$auth->forgetpassword();
		break;
	case "reset-password" :
		$auth->resetPassword();
		break;
		
		
	case "home" :
		$product->products();
		break;
		
		case "product_detail" :
		$product->product_detail();
		break;
		
		
	case "register" :
		$auth->register();
		break;
	case "checkEMail" :
		$auth->checkEMail();
		break;
		
	case "invite" :
		$auth->register();
		break;
	
		
	case "updatePassword" :
		$auth->updatePassword();
		break;
		
	case "message" :
		$user->message();
		break;
		
		case "messages" :
		$user->messages();
		break;
		
		case "profile" :
		$user->profile();
		break;
		
		case "addrecharge" :
		$payment->addrecharge();
		break;
		
		case "about" :
		$user->about();
		break;

		case "about-us" :
			$user->aboutus();
			break;
			
		case "monthly_salary" :
			$user->monthly_salary();
			break;
			
		
	case "contactus" :
		$user->contactus();
		break;
		
		case "temsandcondition" :
		$user->temsandcondition();
		break;
		
		case "wallet" :
		$payment->wallet();
		break;
		
		case "complaint" :
		$user->complaint();
		break;
		
	
		
		case "paymentsRequest" :
		$payment->paymentsRequest();
		break;
		
		case "payments" :
		$payment->payments();
		break;
		
		case "wallet" :
		$payment->wallet();
		break;
		
		case "recharge" :
		$payment->recharge();
		break;
		
		case "updateTxtid" :
		$payment->updateTxtid();
		break;
		
		case "products" :
		$product->products();
		break;
		
	case "orders" :
		$product->orders();
		break;
		
	case "team" :
		$user->team();
		break;
		
		case "nextteam" :
		$user->nextteam();
		break;
		
	case "CollectReward" :
		$user->CollectReward();
		break;
	case "daily_task" :
		$user->dailytask();
		break;
		
	case "earnmoney" :
		$user->earnmoney();
		break;
		
		
		
	default:
	http_response_code(404);
		die("(".$_GET['route'].") No Such Function");
		break;
}

	
?>