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
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
                <h3 class="card-title">Password Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
			  

                <div class="card-body">
			
				  
				  <div class="row">
                   
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="updatePassword" enctype="multipart/form-data">
							
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Old Old Password*</label>
										<div class="col-md-12">
											<input type="password" name="old_password" placeholder="Enter Old Password Here" class="form-control form-control-line" required> </div>
									</div>
								</div>
							
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Password*</label>
										<div class="col-md-12">
											<input type="new_password" name="new_password" placeholder="Enter Password Here" class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Confirm Password*</label>
										<div class="col-md-12">
											<input type="password" name="confirm_password" placeholder="Password Here" class="form-control form-control-line" required> </div>
									</div>
								</div>
								

	
                        
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
      <!-- ./row -->
				  
                  <!--<div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>-->
                </div>
			
                <!-- /.card-body -->
              
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.4/tinymce.min.js" integrity="sha512-MGz4lok7A2vu3S5dK81JL+GAC8HZYCFOkWmj4rRqcLjPD+SdJESAfdUNtrrO7IhAPgKxmRKJ4qg+4z3GgVCyrA==" crossorigin="anonymous"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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

