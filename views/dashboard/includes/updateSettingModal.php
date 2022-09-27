<div id="updatesetting-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Setting</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updateSetting" id="" enctype="multipart/form-data">
			<input type="hidden"  id="setting_id" name="setting_id">
			     <div class="row">
				<div class="form-group col-md-6">
				<label class="col-md-6">Emial*</label>
					<div class="col-md-12">
					<input type="text" name="email" id="email"value="" placeholder="Email" class="form-control form-control-line" required> </div>
					</div>
					</div>
					
					<div class="row">
					<div class="form-group col-md-6">
						<label for="example-logo" class="col-md-12">Logo</label>
							<div class="col-md-12">
						<input type="file" class="form-control form-control-line" name="logo"> </div>
						  </div>
					</div>
					
					       <div class="row">
							<div class="form-group col-md-6">
										<label class="col-md-6">Phone*</label>
										<div class="col-md-12">
											<input type="text" name="phone"placeholder="Phone" id="phone"class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								
								<div class="row">
							<div class="form-group col-md-6">
										<label class="col-md-6">Maximum Cart Item*</label>
										<div class="col-md-12">
											<input type="text" name="cartmax_item"placeholder="Maximum Cart Item" id="cartmax_item"class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								
								<div class="row">
							<div class="form-group col-md-6">
										<label class="col-md-6">Footer*</label>
										<div class="col-md-12">
											<input type="text" name="footer" placeholder="Footer" id="footer"class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
						       <select  class="form-control" id="brand"name="brand" required>
							<option value="" disabled selected>Brand</option>
							
							<option value="1">Show</option>
							<option value="0">Hide</option>
						
                        </select>
	
									</div>
								</div>
								
							<div class="row">
									<div class="form-group col-md-6">
						       <select  class="form-control" id="product" name="product" required>
							<option value="" disabled selected>Product</option>
							
							<option value="1">Show</option>
							<option value="0">Hide</option>
						
                        </select>
	
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
						       <select  class="form-control" id="category_active" name="category_active" required>
							<option value="" disabled selected>Category</option>
							
							<option value="1">Show</option>
							<option value="0">Hide</option>
						
                        </select>
	
									</div>
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