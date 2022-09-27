<?php
class UserController
{

	protected $helper;
	protected $custom;
	protected $db;
	function __construct()
	{
		$this->db = new DB();
		$this->custom = new Custom();
		$this->helper = new Helper();
	}


	public function index()
	{
		$query = "SELECT users.*,invitee.name as invitee_name FROM users 
		 LEFT JOIN users as invitee on users.invitee_id=invitee.id 		 
		 WHERE users.paid=1 and users.txtid_rejected=0 AND users.deleted=0
		 GROUP BY users.id ORDER BY users.txt_id DESC
		 ";
		$users = $this->db->getDataWithQuery($query);
		//echo "<pre>";print_r($users);die;
		require 'views/dashboard/users.php';
	}


	public function EasyPaisa()
	{
		$query = "SELECT users.*,invitee.name as invitee_name FROM users
	 LEFT JOIN users as invitee ON invitee.id=users.invitee_id
	 WHERE users.paid=0 AND users.txtid_rejected=0 AND users.account_name='easypaisa' AND users.deleted=0 AND  	users.txt_id IS NOT  NULL
	 GROUP BY users.id
	 ORDER BY users.txt_id DESC";
		$users = $this->db->getDataWithQuery($query);

		require 'views/dashboard/newaccount.php';
	}

	public function JazzCash()
	{
		$query = "SELECT users.*,invitee.name as invitee_name FROM users
	 LEFT JOIN users as invitee ON invitee.id=users.invitee_id
	 WHERE users.paid=0 AND users.txtid_rejected=0 AND users.account_name='jazzcash' AND users.deleted=0 AND  	users.txt_id IS NOT  NULL
	 GROUP BY users.id
	 ORDER BY users.txt_id DESC";
		$users = $this->db->getDataWithQuery($query);

		require 'views/dashboard/jazzcashaccount.php';
	}


	public function Skrill()
	{
		$query = "SELECT users.*,invitee.name as invitee_name FROM users
	 LEFT JOIN users as invitee ON invitee.id=users.invitee_id
	 WHERE users.paid=0 AND users.txtid_rejected=0 AND users.account_name='Skrill' AND users.deleted=0 AND  	users.txt_id IS NOT  NULL
	 GROUP BY users.id
	 ORDER BY users.txt_id ASC";
		$users = $this->db->getDataWithQuery($query);

		require 'views/dashboard/Skrillaccount.php';
	}

	public function pendingtrxt()
	{
		$query = "SELECT users.*,invitee.name as invitee_name FROM users
	 LEFT JOIN users as invitee ON invitee.id=users.invitee_id
	 WHERE users.paid=0 AND users.txtid_rejected=0 AND users.deleted=0 AND 	users.txt_id IS NULL
	 GROUP BY users.id
	 ORDER BY users.txt_id DESC";
		$users = $this->db->getDataWithQuery($query);

		require 'views/dashboard/pendingtxrt.php';
	}

	public function rejectedusers()
	{
		$query = "SELECT users.*,invitee.name as invitee_name FROM users
	 LEFT JOIN users as invitee ON invitee.id=users.invitee_id
	 WHERE users.paid=0 AND users.txtid_rejected=1 AND users.deleted=0
	 GROUP BY users.id";
		$users = $this->db->getDataWithQuery($query);
		require 'views/dashboard/rejecteduser.php';
	}


	public function generatePdf()
	{
		$id = $_GET['id'];
		$user['print'] = 1;
		if ($this->db->updateRow('users', $user, 'id', $id)) {
			$query = "SELECT * FROM users WHERE paid=1 AND id=$id";
			$users = $this->db->getDataWithQuery($query);
			require_once 'views/dashboard/pdf.php';
		}
	}


	public function todayapproved()
	{
		$date = date('y-m-d');

		$query = "SELECT * FROM users WHERE paid=1 AND print=0 AND approved_date='" . $date . "'";
		$users = $this->db->getDataWithQuery($query);
		//print_r($users);die;
		require 'views/dashboard/todayapproveduser.php';
	}
	public function WarningToUser()
	{
		$id = $_POST['userID'];
		$title = "Warning";
		$body = "warmimg from ADmin";
		if ($this->fcm->sendToSingle($id, $title, $body))
			echo "1";
		else
			echo "0";
	}

