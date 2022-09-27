<?php
class Helper{
	public $response;
	// FUNCTIONS 
	function __construct()
	{
	    $this->response=new Response();
	}
	
	
	public function getInput(){
		 if($_SERVER['REQUEST_METHOD']!="POST")
		       $this->response->error("Only Post Method Allowed");
	$data=$this->object_to_array(json_decode(file_get_contents('php://input')));
	if(empty($data)) 
		$data=$_POST;
	return $data;
}
	
  public function validateInput($method,$array,$max_size=50)
  {
	 if(isset($_GET['route']))
		 unset($_GET['route']);
	 
	  if(!is_array($method))
	  {
		$method=strtoupper($method);
		if($method=="POST")
		{
			if(sizeof($_POST)>$max_size)
				 die("input array cannot hold more than $max_size attributes");
		}
		else if($method=="GET")
		{
			if(sizeof($_GET)>$max_size)
				 die("input array cannot hold more than $max_size attributes");
		}
	  }
	else{
			if(sizeof($method)>$max_size)
				 die("input array cannot hold more than $max_size attributes");
		}
  
	  $allowedMethods=array('GET','POST','PUT','DELETE');
	  if (!in_array($method,$allowedMethods) && !is_array($method))
		 die("only ".implode(',',$allowedMethods)." Methods can be validated"); 
	 
	  for($i=0;$i<sizeof($array);$i++)
	  {
		  $attr=$array[$i];
		  if($method=='POST')
		  {
			  
			  if(!isset($_POST[$attr]) || empty($_POST[$attr]))
				 die('Function Requires '.implode(',',$array));
		  }
		  else if($method=='GET')
		  {
			  if(!isset($_GET[$attr]))
				 die('Function Requires '.implode(',',$array));
		  }
		  else
		{
			  if(!isset($method[$attr]) || empty($method[$attr]) )
				   die('Function Requires '.implode(',',$array));
			  if( strpos($attr,'id') !== false && !is_numeric($method[$attr]) )
				   die("$attr can only be Numeric");
		  }
			  
	  }
	  
  }
  
	  
	  public function object_to_array($data)
	{
		if (is_array($data) || is_object($data))
		{
			$result = array();
			foreach ($data as $key => $value)
			{
				$result[$key] = $this->object_to_array($value);
			}
			return $result;
		}
		return $data;
	}
  
  
   public function encrypt_decrypt($string,$action='encrypt')
	{
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'ery4ajvf11224vb';
		$secret_iv = 'gery2211bfhhj34hb';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
	
	function isAssocArray(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
	
	
	 public function uploadFile($file,$path,$back=false)
	 {
		 if(empty($file) || !isset($file['name']))
			 die("file Cannot be empty");
	     $extensions= ['png','jpg','jpeg','bmp','pdf','doc','docx','mp4','txt'];
		 $fileExtension=strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
		  if(in_array($fileExtension,$extensions))
		{
			$trailingSlash='';
			if(substr($path, -1)!=='/')  $trailingSlash='/';
    		 $filePath=$path.$trailingSlash.substr(md5(time()),0,11).rand(1001,9999).'.'.$fileExtension;
    		 
    		 if($back)
		        move_uploaded_file($file['tmp_name'],'../'.$filePath);
		      else
		      move_uploaded_file($file['tmp_name'],$filePath);
		}
		else
			die("illegal extension only".implode(',',$extensions)." extensions are allowed");
		return $filePath;
	 }
	 
	 
	 
	 function request_path()
	{
		$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
		$script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
		$parts = array_diff_assoc($request_uri, $script_name);
		if (empty($parts))
		{
			return '/';
		}
		$path = implode('/', $parts);
		if (($position = strpos($path, '?')) !== FALSE)
		{
			$path = substr($path, 0, $position);
		}
		return $path;
	}
	
	public function getVisitorIpAddr(){
		$ip = getenv('HTTP_CLIENT_IP')?:
		getenv('HTTP_X_FORWARDED_FOR')?:
		getenv('HTTP_X_FORWARDED')?:
		getenv('HTTP_FORWARDED_FOR')?:
		getenv('HTTP_FORWARDED')?:
		getenv('REMOTE_ADDR');
		return $ip;
	}
	
	
	function base64_to_jpeg($base64_string, $output_file,$back=false) {
        // open the output file for writing
		if($back)
			$output_file="../".$output_file;
        $ifp = fopen($output_file, 'wb' ); 
    
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        if(!isset($data[1]))
    		 $this->response->error("Invalid base64");
    	
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    
        // clean up the file resource
        fclose( $ifp ); 
    
        return $output_file; 
    }
	
	
	public function validateCSRF(){
	
		if(!isset($_POST['csrf']) || !isset($_SESSION['csrf']) || $_SESSION['csrf']!=$_POST['csrf'])
			die("CSRF ERROR");
		$_SESSION['csrf'] = bin2hex(random_bytes(32));
		unset($_POST['csrf']);
	}
	
	
	
	
}
