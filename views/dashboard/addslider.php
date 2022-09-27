  <html>
<?php include_once'layout/head.php'; ?>
<link rel="stylesheet" href="../assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/admin/plugins/select2/css/select2.min.css">
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once'layout/nav.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once'layout/sidebar.php'; ?>


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add new Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sliders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Slider Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="addsliderdata" enctype="multipart/form-data">
			  

                <div class="card-body">
				
					<div class="row">
						<div class="col-sm-6">
						  <div class="form-group">
							<label for="exampleInputTitle">Heading</label>
							<input type="text" class="form-control" name="heading" id="exampleInputTitle" placeholder="Enter Heading" required>
						  </div>
						</div>
						
						                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="custom-select"  name="category_id" required>
						<?php if( isset($categories)) {  foreach($categories as $category){?>
                         <option  value="<?=$category['id']?>" selected><?=$category['name']?></option>
						<?php } }?>
                      
              
                        </select>
                      </div>
                    </div>
				
						
					</div>
             
				  
				 
                
				  <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
							<label for="exampleInputFile">Thumbnail</label>
							<div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="exampleInputFile" required>
								<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							  </div>
							  <!--<div class="input-group-append">
								<span class="input-group-text" id="">Upload</span>
							  </div>-->
							</div>
						</div>
                    </div>
					
					                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Active</label>
                        <select class="custom-select" name="active" required>
                          <option value="1" selected>Yes</option>
                          <option value="0" >No</option>
                        </select>
                      </div>
                    </div>
					
                  </div>
				  
				  
				  <div class="row">
				<div class="col-md-12">
				  <div class="card card-outline card-info">
				      <div class="card-header">
					  <h3 class="card-title">
						Slider Details
						<small>Simple and fast</small>
					  </h3>
					  
						</div>
            <!-- /.card-header -->
				   
					<div class="card-body pad">
					  <div class="mb-3">
						<textarea name="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					  </div>
					  
					</div>
				  </div>
				</div>
				<!-- /.col-->
			</div>
      <!-- ./row -->
				  
                  <!--<div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>-->
                </div>
			
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   </div>
  <!-- /.content-wrapper -->
<?php include_once'layout/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once'layout/scripts.php'; ?>
<!-- Bootstrap4 Duallistbox -->
<!-- Select2 -->
<script src="../assets/admin/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
  
  $('.textarea').summernote();
});

//Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

//Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();

let categories = <?=json_encode($categories)?>;
console.log(categories);
function changeSubCategories(select){
	
	categories.forEach(category => {
		if(category.id==select.value)
		{
			$('#select_subcategory').empty();
			category.sub_categories.forEach(sub_category => {
				$('#select_subcategory').append('<option value="'+sub_category.id+'" >'+sub_category.name+'</option>');
			});
		}
		
	   });
	
}	
	
</script>
  
  </body>
  </html>
  <!-- /.content-wrapper -->

