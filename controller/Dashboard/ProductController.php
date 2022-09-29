<?php
class ProductController
{
	protected $helper;
	protected $custom;
	protected $db;
	function __construct()
	{
		$this->db = new DB();
		$this->custom = new Custom();
		$this->helper = new Helper();
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}


	public function shopProduct()
	{

		$products = $this->db->getTable('products');
		require 'views/dashboard/products.php';
	}

	public function addProduct()
	{

		$this->helper->validateInput('post', ['amount', 'level_id']);

		if (!isset($_FILES['image']['name']))
			redirect('shopProduct?error=FIELDS_REQUIRED');

		$_POST['image'] = $this->helper->uploadFile($_FILES['image'], 'uploads/products');
		$user = $this->db->insertRow('products', $_POST);

		if ($user)
			echo "<script>location.href='shopProduct?success=created'</script>";
		else
			echo "<script>location.href='shopProduct?error=not_created'</script>";
	}

	public function orders()
	{
		$query = "SELECT * from products INNER JOIN orders on products.id=orders.product_id WHERE approved=0 AND rejected=0";
		$orders = $this->db->getDataWithQuery($query);
		require_once 'views/dashboard/orders.php';
	}


	public function approvedorders()
	{
		$query = "SELECT * from products INNER JOIN orders on products.id=orders.product_id WHERE approved=1 ORDER BY orders.id DESC";
		$orders = $this->db->getDataWithQuery($query);
		require_once 'views/dashboard/approvedorders.php';
	}


	public function generatePdf($Id)
	{



		$query = "SELECT * FROM orders WHERE  id=$Id";
		$users = $this->db->getDataWithQuery($query);
		require_once 'views/dashboard/pdf.php';
	}

	public function changeOrderStatus()
	{

		$this->helper->validateInput('get', ['id']);
		$Id = $_GET['id'];
		unset($_GET['id']);
		$_GET['approved'] = 1;
		$orders = $this->db->updateRow('orders', $_GET, 'id', $Id);
		if ($orders) {
			$this->generatePdf($Id);
		}
	}


	public function editproduct()
	{
		$product = $this->db->getSingleRowIfMatch("products", 'id', $_GET['product_id']);
		$levels=$this->db->getTable('levels');
		require_once 'views/dashboard/edit-product.php';
	}


	public function RejectOrder()
	{

		$this->helper->validateInput('get', ['id']);
		$Id = $_GET['id'];
		unset($_GET['id']);
		$_GET['rejected'] = 1;
		$orders = $this->db->updateRow('orders', $_GET, 'id', $Id);
		if ($orders) {
			echo "<script>location.href='orders?success=updated'</script>";
		}
		echo "<script>location.href='orders?error=not_updated'</script>";
	}



	public function deleteProduct()
	{

		$this->helper->validateInput('post', ['Id']);
		$ID = $_POST['Id'];
		unset($_POST['Id']);

		$product = $this->db->deleteRow('products', 'id', $ID);
		if ($product) {
			echo "successful";
		} else
			echo "unsuccessful";
	}

	public function productadd()
	{
		$levels=$this->db->getTable('levels');
		require_once 'views/dashboard/add-product.php';
	}



	public function updateProduct()
	{
		$this->helper->validateInput('post', ['amount', 'product_id', 'level_id']);
		$productID = $_POST['product_id'];
		unset($_POST['product_id']);
		$product = $this->db->getSingleRowIfMatch('products', 'id', $productID);
		if (empty($product))
			die("<h1>Product Not Found</h1>");
		$oldThumbnail = $product['image'];

		if (isset($_FILES['thumbnail_img']['name']) && $_FILES['thumbnail_img']['name'])
			$_POST['image'] = $this->helper->uploadFile($_FILES['thumbnail_img'], 'uploads/products');

		$product = $this->db->updateRow('products', $_POST, 'id', $productID);
		if ($product) {
			if (isset($_POST['image']) && $oldThumbnail && file_exists($oldThumbnail))
				unlink($oldThumbnail);

			echo "<script>location.href='shopProduct?success=updated'</script>";
		}
		echo "<script>location.href='shopProduct?error=not_updated'</script>";
	}
}
