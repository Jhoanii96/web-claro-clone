
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / ORGANIZADORES: 
	JOSUE ALDAIR MAMANI CARIAPAZA

-->




<?php

while($datosOrganizador=$data['datos_Organizador_edit']->fetch_assoc()){

	$idOrg = $datosOrganizador['idOrg'];
	$nomOrg = $datosOrganizador['nombre'];
	$apeOrg = $datosOrganizador['apellido'];
	$dniOrg = $datosOrganizador['dniUsu'];
	$celOrg = $datosOrganizador['celUsu'];
	$emailOrg = $datosOrganizador['emailUsu'];
	$imagen = $datosOrganizador['fotoUsu'];
	$codOrganizador = $datosOrganizador['codOrganizador'];
	$claveOrganizador = base64_decode($datosOrganizador['claveOrganizador']);
	$rolOrg = $datosOrganizador['rol'];

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Editar organizador | XX CIIS</title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/2019/src/admin/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/2019/src/admin/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/2019/src/admin/css/ionicons.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="/2019/src/admin/css/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/2019/src/admin/css/AdminLTE.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="/2019/src/admin/css/dataTables.bootstrap.min.css">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/2019/src/admin/css/_all-skins.min.css">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


	<style>
		.button-edit {
			color: #fff;
			background: #0000ad;
			border: 2px solid;
			border-radius: 5%;
			padding-top: 3px;
			padding-bottom: 3px;
			padding-right: 12px;
			padding-left: 12px;
			-webkit-transition-duration: 0.4s;
			transition-duration: 0.4s;
		}

		.button-edit:hover {
			border: 2px solid rgb(76, 172, 175);
		}
	</style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php require(ROOT . '/' . PATH_VIEWS . 'navbar_table.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<br>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Editar organizador: <?= $nomOrg . ' ' . $apeOrg ?></h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
					</div>
							<!-- /.box-header -->
						<br>
						<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal" style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">
								
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Número organizador</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder=""
											maxlength="5" id="numOrg" name="numOrg" value="<?= $idOrg ?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Nombres</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputName" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+"
											style="text-transform:uppercase" name="firstName" value="<?= $nomOrg ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputLast" class="col-sm-2 control-label">Apellidos</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputLast" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+"
											style="text-transform:uppercase" name="lastName" value="<?= $apeOrg ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputDni" class="col-sm-2 control-label">DNI</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputDni" placeholder=""
											pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" name="dni" maxlength="8" value="<?= $dniOrg ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="contact_point" class="col-sm-2 control-label">Celular</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="" pattern="[0-9 ]+" name="contact_point"
											id="contact_point" maxlength="15" value="<?= $celOrg ?>">
									</div>
								</div>
								
								<div class="form-group">
									<label for="correo" class="col-sm-2 control-label">E-mail</label>

									<div class="col-sm-10">
										<input autocomplete="off" class="form-control" type="text"
										pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo" value="<?= $emailOrg ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="yearStudent" class="col-sm-2 control-label">Rol organizador</label>

									<div class="col-sm-10">
										<select class="form-control" name="rol">
											<?php
												if($rolOrg == 'Super Administrador') {
													echo '
													<option selected>Super Administrador</option>
													<option>Administrador</option>
													<option>Usuario</option>
													';
												} else if ($rolOrg == 'Administrador') {
													echo '
													<option>Super Administrador</option>
													<option selected>Administrador</option>
													<option>Usuario</option>
													';
												} else if ($rolOrg == 'Usuario') {
													echo '
													<option>Super Administrador</option>
													<option>Administrador</option>
													<option selected>Usuario</option>
													';
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="photoInputFile" class="col-sm-2 control-label" style="font-size: 12px;">Agregar foto organizador</label>
									<input style="display: none" type="text" id="uploadFile" name="textImage" readonly/>
									<div class="col-sm-10">
										<input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-2"></div>
									<div class="col-sm-10" style="text-align: center; width: 300px;">
										<img id="imgg" height="200px" src="<?= $imagen ?>" alt="your image"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="code" class="col-sm-2 control-label">Código</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="code" id="code" value="<?= $codOrganizador ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Contraseña</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" name="password" id="password" autocomplete="new-password" value="<?= $claveOrganizador ?>">
									</div>
								</div>
								
								<div class="box-footer" style="padding-left: 25px;">
								<div style="display: inline-flex; position: relative; top: 5px; height: 57px; margin-top: 5px; margin-bottom: 5px;">
										<p class="text-center">
											<button class="button-edit" style="margin-right: 10px;" type="submit" name="update" value="true">
												<span>Actualizar</span>
											</button>
										</p>

										<p class="text-center">
											<a href="<?= FOLDER_PATH . '/admin/organizers' ?>">
												<button class="button-edit" type="button">
													<span>Cancelar</span>
												</button>
											</a>	
										</p>
									</div>
								</div>
								<!-- /.box-footer -->
							</form>

						
					
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
	<script src="/2019/src/admin/js/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="/2019/src/admin/js/bootstrap.min.js"></script>
	<!-- Select2 -->
	<script src="/2019/src/admin/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="/2019/src/admin/js/jquery.dataTables.min.js"></script>
	<script src="/2019/src/admin/js/dataTables.bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="/2019/src/admin/js/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="/2019/src/admin/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="/2019/src/admin/js/demo.js"></script>

	<?php require(ROOT . '/' . PATH_VIEWS . 'pushjs.php'); ?>

	<script>
		$(function () {
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
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#imgg')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#photoInputFile").change(function() {
			readURL(this);
		});
	</script>

	<script>
		document.getElementById("photoInputFile").onchange = function () {
			document.getElementById("uploadFile").value = this.files[0].name;
		};
	</script>

</body>

</html>