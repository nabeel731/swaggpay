<!DOCTYPE html>
<html>

<?php include_once 'layout/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once 'layout/nav.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once 'layout/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Levels</h1>
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

                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($levels as $level) { ?>
                        <tr>
                          <td><?= $level['title'] ?></td>

                          <td>
                            <div style="text-align:center" class="dropdown">
                              <a style="cursor:pointer" class=" dropdown-toggle" type="button" data-toggle="dropdown">
                                <i class="fa fa-ellipsis-v" style="font-size:22px;" aria-hidden="true"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#" onClick="showLevelUpdateModal(<?= $level['id'] ?>)"><i class="fa fa-edit"></i> Update</a></li>

                                <li><a href="#" onClick="deleteLevel(<?= $level['id'] ?>)"><i class="fa fa-trash"></i> Delete</a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>

                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
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
  <?php include_once 'includes/levelUpdateModal.php' ?>
  <?php include_once 'includes/levelModal.php' ?>
  <?php include_once 'includes/scripts.php' ?>
  <?php include_once 'includes/js.php' ?>
  <!-- page script -->
  <script>
    $(function() {

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