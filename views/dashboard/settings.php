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
                <h3 class="card-title">Settings Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
			  

                <div class="card-body">
			
				  
				  <div class="row">
                   
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="addsettingdata" enctype="multipart/form-data">
								
									<input type="hidden" name="setting_id" value="<?=$settings['id']?>" >
								<div class="row">
									<div class="form-group col-md-6">
										<label for="example-logo" class="col-md-12">Logo</label>
										<div class="col-md-12">
											<input type="file" class="form-control form-control-line" name="logo"> </div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="example-logo" class="col-md-12">About Image</label>
										<div class="col-md-12">
											<input type="file" class="form-control form-control-line" name="about"> </div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Register Fees*</label>
										<div class="col-md-12">
											<input type="text" name="register_fees" value="<?=$settings['register_fees']?>" placeholder="Register Fees Here" class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Second Minimum Withdraw Amount*</label>
										<div class="col-md-12">
											<input type="text" name="amount" value="<?=$settings['amount']?>" placeholder="Register Fees Here" class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">First Minimum Withdraw Amount*</label>
										<div class="col-md-12">
											<input type="text" name="first_amount" value="<?=$settings['first_amount']?>" placeholder="Register Fees Here" class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">JazzCashNo*</label>
										<div class="col-md-12">
											<input type="number" name="jazzacount_no" value="<?=$settings['jazzacount_no']?>" placeholder="Jazzcash No" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">JazzCashTitle*</label>
										<div class="col-md-12">
											<input type="text" name="jazzcash_title" value="<?=$settings['jazzcash_title']?>" placeholder="Maximum Cart Item" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">JazzCash*</label>
										<div class="col-md-12">
											<select  class="form-control" name="	jazzcash_active" required>
												<option <?=$settings['jazzcash_active']==1?'selected':''?> value="1">Active</option>
												<option <?=$settings['jazzcash_active']==0?'selected':''?> value="0">DeActive</option>
											</select> 
									</div>
									</div>
								</div>
								

								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">EasyPisaNo*</label>
										<div class="col-md-12">
											<input type="text" name="easypiasa_no" value="<?=$settings['easypiasa_no']?>" placeholder="Easypaisa No" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">EasyPiasaTitle*</label>
										<div class="col-md-12">
											<input type="text" name="easypiasa_title" value="<?=$settings['easypiasa_title']?>" placeholder="Maximum Cart Item" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">EasyPaisa*</label>
										<div class="col-md-12">
											<select  class="form-control" name="easypaisa_active" required>
												<option <?=$settings['easypaisa_active']==1?'selected':''?> value="1">Active</option>
												<option <?=$settings['easypaisa_active']==0?'selected':''?> value="0">DeActive</option>
											</select> 
									</div>
									</div>
								</div>
								
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">BankAccountNo*</label>
										<div class="col-md-12">
											<input type="text" name="bankaccount_no" value="<?=$settings['bankaccount_no']?>" placeholder="Bank Account No" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">BankName*</label>
										<div class="col-md-12">
											<input type="text" name="bank_name" value="<?=$settings['bank_name']?>" placeholder="Bank Name" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">BankTitle*</label>
										<div class="col-md-12">
											<input type="text" name="bank_title" value="<?=$settings['bank_title']?>" placeholder="Bank Title" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Skrill AccountNo*</label>
										<div class="col-md-12">
											<input type="text" name="skrillaccount_no" value="<?=$settings['skrillaccount_no']?>" placeholder="Skrill Account No" class="form-control form-control-line" > </div>
									</div>
								</div>
								
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Skrill Title*</label>
										<div class="col-md-12">
											<input type="text" name="skrill_title" value="<?=$settings['skrill_title']?>" placeholder="Skrill Title" class="form-control form-control-line" > </div>
									</div>
								</div>
								

								
							   <div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Skrill*</label>
										<div class="col-md-12">
											<select  class="form-control" name="Skrill_active" required>
												<option <?=$settings['Skrill_active']==1?'selected':''?> value="1">Active</option>
												<option <?=$settings['Skrill_active']==0?'selected':''?> value="0">DeActive</option>
											</select> 
									</div>
									</div>
								</div>
								</div>
								
								
							
		                           <div class="row">
										<div class="form-group">
                                    <label class="col-md-16">Description*</label>
                                    <div class="col-md-16" >
                                        <textarea rows="14" id="about-us-text" name="description" minlength="30" class="form-control form-control-line"><?=$settings['description']?></textarea>
                                    </div>
									</div>
								
								</div>
								
								<div class="row">
										<div class="form-group">
                                    <label class="col-md-16">Home Page Description*</label>
                                    <div class="col-md-16" >
                                        <textarea rows="14" id="about-us-text" name="home_description" minlength="30" class="form-control form-control-line"><?=$settings['home_description']?></textarea>
                                    </div>
									</div>
								
								</div>
								
							<div class="row">
										<div class="form-group">
                                    <label class="col-md-16">Easy Description*</label>
                                    <div class="col-md-16" >
                                        <textarea rows="14" id="about-us-text" name="recharge" minlength="30" class="form-control form-control-line"><?=$settings['recharge']?></textarea>
                                    </div>
									</div>
								
								</div>
								
								<div class="row">
										<div class="form-group">
                                    <label class="col-md-16">JazzCash Description*</label>
                                    <div class="col-md-16" >
                                        <textarea rows="14" id="about-us-text" name="jazcash_description" minlength="30" class="form-control form-control-line"><?=$settings['jazcash_description']?></textarea>
                                    </div>
									</div>
								</div>
								
								<div class="row">
										<div class="form-group">
                                    <label class="col-md-16">Skrill Description*</label>
                                    <div class="col-md-16" >
                                        <textarea rows="14" id="about-us-text" name="skrill_description" minlength="30" class="form-control form-control-line"><?=$settings['skrill_description']?></textarea>
                                    </div>
									</div>
								</div>
								
								<div class="row">
										<div class="form-group">
                                    <label class="col-md-12">Terms And Condition*</label>
                                    <div class="col-md-16" >
                                        <textarea rows="14" id="about-us-text" name="termscondition" minlength="30" class="form-control form-control-line"><?=$settings['termscondition']?></textarea>
                                    </div>
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

