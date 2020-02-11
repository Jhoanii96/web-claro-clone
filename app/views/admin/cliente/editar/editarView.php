<?php

while ($rowTecn = $data['dataTecn']->fetch()) {

    $iden = $rowTecn['id'];
    $nombre = $rowTecn['nombre'];
    $apellido = $rowTecn['apellido'];
    $dni = $rowTecn['dni'];
    $email = $rowTecn['email'];
    $clave = $rowTecn['clave'];
    $foto = $rowTecn['foto'];
    $dni = $rowTecn['dni'];
    $facultad = $rowTecn['facultad'];
    $oficina = $rowTecn['oficina'];
    $unidad = $rowTecn['unidad'];
    $celular = $rowTecn['celular'];
    $fecha = $rowTecn['fecha'];

    if ($rowTecn['ip'] != NULL || $rowTecn['ip'] != "") {
        $ip = $rowTecn['ip'];
    } else {
        $ip = '0.0.0.0';
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de administración | Claro</title>
    <link rel="shortcut icon" href="<?= FOLDER_PATH ?>/src/assets/image/favicon.ico">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/jquery-jvectormap.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/_all-skins.min.css">

    <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/pace.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <style>
        .center_cell {
            text-align: center;
        }

        .ctrl_with {
            display: inline-block;
            width: 75%;
        }

        .btn_style {
            background-color: #e00000;
            border-style: none;
            color: #eaeaea;
            border-radius: 7%;
            border: 2px solid #fff;
        }

        .btn_style:hover {
            border: 2px solid #e0df00;
            transition: 0.5s;
        }

        .btn_style:focus {
            outline: none;
        }
    </style>


</head>


<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <?php require(ROOT . '/' . PATH_VIEWS . 'navbar_table.php'); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Administrativo: <?= $nombre ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= FOLDER_PATH ?>/"><i class="fa fa-table"></i><a href="<?= FOLDER_PATH . '/' ?>">Inicio</a></li>
                    <li style="color: #444;">Usuarios</li>
                    <li><a href="<?= FOLDER_PATH ?>/usuarios?uq=2">Técnicos</a></li>
                    <li class="active">Editar</li>
                </ol>
            </section>
            <br>
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#adding" data-toggle="tab">Editar</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="adding">

                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="#">

                                <input style="display:none" type="password" name="fakepasswordremembered" />
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Nombres</label>

                                    <div class="col-sm-10">
                                        <input type="text" style="display: none" class="form-control" id="id" name="id" value="<?= $iden ?>">
                                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" value="<?= $nombre ?>" name="firstName" id="firstName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Apellidos</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" value="<?= $apellido ?>" name="lastName" id="lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">E-Mail</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?= $email ?>" name="correo" id="correo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">DNI</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" value="<?= $dni ?>" name="dni" id="dni" maxlength="8">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Celular</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" pattern="[0-9 ]+" name="contact_point" value="<?= $celular ?>" id="contact_point" maxlength="15">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">F. Nacimiento</label>

                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" name="date" value="<?= $fecha ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Facultad</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="facultad_n" value="<?= $facultad ?>" id="data-fct" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><span><i id="refr-ofi" style="display: none;" class='fa fa-refresh fa-spin'></i></span>&MediumSpace;&MediumSpace;Oficina</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="oficina_n" value="<?= $oficina ?>" id="data-ofn" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><span><i id="refr-und" style="display: none;" class='fa fa-refresh fa-spin'></i></span>&MediumSpace;&MediumSpace;Unidad</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="unidad_n" value="<?= $unidad ?>" id="data-und" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Agregar imagen</label>

                                    <div class="col-sm-10">
                                        <input style="display: none" type="text" id="uploadFile" name="textImage" readonly />
                                        <input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
                                    </div>
                                </div>
                                <?php
                                if ($foto != "/src/assets/media/image/perfil/avatar.png") {
                                    echo "<div class=\"form-group\">
									<div class=\"col-sm-2\"></div>
										<div class=\"col-sm-10\" style=\"text-align: center; width: 300px;\">
											<img id=\"imgg\" height=\"200px\" src=" . FOLDER_PATH . $foto . " alt=\"your image\" />
										</div>
									</div>";
                                } else {
                                    echo "<div class=\"form-group\">
									<div class=\"col-sm-2\"></div>
										<div class=\"col-sm-10\" style=\"text-align: center; width: 300px;\">
											<img id=\"imgg\" height=\"200px\" src=\"" . FOLDER_PATH . "/src/assets/media/image/perfil/avatar.png\"/>
										</div>
									</div>";
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="password" id="password" value="<?= $clave ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" data-name-text="Actualizando..." class="btn btn-success" name="update" value="true" id="admedt">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.content-wrapper -->


        <?php require(ROOT . '/' . PATH_VIEWS . 'aside_control.php'); ?>

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
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>


    <script src="<?= FOLDER_PATH ?>/src/js/push.min.js"></script>


    <!-- <script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('b2fe8e2fa5b2da11752d', {
      cluster: 'mt1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      if (data.admin == 'new_user') {
        $.ajax({
          url: "<?= FOLDER_PATH ?>/notify/notifications",
          success: function(result) {
            $("#notifications").html(result);
          }
        });
        $.ajax({
          url: "<?= FOLDER_PATH ?>/notify/asistentes",
          success: function(result) {
            $("#nusers").html(result);
          }
        });

        Push.create("CIIS Tacna notificaciones", {
          body: data.name,
          icon: "https://scontent.faqp2-1.fna.fbcdn.net/v/t1.0-9/49213040_2150474188378498_2669784385959493632_n.png?_nc_cat=110&_nc_oc=AQkMB69MW-LlEG_rEIHNBx-4S5yJhoOHjOZgrP5-GUiLGHr3rXK2xHldapz4HnQW6L8&_nc_ht=scontent.faqp2-1.fna&oh=c189ef56bad43f5150a4aad80b861546&oe=5E2A1AE9",
          timeout: 60000,
          onClick: function() {
            window.open('<?= FOLDER_PATH ?>/admin', '_blank');
            this.close();
          }
        });

        var audio = new Audio('<?= FOLDER_PATH ?>/src/assets/media/sound/notification.mp3');
        var promise = audio.play();
        if (promise) {
          promise.catch(function(error) {
            console.error(error);
          });
        }
      }
    });
  </script> -->

    <script>
        $(function() {
            $('#example1').DataTable({
                order: [0, "desc"]
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
                    $("#data-status").prop("disabled", true);
                },
                url: "<?= FOLDER_PATH ?>/admin/",
                type: "POST",
                data: data,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(data) {
                    $("#data-status").prop("disabled", false);
                }
            })
        }
    </script>

</body>

</html>