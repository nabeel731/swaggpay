<?php
class AuthController
{
	protected $helper;
	protected $custom;
	protected $db;
	function __construct()
	{		
		$this->db=new DB();
		$this->custom=new Custom();
		$this->helper=new Helper();
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
	
	public function login(){
		 $this->helper->validateInput('POST',['email','password']);
		 $_POST['password']=sha1($_POST['password']);
		 
		 $query="SELECT * from admins where email=? AND password=? LIMIT 1";
		 $admin=$this->db->getDataWithQuery($query,[$_POST['email'],$_POST['password']],'ss');
		if($admin && isset($admin[0]))
		{
			
			$admin = $admin[0];
			$_SESSION['horizam_admin_id']=$admin['id'];
			$_SESSION['horizam_admin_name']=$admin['name'];
	        header('location:dashboard');
		}
		else
			header('location:login?error=INVALID_CREDENTIALS');
	 }
	 
	 public function logout($message=NULL)
	 {
		 if(isset($_SESSION['horizam_admin_id']))
			 unset($_SESSION['horizam_admin_id']);
		 if(isset($_SESSION['horizam_admin_name']))
			 unset($_SESSION['horizam_admin_name']);
		 session_destroy();
		 if(!$message)
			header('location:login');
		else
			header("location:login?success=$message");
			
	 }
	 
	 public function changePassword()
	 {
		 require 'views/dashboard/changepassword.php';
	 }
	 
	
	 
	 public function updatePassword()
	 {
		 if($_POST['new_password']!= $_POST['confirm_password'] )
			  echo "<script>location.href='index?error=PASSWORD_MISMATCH'</script>";
		  
		 $query=" SELECT * FROM admins WHERE id=".$_SESSION['horizam_admin_id']." AND password='".sha1($_POST['old_password'])."'";
		 $admin=$this->db->getDataWithQuery($query);
		 if($admin && isset($admin[0]))
		 {
			 $this->db->updateRow("admins",['password'=>sha1($_POST['new_password'])],'id',$_SESSION['horizam_admin_id']);
			 $this->logout("PASSWORD_UPDATED");
		 }
		 else
			 echo "<script>location.href='changePassword?error=INCORRECT_OLD_PASSWORD'</script>";
	 }
	
	
}