	public function returnPercentageAmount($registerfees)
	{
		return 16 * $registerfees / 100;
	}



	public function approveMember()
	{
		date_default_timezone_set("Asia/Karachi");
		$input = $this->helper->getInput();
		$approveuser['paid'] = 1;
		$approveuser['updated_at'] = date("Y-m-d H-i-s");
		$settings = $this->db->getSingleRowIfMatch('settings', 'id', 0, '>');
		$approveuser['approved_date'] = date('y-m-d');
		$dt = date("Y-m-d");
		$approveuser['last_date'] = date("Y-m-d", strtotime("$dt +10 day"));

		foreach ($input as $user) {
			$query = "SELECT * FROM users WHERE id=$user AND paid=0";
			$userdata = $this->db->getDataWithQuery($query);
			if (!empty($userdata[0]['invitee_id'])) {
				$inviteeuserdata = $this->db->getSingleRowIfMatch('users', 'id', $userdata[0]['invitee_id']);
				$amount['current_amount'] = $inviteeuserdata['current_amount'] + $this->returnPercentageAmount($settings['register_fees']);
				$amount['last_date'] = date("Y-m-d", strtotime("$dt +10 day"));
				$this->db->updateRow('users', $amount, 'id', $userdata[0]['invitee_id']);
			}
			$userapp = $this->db->updateRow('users', $approveuser, 'id', $user);

			if (!empty($userdata[0]['invitee_id'])) {
				$teams = $this->checkUserTeam($userdata[0]['invitee_id']);
				if ($teams > 4 and $teams < 12) {

					$amount['level_id'] = 1;
				} else if ($teams > 11 and $teams < 27) {

					$amount['level_id'] = 2;
				} else if ($teams > 26 and $teams < 40) {

					$amount['level_id'] = 3;
				} else if ($teams > 40) {

					$amount['level_id'] = 4;
				}

				$this->db->updateRow('users', $amount, 'id', $userdata[0]['invitee_id']);
			}
		}
		if ($userapp)
			echo json_encode(['status' => 200, 'message' => 'successful', 'data' => '']);
		else
			echo json_encode(['status' => 200, 'message' => 'unsuccessful', 'data' => '']);
	}

	public function checkUserTeam($id)
	{


		$query = "SELECT count(invitee_id) as total_team  from users where invitee_id=$id AND paid=1";
		$userTeam = $this->db->getDataWithQuery($query);
		return $userTeam[0]['total_team'];
	}


	public function checkUserTeam1($id)
	{
		$query = "SELECT count(invitee_id) as total_team1  from users where invitee_id=$id AND paid=1 and level_id=2";
		$userTeam = $this->db->getDataWithQuery($query);
		return $userTeam[0]['total_team1'];
	}

	public function checkUserTeam2($id)
	{
		$query = "SELECT count(invitee_id) as total_team1  from users where invitee_id=$id AND paid=1 and level_id=3";
		$userTeam = $this->db->getDataWithQuery($query);
		return $userTeam[0]['total_team1'];
	}



	public function RejectedUser()
	{
		$id = $_POST['userID'];
		$user['txtid_rejected'] = 1;
		if ($this->db->updateRow('users', $user, 'id', $id))
			echo "1";
		else
			echo "0";
	}




	public function rejectMembers()
	{
		$userIds = $this->helper->getInput();
		$user['txtid_rejected'] = 1;
		foreach ($userIds as $id) {
			$userrejcts = $this->db->updateRow('users', $user, 'id', $id);
		}

		if ($userrejcts)
			echo json_encode(['status' => 200, 'message' => 'successful', 'data' => '']);
		else
			echo json_encode(['status' => 200, 'message' => 'unsuccessful', 'data' => '']);
	}



	public function blockunblockUser()
	{
		$id = $_POST['blockID'];
		$user['status'] = $_POST['status'];
		//echo $id;die;
		if ($this->db->updateRow('users', $user, 'id', $id))

			echo $_POST['status'];
		else
			echo 'unsuccessful';
	}



