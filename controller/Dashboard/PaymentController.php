<?php
class PaymentController
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
	
	
	public function payments()
	{
		$query="SELECT *,users.name as user_name,users.id as user_ID from users inner join payments_request on users.id=payments_request.user_id  WHERE payment_approved=0 ORDER BY payments_request.id DESC";
		 $payments=$this->db->getDataWithQuery($query);
		
		require 'views/dashboard/payments.php';
	}
	
	public function recharges()
	{
		$query="SELECT *,users.name as username,users.id as trxtid FROM users  JOIN recharge on users.id=recharge.user_id  WHERE payment_approved=0 ORDER BY recharge.id DESC";
		 $payments=$this->db->getDataWithQuery($query);
		
		require 'views/dashboard/recharge.php';
	}
	
	public function approvedpayments()
	{
		$query="SELECT *,users.name as user_name,users.id as employeeid FROM users  JOIN payments_request on users.id=payments_request.user_id  WHERE payment_approved=1 ORDER BY payments_request.id DESC";
		 $payments=$this->db->getDataWithQuery($query);
		
		require 'views/dashboard/approvedpayments.php';
	}
	
	public function rechargeshistory()
	{
		$query="SELECT *,users.name as username,users.id as employeeid FROM users  JOIN recharge on users.id=recharge.user_id  WHERE payment_approved=1 ORDER BY recharge.id DESC";
		 $payments=$this->db->getDataWithQuery($query);
		
		require 'views/dashboard/approvedrecharges.php';
	}
	
	
	public function rejectedpayments()
	{
		$query="SELECT * FROM payments_request WHERE payment_approved=2 ORDER BY id DESC";
		 $payments=$this->db->getDataWithQuery($query);
		require 'views/dashboard/rejecetdpayments.php';
	}
	
	
	public function ApprovedPayment()
	{
		
		$userpayments=$this->db->getSingleRowIfMatch('users','id',$_POST['userID']);
		$payments=$this->db->getSingleRowIfMatch('payments_request','id',$_POST['id']);
		
		
		if($payments['amount']>$userpayments['current_amount'])
		{
			
			echo "0";
			die;
		}
		
		$userid=$_POST['userID'];unset($_POST['userID']);
		$paymentstatus['payment_approved']=1;
		$paymentstatus['updated_at'] = date("Y-m-d H-i-s");
		$userpayment['current_amount']=$userpayments['current_amount']-$payments['amount'];
		if($this->db->updateRow("users",$userpayment,'id',$userid)&&$this->db->updateRow("payments_request",$paymentstatus,'id',$_POST['id']))
		{
			$totalwithdraw['totalwithdraw']=$payments['amount']+$userpayments['totalwithdraw'];
			 $this->db->updateRow("users",$totalwithdraw,'id',$userid);
			echo "1";
			die;
		}
		echo "0";	
	
	}
	
	
	public function ApprovedRechargePayment()
	{
		
		$userpayments=$this->db->getSingleRowIfMatch('users','id',$_POST['userID']);
		$payments=$this->db->getSingleRowIfMatch('recharge','id',$_POST['id']);
		$userid=$_POST['userID'];unset($_POST['userID']);
		$paymentstatus['payment_approved']=1;
		$userpayment['current_amount']=$userpayments['current_amount']+$payments['amount'];
		if($this->db->updateRow("users",$userpayment,'id',$userid)&&$this->db->updateRow("recharge",$paymentstatus,'id',$_POST['id']))
		{
		
			echo "1";
			die;
		}
		echo "0";	
	
	}
	
	
	
	public function RejectPayment()
	{
		
		$this->helper->validateInput('POST',['id','userID']);
		$data['payment_approved']=2;
		if($this->db->updateRow("payments_request",$data,'id',$_POST['id']))
		{
			echo "1";
			die;
		}
		echo "0";	
		
		
	
	}
	
	
	public function RejectRechargePayment()
	{
		
		$this->helper->validateInput('POST',['id','userID']);
		$data['payment_approved']=2;
	
		if($this->db->updateRow("recharge",$data,'id',$_POST['id']))
		{
			echo "1";
			die;
		}
		echo "0";	
		
		
	
	}
	 
	 public function paymentsRequest()
	 {
		 $this->helper->validateInput('POST',['name','phone','amount']);
		 $current_amount=$this->db->getSingleRowIfMatch("users",'id',$_SESSION['user_id']);
		 if($_POST['amount']>$current_amount['current_amount'])
		 {
			echo "<script>location.href='payments?error=PAYMENTREQUEST ERROR'</script>";
			die;
		 }
		 
		 $_POST['user_id']=$_SESSION['user_id'];
		 $payments=$this->db->insertRow('payments_request',$_POST);
		 if($payments)
		 {
			 echo "<script>location.href='payments?success=Request Received'</script>";
		 }
		 		echo "<script>location.href='payments?error=not_created'</script>";	
	 }
	
	
}
