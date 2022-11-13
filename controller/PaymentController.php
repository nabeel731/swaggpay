<?php
class PaymentController extends Controller
{


	public function wallet()
	{
		$userID = $_SESSION['user_id'];
		$query = "SELECT * FROM payments_request where user_id=$userID order by id desc";
		$payments = $this->db->getDataWithQuery($query);
		$user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);

		include 'views/wallet.php';
	}

	public function recharge()
	{
		$user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);
		$settings = $this->db->getSingleRowIfMatch('settings', 'id', '0', '>');
		include 'views/recharge.php';
	}

	public function wallets()
	{
		$userID = $_SESSION['user_id'];
		$query = "SELECT * FROM payments_request where user_id=$userID";
		$payments = $this->db->getDataWithQuery($query);
		include 'views/paymentsdetail.php';
	}


	public function payments()
	{
		$userID = $_SESSION['user_id'];
		$user = $this->db->getSingleRowIfMatch('users', 'id', $userID);
		require_once 'views/paymentrequest.php';
	}

	public function paymentsRequest()
	{
		$this->helper->validateInput('POST', ['amount']);
		$id = $_SESSION['user_id'];
		$current_amount = $this->db->getSingleRowIfMatch("users", 'id', $_SESSION['user_id']);
		
		if ($_POST['amount'] > $current_amount['current_amount']) {
			echo "<script>location.href='wallet?error=PAYMENT REQUEST ERROR'</script>";
			die;
		}
		$date=date('Y-m-d');
		$query = "SELECT * FROM payments_request WHERE payment_approved=1 AND  user_id=$id and cast(updated_at as date) ='" . $date . "'";
		$alreadypayment = $this->db->getDataWithQuery($query);

	

		if ($alreadypayment) {
			echo "<script>location.href='wallet?error=payment_today'</script>";
			die;
		}

		


		

		$query = "SELECT * FROM payments_request WHERE payment_approved=0 AND  user_id=$id";
		$firstpaymentscheck = $this->db->getDataWithQuery($query);

		$query = "SELECT count(id) as total_team FROM users WHERE invitee_id=$id and paid=1";
		$totalteam = $this->db->getDataWithQuery($query);


		if ($totalteam[0]['total_team'] < 3) {

			echo "<script>location.href='wallet?error=LIMIT1'</script>";
			die;
		}
		

		if ($_POST['amount'] !=700 and empty($firstpaymentscheck)) {

			echo "<script>location.href='wallet?error=First_PAYMENT'</script>";
			die;
		}
		
		$query = "SELECT * FROM payments_request WHERE payment_approved=1 AND  user_id=$id";
		$secondpaymentscheck = $this->db->getDataWithQuery($query);
		$two = count($secondpaymentscheck);
		if (($two > 0) and $totalteam[0]['total_team']<6) {
			echo "<script>location.href='wallet?error=Second_PAYMENT'</script>";
			die;
		}
		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM payments_request WHERE payment_approved=0 AND  user_id=$id";
		$paymentscheck = $this->db->getDataWithQuery($query);
		if ($paymentscheck) {
			echo "<script>location.href='wallet?error=PAYMENT REQUEST ALREADY'</script>";
			die;
		}

		$_POST['user_id'] = $_SESSION['user_id'];
		$_POST['created_at'] = date("Y-m-d H-i-s");
		$_POST['updated_at'] = date("Y-m-d H-i-s");
		$payments = $this->db->insertRow('payments_request', $_POST);
		if ($payments) {
			echo "<script>location.href='wallet?success=Request Received'</script>";
		}
		echo "<script>location.href='payments?error=not_created'</script>";
	}

	public function updateTxtid()
	{

		if (isset($_POST['level_id'])) {
			unset($_POST['level_id']);
		}

		if (isset($_POST['current_amount'])) {
			unset($_POST['current_amount']);
		}

		if (isset($_POST['paid'])) {
			unset($_POST['paid']);
		}

		if (isset($_POST['status'])) {
			unset($_POST['status']);
		}

		if (isset($_POST['min_amount'])) {
			unset($_POST['min_amount']);
		}


		if (strlen($_POST['txt_id']) != 11 and strlen($_POST['txt_id']) != 12) {
			echo "<script>location.href='about?error=TXT_ID'</script>";
			die;
		}
		$trxt = $_POST['txt_id'];
		$query = "SELECT * FROM users WHERE txt_id=$trxt AND  txtid_rejected=0";
		$txtcheck = $this->db->getDataWithQuery($query);
		if ($txtcheck) {

			echo "<script>location.href='about?error=TXT_TAKEN'</script>";
			die;
		}

	
		$userID = $_SESSION['user_id'];
		$user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);
		if (!empty($user['txt_id'] and $user['txtid_rejected'] == 0)) {
			echo "<script>location.href='about?error=ALREADY TAKEN'</script>";
			die;
		}
		$_POST['txtid_rejected'] = 0;
		$user = $this->db->updateRow('users', $_POST, 'id', $userID);
		if ($user) {
			echo "<script>location.href='about?success=updated'</script>";
		}
		echo "<script>location.href='about?error=not_updated'</script>";
	}


	public function addrecharge()
	{

		$this->helper->validateInput('POST', ['trxt_id', 'amount']);
		$_POST['user_id'] = $_SESSION['user_id'];
		$recharge = $this->db->insertRow('recharge', $_POST);
		if ($recharge)
			echo "<script>location.href='recharge?success=created'</script>";
		else
			echo "<script>location.href='recharge?error=not_created'</script>";
	}
}
