<div id="paymentmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:800px">
   
      <div class="modal-content">
	   
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
         </div>
         <div class="modal-body">
         <a href="home">
            <img src="assets/img/logo/logo.png" style="width:350px;height:auto;margin-top:-70px;">
          </a>
            <form method="POST" action="paymentsRequest" id="" enctype="multipart/form-data">
			
			<div class="form-group">
              <span>Select Account</span>
						<select  class="form-control" name="account_name" id="user_id" required>
							<option value="" disabled selected>Select Account</option>
							<option value="easypaisa">EasyPaisa</option>
							<option value="jazzcash">JazzCash</option>
							<!-- <option value="jazz cash">Jazz Cash</option> -->
                        </select>
			   </div>
			   
			   <div class="form-group">
                  <label for="recipient-name" name="phone" class="control-label">Enter Account Number:</label>
                  <input type="text" class="form-control" placeholder="Enter Number" name="phone" required> 
               </div>
			   
			<div class="form-group">
                  <label for="recipient-name" class="control-label">Enter Account Title:</label>
                  <input type="text" class="form-control" placeholder="Enter Account Title" name="name" required> 
               </div>

			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Enter Payment:</label>
                  <input type="text" class="form-control" placeholder="Enter Pyamrent" value="600" name="amount" required> 
               </div>
			   
         </div>
			 <div class="modal-footer">
			    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger waves-effect waves-light">Send</button>
			 </div>
		 </form>
      </div>
   </div>
</div>