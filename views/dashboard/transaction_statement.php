  <html>
  <?php include_once 'layout/head.php'; ?>
  <link rel="stylesheet" href="../assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/admin/plugins/select2/css/select2.min.css">

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include_once 'layout/nav.php'; ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php include_once 'layout/sidebar.php'; ?>


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Transaction Statement</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Transaction Statement</li>
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
                    <h3 class="card-title">Transaction Statement</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="upload_transaction_statement" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="exampleInputFile">Thumbnail</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="attachment" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <!--<div class="input-group-append">
								<span class="input-group-text" id="">Upload</span>
							  </div>-->
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

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
      <?php include_once 'layout/footer.php'; ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once 'layout/js.php'; ?>
    <?php include_once 'layout/scripts.php'; ?>
    <!-- Bootstrap4 Duallistbox -->
    <!-- Select2 -->
    <script src="../assets/admin/plugins/select2/js/select2.full.min.js"></script>
  </body>


  </html>
  <!-- /.content-wrapper -->