	public function user()
	{
		$this->helper->validateInput('get', ['id']);
		$res = $this->custom->returnUserData($_GET['id']);
		if ($res['deleted'])
			die("Your Account Has been Deleted,Please Contact To Administration");
		if (!$res['status'])
			$this->response->error("You Are Banned, Please Contact To Administration");
		return $res;
	}

	public function deleteUser()
	{

		$this->helper->validateInput('post', ['userId']);
		$userID = $_POST['userId'];
		unset($_POST['userId']);
		$user['deleted'] = 1;

		$user = $this->db->updateRow('users', $user, 'id', $userID);
		if ($user) {
			echo "1";
		} else
			echo "0";
	}



	public function deleteLevel()
	{

		$this->helper->validateInput('post', ['Id']);
		$ID = $_POST['Id'];
		unset($_POST['Id']);

		$user = $this->db->deleteRow('levels', 'id', $ID);
		if ($user) {
			echo "1";
		} else
			echo "0";
	}


	public function addUser()
	{

		$this->helper->validateInput('post', ['name', 'phone', 'email', 'password']);
		$_POST['password'] = sha1($_POST['password']);
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "<script>location.href='users?error=INVALID_EMAIL'</script>";
			die;
		}

		if ($data = $this->db->exist("users", 'email', $_POST['email'])) {
			echo "<script>location.href='users?error=EMAIL_TAKEN'</script>";
			die;
		}
		if ($data = $this->db->exist("users", 'phone', $_POST['phone'])) {
			echo "<script>location.href='users?error=PHONE_TAKEN'</script>";
			die;
		}
		$user = $this->db->insertRow('users', $_POST);
		if ($user)
			echo "<script>location.href='users?success=created'</script>";
		else
			echo "<script>location.href='users?error=not_created'</script>";
	}

	public function getUser()
	{
		$this->helper->validateInput('get', ['id']);
		$user = $this->db->getSingleRowIfMatch("users", 'id', $_GET['id']);
		if ($user)
			$res = array('status' => 200, 'message' => "User Data", 'data' => $user);
		print_r(json_encode($res));
		die;
	}



	public function updateUser()
	{
		$this->helper->validateInput('post', ['name', 'phone', 'user_id', 'email', 'address']);
		$userID = $_POST['user_id'];
		unset($_POST['user_id']);

		if (isset($_POST['password']) && !empty($_POST['password']))
			$_POST['password'] = sha1($_POST['password']);

		if ($data = $this->db->getDataWithQuery("SELECT * FROM users WHERE id!=$userID AND email='" . $_POST['email'] . "'")) {
			echo "<script>location.href='users?error=EMAIL_TAKEN'</script>";
			die;
		}

		if (!empty($this->db->getDataWithQuery("SELECT * FROM users WHERE id!=$userID AND phone=" . $_POST['phone']))) {
			echo "<script>location.href='users?error=PHONE_TAKEN'</script>";
			die;
		}

		$user = $this->db->updateRow('users', $_POST, 'id', $userID);
		if ($user) {
			echo "<script>location.href='users?success=updated'</script>";
		}
		echo "<script>location.href='users?error=not_updated'</script>";
	}

	public function levels()
	{
		$levels = $this->db->getTable('levels');
		require 'views/dashboard/levels.php';
	}




	public function sendmessage()
	{

		$id = $_POST['id'];
		if (!empty($_POST['message'])) {

			$data['reply_message'] = $_POST['message'];
			$data['reply'] = 1;
		} else if (isset($_POST['message1'])) {
			$data['reply_message'] = $_POST['message1'];
			$data['reply'] = 1;
		} else if (isset($_POST['message2'])) {
			$data['reply_message'] = $_POST['message2'];
			$data['reply'] = 1;
		} else if (isset($_POST['message3'])) {
			$data['reply_message'] = $_POST['message3'];
			$data['reply'] = 1;
		} else if (isset($_POST['message4'])) {
			$data['reply_message'] = $_POST['message4'];
			$data['reply'] = 1;
		} else if (isset($_POST['message5'])) {
			$data['reply_message'] = $_POST['message5'];
			$data['reply'] = 1;
		}
		$messages = $this->db->updateRow('message', $data, 'id', $id);

		if ($messages)
			echo "<script>location.href='messages?success=created'</script>";
		else
			echo "<script>location.href='messages?error=not_created'</script>";
	}



	public function addLevel()
	{

		$this->helper->validateInput('post', ['title', 'amount']);
		$levels = $this->db->insertRow('levels', $_POST);
		if ($levels)
			echo "<script>location.href='levels?success=created'</script>";
		else
			echo "<script>location.href='levels?error=not_created'</script>";
	}


	public function getlevel()
	{
		$this->helper->validateInput('get', ['id']);
		$level = $this->db->getSingleRowIfMatch("levels", 'id', $_GET['id']);
		if ($level)
			$res = array('status' => 200, 'message' => "Level Data", 'data' => $level);
		print_r(json_encode($res));
		die;
	}


	public function updateLevel()
	{
		$this->helper->validateInput('post', ['title', 'amount', 'level_id']);
		$levelID = $_POST['level_id'];
		unset($_POST['level_id']);


		$user = $this->db->updateRow('levels', $_POST, 'id', $levelID);
		if ($user) {
			echo "<script>location.href='levels?success=updated'</script>";
		}
		echo "<script>location.href='levels?error=not_updated'</script>";
	}

	public function changeLevel()
	{

		$this->helper->validateInput('post', ['user_id', 'level_id']);
		$userID = $_POST['user_id'];
		unset($_POST['user_id']);


		$user = $this->db->updateRow('users', $_POST, 'id', $userID);
		if ($user) {
			echo "<script>location.href='users?success=updated'</script>";
		}
		echo "<script>location.href='users?error=not_updated'</script>";
	}

	public function messages()
	{
		$query = "SELECT * FROM users join message on users.id=message.user_id where reply=0";
		$messages = $this->db->getDataWithQuery($query);
		$messgedata = $this->db->getSingleRowIfMatch('settings', 'id', '0', '>');
		require 'views/dashboard/messages.php';
	}


	public function changeautoLevel($id)
	{
		$userdata['level_id'] = 0;
		$query = "SELECT *,count(invitee_id) as totalinvitee  from users where invitee_id=$id AND paid=1";
		$data = $this->db->getDataWithQuery($query);
		if ($data[0]['totalinvitee'] == 2)
			$userdata['level_id'] = 2;
		else if ($data[0]['totalinvitee'] == 5)
			$userdata['level_id'] = 4;
		else if ($data[0]['totalinvitee'] == 9)
			$userdata['level_id'] = 5;
		else if ($data[0]['totalinvitee'] == 14)
			$userdata['level_id'] = 6;
		else if ($data[0]['totalinvitee'] == 20)
			$userdata['level_id'] = 7;
		else if ($data[0]['totalinvitee'] == 27)
			$userdata['level_id'] = 8;
		else if ($data[0]['totalinvitee'] == 35)
			$userdata['level_id'] = 13;
		else if ($data[0]['totalinvitee'] == 44)
			$userdata['level_id'] = 14;

		else if ($data[0]['totalinvitee'] == 54)
			$userdata['level_id'] = 15;
		else if ($data[0]['totalinvitee'] == 65)
			$userdata['level_id'] = 16;
		else if ($data[0]['totalinvitee'] == 77)
			$userdata['level_id'] = 17;
		else if ($data[0]['totalinvitee'] == 90)
			$userdata['level_id'] = 18;
		else if ($data[0]['totalinvitee'] == 104)
			$userdata['level_id'] = 19;
		else if ($data[0]['totalinvitee'] == 119)
			$userdata['level_id'] = 20;
		else if ($data[0]['totalinvitee'] == 135)
			$userdata['level_id'] = 21;
		else if ($data[0]['totalinvitee'] == 152)
			$userdata['level_id'] = 22;
		else if ($data[0]['totalinvitee'] == 170)
			$userdata['level_id'] = 23;
		else if ($data[0]['totalinvitee'] == 189)
			$userdata['level_id'] = 24;
		else if ($data[0]['totalinvitee'] == 209)
			$userdata['level_id'] = 25;
		else if ($data[0]['totalinvitee'] == 230)
			$userdata['level_id'] = 26;
		if ($userdata['level_id'])
			$this->db->updateRow('users', $userdata, 'id', $id);
	}
}
