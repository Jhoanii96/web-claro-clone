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

                                    $code = $row[0] . '|' . $row[2];
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
                                                    <a style="color: #fff" href="' . FOLDER_PATH . '/admin/clientes/edit/' . $code . '">
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
                                                        <option value="2">Vendido</option>
                                                        <option value="3">Caído</option>
                                                        ';
                                                    } elseif ($row[6] == '2') {
                                                        echo '
                                                        <option value="1">Pendiente</option>
                                                        <option value="2" selected>Vendido</option>
                                                        <option value="3">Caído</option>
                                                        ';
                                                    } elseif ($row[6] == '3') {
                                                        echo '
                                                        <option value="1">Pendiente</option>
                                                        <option value="2">Vendido</option>
                                                        <option value="3" selected>Caído</option>
                                                        ';
                                                    }


                                                    echo '
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="center_cell">
                                                    <a style="color: #fff" href="' . FOLDER_PATH . '/atencion/hide/' . $code . '">
                                                        <span class="ctrl_with btn_style">X (Ocultar)</span>
                                                    </a>
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
            }
            
            /* var audio = new Audio('<?= FOLDER_PATH ?>/src/assets/media/sound/notification.mp3');
            var promise = audio.play();
            if (promise) {
                promise.catch(function(error) {
                    console.error(error);
                });
            } */
        }
    });
</script>