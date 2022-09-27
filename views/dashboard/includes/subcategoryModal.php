<div id="subcategory-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add SubCategory</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="addsubCategory" id="" enctype="multipart/form-data">
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Name" name="name" required> 
               </div>
			   
			   
			   
				<div class="form-group" >
						<select  class="form-control" name="category_id" required>
							<option value="" disabled selected>Slect Category</option>
							<?php foreach($categorydata as $category)
							{
							?>
							<option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
							<?php }?>
                        </select>
			   </div>
			     <div class="form-group">
                    <label>Description*</label>
                    <div class="col-md-12" style="border:0.2px dotted">
						<textarea rows="4"  id="about-us" name="description" class="form-control form-control-line" required></textarea>
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