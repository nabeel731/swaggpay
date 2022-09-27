<div id="updatelevel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Level</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updateLevel" id="" enctype="multipart/form-data">
			<input type="hidden" name="level_id" id="level_id">
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Title" name="title" id="title" required> 
               </div>
			   
			   <div class="form-group">
                  <label for="recipient-name" class="control-label">Amount:</label>
                  <input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" required> 
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