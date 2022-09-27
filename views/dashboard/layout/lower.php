<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>
  
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script src="<?=base_url('assets/admin/plugins/summernote/summernote-bs4.min.js')?>"></script>
<script src="../assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jQuery -->
<script src="<?=base_url('assets/admin/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/admin/dist/js/demo.js')?>"></script>
<!-- SWEET ALERT JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?= view('admin/includes/responses.php'); ?>
<!-- Select2 -->
<script src="<?=base_url('assets/admin/plugins/select2/js/select2.full.min.js')?>"></script>
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
</script>
<!-- Summernote -->
</body>
</html>
