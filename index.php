<?php
date_default_timezone_set("Asia/Karachi");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// NECESSARY Classes & Models
require_once 'Constants.php';
require_once 'classes/builtinFunctions.php';
require_once 'vendor/autoload.php';
require_once 'classes/Response.php';
require_once 'classes/Helper.php';
require_once 'model/db.php';
require_once 'model/Custom.php';

if(isset($_GET['route']) && $_GET['route'] && substr($_GET['route'],0,1)=='/'){
	$_GET['route']=substr($_GET['route'],1);
}

if(empty($_GET) || !isset($_GET['route']) || empty($_GET['route']) )	
	$_GET['route']="home";


$adminRouteName='dashboard';
$apiRouteName='api';

$requestPath=$_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] 
     . explode('?', $_SERVER['REQUEST_URI'], 2)[0];
	 
if(strpos($requestPath,$adminRouteName) !== false){
	// REMOVE PREFIX ('RouteName') FROM ROUTE
	$_GET['route']=str_replace($adminRouteName."/","",$_GET['route']);
    require_once "routes/dashboard.php";
} 
else if(strpos($requestPath,$apiRouteName) !== false){
	$_GET['route']=str_replace($apiRouteName."/","",$_GET['route']);
    require_once "routes/api.php";
} 
else{
	
    require_once 'routes/web.php';
}




		
?>