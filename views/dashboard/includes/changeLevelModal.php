<div id="changelevel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update User Level</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="changeLevel"  enctype="multipart/form-data">
			<input type="hidden"  id="leveluser_id" name="user_id">
			    
					<div class="row">
									<div class="form-group col-md-6">
										
						       <select  class="form-control" id="level_id" name="level_id" required>
							<option value="" disabled selected>Slect Level</option>
							<?php 
							$query="SELECT * FROM levels";
		                    $levels=$this->db->getDataWithQuery($query);
							foreach($levels as $level)
							{
							?>
							<option value="<?php echo $level['id'] ?>"><?php echo $level['title'] ?></option>
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