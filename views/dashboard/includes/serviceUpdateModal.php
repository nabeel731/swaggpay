<div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Service Details</h4>
         </div>
          <div class="modal-body">
            <form method="POST" action="updateService" id="updateServiceForm" enctype="multipart/form-data">
			<input type="hidden" name="service_id" id="service-id">
			 <div class="form-group">
                  <label for="sevice-title" class="control-label">Title*:</label>
                  <input type="text" class="form-control" id="service-title" placeholder="Enter Service Title" name="title" required> 
               </div>
			   
			    <div class="form-group">
                  <label for="service-icon" class="control-label">Icon:</label>
                  <input type="text" minlength="2" maxlength="10" id="service-icon" class="form-control" name="icon" placeholder="icons from here https://boxicons.com/"  required> 
               </div>
			   
			   
              <div class="form-group">
                  <label for="service-description" class="control-label">Description*:</label>
                  <textarea type="text"  class="form-control" id="service-description" minlength="30" maxlength="255" rows="4" name="description" required> </textarea>
              </div>
			      

				<div class="form-group">
                       <label for="service-image" class="control-label">Image:</label>
                      <input type="file" class="form-control" name="image"> 
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