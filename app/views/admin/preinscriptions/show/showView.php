
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / MOSTRAR DETALLE - PREINSCRIPCIONES: 
	JHON ALVARADO ACHATA

-->


<?php
while ($datosPreInscripcion = $data['datosShow_preinscripcion']->fetch_assoc()) {

	$id = $datosPreInscripcion['id'];
	$dni = $datosPreInscripcion['dni'];
	$nombre = $datosPreInscripcion['nombre'];
	$email = $datosPreInscripcion['email'];
	$celular = $datosPreInscripcion['celular'];
	$fechains = $datosPreInscripcion['fecha'];
	$voucher = $datosPreInscripcion['voucher'];
	$tipo = $datosPreInscripcion['tipo'];

	$names = $nombre;
	$names = base64_encode(utf8_encode($names));

	if ($tipo == '3') {

		$pais_pro = $datosPreInscripcion['pais_pro'];
		$ciudad_pro = $datosPreInscripcion['ciudad_pro'];
		$grado_pro = $datosPreInscripcion['grado_pro'];
	} elseif ($tipo == '4') {

		$pais_est = $datosPreInscripcion['pais_est'];
		$ciudad_est = $datosPreInscripcion['ciudad_est'];
		$anio_est = $datosPreInscripcion['anio_est'];
		$institucion_est = $datosPreInscripcion['institucion_est'];
	}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Detalle: <?= $nombre ?> | Pre-inscripción</title>
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

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


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
						<h3 class="box-title">Detalles pre-inscripción: <?= $nombre ?></h3>
						<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
					</div>
					<!-- /.box-header -->
					<br>
					<form class="form-horizontal" style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">

						<div class="form-group">
							<label class="col-sm-2 control-label">DNI</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" value="<?= $dni ?>" readonly />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre completo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="<?= $nombre ?>" readonly />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" value="<?= $email ?>" readonly />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Celular</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" type="text" value="<?= $celular ?>" readonly />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Fecha pre-inscripción</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" type="text" value="<?= $fechains ?>" readonly />
							</div>
						</div>
						<?php

						if ($tipo == '3') {

							echo '
										
											<div class="form-group">
												<label class="col-sm-2 control-label">País</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $pais_pro . '" readonly/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Ciudad</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $ciudad_pro . '" readonly/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Grado profesional</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $grado_pro . '" readonly/>
												</div>
											</div>
										
										';
						} elseif ($tipo == '4') {

							echo '
										
											<div class="form-group">
												<label class="col-sm-2 control-label">País</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $pais_est . '" readonly/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Ciudad</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $ciudad_est . '" readonly/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Año de estudios</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $anio_est . ' año" readonly/>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Institución</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" value="' . $institucion_est . '" readonly/>
												</div>
											</div>
										
										';
						}

						?>

						<div class="form-group">
							<div class="col-sm-2"></div>
							<div class="col-sm-10" style="text-align: center; width: 300px;">
							<a href="<?= $voucher ?>" target="_blank"><img id="imgg" height="200px" src="<?= $voucher ?>" alt="your image" /></a>
								
							</div>
						</div>




						<!-- <div class="box-footer" style="padding-left: 25px;">
							<div style="display: inline-flex; position: relative; top: 5px; height: 57px; margin-top: 5px; margin-bottom: 5px;">
								<p class="text-center">
									<a href="<?= FOLDER_PATH . '/admin/preinscriptions/accept/' . $id . '/' . $email . '/' . $names ?>">
										<button class="button-edit" style="margin-right: 10px;" type="button">
											<span>Inscribir</span>
										</button>
									</a>
								</p>

								<p class="text-center">
									<a href="<?= FOLDER_PATH . '/admin/preinscriptions/decline/' . $id ?>">
										<button class="button-edit" type="button">
											<span>Denegar</span>
										</button>
									</a>
								</p>
							</div>
						</div> -->
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
		/* event listener */
		document.getElementsByName("dni")[0].addEventListener('input', doThing);
		document.getElementsByName("contact_point")[0].addEventListener('input', phoneNumber);
		/* function */
		function doThing() {
			document.getElementById("qr").value = btoa(this.value);
		}
		/* function */
		function phoneNumber() {
			var string2 = this.value;
			var phone = string2.replace(/(\d{2})(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 $4');
			document.getElementById("contact_point").value = phone;
		}
	</script>
</body>

</html>