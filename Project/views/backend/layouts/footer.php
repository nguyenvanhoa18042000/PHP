 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../../public/public_admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/public_admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="" src="../../../public/public_blog/js/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/public_admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../../public/public_admin/assets/dist/js/adminlte.min.js"></script>
<script src="../../public/public_admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/public_admin/assets/dist/js/demo.js"></script>
<!-- jQuery Mapael -->
<script src="../../public/public_admin/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../public/public_admin/assets/plugins/raphael/raphael.min.js"></script>
<script src="../../public/public_admin/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../public/public_admin/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../public/public_admin/assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../public/public_admin/assets/dist/js/pages/dashboard2.js"></script>
<script>
  $(document).ready(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
