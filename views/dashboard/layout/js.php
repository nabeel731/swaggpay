<script>



function showCategoryUpdateModal(id)
{
	makeAjaxCall('getCategory?id='+id).then(res=> {
	category=res.data;
	$('#category_name').val(category.name);
	$('#featured').val(category.featured);
	$('#description').val(category.description);
	$('#meta_title').val(category.meta_title);
	$('#category_id').val(category.id);
	$('#updatecategory-modal').modal('show');
  });
	
}


function showSubCategoryUpdateModal(id)
{

	makeAjaxCall('getSubCategory?id='+id).then(res=> {
	subcategory=res.data;
	$('#subcategory_name').val(subcategory.name);
	$('#featured').val(subcategory.featured);
	$('#description').val(subcategory.description);
	$('#meta_title').val(subcategory.meta_title);
	$('#subcategory_id').val(subcategory.id);
	$('#category_id').val(subcategory.category_id);
	$('#updatesubcategory-modal').modal('show');
  });
	
}


function showRedeemUpdateModal(id)
{
	makeAjaxCall('getRedeem?id='+id).then(res=> {
	redeem=res.data;
	$('#redeem_code').val(redeem.redeem_code);
	$('#user_id').val(redeem.user_id);
	$('#validity').val(redeem.validity);
	$('#redeem_id').val(redeem.id);
	$('#updateredeem-modal').modal('show');
  });
  
}


function showUserUpdateModal(id)
{
	makeAjaxCall('getUser?id='+id).then(res=> {
	user=res.data;
	$('#name').val(user.name);
	$('#phone').val(user.phone);
	$('#email').val(user.email);
	$('#address').val(user.address);
	$('#user_id').val(user.id);
	$('#updateusercategory-modal').modal('show');
  });
  
}


function showCategoryAddModal()
{
	$('#category-modal').modal('show');
}

function showSubCategoryAddModal()
{
	
	$('#subcategory-modal').modal('show');
}




function deleteUser(userId){
		
        if (confirm("Are you sure?")) {
							 $.ajax({
						 type: "POST",
						 url: 'deleteUser',
						 data: {userId:userId},
						 success: function(data){
							 console.log(data);
							 if(data==1)
							 { 
								  swal.fire({
                                      title: "Deleted!",
                                      text: "User Deleted Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							 
							 
							
							 else if(data=="0")
							{
								swal.fire({
                                      title: "OOO00ppppss",
                                      text: "Error Processing Your Request",
                                      icon: "error",
                                    });
							 }
						 }
						 });	
          }
}





function deleteCategory(id){
		
        if (confirm("Are you sure?")) {
							 $.ajax({
						 type: "POST",
						 url: 'deleteCategory',
						 data: {Id:id},
						 success: function(data){
							 console.log(data);
							 if(data=="successful")
							 { 
								  swal.fire({
                                      title: "Deleted!",
                                      text: "Category Deleted Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							 
							 
							
							 else if(data=="unsuccessful")
							{
								swal.fire({
                                      title: "OOO00ppppss",
                                      text: "Error Processing Your Request",
                                      icon: "error",
                                    });
							 }
						 }
						 });	
          }
}




function deleteSubCategory(id){
		
        if (confirm("Are you sure?")) {
							 $.ajax({
						 type: "POST",
						 url: 'deleteSubCategory',
						 data: {Id:id},
						 success: function(data){
							 console.log(data);
							 if(data=="successful")
							 { 
								  swal.fire({
                                      title: "Deleted!",
                                      text: "SubCategory Deleted Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							 
							 
							
							 else if(data=="unsuccessful")
							{
								swal.fire({
                                      title: "OOO00ppppss",
                                      text: "Error Processing Your Request",
                                      icon: "error",
                                    });
							 }
						 }
						 });	
          }
}


function deleteProduct(id){
		
        if (confirm("Are you sure?")) {
							 $.ajax({
						 type: "POST",
						 url: 'deleteProduct',
						 data: {Id:id},
						 success: function(data){
							 console.log(data);
							 if(data=="successful")
							 { 
								  swal.fire({
                                      title: "Deleted!",
                                      text: "Product Deleted Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							 
							 
							
							 else if(data=="unsuccessful")
							{
								swal.fire({
                                      title: "OOO00ppppss",
                                      text: "Error Processing Your Request",
                                      icon: "error",
                                    });
							 }
						 }
						 });	
          }
}



		




function blockunblockUser(userID,status){
		
        if (confirm("Are you sure?")) {
							 $.ajax({
						 type: "POST",
						 url: 'blockunblockUser',
						 data: {blockID:userID,status:status},
						 success: function(data){
							 console.log(data);
							 if(data==1)
							 { 
								  swal.fire({
                                      title: "Block!",
                                      text: "user UnBlocked Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							 
							  else if(data==0)
							 { 
								  swal.fire({
                                      title: "Block!",
                                      text: "user Blocked Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							
							 else if(data=="unsuccessful")
							{
								swal.fire({
                                      title: "OOO00ppppss",
                                      text: "Error Processing Your Request",
                                      icon: "error",
                                    });
							 }
						 }
						 });	
          }
     
	}
	
	
	
function WarningToUser(userID){
		
        if (confirm("Are you sure?")) {
							 $.ajax({
						 type: "POST",
						 url: 'WarningToUser',
						 data: {userID:userID},
						 success: function(data){
							 console.log(data);
							 if(data==1)
							 { 
								  swal.fire({
                                      title: "Notification!",
                                      text: "Notification Send Successfully ",
                                      icon: "success",
                                    });
									window.setTimeout(function(){location.reload()},3000)
									  
							 }
							 else if(data==0)
							{
								swal.fire({
                                      title: "OOO00ppppss",
                                      text: "Error Processing Your Request",
                                      icon: "error",
                                    });
							 }
						 }
						 });	
          }
     
	}
	
	
	
	
	


function makeAjaxCall(url,methodType="GET"){
    //url=""+url;
   var promiseObj = new Promise(function(resolve, reject){
      var xhr = new XMLHttpRequest();
	
      xhr.open(methodType, url, true);
	
	 xhr.send();
      xhr.onreadystatechange = function(){
      if (xhr.readyState === 4){
         if (xhr.status === 200){
            console.log("xhr done successfully");
            var resp = xhr.responseText;
			console.log(resp);
            var respJson = JSON.parse(resp);
			if(respJson.status!==200 && respJson.status!==404)
			{
				Swal.fire(
				'Error!',
				respJson.message,
				'error'
				);
				return false;
			}
			
            resolve(respJson);
         } else {
            reject(xhr.status);
            console.log("xhr failed");
         }
      } else {
         console.log("xhr processing going on");
      }
   };
   console.log("request sent succesfully");
 });
 return promiseObj;
}


</script>