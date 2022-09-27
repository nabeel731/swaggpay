<?php
class ProductController extends Controller
{
	
	public function products()
	{
		$userID = $_SESSION['user_id'];
		
		if(isset($_GET['q']))
		{
			$q=addslashes($_GET['q']);
			$query="SELECT * FROM products WHERE name LIKE? OR description LIKE?";
			$vals[0]="%$q%";
			$vals[1]="%$q%";
			$products=$this->db->getDataWithQuery($query,$vals,'ss');
			require_once'views/products.php';
			die;
		}
		$user=$this->db->getSingleRowIfMatch("users", 'id', $userID);
		$level=$user['level_id'];
		$query="SELECT * FROM products where level_id=$level";
		 $products=$this->db->getDataWithQuery($query);
		require_once'views/products.php';
	}
	
	public function product_detail()
	{
		
		$id=$_GET['id'];
		$query="SELECT * FROM products where id=$id";
		 $products=$this->db->getDataWithQuery($query);
		require_once'views/productdetail.php';
	}
	public function orders()
	{
	$this->helper->validateInput('post',['name','phone','address']);
	
	if(isset($_POST['level_id']))
		{
			unset($_POST['level_id']);
		}
		
		if(isset($_POST['current_amount']))
		{
			unset($_POST['current_amount']);
		}
		
		if(isset($_POST['min_amount']))
		{
			unset($_POST['min_amount']);
		}
		$userID=$_SESSION['user_id'];
		$product=$this->db->getSingleRowIfMatch('products','id',$_POST['product_id']);
		
		$productprice= $product['amount']*$_POST['quantity'];
		$user=$this->db->getSingleRowIfMatch('users','id',$_SESSION['user_id']);
		if($user['current_amount']<$productprice)
		{
		echo "<script>location.href='products?error=insuficent_balance'</script>";
		die;	
		}

		  if(strlen($_POST['phone'])!=11)
		 {
			echo "<script>location.href='products?error=INVALID_PHONE'</script>";
			die;
		 }
	$_POST['user_id']=$_SESSION['user_id'];
		$orders=$this->db->insertRow('orders',$_POST);
		$users['current_amount']=$user['current_amount']-$productprice;
		
		if($orders)
		{
			$this->db->updateRow('users',$users,'id',$userID);
			
			echo "<script>location.href='products?success=created'</script>";
		}
		else
		echo "<script>location.href='products?error=not_created'</script>";	
	 
	
	
	
}
}
