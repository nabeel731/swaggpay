<div id="service-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add New Service</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="addService" id="addServiceForm" enctype="multipart/form-data">
			 <div class="form-group">
                  <label for="sevice-title" class="control-label">Title*:</label>
                  <input type="text" class="form-control" placeholder="Enter Service Title" name="title" required> 
               </div>
			   
			    <div class="form-group">
                  <label for="service-icon" class="control-label">Icon:</label>
                  <input type="text" minlength="2" maxlength="10" class="form-control" name="icon" placeholder="icons from here https://boxicons.com/"  required> 
               </div>
			   
			   
              <div class="form-group">
                  <label for="service-description" class="control-label">Description*:</label>
                  <textarea type="text"  class="form-control" minlength="30" maxlength="255" rows="4" name="description" required> </textarea>
              </div>
			      

				<div class="form-group">
                       <label for="service-image" class="control-label">Image:</label>
                      <input type="file" class="form-control" name="image" required> 
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