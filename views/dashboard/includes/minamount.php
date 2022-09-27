<div id="minamount-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update User Min Amount</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="changeLevel"  enctype="multipart/form-data">
			<input type="hidden"  id="user_id" name="user_id">
			    
					<div class="form-group">
                  <label for="recipient-name" class="control-label">Amount:</label>
                  <input type="text" class="form-control" placeholder="Amount" id="amount"name="min_amount" required> 
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