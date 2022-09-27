<div id="updatesubcategory-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Category</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updatesubCategory" id="" enctype="multipart/form-data">
			<input type="hidden" name="subcategory_id" id="subcategory_id">
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Name" name="name" id="subcategory_name"required> 
               </div>
			   
              <!-- <div class="form-group">
                  <label for="recipient-name" class="control-label">Thumbnail:</label>
                  <input type="file" class="form-control" name="thumbnail"> 
               </div>
			   
			    <div class="form-group">
                  <label for="recipient-name" class="control-label">Icon:</label>
                  <input type="file" class="form-control" name="icon"> 
               </div>-->
			   
	
			     <div class="form-group">
                    <label>Description*</label>
                    <div class="col-md-12" style="border:0.2px dotted">
						<textarea rows="4"  id="description" name="description" class="form-control form-control-line" required></textarea>
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