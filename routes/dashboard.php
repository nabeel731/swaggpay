<?php
// ADD TRAILING SLASH (if not)
if (strpos($requestPath, $adminRouteName . "/") === false)
	echo "<script>location.href='dashboard/'</script>";

$allowedWithoutLogin = ['login', 'loginSubmit'];
if (!in_array($_GET['route'], $allowedWithoutLogin)) {
	if (!isset($_SESSION['horizam_admin_id']))
		loadView('dashboard/login');
}

// Classes & Models
require_once 'classes/Email.php';

// Controllers
require_once 'controller/Dashboard/DashboardController.php';
require_once 'controller/Dashboard/AuthController.php';
require_once 'controller/Dashboard/UserController.php';
require_once 'controller/Dashboard/PaymentController.php';
require_once 'controller/Dashboard/ProductController.php';

$auth = new AuthController();
$dashboard = new DashboardController();
$user = new UserController();
$payment = new PaymentController();
$product = new ProductController();



switch ($_GET['route']) {

		// AUTH
	case "":
		$dashboard->index();
		break;
	case "index":
		$dashboard->index();
		break;
	case "login":
		loadView('dashboard/login');
		break;
	case "loginSubmit":
		$auth->login();
		break;
	case "logout":
		$auth->logout();
		break;
	case "updatePassword":
		$auth->updatePassword();
		break;



		//UserController

	case "blockunblockUser":
		$user->blockunblockUser();
		break;

	case "approveMembers":
		$user->approveMember();
		break;

	case "RejectedUser":
		$user->RejectedUser();
		break;

	case "rejectMembers":
		$user->rejectMembers();
		break;

		//Dashboard
	case "dashboard":
		$dashboard->index();
		break;
	case "dashboard/":
		$dashboard->index();
		break;
	case "addUser":
		$dashboard->addUser();
		break;
	case "users":
		$user->index();
		break;
	case "deleteUser":
		$user->deleteUser();
		break;

		case "Allrejects":
			$user->Allrejects();
			break;
		

	case "getUser":
		$dashboard->getUser();
		break;

		case "transaction_statement":
			$user->transaction_statement();
			break;

			case "upload_transaction_statement":
				$user->upload_transaction_statement();
				break;

		case "clearextradata":
			$dashboard->clearextradata();
			break;
	case "updateUser":
		$user->updateUser();
		break;

	case "JazzCash":
		$user->JazzCash();
		break;

	case "Skrill":
		$user->Skrill();
		break;

	case "EasyPaisa":
		$user->EasyPaisa();
		break;

	case "pendingtrxt":
		$user->pendingtrxt();
		break;

	case "ApprovedUser":
		$user->ApprovedUser();
		break;

	case "todayapproved":
		$user->todayapproved();
		break;

	case "rejecteduser":
		$user->rejectedusers();
		break;

	case "generatePdf":
		$user->generatePdf();
		break;


	case "levels":
		$user->levels();
		break;

	case "getlevel":
		$user->getlevel();
		break;

	case "addLevel":
		$user->addLevel();
		break;


	case "updateLevel":
		$user->updateLevel();
		break;

	case "getUserLevel":
		$user->getUser();
		break;



	case "deleteLevel":
		$user->deleteLevel();
		break;

	case "addsliderdata":
		$dashboard->addsliderdata();
		break;

	case "sliders":
		$dashboard->sliders();
		break;

	case "banners":
		$dashboard->banners();
		break;

	case "addbanners":
		$dashboard->addbanners();
		break;

	case "getSlider":
		$dashboard->getslider();
		break;

	case "getBrand":
		$dashboard->getBrand();
		break;

	case "getBanner":
		$dashboard->getBanner();
		break;

	case "brands":
		$dashboard->brands();
		break;

	case "addbrands":
		$dashboard->addbrands();
		break;

	case "addbranddata":
		$dashboard->addbranddata();
		break;

	case "addbannersdata":
		$dashboard->addbannersdata();
		break;

	case "updateSlider":
		$dashboard->updateSlider();
		break;

	case "updateBrand":
		$dashboard->updateBrand();
		break;

	case "updateBanner":
		$dashboard->updateBanner();
		break;

	case "updateBanner":
		$dashboard->updateBanner();
		break;

	case "getSetting":
		$dashboard->getSetting();
		break;

	case "updateSetting":
		$dashboard->updateSetting();
		break;

	case "settings":
		$dashboard->settings();
		break;

	case "addsetting":
		$dashboard->addsettings();
		break;

	case "addsettingdata":
		$dashboard->addsettingdata();
		break;


	case "payments":
		$payment->payments();
		break;

	case "recharges":
		$payment->recharges();
		break;

	case "rechargeshistory":
		$payment->rechargeshistory();
		break;

	case "ApprovedPayment":
		$payment->ApprovedPayment();
		break;

	case "ApprovedRechargePayment":
		$payment->ApprovedRechargePayment();
		break;

	case "messages":
		$user->messages();
		break;


	case "sendmessage":
		$user->sendmessage();
		break;


	case "RejectPayment":
		$payment->RejectPayment();
		break;

	case "RejectRechargePayment":
		$payment->RejectRechargePayment();
		break;

	case "approvedpayments":
		$payment->approvedpayments();
		break;

	case "rejectedpayments":
		$payment->rejectedpayments();
		break;

	case "shopProduct":
		$product->shopProduct();
		break;

	case "orders":
		$product->orders();
		break;

	case "approvedorders":
		$product->approvedorders();
		break;

	case "RejectOrder":
		$product->RejectOrder();
		break;


	case "addproduct":
		$product->addProduct();
		break;

	case "product-add":
		$product->productadd();
		break;

	case "getproduct":
		$product->getproduct();
		break;

	case "updateProduct":
		$product->updateProduct();
		break;
	case "edit-product":
		$product->editproduct();
		break;

	case "deleteProduct":
		$product->deleteProduct();
		break;

	case "changeOrderStatus":
		$product->changeOrderStatus();
		break;
		
	case "changePassword":
		$auth->changePassword();
		break;
		
		case "updatePassword":
		$auth->updatePassword();
		break;

	case "changeLevel":
		$user->changeLevel();
		break;















	default:
		http_response_code(404);
		die("(" . $_GET['route'] . ") No Such Function");
		break;
}
