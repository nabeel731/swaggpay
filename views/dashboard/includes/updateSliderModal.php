<div id="updateslider-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Slider</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updateSlider" id="" enctype="multipart/form-data">
			<input type="hidden"  id="slider_id" name="slider_id">
			     <div class="row">
				<div class="form-group col-md-6">
				<label class="col-md-6">Heading*</label>
					<div class="col-md-12">
					<input type="text" name="heading" id="heading"value="" placeholder="Slider Heading" class="form-control form-control-line" required> </div>
					</div>
					</div>
					
					<div class="row">
					<div class="form-group col-md-6">
						<label for="example-logo" class="col-md-12">Slider Image</label>
							<div class="col-md-12">
						<input type="file" class="form-control form-control-line" name="slider"> </div>
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
					
					       <div class="row">
							<div class="form-group col-md-6">
										<label class="col-md-6">Text*</label>
										<div class="col-md-12">
											<input type="text" name="text" value="" placeholder="Slider Text" id="text"class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										
						       <select  class="form-control" id="category_id"name="category_id" required>
							<option value="" disabled selected>Slect Category</option>
							<?php 
							$query="SELECT * FROM categories";
		                    $categories=$this->db->getDataWithQuery($query);
							foreach($categories as $category)
							{
							?>
							<option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
							<?php }?>
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