<?php
class DashboardController
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
		date_default_timezone_set("Asia/Karachi");
		$date = date('y-m-d');
		$query = " Select  count(*) as totaluser FROM users WHERE paid=1 and txtid_rejected=0 AND deleted=0";
		$totaluser = $this->db->getDatawithQuery($query);
		$query = " Select  Count(*) as newuser FROM users WHERE paid=0 AND txtid_rejected=0 AND deleted=0";
		$newuser = $this->db->getDatawithQuery($query);
		$query = " Select  Count(*) as rejuser FROM users WHERE paid=0 AND txtid_rejected=1 AND deleted=0";
		$rejuser = $this->db->getDatawithQuery($query);
		$query = " Select  Count(*) as totalproduct FROM products";
		$totalproduct = $this->db->getDatawithQuery($query);
		$query = " Select  sum(totalwithdraw) as totalwithdraw FROM users";
		$totalwithdraw = $this->db->getDatawithQuery($query);
		$query = " Select  count(id) as totalreceived FROM users WHERE paid=1";
		$totalreceived = $this->db->getDatawithQuery($query);
		$query = "SELECT count(id) as dailyreceived  FROM users WHERE paid=1  AND approved_date='" . $date . "'";
		$dailyreceived = $this->db->getDatawithQuery($query);
		
		$query = " Select  sum(amount) as dailywithdraw FROM payments_request where  payments_request.payment_approved=1 and  DATE(created_at)='" . $date . "'";
		$dailywithdraw = $this->db->getDatawithQuery($query);
		$query = "SELECT users.invitee_id,users2.name,users2.phone,users2.level_id ,users2.email, COUNT(users.invitee_id) as totateam 
			FROM users 
			INNER JOIN users as users2 ON users.invitee_id=users2.id where users.paid=1			
			GROUP BY users.invitee_id HAVING totateam > 0 ORDER BY totateam DESC limit 200";


		$totalteams = $this->db->getDatawithQuery($query);
		//echo "<pre>"; print_r($totalteams); die;
		$query = " Select * FROM settings";
		$setting = $this->db->getDatawithQuery($query);
		include "views/dashboard/index.php";
	}


	public function settings()
	{

		$settings = $this->db->getSingleRowIfMatch('settings', 'id', '0', '>');
		include "views/dashboard/settings.php";
	}


	public function sliders()
	{
		$query = "SELECT * FROM categories INNER JOIN slider ON slider.category_id=categories.id";
		$sliders = $this->db->getDataWithQuery($query);
		include "views/dashboard/sliders.php";
	}

	public function brands()
	{
		$query = "SELECT * FROM brands";
		$brands = $this->db->getDataWithQuery($query);
		include "views/dashboard/brands.php";
	}

	public function banners()
	{
		$banners = $this->db->getMultipleRowsIfMatch('banners', 'active', 1);
		for ($i = 0; $i < sizeof($banners); $i++) {
			if (empty($banners[$i]['name']) && $banners[$i]['category_id'] < 9980) {
				$category = $this->db->getSingleRowIfMatch('categories', 'id', $banners[$i]['category_id']);

				$banners[$i]['name'] = $category['category_name'];
			}
		}
		include "views/dashboard/banners.php";
	}

	public function addsliders()
	{
		$query = "SELECT * FROM categories";
		$categories = $this->db->getDataWithQuery($query);
		include "views/dashboard/addslider.php";
	}

	public function addbanners()
	{
		$query = "SELECT * FROM categories";
		$categories = $this->db->getDataWithQuery($query);
		include "views/dashboard/addbanners.php";
	}

	public function addbrands()
	{

		include "views/dashboard/addbrands.php";
	}

	public function addsettings()
	{

		include "views/dashboard/addsettings.php";
	}

	public function clearextradata()
{
	
	 $oneWeeklyAgo = new \DateTime('1 week ago');
     $weeklydate=$oneWeeklyAgo->format('Y-m-d H:i:s');
	 $query = "DELETE FROM users where created_at < '$weeklydate' and paid=0";
	 $users = $this->db->deleteDataWIthQuery($query);
	 $query = "DELETE  FROM dailytask where udate < '$weeklydate'";
	 $reward = $this->db->deleteDataWIthQuery($query);
	 $query = "DELETE FROM reset_tokens where created_at < '$weeklydate' ";
	 $tokens = $this->db->deleteDataWIthQuery($query);
	 echo "<script>location.href='dashboard?success=updated'</script>";

}




	public function updateSetting()
	{
		$this->helper->validateInput('post', ['email', 'phone', 'setting_id', 'footer']);
		$settingID = $_POST['setting_id'];
		unset($_POST['setting_id']);
		if (!isset($_FILES['logo']['name']))
			redirect('settings?error=FIELDS_REQUIRED');
		if (!empty($_FILES['logo']['name']))
			$_POST['logo'] = $this->helper->uploadFile($_FILES['logo'], 'uploads/logo');
		if (!empty($_FILES['about']['name']))
			$_POST['about'] = $this->helper->uploadFile($_FILES['about'], 'uploads/logo');
		$setting = $this->db->getSingleRowIfMatch('settings', 'id', $settingID);
		$oldThumbnail = $setting['logo'];
		if (isset($_POST['logo']) && $oldThumbnail && file_exists($oldThumbnail))
			unlink($oldThumbnail);
			print_r($_POST);die;
		$setting = $this->db->updateRow('settings', $_POST, 'id', $settingID);
		if ($setting) {
			echo "<script>location.href='settings?success=updated'</script>";
		}
		echo "<script>location.href='settings?error=not_updated'</script>";
	}

	public function updateBanner()
	{

		$bannerID = $_POST['banner_id'];
		unset($_POST['banner_id']);
		if (!isset($_FILES['banner']['name']))
			redirect('banners?error=FIELDS_REQUIRED');
		if (!empty($_FILES['banner']['name']))
			$_POST['image'] = $this->helper->uploadFile($_FILES['banner'], 'uploads/banners');

		if ($_POST['category_id'] == 9999)
			$_POST['name'] = "All Discounted Products";
		else if ($_POST['category_id'] == 9998)
			$_POST['name'] = "Upto 50% off";
		else if ($_POST['category_id'] == 9997)
			$_POST['name'] = "Upto 40% off";
		else if ($_POST['category_id'] == 9996)
			$_POST['name'] = "Upto 30% off";
		else if ($_POST['category_id'] == 9995)
			$_POST['name'] = "Upto 20% off";
		else if ($_POST['category_id'] == 9994)
			$_POST['name'] = "Upto 10% off";

		$banner = $this->db->getSingleRowIfMatch('banners', 'id', $bannerID);
		$oldThumbnail = $banner['image'];
		if (isset($_POST['banner']) && $oldThumbnail && file_exists($oldThumbnail))
			unlink($oldThumbnail);
		$brand = $this->db->updateRow('banners', $_POST, 'id', $bannerID);
		if ($banner) {

			echo "<script>location.href='banners?success=updated'</script>";
		}
		echo "<script>location.href='banners?error=not_updated'</script>";
	}




	public function updateBrand()
	{

		$brandID = $_POST['brand_id'];
		unset($_POST['brand_id']);
		if (!isset($_FILES['brand']['name']))
			redirect('sliders?error=FIELDS_REQUIRED');
		if (!empty($_FILES['brand']['name']))
			$_POST['image'] = $this->helper->uploadFile($_FILES['brand'], 'uploads/brands');
		$brand = $this->db->getSingleRowIfMatch('brands', 'id', $brandID);
		$oldThumbnail = $brand['image'];
		if (isset($_POST['brand']) && $oldThumbnail && file_exists($oldThumbnail))
			unlink($oldThumbnail);
		$brand = $this->db->updateRow('brands', $_POST, 'id', $brandID);
		if ($brand) {
			echo "<script>location.href='brands?success=updated'</script>";
		}
		echo "<script>location.href='brands?error=not_updated'</script>";
	}


	public function updateSlider()
	{
		$this->helper->validateInput('post', ['text', 'heading', 'category_id', 'slider_id']);
		$sliderID = $_POST['slider_id'];
		unset($_POST['slider_id']);
		if (!isset($_FILES['slider']['name']))
			redirect('sliders?error=FIELDS_REQUIRED');
		if (!empty($_FILES['slider']['name']))
			$_POST['image'] = $this->helper->uploadFile($_FILES['slider'], 'uploads/sliders');
		$slider = $this->db->getSingleRowIfMatch('slider', 'id', $sliderID);
		$oldThumbnail = $slider['image'];
		if (isset($_POST['slider']) && $oldThumbnail && file_exists($oldThumbnail))
			unlink($oldThumbnail);
		$slider = $this->db->updateRow('slider', $_POST, 'id', $sliderID);
		if ($slider) {
			echo "<script>location.href='sliders?success=updated'</script>";
		}
		echo "<script>location.href='sliders?error=not_updated'</script>";
	}



	public function addbannersdata()
	{

		if (!isset($_FILES['banners']['name']) || !$_FILES['banners']['name'])
			redirect('sliders?error=FIELDS_REQUIRED');
		$_POST['image'] = $this->helper->uploadFile($_FILES['banners'], 'uploads/banners');

		if ($_POST['category_id'] == 9999)
			$_POST['name'] = "All Discounted Products";
		else if ($_POST['category_id'] == 9998)
			$_POST['name'] = "Upto 50% off";
		else if ($_POST['category_id'] == 9997)
			$_POST['name'] = "Upto 40% off";
		else if ($_POST['category_id'] == 9996)
			$_POST['name'] = "Upto 30% off";
		else if ($_POST['category_id'] == 9995)
			$_POST['name'] = "Upto 20% off";
		else if ($_POST['category_id'] == 9994)
			$_POST['name'] = "Upto 10% off";

		$banners = $this->db->insertRow('banners', $_POST);
		if ($banners)
			echo "<script>location.href='banners?success=created'</script>";
		else
			echo "<script>location.href='banners?error=not_created'</script>";
	}


	public function addbranddata()
	{

		if (!isset($_FILES['brand']['name']))
			redirect('sliders?error=FIELDS_REQUIRED');
		$_POST['image'] = $this->helper->uploadFile($_FILES['brand'], 'uploads/brands');
		$brand = $this->db->insertRow('brands', $_POST);
		if ($brand)
			echo "<script>location.href='brands?success=created'</script>";
		else
			echo "<script>location.href='brands?error=not_created'</script>";
	}


	public function addsliderdata()
	{
		$this->helper->validateInput('post', ['text', 'heading', 'category_id']);
		if (!isset($_FILES['slider']['name']))
			redirect('sliders?error=FIELDS_REQUIRED');
		$_POST['image'] = $this->helper->uploadFile($_FILES['slider'], 'uploads/sliders');
		$slider = $this->db->insertRow('slider', $_POST);
		if ($slider)
			echo "<script>location.href='sliders?success=created'</script>";
		else
			echo "<script>location.href='sliders?error=not_created'</script>";
	}


	public function addsettingdata()
	{

		$this->updateminwithdraw($_POST['amount']);
		$settingID = $_POST['setting_id'];
		unset($_POST['setting_id']);
		if (!isset($_FILES['logo']['name']))
			redirect('settings?error=FIELDS_REQUIRED');
		if (!empty($_FILES['logo']['name']))
			$_POST['logo'] = $this->helper->uploadFile($_FILES['logo'], 'uploads/logo');
		if (!empty($_FILES['about']['name']))
			$_POST['about'] = $this->helper->uploadFile($_FILES['about'], 'uploads/about');


		$setting = $this->db->getSingleRowIfMatch('settings', 'id', $settingID);
		$oldThumbnail = $setting['logo'];
		if (isset($_POST['logo']) && $oldThumbnail && file_exists($oldThumbnail))
			unlink($oldThumbnail);
		$setting = $this->db->updateRow('settings', $_POST, 'id', $settingID);
		if ($setting) {
			echo "<script>location.href='settings?success=updated'</script>";
		}
		echo "<script>location.href='settings?error=not_updated'</script>";
	}

	public function updateminwithdraw($amount)
	{
		$data['min_amount'] = $amount;
		$query = "SELECT * from users";
		$users = $this->db->getDataWithQuery($query);
		foreach ($users as $user) {
			$id = $user['id'];
			$this->db->updateRow('users', $data, 'id', $id);
		}
	}



	public function addUser()
	{

		$this->helper->validateInput('post', ['name', 'phone', 'email', 'address']);
		if ($data = $this->db->exist("users", 'email', $_POST['email'])) {
			echo "<script>location.href='users?error=Email_TAKEN'</script>";
			die;
		}
		if ($data = $this->db->exist("users", 'phone', $_POST['phone'])) {
			echo "<script>location.href='users?error=Phone_TAKEN'</script>";
			die;
		}
		$user = $this->db->insertRow('users', $_POST);
		if ($user)
			echo "<script>location.href='users?success=created'</script>";
		else
			echo "<script>location.href='users?error=not_created'</script>";
	}


	public function updateUser()
	{

		$this->helper->validateInput('post', ['name', 'phone', 'user_id', 'email', 'address']);

		$userID = $_POST['user_id'];
		unset($_POST['user_id']);
		$user = $this->db->updateRow('users', $_POST, 'id', $userID);
		if ($user) {
			echo "<script>location.href='users?success=updated'</script>";
		}
		echo "<script>location.href='users?error=not_updated'</script>";
	}


	public function blockunblockUser()
	{
		$id = $_POST['blockID'];
		$user['status'] = $_POST['status'];
		if ($this->db->updateRow('users', $user, 'id', $id))
			echo $_POST['status'];
		else
			echo 'unsuccessful';
	}


	public function getslider()
	{
		$this->helper->validateInput('get', ['id']);
		$slider = $this->db->getSingleRowIfMatch("slider", 'id', $_GET['id']);
		if ($slider)
			$res = array('status' => 200, 'message' => "Slider Data", 'data' => $slider);
		print_r(json_encode($res));
		die;
	}


	public function getBrand()
	{
		$this->helper->validateInput('get', ['id']);
		$brands = $this->db->getSingleRowIfMatch("brands", 'id', $_GET['id']);
		if ($brands)
			$res = array('status' => 200, 'message' => "Brand Data", 'data' => $brands);
		print_r(json_encode($res));
		die;
	}


	public function getBanner()
	{
		$this->helper->validateInput('get', ['id']);
		$banners = $this->db->getSingleRowIfMatch("banners", 'id', $_GET['id']);
		if ($banners)
			$res = array('status' => 200, 'message' => "Brand Data", 'data' => $banners);
		print_r(json_encode($res));
		die;
	}


	public function getSetting()
	{
		$this->helper->validateInput('get', ['id']);
		$setting = $this->db->getSingleRowIfMatch("settings", 'id', $_GET['id']);
		if ($setting)
			$res = array('status' => 200, 'message' => "Settting Data", 'data' => $setting);
		print_r(json_encode($res));
		die;
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


	public function deleteUser()
	{

		$this->helper->validateInput('post', ['userId']);
		$userID = $_POST['userId'];
		unset($_POST['userId']);
		$users = $this->db->deleteRow('users', 'id', $userID);
		if ($users) {
			echo "1";
		} else
			echo "0";
	}
}
