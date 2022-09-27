<div id="user-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add Team Member</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="addMember" id="addMemberForm" enctype="multipart/form-data">
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required> 
               </div>
			   <div class="form-group" >
						<select  class="form-control" name="designation" required>
							<option value="" disabled selected>Slect Designation</option>
							<option value="Web Developer">Web Developer</option>
							<option value="Android Developer">Android Developer</option>
							<option value="IOS Developer">IOS Developer</option>
							<option value="WEB Designer">WEB Designer</option>
							<option value="Marketing Manager">Marketing Manager</option>
							<option value="CEO">CEO</option>
                        </select>
			   </div>
			   
			   
			    <div class="form-group">
                  <label for="recipient-email" class="control-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder=" Enter Email"  required> 
               </div>
			   
			   <div class="form-group">
                  <label for="recipient-experience" class="control-label">Experience (years)</label>
                  <input type="number" step="0.5" class="form-control" name="experience" required> 
              </div>
			   
			   
              <div class="form-group">
                  <label for="recipient-linkedin" class="control-label">LinkedIn:</label>
                  <input type="text"  class="form-control" name="linkedin" > 
              </div>
			   
			   

				<div class="form-group">
                       <label for="recipient-profile" class="control-label">Picture:</label>
                      <input type="file" class="form-control" name="profile" required> 
              </div>
			  
            
         </div>
			 <div class="modal-footer">
			    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
			 </div>
		 </form>
      </div>
   </div>
</div