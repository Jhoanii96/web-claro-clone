<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Módulo de trabajo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-tv"></i> Principal</a></li>
            <li class="active">Módulo Ejecutivos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabla de supervisor</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Ejecutivo</th>
                                    <th>Fecha actualizada</th>
                                    <th>Estado atención</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = $data['mostrar_tprincipal3']->fetch()) {

                                    $code = $row[0] . '|' . $row[2];
                                    $code = base64_encode(utf8_encode($code));

                                    if ($row[6] == '1') {
                                        $estado = 'Pendiente';
                                    } elseif ($row[6] == '2') {
                                        $estado = 'Instalado';
                                    } elseif ($row[6] == '3') {
                                        $estado = 'Caído';
                                    } elseif ($row[6] == '4') {
                                        $estado = 'En ejecución';
                                    }

                                    echo '
                                        <tr>
                                            <td>' . $row[0] . '</td>	
                                            <td>' . $row[1] . '</td>
                                            <td>' . $row[2] . '</td>
                                            <td>' . $row[3] . '</td>
                                            <td>' . $row[4] . '</td>
                                            <td>' . $row[5] . '</td>
                                            <td>' . $estado . '</td>
                                            <td>
                                                <div class="center_cell">
                                                    <button class="ctrl_with btn_style" style="color: #fff" data-toggle="modal" data-target="#info-' . $row[0] . '">
                                                        <span>Detalle</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    ';
                                }
                                ?>
                            </tbody>


                            <tfoot>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Ejecutivo</th>
                                    <th>Fecha actualizada</th>
                                    <th>Estado atención</th>
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




<div id="modals">
<?php
while ($row = $data['mostrar_datencion']->fetch()) {

if ($row[13] == '1') {
    $estado = 'Pendiente';
} elseif ($row[13] == '2') {
    $estado = 'Instalado';
} elseif ($row[13] == '3') {
    $estado = 'Caído';
} elseif ($row[13] == '4') {
    $estado = 'En ejecución';
}



echo '
<div class="modal fade" id="info-' . $row[0] . '" tabindex="-1" role="dialog" aria-labelledby="info_label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="display: inline-block;">Datos completo del cliente: ' . $row[1] . ' ' . $row[2] . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display: inline-block;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="false" novalidate>
                    
                    <div class="box-body">

                        <div class="col-md-6">

                            

                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="' . $row[1] . '">
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="' . $row[2] . '">
                            </div>
                            <div class="form-group">
                                <label>DNI</label>
                                <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" value="' . $row[3] . '" maxlength="8">
                            </div>
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" pattern="[0-9 ]+" value="' . $row[4] . '" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label>Segundo número celular</label>
                                <input type="text" class="form-control" value="' . $row[14] . '" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" value="' . $row[5] . '">
                            </div>
                            <div class="form-group">
                                <label>Región</label>
                                <input type="text" class="form-control" value="' . $row[6] . '">
                            </div>
                        </div>

                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>Provincia</label>
                                <input type="text" class="form-control" value="' . $row[7] . '">
                            </div>
                            <div class="form-group">
                                <label>Distrito</label>
                                <input type="text" class="form-control" value="' . $row[8] . '">
                            </div>
                            <div class="form-group">
                                <label>Usuario ejecutivo</label>
                                <input type="text" class="form-control" value="' . $row[9] . '">
                            </div>
                            <div class="form-group">
                                <label>Fecha registro del cliente</label>
                                <input type="text" class="form-control" value="' . $row[10] . '">
                            </div>
                            <div class="form-group">
                                <label>Fecha atención del ejecutivo</label>
                                <input type="text" class="form-control" value="' . $row[11] . '">
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" value="' . $estado . '">
                            </div>
                            <div class="form-group">
        						<label>Descripción\Observación</label>
        						<textarea class="form-control" rows="2">' . $row[15] . '</textarea>
        					</div>

                        </div>



                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" style="background-color: #1b218e; color: #fff; border-radius: 0;" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>';
}


?>
</div>








<div id="jscrt"></div>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5f03dcb0303409e74fd6', {
        cluster: 'mt1',
        forceTLS: true
    });

    var channel = pusher.subscribe('supervisor');
    channel.bind('principal', function(data) {
        if (data.prinl == 'prl3') {
            if (data.supr == <?= '\'' . $this->admin . '\'' ?>) {
                $.ajax({
                    beforeSend: function() {
                        Pace.restart();
                    },
                    url: "<?= FOLDER_PATH ?>/admin/supervisor/change",
                    success: function(result) {
                        $("#jscrt").html(result);
                    }
                });

                $.ajax({
                    url: "<?= FOLDER_PATH ?>/admin/supervisor/modals",
                    success: function(result) {
                        $("#modals").html(result);
                    }
                });
                
                var audio = new Audio('<?= FOLDER_PATH ?>/src/assets/sound/notification2.mp3');
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
        'ordering': false
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