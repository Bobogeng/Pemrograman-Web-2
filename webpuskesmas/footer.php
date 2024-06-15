<?php
if (!isset($root)) {
    $root = "";
}
?>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024 <a href="#"><?= $_SESSION['name'] ?></a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $root ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $root ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= $root ?>plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $root ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $root ?>plugins/moment/moment.min.js"></script>
<script src="<?= $root ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= $root ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $root ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $root ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $root ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $root ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $root ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $root ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= $root ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $root ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $root ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $root ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $root ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $root ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $root ?>dist/js/demo.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        $('#table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    });
</script>
</body>

</html>