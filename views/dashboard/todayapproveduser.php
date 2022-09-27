<!DOCTYPE html>
<html>

<?php include_once'layout/head.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <?php include_once'layout/nav.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once'layout/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Today Approved User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
					                         <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
											 <th>Account</th>
											 <th>Txt Id</th>
											 <th>Employe Id</th>
											<th>Address</th>
											<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				   <?php 
				   foreach( $users as $user )
                                       { ?>
                                        <tr>
											<td><?=$user['name']?></td>
                                            <td><?=$user['phone']?></td>
											<td><?=$user['email']?></td>
											<td><?=$user['account_name']?></td>
											<td><?=$user['txt_id']?></td>
											<td><?=$user['id']?></td>
											<td><?=$user['address']?></td>
											<td>
												<div style="text-align:center"  class="dropdown">
													<a style="cursor:pointer" class=" dropdown-toggle" type="button" data-toggle="dropdown">
													<i class="fa fa-ellipsis-v" style="font-size:22px;" aria-hidden="true"></i>
													</a>
													<ul class="dropdown-menu">
								
													  <li><a href="generatePdf?id=<?=$user['id']?>"><i class="fa fa-check"></i>print</a></li>
													 
													</ul>
											  </div>
											</td>
                                         </tr>
					
									   <?php }?>
                  </tbody>
                  <tfoot>
                 <tr>
					                      <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
											 <th>Account</th>
											 <th>Txt Id</th>
											 <th>Employe Id</th>
											<th>Address</th>
											<th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
</div>
<?php include_once 'includes/scripts.php' ?>
  <?php include_once 'includes/js.php' ?>

<!-- page script -->
<script>
  $(function () {
   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>
</html>
