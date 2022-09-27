<div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update User</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updateUser" enctype="multipart/form-data">
			<input type="hidden" name="user_id" id="user_id">
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" name="name" required id="user-name"> 
               </div>
			   
			   
			   <div class="form-group">
                  <label for="recipient-name" class="control-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" id="user-email" required> 
               </div>
			   
               <div class="form-group">
                  <label for="recipient-name" class="control-label">Phone:</label>
                  <input type="text" class="form-control" name="phone" placeholder="with country code i.e '+44123456789'" id="user-phone" required> 
               </div>
			   
			   <div class="form-group">
                  <label for="user-address" class="control-label">Address:</label>
                  <input type="text" class="form-control" name="address" id="user-address" placeholder="Address" required> 
               </div>
			   
			    <div class="form-group">
                  <label for="min_amount" class="control-label">Min Amount:</label>
                  <input type="text" id="user_amount" class="form-control" name="min_amount" placeholder="Min Amount here"  required> 
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