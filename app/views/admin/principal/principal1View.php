<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Módulo de trabajo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tv"></i> Principal</a></li>
            <li class="active">Módulo cliente reciente</li>
        </ol>
    </section>

    
</div>
<!-- /.content-wrapper -->




</div>
  <!-- ./wrapper -->
  
  <!-- jQuery 3 -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= FOLDER_PATH ?>/src/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.dataTables.min.js"></script>
  <script src="<?= FOLDER_PATH ?>/src/js/dataTables.bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?= FOLDER_PATH ?>/src/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= FOLDER_PATH ?>/src/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.sparkline.min.js"></script>
  <!-- Pace -->
  <script src="<?= FOLDER_PATH ?>/src/js/pace.min.js"></script>
  <!-- jvectormap  -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= FOLDER_PATH ?>/src/js/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= FOLDER_PATH ?>/src/js/Chart.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= FOLDER_PATH ?>/src/js/demo.js"></script>
  
  <script>
    $(function() {
      $('#example1').DataTable({
        'ordering': true
      })
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    })
  </script>

  <!-- EVENTO SELECT STATUS -->
  <script type="text/javascript">
    function selectStatus(codeStatus) {
      var nom_value = $("#data-status-" + codeStatus).val();
      var code = codeStatus;

      var data = new FormData();

      data.append("novl", nom_value);
      data.append("code", code);

      $.ajax({
        beforeSend: function() {
          Pace.restart();
        },
        url: "<?= FOLDER_PATH ?>/admin/attention/s_in",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
        success: function(data) {
          $("#jscrt").html(data);
        }
      })
    }

    function statusHide(codeStatus) {
      var code = codeStatus;

      var data = new FormData();

      data.append("code", code);

      $.ajax({
        beforeSend: function() {
          Pace.restart();
        },
        url: "<?= FOLDER_PATH ?>/admin/attention/hide",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
        success: function(data) {
          $("#jscrt").html(data);
        }
      })
    }
  </script>