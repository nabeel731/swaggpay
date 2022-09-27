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
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="updateProduct" enctype="multipart/form-data">
			  
			  <input type="hidden" name="product_id" value="<?=$product['id']?>">

                <div class="card-body">
				
					
             
				 
                
				  <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
							<label for="exampleInputFile">Thumbnail</label>
							<div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" name="thumbnail_img" id="exampleInputFile">
								<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							  </div>
							  <!--<div class="input-group-append">
								<span class="input-group-text" id="">Upload</span>
							  </div>-->
							</div>
						</div>
                    </div>
					
				
					
                  </div>
                  <div class="row">
                        <div class="form-group">
                          <span>Select Level</span>
                          <select class="form-control" name="level_id"  style="width:600px;"id="user_id" required>
                          <?php foreach($levels as $level) {?>
                            <option value="<?=$level['id']?>" <?php if($level['id']==$product['level_id']) echo "selected"?>><?=$level['title']?></option>
                    <?php } ?>
                          </select>
                        </div>
                      </div>
				  
				  <div class="row">
		
             <div class="col-sm-6">
			  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="number" class="form-control" value="<?= $product['amount']?>" id="exampleInputEmail1" placeholder="Enter price" name="amount" required>
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
<?php include_once'layout/js.php'; ?>
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

	var values="<?=$product['weights']?>";
	$.each(values.split(","), function(i,e){
		$("#weights option[value='" + e + "']").prop("selected", true);
	});
	
	
</script>

				
  
  </body>
  </html>
  <!-- /.content-wrapper -->

