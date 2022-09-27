<!DOCTYPE html>
<html lang="en">

<?php include_once 'layout/head.php'?>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include_once 'layout/nav.php'?>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php include_once 'layout/sidebar.php'?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Slider Detail</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <!--<a href="#" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade</a>-->
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">add-slider</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                   
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" method="post" action="addsliderdata" enctype="multipart/form-data">
								
									
								<div class="row">
									<div class="form-group col-md-6">
										<label for="example-logo" class="col-md-12">Slider Image</label>
										<div class="col-md-12">
											<input type="file" class="form-control form-control-line" name="slider"> </div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Heading*</label>
										<div class="col-md-12">
											<input type="text" name="heading" value="" placeholder="Slider Heading" class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="form-group col-md-6">
										<label class="col-md-6">Text*</label>
										<div class="col-md-12">
											<input type="text" name="text" value="" placeholder="Slider Text" class="form-control form-control-line" required> </div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										
						       <select  class="form-control" name="category_id" required>
							<option value="" disabled selected>Slect Category</option>
							<?php foreach($categories as $category)
							{
							?>
							<option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
							<?php }?>
                        </select>
	
									</div>
								</div>
								
						<div class="row">
									<div class="form-group col-md-6">
						       <select  class="form-control" name="active" required>
							<option disabled selected>Active</option>
							
							<option value="1">Yes</option>
							<option value="0">No</option>
						
                        </select>
	
									</div>
								</div>
								
                                
                              
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php include_once 'layout/footer.php'?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   <?php include_once 'layout/scripts.php'?>
	<script>
	var editor = new Simditor({
	  textarea: $('#about-us-text')
	  //optional options
	});
	</script>
    <?php include_once 'layout/responses.php'?>
</body>

</html>
