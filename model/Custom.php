<?php
class Custom
{
    protected $db;
    protected $response;
	function __construct()
	{
	    $this->db=new DB();
	    $this->conn=$this->db->getConnection();
	}
	
	public function getWebStats(){
		  $query=" Select  Count(id) as count FROM users AS t
			UNION ALL 
			Select  Count(id) as count FROM products AS t
			
			";
			$data = $this->db->getDatawithQuery($query);
			$res=[];
			if($data)
			{
				$res['total_users']=$data[0]['count'];
				$res['total_products']=$data[1]['count'];
			}
			return $res;
	 }
	
	public function returnProducts($id=null,$id_type="product"){
		$WHERE=' WHERE published=1';
		if($id && is_numeric($id))
			$WHERE=" AND products.id=$id ";
			
	    $query=" SELECT products.*,categories.name AS category,sub_categories.name AS sub_category
	    from products 
	    INNER JOIN categories ON categories.id=products.category_id
	    INNER JOIN sub_categories ON sub_categories.id=products.subcategory_id
		$WHERE
		ORDER BY products.id 
		DESC LIMIT 300";
		$products=$this->db->getDataWIthQuery($query);
		if($id && is_numeric($id) && isset($products[0]))
			return $products[0];
		return $products;
	}
	
	
	public function postDislike($postID,$userID){
		 $query="DELETE from likes WHERE post_id=? AND user_id=?";
		 $stmt = $this->conn ->prepare($query) or die($this->conn -> error);
		 $val[0]=
		 $stmt -> bind_param("ii",$postID,$userID)or die($this->conn -> error);
		 $stmt->execute();
		 if($this->conn->affected_rows>0)
			 return true;
		 else
			 return false;
	}
	
	public function returnOrders($id=null,$type="order")
	{
		$col="orders.id";
		if($type=="user")
			$col="user_id";
		elseif(!$id)
		{
			$col=1;
			$id=1;
		}
		
	
		 $query="SELECT orders.*,users.name,users.phone,users.address,photo,users.status as user_status
			 FROM orders 
			 INNER JOIN users on users.id=orders.user_id 
			 WHERE $col=? ORDER BY orders.id DESC LIMIT 200
		";
		$orders=$this->db->getDataWithQuery($query,array($id),'i');
		
		if(!empty($orders) && is_array($orders))
		{

			for($i=0;$i<sizeof($orders); $i++)
			{
				//check if payment has been done
				$orders[$i]['paid']=0;
				$query='SELECT * FROM payments WHERE order_id=? AND user_id=? ORDER BY id DESC LIMIT 1';
				$payment=$this->db->getDataWIthQuery($query,array($orders[$i]['id'],$orders[$i]['user_id']),'ii');
				
				if(!empty($payment) && isset($payment[0]))
				{
					$orders[$i]['payment']=$payment[0];
					$orders[$i]['paid']=1;
				}
				
				$orders[$i]['cart_ids']=explode(',',$orders[$i]['cart_ids']);
				foreach($orders[$i]['cart_ids'] as $id)
				$ids[]=$id;
			}
			//remove duplicate ids from array
			$cartIDs=array_unique($ids,SORT_REGULAR);
	
			//SELECT cart items with produc details
			 $query="SELECT cart.*,thumbnail_img,name,category_id,unit_price,discount
				FROM cart 
				INNER JOIN products on products.id=cart.product_id
				WHERE cart.id IN (".implode(',',$cartIDs).") 
				ORDER BY cart.id ASC
			 ";
			 $items=$this->db->getDataWithQuery($query);
			 
			 for($i=0;$i<sizeof($orders); $i++)
			{
				$j=0; $orders[$i]['sub_total']=0;
				$orders[$i]['discount']=0; $orders[$i]['total']=0;
				foreach($items as $item)
				{
					if(in_array($item['id'],$orders[$i]['cart_ids']))
					{
						$orders[$i]['cart_items'][$j]=$item;
						$j++;
						$orders[$i]['sub_total']+=$item['unit_price']*$item['qty'];
						$orders[$i]['discount']+=round(($item['discount']/100)*($item['unit_price']*$item['qty']),0);
					}
				}
				$orders[$i]['total']=$orders[$i]['sub_total']-$orders[$i]['discount'];
				unset($orders[$i]['cart_ids']);
			}
			
		}
		if($type=="order" && sizeof($orders)==1)
			return $orders[0];
		//echo "<pre>"; print_r($orders); die;
		return $orders;
	}
	
	
}
