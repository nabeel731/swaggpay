<div id="updatebrand-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Brand</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updateBrand" id="" enctype="multipart/form-data">
			<input type="hidden"  id="brand_id" name="brand_id">
			     
					
					<div class="row">
					<div class="form-group col-md-6">
						<label for="example-logo" class="col-md-12">Brand Image</label>
							<div class="col-md-12">
						<input type="file" class="form-control form-control-line" name="brand"> </div>
						  </div>
					</div>
					
					
					<div class="row">
									<div class="form-group col-md-6">
						       <select  class="form-control" name="active" id="active"required>
							<option value="" disabled selected>Active</option>
							
							<option value="1">Yes</option>
							<option value="0">No</option>
						
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