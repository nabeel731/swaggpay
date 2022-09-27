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
  <?php include_once'layout/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
					<th>#</th>
					<th>User Level</th>
                    <th>Name</th>
					<th>Refral Name</th>
					<th>Phone</th>
                    <th>Email</th>
					<th>Trxt ID</th>
                    <th>Address</th>
					<th>City</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php foreach($users as $user) : ?>
					<tr>
						<td><?=$user['id']?></td>
						<td>User Lavel:<?=$user['level_id']?></td>
						<td><?=$user['name']?></td>
						<td><?=$user['invitee_name']?></td>
						<td><?=$user['phone']?></td>
						<td><?=$user['email']?></td>
						<td><?=$user['txt_id']?></td>
						<td><?=$user['address']?></td>
						<td><?=$user['city']?></td>
						<td>
							<div class="btn-group-vertical">
							
							<div class="btn-group">
							  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action
							  </button>
							  <ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#" onClick="showUserUpdateModal(<?=$user['id']?>)"><i class="fa fa-edit"></i> Update</a></li>
							   <li><a onClick="deleteUser(<?=$user['id']?>)" href="#" class="dropdown-item" ><i class="fa fa-trash"></i> Delete</a></li>
							   <?php if($user['status']==1)
													  {?>
													  <li><a href="#" class="dropdown-item" onClick="blockunblockUser(<?=$user['id']?>,'0')"><i class="fa fa-ban"></i> Ban</a></li>
													  <?php }
													  if($user['status']==0)
													  {
													  ?>
													   <li><a href="#" class="dropdown-item" onClick="blockunblockUser(<?=$user['id']?>,'1')"><i class="fa fa-ban"></i> UnBan</a></li>
													   <?php }?>
													   <li><a href="#" class="dropdown-item" onClick="changeLevel(<?=$user['id']?>)"><i class="fa fa-ban"></i> ChangeLevel</a></li>
													   
													  
							  </ul>
							</div>
						  </div>
						</td>
					</tr>
					
				  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
					<th>#</th>
                    <th>Name</th>
					<th>Refral Name</th>
					<th>Phone</th>
					<th>User Level</th>
                    <th>Email</th>
					<th>Trxt ID</th>
                    <th>Address</th>
					<th>City</th>
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
<?php include_once'layout/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include_once 'includes/userModal.php' ?>
            <!-- /.container-fluid -->
           
			<?php include_once 'includes/updateModal.php' ?>
			<?php include_once 'includes/responses.php' ?>
			<?php include_once 'includes/changeLevelModal.php' ?>
			<?php include_once 'includes/minamount.php' ?>
					<?php include_once 'includes/updatePasswordModal.php' ?>
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
