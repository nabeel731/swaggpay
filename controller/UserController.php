<?php
class UserController extends Controller
{



	public function aboutus()
	{
		$settings = $this->db->getSingleRowIfMatch('settings', 'id', '0', '>');
		include "views/about_us.php";
	}

	public function monthly_salary()
	{
		$userID = $_SESSION['user_id'];
		$query = "Select  count(*) as totaluser FROM users WHERE paid=1 and invitee_id=$userID and  approved_date>='2022-04-01'";
		$totaluser = $this->db->getDatawithQuery($query);
		include "views/monthly_salary.php";
	}

	public function dailytask()
	{
		$userID = $_SESSION['user_id'];
		$date = date('Y-m-d');
		//echo $date; 
		//echo " ";echo  $ldate;die;

		$query = "SELECT *,count(id) as total  FROM users where invitee_id=$userID  AND paid=1 AND approved_date='$date'";
		$team = $this->db->getDataWithQuery($query);
		//print_r($team);die;
		include "views/dailytask.php";
	}

	public function earnmoney()
	{
		$userID = $_SESSION['user_id'];
		$data['user_id'] = $userID;
		$data['task_id'] = $_POST['Id'];
		$date = date('Y-m-d');
		$data['udate'] = $date;
		$task_id = $_POST['Id'];

		$query = "SELECT * FROM dailytask  WHERE  user_id=$userID and  task_id=$task_id and  udate='$date'";
		$todaytask = $this->db->getDataWithQuery($query);

		if (empty($todaytask)) {
			$this->db->insertRow('dailytask', $data);
			$profile = $this->db->getSingleRowIfMatch('users', 'id', $userID);
			$userdata['current_amount'] = $profile['current_amount'] + 50;
			$profile = $this->db->updateRow('users', $userdata, 'id', $userID);
			if ($profile)
				echo "successful";
			else
				echo "unsuccessful";
		} else
			echo "alreadycollect";
	}


	public function message()
	{
		$id = $_SESSION['user_id'];
		if (isset($_POST['level_id'])) {
			unset($_POST['level_id']);
		}

		if (isset($_POST['current_amount'])) {
			unset($_POST['current_amount']);
		}

		if (isset($_POST['min_amount'])) {
			unset($_POST['min_amount']);
		}
		$query = "SELECT * FROM message WHERE reply=0 AND  user_id=$id";
		$messagecheck = $this->db->getDataWithQuery($query);
		if ($messagecheck) {
			echo "<script>location.href='contactus?error=MESSAGE_ALREADY'</script>";
			die;
		}
		$_POST['user_id'] = $_SESSION['user_id'];
		$_POST['reply_message'] = "Not Reply";
		$user = $this->db->insertRow('message', $_POST);
		if ($user)
			echo "<script>location.href='contactus?success=created'</script>";
		else
			echo "<script>location.href='contactus?error=not_created'</script>";
	}




	public function profile()
	{
		$userID = $_SESSION['user_id'];
		$query = "SELECT * FROM levels inner join users on users.level_id=levels.id where users.id=$userID ";
		$users = $this->db->getDataWithQuery($query);
		include "views/profile.php";
	}


	public function messages()
	{
		$userid = $_SESSION['user_id'];
		$query = "SELECT * FROM message WHERE user_id=$userid ORDER BY id DESC";
		$messages = $this->db->getDataWithQuery($query);
		include "views/messages.php";
	}


	public function team()
	{
		$userid = $_SESSION['user_id'];
		$query = "SELECT * FROM users WHERE invitee_id=$userid AND paid=1";
		$team = $this->db->getDataWithQuery($query);
		$query = "SELECT count(*) as totalteam  FROM users WHERE invitee_id=$userid AND paid=1";
		$totalteam = $this->db->getDataWithQuery($query);
		include "views/team.php";
	}

	public function nextteam()
	{
		$userid = $_GET['id'];
		$query = "SELECT * FROM users WHERE invitee_id=$userid AND paid=1";
		$team = $this->db->getDataWithQuery($query);
		$query = "SELECT count(*) as totalteam FROM users WHERE invitee_id=$userid AND paid=1";
		$totalteam = $this->db->getDataWithQuery($query);
		include "views/team.php";
	}





	public function updateprofile()
	{
		$userID = $_SESSION['user_id'];

		if (isset($_POST['level_id'])) {
			unset($_POST['level_id']);
		}

		if (isset($_POST['current_amount'])) {
			unset($_POST['current_amount']);
		}

		if (isset($_POST['min_amount'])) {
			unset($_POST['min_amount']);
		}

		if (isset($_POST['paid'])) {
			unset($_POST['paid']);
		}

		if (isset($_POST['status'])) {
			unset($_POST['status']);
		}

		if (!empty($_FILES['profile']['name']))
			$_POST['profile'] = $this->helper->uploadFile($_FILES['profile'], 'uploads/profile');
		$profile = $this->db->getSingleRowIfMatch('users', 'id', $userID);
		$oldThumbnail = $profile['profile'];
		if (isset($_POST['profile']) && $oldThumbnail && file_exists($oldThumbnail))
			unlink($oldThumbnail);
		$profile = $this->db->updateRow('users', $_POST, 'id', $userID);
		if ($profile) {

			echo "<script>location.href='profile?success=updated'</script>";
		}
		echo "<script>location.href='profile?error=not_updated'</script>";
	}

	public function about()
	{

		$user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);
		$settings = $this->db->getSingleRowIfMatch('settings', 'id', '0', '>');
		include "views/about.php";
	}

	public function CollectReward()
	{

		date_default_timezone_set("Asia/Karachi");
		$product_id = $_GET['id'];
		$userID = $_SESSION['user_id'];
		$todaydate = date("Y-m-d");
		$rewarddata['user_id'] = $userID;
		$rewarddata['task_id'] = $product_id;
		$rewarddata['udate'] = $todaydate;
		echo  $_SESSION['user_id'];die;
		$user = $this->db->getSingleRowIfMatch('users', 'id', $_SESSION['user_id']);
		$query = "SELECT * FROM dailytask WHERE task_id=$product_id AND udate='$todaydate'";
		$totalcollect = $this->db->getDataWithQuery($query);
		if ($totalcollect) {
			echo json_encode(['status' => 200, 'message' => 'already collect', 'data' => '']);
			die;
		} else if ($user['last_date'] < $todaydate) {
			echo json_encode(['status' => 200, 'message' => '20 days already', 'data' => '']);
			die;
		}
		$this->db->insertRow('dailytask', $rewarddata);
		$reward = $this->db->getSingleRowIfMatch('products', 'id', $product_id);
		
		$totalreward['current_amount'] = $user['current_amount'] + $reward['amount'];
		$update = $this->db->updateRow('users', $totalreward, 'id', $userID);
		echo json_encode(['status' => 200, 'message' => 'successful', 'data' => '']);
	}



	public function  complaint()
	{
		include "views/complaint.php";
	}

	public function  contactus()
	{
		include "views/comingsoon.php";
	}

	public function temsandcondition()
	{
		$settings = $this->db->getSingleRowIfMatch('settings', 'id', '0', '>');
		include "views/temsandcondition.php";
	}
}
