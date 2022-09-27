<?php 
if(isset($_SESSION['user_id']))
$user=$this->db->getSingleRowIfMatch('users','id',$_SESSION['user_id']);
if(isset($_SESSION['user_id'])){
	$id=$_SESSION['user_id'];
	$query="SELECT * FROM users inner join levels on users.level_id=levels.id  WHERE users.id=$id";
		 $levels=$this->db->getDataWithQuery($query);
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
<?php  include_once 'layout/head.php'?>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                 <div class="col-md-6 text-center mb-2 mt-2">
					 <a href="home">
               <img src="https://raw.githubusercontent.com/nabeel731/suzbibitassests/main/images/logo.jpg"style="width:300px;height:90px;">
			   </a>
                
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="row">
                            <div class="col-col-6">
                                <figure class="card card-product">
                                    <div class="img-wrap"><img src="<?=$products[0]['image'];?>"></div>
                                    
                                    <figcaption class="info-wrap">
                                        <div class="price-wrap h5">
                                             <del class="price-old"><?=$products[0]['amount'];?>:Rs</del>
                                            <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#ordermodal">Buy</button>
                                        </div> <!-- price-wrap.// -->
                                            <h4 class="title"><?=$products[0]['name'];?></h4>
                                            <p class="desc"><?=$products[0]['description'];?></p>
                                           
                                    </figcaption>
                                    <div class="bottom-wrap">
                                        <button class="btn btn-sm btn-primary float-right" onClick="CollectReward(<?=$products[0]['id'];?>)">Collect Reward</button>	
                                       
                                    </div> <!-- bottom-wrap.// -->
                                </figure>
                            </div> <!-- col // -->
                          
                            </div> <!-- row.// -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'layout/orderModal.php'?>
    <?php include_once 'layout/scripts.php'?>
</body>
</html>
<script>
function showOrderModal(id)
{
    
	$('#product_id').val(id);
	$('#ordermodal').modal('show');
}

function showalldescription(id)
{
	event.preventDefault();
	$("#description_"+id).css('display','none');
	$("#moredescription_"+id).css('display','block');
	
}

function increasebalance(id)
{
	makeAjaxCall('increaseuserbalance?id='+id).then(res=> {
	setting=res.data;
	shareURL(id);
  });
}

function CollectReward(id)
{

	makeAjaxCall('CollectReward?id='+id).then(res=> {
	console.log(res);
	if (res['message']== "already collect") {
                    swal.fire({
                        title: "OOO00ppppss!",
                        text: "You Have  Collect Already Reward Today",
                        icon: "error",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (res['message'] == "Not Able") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Your Are Not Working From LAst 7 Days please Invite 15 people then Your Daily Reward Will be 300 and That is Life Time ",
                        icon: "error",
                    });
                }
                
                else if (res['message'] == "successful") {
                    swal.fire({
                        title: "Done",
                        text: "Your Reward Have Been Collecetd",
                        icon: "success",
                    });
                }
                
                 else if (res['message'] == "already collect product") {
                    swal.fire({
                        title: "Success",
                        text: "You have collect Already Reward On This Product",
                        icon: "error",
                    });
                }
				
				else if (res['message'] == "already today") {
                    swal.fire({
                        title: "SORRY",
                        text: "You have  Already Collected  Reward.You Can Collect Again Tomorrow Kindly Invite More People to increase your Daily  Reward",
                        icon: "error",
                    });
                }
	
  });
}


function lessdescription(id)
{
	event.preventDefault();
	$("#description_"+id).css('display','block');
	$("#moredescription_"+id).css('display','none');
	
}
</script>