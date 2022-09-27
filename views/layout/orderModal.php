<div id="ordermodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:500px;height:60px;">
      <div class="modal-content">
	   <h4 class="modal-title" style="margin-left:40%;">Order</h4>
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
         </div>
         <div class="modal-body">
		
            <form method="POST" action="orders" id="" enctype="multipart/form-data">
			<input type="hidden" id="product_id" value="<?=$products[0]['id'];?>"name="product_id">
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Name" name="name" required> 
               </div>
			   
			   <div class="form-group">
                  <label for="recipient-name" class="control-label">Phone:</label>
                  <input type="text" class="form-control" pattern="[0-9]+" maxlength="11" minlength="11" onkeypress="return [45, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57].includes(event.charCode);" placeholder="Phone" name="phone" required> 
               </div>
			   
               <div class="form-group">
                  <label for="recipient-name" class="control-label">Address:</label>
                  <input type="text" class="form-control" name="address" required> 
               </div>
			   
			   <div class="form-group">
                  <label for="recipient-name" class="control-label">Disctrict:</label>
                  <input type="text" class="form-control" placeholder="Disctrict" name="city" required> 
               </div>
			   
			   
			   <div class="form-group">
                  <label for="recipient-name" class="control-label">Quantity:</label>
                  <input type="number" min="1" class="form-control" name="quantity" required> 
               </div>
			   
		
			   
         </div>
			 <div class="modal-footer">
			    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
			 </div>
		 </form>
      </div>
   </div>
</div>