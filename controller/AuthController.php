<?php
class AuthController extends Controller
{


	public function login()
	{
		$this->helper->validateInput('POST', ['email', 'password']);
		$_POST['password'] = sha1($_POST['password']);


		$query = "SELECT * from users where email=? AND password=? LIMIT 1";
		$user = $this->db->getDataWithQuery($query, [$_POST['email'], $_POST['password']], 'ss');

		if (isset($user[0]) && $user[0]) {
			if ($user[0]['status'] == 0) {
				echo "<script>location.href='login?error=Blocked_Account'</script>";
				die;
			} else if ($user[0]['deleted'] == 1) {
				echo "<script>location.href='login?error=Deleted_Account'</script>";
				die;
			}



			$_SESSION['user_id'] = $user[0]['id'];
			$_SESSION['user_name'] = $user[0]['name'];
			$_SESSION['user_email'] = $user[0]['email'];
			$_SESSION['account_name'] = $user[0]['account_name'];
			if ($user[0]['paid'] == 1) {
				$_SESSION['paid'] = $user[0]['paid'];
			}
			header('location:home');
		} else
			header('location:login?error=INVALID_CREDENTIALS');
	}

	public function logout($message = NULL)
	{
		if (isset($_SESSION['user_id']))
			unset($_SESSION['user_id']);
		if (isset($_SESSION['user_name']))
			unset($_SESSION['user_name']);
		if (isset($_SESSION['user_email']))
			unset($_SESSION['user_email']);
		if (isset($_SESSION['account_name']))
			unset($_SESSION['account_name']);
		if (isset($_SESSION['paid']))
			unset($_SESSION['paid']);
		session_destroy();
		if (!$message)
			header('location:login');
		else
			header("location:login?success=$message");
	}

	public function register()
	{

		if (strtolower($_SERVER['REQUEST_METHOD']) != "post") {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				if (!is_numeric($id))
					$id = $this->helper->encrypt_decrypt($id, 'decrypt');
				if (!is_numeric($id))
					die("<h1>Invalid Invite ID</h1>");
				$invitee = $this->db->getSingleRowIfMatch('users', 'id', $id);
			}
			require_once 'views/signup.php';
			die;
		}

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

		//echo $_POST['invitee_id'];die;
		if (isset($_POST['invitee_id']) and $data = $this->db->exist("users", 'email', $_POST['email'])) {
			$id = $this->helper->encrypt_decrypt($_POST['invitee_id'], 'encrypt');
			$link = "invite?id=$id&error=EMAIL TAKEN";
			echo "<script>location.href='$link'</script>";
			die;
		}

		else if (!isset($_POST['invitee_id']) and $data = $this->db->exist("users", 'email', $_POST['email'])) {

			echo "<script>location.href='signup?error=EMAIL TAKEN'</script>";
			die;
		}



		$this->helper->validateInput('POST', ['email', 'password', 'name', 'confirm_password', 'gender', 'phone', 'account_name']);



		if (isset($_POST['invitee_id']) && !is_numeric($_POST['invitee_id'])) {
			echo "<script>location.href='signup?error=INVALID_INVITEE'</script>";
			die;
		}


		unset($_POST['confirm_password']);
		$seid = 1;
		$setting = $this->db->getSingleRowIfMatch('settings', 'id', $seid);
		$_POST['password'] = sha1($_POST['password']);
		$_POST['min_amount'] = $setting['amount'];
		$_POST['created_at'] = date("Y-m-d H-i-s");
		$_POST['updated_at'] = date("Y-m-d H-i-s");
		$_POST['paid'] = 0;
		$user = $this->db->insertRow('users', $_POST);
		if ($user) {
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['user_name'] = $user['name'];
			$_SESSION['user_email'] = $user['email'];
			$_SESSION['account_name'] = $user['account_name'];
			$_SESSION['paid'] = $user['paid'];


			if ($user['paid'] == 0) {
				echo "<script>location.href='about?success=Login SuccessFully'</script>";
			}
			echo "<script>location.href='login?success=created'</script>";
		} else
			echo "<script>location.href='login?error=not_created'</script>";
	}

	public function updatePassword()
	{
		if ($_POST['new_password'] != $_POST['confirm_password'])
			echo "<script>location.href='index?error=PASSWORD_MISMATCH'</script>";

		$query = " SELECT * FROM admins WHERE id=" . $_SESSION['owl_admin_id'] . " AND password='" . sha1($_POST['old_password']) . "'";
		$admin = $this->db->getDataWithQuery($query);
		if ($admin && isset($admin[0])) {
			$this->db->updateRow("admins", ['password' => sha1($_POST['new_password'])], 'id', $_SESSION['horizam_admin_id']);
			$this->logout("PASSWORD_UPDATED");
		} else
			echo "<script>location.href='index?error=INCORRECT_OLD_PASSWORD'</script>";
	}

	public function checkEMail()
	{
		$email = $_GET['email'];
		if ($data = $this->db->exist("users", 'email', $email)) {
			echo json_encode(['status' => 200, 'message' => 'already email', 'data' => '']);
			die;
		} else {
			echo json_encode(['status' => 200, 'message' => 'Not already email', 'data' => '']);
			die;
		}
	}

	public function forgetpassword()
	{
		if (strtolower($_SERVER['REQUEST_METHOD']) != "post") {
			require_once 'views/forgot-password.php';
			die;
		}

		$email = $_POST['email'];
		$user = $this->db->getSingleRowIfMatch('users', 'email', $email);
		if (!$user) {
			echo "<script>location.href='forgetpassword?error=EMAIL_NOT_FOUND'</script>";
			die;
		}

		$this->email->sendForgetPasswordEmail($email);
		echo "<script>location.href='forgetpassword?success=FORGET_EMAIL_SENT'</script>";
		die;
	}

	public function resetPassword()
	{

		if (!isset($_GET['email']) || !isset($_GET['token']))
			die(" Illegal  Request");
		if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
			die("Invalid Email");


		$token = $this->db->getSingleRowIfMatch('reset_tokens', 'email', $_GET['email']);
		if (!$token) {
			echo "<script>location.href='forgetpassword?error=NOT_Authorized'</script>";
			die;
		}

		if ($token['token'] != $_GET['token']) {
			echo "<script>location.href='forgetpassword?error=Invalid_Token'</script>";
			die;
		}

		if ($token['expiry'] < time()) {
			echo "<script>location.href='forgetpassword?error=Expired_Token'</script>";
			die;
		}


		if (strtolower($_SERVER['REQUEST_METHOD']) != "post") {
			require_once 'views/resetpassword.php';
			die;
		}

		if (isset($_POST['password']) && isset($_POST['password_confirmation']) && !empty($_POST['password'])) {
			if (strlen($_POST['password']) < 8)
				$error = "Password should atleast be 8 Characters";
			else {

				if ($_POST['password'] != $_POST['password_confirmation']) {
					echo "<script>location.href='forgetpassword?error=PASSWORD_MISMATCH'</script>";
					die;
				} else {
					$update['password'] = sha1($_POST['password']);
					if ($this->db->updateRow('users', $update, 'email', $_GET['email'])) {
						$this->db->deleteRow("reset_tokens", 'id', $token['id']);
						echo "<script>location.href='login?success=PASSWORD_UPDATED'</script>";
						die;
					} else
						echo "<script>location.href='forgetpassword?error=NOT_PASSWORD_UPDATED'</script>";
					die;
				}
			}
		}
	}
}
