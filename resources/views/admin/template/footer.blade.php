
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      {{ trans('admin/template/footer.mujde') }}
    </div>
    <!-- Default to the left -->
    <!-- !! for HTML render-->
      {!! trans('admin/template/footer.copyright') !!}
  </footer>

 </div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="{{ url('adminassets')}}/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('adminassets')}}/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{ url('adminassets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('adminassets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ url('adminassets')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ url('adminassets')}}/plugins/fastclick/fastclick.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- jQuery Colorbox -->
<script type="text/javascript" src="{{ url('adminassets') }}/plugins/colorbox/jquery.colorbox-min.js"></script>
<!-- Elfinder Pop-up -->
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.min.js"></script>
<!-- Laravel JS for Delete -->
<script src="{{ url('adminassets')}}/dist/js/laravel.js"></script>
<!-- Bootstrap Multiselect -->
<script src="{{ url('adminassets')}}/dist/js/bootstrap-multiselect.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminassets')}}/dist/js/app.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor', {
      filebrowserBrowseUrl : '/elfinder/ckeditor',
    });
    //Replace example2 with DataTable
     $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    // Bootstrap multiselect
    $('#multiSelect').multiselect({
        checkboxName: function(option) {
            return 'multiSelect[]';
        }

    });



  });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
