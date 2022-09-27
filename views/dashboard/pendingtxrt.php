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
            <h1>Pending Trxt</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pending Trxt</li>
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
											<th>Refferal</th>
											<th>Account</th>
											 <th>Txt Id</th>
											 <th>Action</th>
                                            <th>Phone</th>
                                            <th>Email</th>
											 <th>Employe Id</th>
											<th>Address</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php foreach($users as $user) : ?>
					<tr>
											<td><?=$user['name']?></td>
											<td><?=$user['invitee_name']?></td>
											<td><?=$user['account_name']?></td>
											<td><?=$user['txt_id']?></td>
											<td>
												<div style="text-align:center"  class="dropdown">
													<a style="cursor:pointer" class=" dropdown-toggle" type="button" data-toggle="dropdown">
													<i class="fa fa-ellipsis-v" style="font-size:22px;" aria-hidden="true"></i>
													</a>
													<ul class="dropdown-menu">
								                   <li><a href="#" onClick="Approvedmember(<?=$user['id']?>)"><i class="fa fa-check"></i>Approved</a></li>
													  <li><a href="#" onClick="RejectedUser(<?=$user['id']?>)"><i class="fa fa-check"></i>Rejecte</a></li>
													</ul>
											  </div>
											</td>
                                            <td><?=$user['phone']?></td>
											<td><?=$user['email']?></td>
											<td><?=$user['id']?></td>
											<td><?=$user['address']?></td>
											
                                         </tr>
					
				  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
					                       <th>Name</th>
											<th>Refferal</th>
											<th>Account</th>
											 <th>Txt Id</th>
											 <th>Action</th>
                                            <th>Phone</th>
                                            <th>Email</th>
											 <th>Employe Id</th>
											<th>Address</th>
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
  <?php include_once 'layout/scripts.php' ?>
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
  function Approvedmember(id)
  {
	      const apprroveIDs = [];

	  const idIndex = apprroveIDs.indexOf(id);
	  if (idIndex > -1) {
        apprroveIDs.splice(idIndex, 1);
      } else {
        apprroveIDs.push(id);
      }
	 makePostAjaxCall('approveMembers', apprroveIDs).then(res => {
   
                console.log(res);
                if (res['message']== "successful") {
                    swal.fire({
                        title: "Approved!",
                        text: "users Approved Successfully ",
                        icon: "success",
                    });
                    window.setTimeout(function() {
                        location.reload()
                    }, 3000)

                } else if (res['message'] == "unsuccessful") {
                    swal.fire({
                        title: "OOO00ppppss",
                        text: "Error Processing Your Request",
                        icon: "error",
                    });
                }
  
      });
  }
</script>
</body>
</html>
