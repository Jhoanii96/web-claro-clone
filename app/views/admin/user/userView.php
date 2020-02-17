<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / USUARIOS: 
	JHON ALVARADO ACHATA

-->

<?php

$datos = $data['datos_usu']->fetch();

?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?= FOLDER_PATH ?>/src/assets/image/favicon.ico">
	<title>Usuarios | El Dorado</title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/ionicons.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/AdminLTE.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/pace.min.css">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/_all-skins.min.css">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<style>
		#example1_wrapper>div:nth-child(2) {
			overflow-x: auto;
			border-right: none;
		}

		@media only screen and (min-width: 128px) and (max-width: 992px) {
			#example1_wrapper>div:nth-child(2) {
				overflow-x: auto;
				padding-right: 0px;
				margin-right: 0px;
				border-right: 1px solid #f4f4f4;
				padding-top: 0px;
				margin-top: 0px;
			}
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
					USUARIOS
					<small>Gerente\Administrador\Supervisor\Ejecutivo</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?= FOLDER_PATH . '/admin' ?>"><i class="fa fa-tv"></i>Principal</a></li>
					<li class="active">Usuarios</a></li>
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

							<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="#" autocomplete="off">
								<div class="form-group">
									<label class="col-sm-2 control-label">Nombres</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="fname" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+" style="text-transform:uppercase" name="fname">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Apellidos</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="lname" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+" style="text-transform:uppercase" name="lname">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">E-mail</label>

									<div class="col-sm-10">
										<input autocomplete="off" class="form-control" type="text" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Estado</label>

									<div class="col-sm-10">
										<select class="form-control" name="status" id="status">
											<option value="1">Activo</option>
											<option value="0">Inactivo</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Género</label>

									<div class="col-sm-10">
										<select class="form-control" name="gen" id="gender">
											<option value="M">Masculino</option>
											<option value="F">Femenino</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Rol usuario</label>

									<div class="col-sm-10">
										<select class="form-control" name="rol" id="rol_user" onchange="selectSupr(this)">
											<option value="1">Gerente</option>
											<option value="2">Administrador</option>
											<option value="3">Supervisor</option>
											<option value="4">Ejecutivo</option>
										</select>
									</div>
								</div>

								<div class="form-group" id="select_supr" style="display: none;">
									<label class="col-sm-2 control-label">Supervisor</label>

									<div class="col-sm-10">
										<select class="form-control" name="supr" id="supr">
											<?php
											while ($data_row = $data['supervisor']->fetch()) {
												echo '
													<option value="' . $data_row[0] . '">' . $data_row[1] . ' ' . $data_row[2] . '</option>
												';
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Agregar foto</label>

									<div class="col-sm-10">
										<input type="file" id="photoInputFilePhoto" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Código</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="code" id="code">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Contraseña</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" id="add_user" style="border-radius: 0" data-name-text="Agregando..." class="btn btn-primary">Agregar usuario</button>
									</div>
								</div>
							</form>

						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tablelist">
							<div class="row">
								<div class="col-xs-12">
									<div class="box" style="border-top: none;">
										<div class="box-header">
											<h3 class="box-title">Tabla de organizadores</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body">
											<table id="example1" class="table table-bordered table-hover" style="font-size: 12px;">
												<thead>
													<tr>
														<th>Nro</th>
														<th>Nombres</th>
														<th>Apellidos</th>
														<th>E-Mail</th>
														<th>Tipo</th>
														<th>Código</th>
														<th>Editar</th>
														<th>Borrar</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($row = $data['table_user']->fetch()) {
														echo '
															<tr>
																<td>' . $row[0] . '</td>	
																<td>' . $row[1] . '</td>
																<td>' . $row[2] . '</td>	
																<td>' . $row[5] . '</td>
																<td>' . $row[8] . '</td>
																<td>' . $row[3] . '</td>
																<td class="button" align=\'center\'>
																	<a href="' . FOLDER_PATH . '/admin/user/edit/' . $row[0] . '">
																		<input class="button-style" type=button value="Editar">
																	</a>
																</td>
																<td class="button">
																	<form><input class="button-style" type=submit value="Borrar"></form>
																</td>
															</tr>
															';
													}
													?>
												</tbody>
												<tfoot>
													<tr>
														<th>N°</th>
														<th>Nombres</th>
														<th>Apellidos</th>
														<th>E-Mail</th>
														<th>Tipo</th>
														<th>Código</th>
														<th>Editar</th>
														<th>Borrar</th>
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

	<!-- JQUERY -->
	<script src="<?= FOLDER_PATH ?>/src/js/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= FOLDER_PATH ?>/src/js/bootstrap.min.js"></script>
	<!-- Select2 -->
	<script src="<?= FOLDER_PATH ?>/src/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="<?= FOLDER_PATH ?>/src/js/jquery.dataTables.min.js"></script>
	<script src="<?= FOLDER_PATH ?>/src/js/dataTables.bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="<?= FOLDER_PATH ?>/src/js/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= FOLDER_PATH ?>/src/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= FOLDER_PATH ?>/src/js/demo.js"></script>
	<!-- Pace -->
	<script src="<?= FOLDER_PATH ?>/src/js/pace.min.js"></script>
	<!-- SWEETALERT -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

	<?php require(ROOT . '/' . PATH_VIEWS . 'pushjs.php'); ?>

	<script>
		$(function() {
			$('#example1').DataTable()
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

	<script>

		function selectSupr(e) {
			var nom_value = e.value;
			if (nom_value == 4) {
				document.getElementById("select_supr").style.display="block";
			} else {
				document.getElementById("select_supr").style.display="none";
			}
		}

		$('#add_user').on('click', function() {
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var correo = $('#correo').val();
			var status = $("#status").children("option:selected").val();
			var gender = $("#gender").children("option:selected").val();
			var rol_user = $("#rol_user").children("option:selected").val();
			var supr = $("#supr").children("option:selected").val();
			var code = $('#code').val();
			var password = $('#password').val();

			if (fname == "") {
				swal("Atención!", "Debe ingresar el nombre del usuario", "warning");
				return;
			}
			if (lname == "") {
				swal("Atención!", "Debe ingresar el apellido del usuario", "warning");
				return;
			}
			if (correo == "") {
				swal("Atención!", "Debe ingresar el correo del usuario", "warning");
				return;
			}
			if (code == "") {
				swal("Atención!", "Debe ingresar el nombre de acceso del usuario", "warning");
				return;
			}
			if (password == "") {
				swal("Atención!", "Debe ingresar la contraseña del usuario", "warning");
				return;
			}

			var data = new FormData();

			data.append("fname", fname);
			data.append("lname", lname);
			data.append("correo", correo);
			data.append("status", status);
			data.append("gender", gender);
			data.append("rol_user", rol_user);
			data.append("supr", supr);
			data.append("image", $('input[type=file]')[0].files[0]);
			data.append("code", code);
			data.append("password", password);

			$.ajax({
				beforeSend: function() {
					Pace.restart();
					var btnadd = document.getElementById('add_user');
					var text = btnadd.getAttribute('data-name-text');
					$("#add_user").html('');
					$("#add_user").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-us' class='fa fa-spinner fa-spin'></span>");
					$("#add_user").attr("disabled", true);
				},
				url: "<?= FOLDER_PATH ?>/admin/user/save",
				type: "POST",
				data: data,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
				success: function() {
					$("#spinner-us").remove();
					$("#add_user").html('Agregado');
					$("#add_user").attr("disabled", false);
					setTimeout(function() {
						location.href = "<?= FOLDER_PATH ?>/admin/user";
					}, 500);
				}
			})
		});
	</script>

</body>

</html>