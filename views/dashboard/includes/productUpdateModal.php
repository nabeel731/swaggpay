<div id="productupdatemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog" style="max-width:1400px">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Product</h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="updateProduct" id="" enctype="multipart/form-data">
			<input type="hidden" id="product_id" name="product_id">
			<div class="form-group">
                  <label for="recipient-name" class="control-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Name" id="name" name="name" required> 
               </div>
			 <div class="form-group">
                  <label for="recipient-name" class="control-label">image:</label>
                  <input type="file" class="form-control" placeholder="Title" name="image"> 
               </div>
			   
			    <div class="form-group">
                  <label for="recipient-name" class="control-label">Amount:</label>
                  <input type="text" class="form-control" id="amount"placeholder="Amount" name="amount" required> 
               </div>
			   <div class="form-group">
                  <label for="comment">Description:</label>
                    <textarea class="form-control" rows="5" id="description" name="description"></textarea>
              </div>
			 <div class="modal-footer">
			    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
			 </div>
		 </form>
      </div>
   </div>
</div>