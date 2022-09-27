<?php 
if(isset($_SESSION['user_id']))
$user=$this->db->getSingleRowIfMatch('users','id',$_SESSION['user_id']);
if(isset($_SESSION['user_id'])){
	$id=$_SESSION['user_id'];
	$query="SELECT * FROM users inner join levels on users.level_id=levels.id  WHERE users.id=$id";
		 $levels=$this->db->getDataWithQuery($query);
		 $query="select * FROM settings";
		 $settings=$this->db->getDataWithQuery($query);
		 //echo "<pre>";print_r($levels);die;
}
else $levels=null;
		 //print_r($levels);die;
if($user['status']==0)
{
	header('location:logout');
}
if($user['deleted']==1)
      {
      	header('location:logout');
      }
if($user['paid']==0)
{
	header('location:about');
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'layout/head.php'?>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                
                
            <div class="col-md-6 text-center mt-2">
				 <a href="home">
               <img src="assets/img/logo/logo.png"style="width:350px;height:auto;margin-bottom:-63px;">
			   </a>
                
                </div>
            </div>
			<div class="row justify-content-center">
<div class="col-md-6 col-lg-6 col-xs-12">
	<h1>Rs:<?=round($user['current_amount'], 2);?></h1>
	<button type="button" class="btn btn-#007da1 mb-2" style="width:30%;background-color:#007da1;color:white;" data-toggle="modal" data-target="#paymentmodal">With draw</button>
	
</div>
<table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
					
					                <th>Amount</th>
                                       <th>Status</th>
									   <th>Approved Date</th>
                  </tr>
                  </thead>
                  <tbody>
				  
					<?php 

                                       foreach( $payments as $payment )
                                       { ?>
                                    <tr>
                                       
                                       <td><?=$payment['amount']?></td>
                                       <td><?php if($payment['payment_approved']==1) echo "Apporoved"; else if($payment['payment_approved']==0) echo "Pending";else echo "Rejecetd"?>
									   </td>
									   <td>
									   <?=$payment['payment_approved']?$payment['updated_at']:"Not Approved Yet"?></td>
                                       </td>
                                    </tr>
                                    <?php }
                                       ?>
					
				  
                  </tbody>
                  <tfoot>
                  <tr>
					
                                     <th>Amount</th>
                                       <th>Status</th>
									   <th>Approved Date</th>
                  </tr>
                  </tfoot>
                </table>

</div>
<?php include_once 'layout/paymentrequest.php'?>
<?php include_once 'layout/responses.php'?>
    </section>
	 <?php include_once 'layout/scripts.php'?>
	 <script>
  $(function () {
   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>
</html>