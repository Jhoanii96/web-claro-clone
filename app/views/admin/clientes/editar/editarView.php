<?php

$datos = $data['datos_usu']->fetch();
$row = $data['datos_cliente']->fetch();

$id = $row[0];
$dni = $row[1];
$celular = $row[2];
$nombre = $row[3];
$apellido = $row[4];
$direccion = $row[5];
$region = $row[6];
$provincia = $row[7];
$distrito = $row[8];

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar usuario | <?= $nombre . ' ' . $apellido ?></title>
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

        .form-horizontal .form-group {
            margin-right: 0px;
            margin-left: 0px;
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
                    CLIENTE: <?= $nombre . ' ' . $apellido ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= FOLDER_PATH ?>/"><i class="fa fa-table"></i>Principal</a></li>
                    <li style="color: #444;">Clientes</li>
                    <li class="active">Editar</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Editar cliente</h3>
                                <!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
                            </div>
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="#">

                                <div class="box-body">

                                    <div class="col-md-6">

                                        <input style="display:none" type="password" name="fakepasswordremembered" />
                                        <input type="text" style="display: none" class="form-control" id="id" name="id" value="<?= $id ?>">

                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" value="<?= $dni ?>" name="dni" id="dni" maxlength="8" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Celular</label>
                                            <input type="text" class="form-control" pattern="[0-9 ]+" name="cellphone" value="<?= $celular ?>" id="phone" maxlength="15" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" value="<?= $nombre ?>" name="firstName" id="firstName">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase"  value="<?= $apellido ?>" name="lastName" id="lastName">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input type="text" class="form-control" value="<?= $direccion ?>" name="address" id="address">
                                        </div>
                                        <div class="form-group">
                                            <label>Región</label>
                                            <input type="text" class="form-control" name="region" value="<?= $region ?>" id="region">
                                        </div>
                                        <div class="form-group">
                                            <label>Provincia</label>
                                            <input type="text" class="form-control" name="prov" value="<?= $provincia ?>" id="prov">
                                        </div>
                                        <div class="form-group">
                                            <label>Distrito</label>
                                            <input type="text" class="form-control" name="dist" value="<?= $distrito ?>" id="dist">
                                        </div>


                                    </div>



                                </div>

                                <div class="box-footer">
                                    <div class="col-md-12">
                                        <button type="button" style="border-radius: 0;" data-name-text="Actualizando..." class="btn btn-success" name="update" value="true" id="cliact">
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
        $('#cliact').on('click', function() {
			var idv = <?php echo $id; ?>;
			var dni = $('#dni').val();
			var phn = $('#phone').val();
			var fnm = $('#firstName').val();
			var lnm = $('#lastName').val();
			var adr = $('#address').val();
			var reg = $('#region').val();
			var pro = $('#prov').val();
			var dis = $('#dist').val();
            var upd = $('#cliact').val();

            var data = new FormData();

			data.append("idv", idv);
			data.append("dni", dni);
			data.append("phn", phn);
			data.append("fnm", fnm);
			data.append("lnm", lnm);
			data.append("adr", adr);
			data.append("reg", reg);
			data.append("pro", pro);
			data.append("dis", dis);
            data.append("update", upd);
			
			$.ajax({
				beforeSend: function() {
                    Pace.restart();
					var btnadd = document.getElementById('cliact');
					var text = btnadd.getAttribute('data-name-text');
					$("#cliact").html('');
					$("#cliact").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-cl' class='fa fa-spinner fa-spin'></span>");
					$("#cliact").attr("disabled", true);
				},
				url: "<?= FOLDER_PATH ?>/admin/clientes/edit",
				type: "POST",
				data: data,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
				success: function(resp) {
					$("#spinner-cl").remove();
					$("#cliact").html('Actualizado');
					$("#cliact").attr("disabled", false);
					setTimeout(function() {
						location.href = "<?= FOLDER_PATH ?>/admin/clientes";
					}, 500);
				}
			})
		});
	
    </script>

</body>

</html>