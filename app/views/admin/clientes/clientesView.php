<?php

$datos = $data['datos_usu']->fetch();

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel de clientes | Claro</title>
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
					CLIENTES
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?= FOLDER_PATH ?>/admin"><i class="fa fa-table"></i>Principal</a></li>
					<li class="active">Clientes</a></li>
				</ol>
			</section>
			<br>
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#adding" data-toggle="tab">Agregar</a></li>
						<li><a href="#tablelist" data-toggle="tab">Lista</a></li>
					</ul>
					<div class="tab-content">
						<div class="active tab-pane" id="adding">

							<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="#">

								<div class="box-body">

									<div class="col-md-6">

										<input style="display:none" type="password" name="fakepasswordremembered" />
										<div class="form-group">
											<label>DNI</label>
											<input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" name="dni" id="dni" maxlength="8">
										</div>
										<div class="form-group">
											<label>Celular</label>
											<input type="text" class="form-control" pattern="[0-9 ]+" name="cellphone" id="phone" maxlength="15">
										</div>
										<div class="form-group">
											<label>Nombres</label>
											<input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" name="firstName" id="firstName">
										</div>
										<div class="form-group">
											<label>Apellidos</label>
											<input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform: uppercase" name="lastName" id="lastName">
										</div>


									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Dirección</label>
											<input type="text" class="form-control" name="address" id="address">
										</div>
										<div class="form-group">
											<label>Región</label>
											<input type="text" class="form-control" name="region" id="region">
										</div>
										<div class="form-group">
											<label>Provincia</label>
											<input type="text" class="form-control" name="prov" id="prov">
										</div>
										<div class="form-group">
											<label>Distrito</label>
											<input type="text" class="form-control" name="dist" id="dist">
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">

											</div>
										</div>
									</div>

								</div>

								<div class="box-footer">
									<div class="col-md-12">
										<button id="cliadd" type="button" data-name-text="Agregando..." class="btn btn-success">
											Agregar nuevo cliente
										</button>
									</div>

								</div>


							</form>

						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tablelist">
							<div class="row">
								<div class="col-xs-12">
									<div class="box" style="border-top:none">
										<div class="box-header">
											<h3 class="box-title">Tabla administrador</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body">
											<table id="example1" class="table table-bordered table-hover" style="font-size: 12px;">
												<thead>
													<tr>
														<th>Nro</th>
														<th>Nombre</th>
														<th>Apellido</th>
														<th>Oficina</th>
														<th>Celular</th>
														<th>Tipo usuario</th>
														<th>IP Address</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody>

													<?php


													/* while ($rowAdmin = $data['tadministrador']->fetch()) {
														if ($rowAdmin['ip'] != NULL || $rowAdmin['ip'] != "") {
															$ip = $rowAdmin['ip'];
														} else {
															$ip = '0.0.0.0';
														}
														echo '
													<tr id="data-a_' . $rowAdmin['id'] . '">
														<td>' . $rowAdmin['id'] . '</td> 
														<td>' . $rowAdmin['nombre'] . '</td>
														<td>' . $rowAdmin['apellido'] . '</td>
														<td>' . $rowAdmin['oficina'] . '<br>' . $rowAdmin['unidad'] . '</td>
														<td>' . $rowAdmin['celular'] . '</td>
														<td id="iduser" data-iden-id="' . $rowAdmin['id_tipo'] . '">' . $rowAdmin['nombre_tipo'] . '</td>
														<td>' . $ip . '</td>
														<td style="display: flex;">
															<a href="' . FOLDER_PATH . '/administrador/edit/' . $rowAdmin['id'] . '" title="Editar" style="margin-right: 7px;">
																<button id="btn-edit" type="button" data-value="' . $rowAdmin['id'] . '" class="btn btn-block btn-success">
																	<span class="fa fa-pencil"></span>
																</button>
															</a>
															<form method="post">
																<input style="display: none" name="admi" value="' . $rowAdmin['id'] . '">
																<button id="btndlt-' . $rowAdmin['id'] . '" type="button" title="Eliminar" class="btn btn-block btn-danger" onclick="deleteAdm(' . $rowAdmin['id'] . ')">
																	<span class="fa fa-times"></span>
																</button>
															</form>
															<div id="spinner-dlt-' . $rowAdmin['id'] . '"></div>
														</td>
													</tr>
													';
													} */
													?>
												</tbody>
												<tfoot>
													<tr>
														<th>Nro</th>
														<th>Nombre</th>
														<th>Apellido</th>
														<th>Oficina</th>
														<th>Celular</th>
														<th>Tipo usuario</th>
														<th>IP Address</th>
														<th>Acciones</th>
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
						</div>
						<!-- /.tab-pane -->
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
		$('#cliadd').on('click', function() {
			var idv = <?php echo $id; ?>;
			var dni = $('#dni').val();
			var phn = $('#phone').val();
			var fnm = $('#firstName').val();
			var lnm = $('#lastName').val();
			var adr = $('#address').val();
			var reg = $('#region').val();
			var pro = $('#prov').val();
			var dis = $('#dist').val();

			if (dni == "") {
				swal("Atención!", "Debe ingresar su número de DNI", "warning");
				return;
			}
			if (dni.length != 8) {
				swal("Atención!", "Debe el DNI debe contener 8 números", "warning");
				return;
			}
			if (fnm == "") {
				swal("Atención!", "Debe ingresar el nombre del cliente", "warning");
				return;
			}
			if (lnm == "") {
				swal("Atención!", "Debe ingresar el apellido del cliente", "warning");
				return;
			}
			
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
			
			$.ajax({
				beforeSend: function() {
                    Pace.restart();
					var btnadd = document.getElementById('cliadd');
					var text = btnadd.getAttribute('data-name-text');
					$("#cliadd").html('');
					$("#cliadd").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-cl' class='fa fa-spinner fa-spin'></span>");
					$("#cliadd").attr("disabled", true);
				},
				url: "<?= FOLDER_PATH ?>/admin/clientes/save",
				type: "POST",
				data: data,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
				success: function(resp) {
					$("#spinner-cl").remove();
					$("#cliadd").html('Agregado');
					$("#cliadd").attr("disabled", false);
					setTimeout(function() {
						location.href = "<?= FOLDER_PATH ?>/admin/clientes";
					}, 500);
				}
			})
		});
	</script>

</body>

</html>