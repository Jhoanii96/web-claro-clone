<!-- Content Wrapper. Contains page content -->
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

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de clientes &MediumSpace;<span style="background-color: #007a80;color: white;font-size: 14px;">&MediumSpace;Por atender&MediumSpace;</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Celular</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $data['mostrar_tprincipal4']->fetch()) {

                                    $code = $row[8] . '|' . $row[2];
                                    $code = base64_encode(utf8_encode($code));

                                    if($row[7] == '1') {
                                        echo '
                                        <tr>
                                            <td>' . $row[0] . '</td>	
                                            <td>' . $row[1] . '</td>
                                            <td>' . $row[2] . '</td>
                                            <td>' . $row[3] . '</td>
                                            <td>
                                                <div class="center_cell">
                                                    <a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $row[8] . '?its_ec=1">
                                                        <span class="ctrl_with btn_style">Editar</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center_cell">
                                                    <select name="status" id="data-status-' . $row[0] . '" class="ctrl_with btn_style" onchange="selectStatus(' . $row[0] . ')">
                                                    ';

                                                    if ($row[6] == '1') {
                                                        echo '
                                                        <option value="1" selected>Pendiente</option>
                                                        <option value="4">En ejecución</option>
                                                        <option value="2">Instalado</option>
                                                        <option value="3">Caído</option>
                                                        ';
                                                    } elseif ($row[6] == '2') {
                                                        echo '
                                                        <option value="1">Pendiente</option>
                                                        <option value="4">En ejecución</option>
                                                        <option value="2" selected>Instalado</option>
                                                        <option value="3">Caído</option>
                                                        ';
                                                    } elseif ($row[6] == '3') {
                                                        echo '
                                                        <option value="1">Pendiente</option>
                                                        <option value="4">En ejecución</option>
                                                        <option value="2">Vendido</option>
                                                        <option value="3" selected>Caído</option>
                                                        ';
                                                    } elseif ($row[6] == '4') {
                                                        echo '
                                                        <option value="1">Pendiente</option>
                                                        <option value="4" selected>En ejecución</option>
                                                        <option value="2">Vendido</option>
                                                        <option value="3">Caído</option>
                                                        ';
                                                    }


                                                    echo '
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center_cell">
                                                    <button class="ctrl_with btn_style" id="data-hide-' . $row[0] . '" style="color: #fff" onclick="statusHide(' . $row[0] . ')">
                                                        <span>Ocultar</span>
                                                    </button>
                                                </div>
                                            </td>
                                        ';
                                    }

                                    
                                }
                                ?>
                            </tbody>
                            
                            
                            <tfoot>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Celular</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->





    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div id="jscrt"></div>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script src="<?= FOLDER_PATH ?>/src/js/push.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5f03dcb0303409e74fd6', {
        cluster: 'mt1',
        forceTLS: true
    });

    var channel = pusher.subscribe('ejecutivo');
    channel.bind('principal', function(data) {
        if (data.prinl == 'prl4') {
            if (data.ect == <?= '\'' . $this->admin . '\'' ?>) {
                $.ajax({
                    beforeSend: function() {
                        Pace.restart();
                    },
                    url: "<?= FOLDER_PATH ?>/admin/attention/list",
                    success: function(result) {
                        $("#jscrt").html(result);
                    }
                });
                Push.create("EL DORADO Notifications", {
                    body: data.msg,
                    icon: "<?= FOLDER_PATH ?>/src/assets/image/logo_notificacion2.png",
                    timeout: 30000,
                    onClick: function() {
                        window.open('<?= FOLDER_PATH ?>/admin/', '_blank');
                        this.close();
                    }
                });
                
                var audio = new Audio('<?= FOLDER_PATH ?>/src/assets/sound/notification.mp3');
                var promise = audio.play();
                if (promise) {
                    promise.catch(function(error) {
                        console.error(error);
                    });
                }
            }
        }
    });
</script>


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
        order: [0, 'desc']
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