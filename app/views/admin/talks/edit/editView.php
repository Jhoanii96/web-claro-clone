
<!--    
	
	¡NO UTILIZADO!
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / CHARLAS: 
	JHON ALVARADO ACHATA

-->


<?php

while($datosCharla=$data['datos_charla_edit']->fetch_assoc()){

	$idCharla = $datosCharla['idCharla'];
	$nomCharla = $datosCharla['nombre'];
	$actividad = $datosCharla['actividad'];
	$tematica = $datosCharla['tematica'];
	$usuario = $datosCharla['usuario'];
	$fecha = $datosCharla['fecha'];
	$hora = $datosCharla['hora'];
	$turno = $datosCharla['turno'];
	$duracion = $datosCharla['duracion'];
										
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Editar conferencia: <?= $nomCharla ?> | XX CIIS</title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/2019/src/admin/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/2019/src/admin/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/2019/src/admin/css/ionicons.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="/2019/src/admin/css/select2.min.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="/2019/src/admin/css/bootstrap-datepicker.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/2019/src/admin/css/AdminLTE.min.css">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="/2019/src/admin/css/bootstrap-timepicker.min.css">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/2019/src/admin/css/_all-skins.min.css">
	
	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	
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
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<!-- left column -->
					<!-- general form elements -->
					<div class="col-md-12">

						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">DATOS CONFERENCIA/CHARLA: <?= $nomCharla ?></h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
							
								<div class="box-body">
									<div class="col-md-6">
										<input style="display:none">
										<div class="form-group">
											<label for="titleTalks">Número conferencia</label>
											<input type="text" class="form-control" id="NumTalks" name="idTalks" value="<?= $idCharla ?>" readonly/>
										</div>
										<div class="form-group">
											<label for="titleTalks">Nombre evento</label>
											<input type="text" class="form-control" id="titleTalks" name="titleTalks" placeholder="Ingrese nombre evento" value="<?= $nomCharla ?>"
												autofocus>
										</div>
										<div class="form-group">
											<label for="yearStudent">Tipo conferencia</label>
											<select class="form-control" name="typeTalks">
											<?php 
												if ($actividad == 1) {
													echo '
														<option value="1" selected>Postmaster</option>
														<option value="2">Congreso internacional</option>
													';
												} elseif ($actividad == 2) {
													echo '
														<option value="1">Postmaster</option>
														<option value="2" selected>Congreso internacional</option>
													';
												}
											?>
											</select>
										</div>
										<div class="form-group">
											<label>Nombre temática</label>
											<select class="form-control select2" style="width: 100%;" name="idTopics">
											<?php
												while($rowdTopics=$data['datos_drop_topics']->fetch_assoc()){
													if ($rowdTopics['idTem'] == $tematica) {
														echo'
															<option value="' . $rowdTopics['idTem'] . '" selected>' . $rowdTopics['nombre'] . '</option>
														';
													} else {
														echo'
															<option value="' . $rowdTopics['idTem'] . '">' . $rowdTopics['nombre'] . '</option>
														';
													}
												}
											?>
											</select>
										</div>
										<div class="form-group">
											<label>Nombre ponente</label>
											<select class="form-control select2" style="width: 100%;" name="idSpeakers">
												<?php
													while($rowdSpeakers=$data['datos_drop_speakers']->fetch_assoc()){
														if ($rowdSpeakers['idUsuario'] == $usuario) {
															echo'
																<option value="' . $rowdSpeakers['idUsuario'] . '" selected>' . $rowdSpeakers['nombres'] . '</option>
															';
														} else {
															echo'
																<option value="' . $rowdSpeakers['idUsuario'] . '">' . $rowdSpeakers['nombres'] . '</option>
															';
														}
													}
													/* <option selected="selected">Alabama</option> */
												?>
											</select>
										</div>
									</div>

									<div class="col-md-6">
									<div class="form-group">
											<label>Fecha conferencia</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker" name="dateTalks" value="<?= $fecha ?>">
											</div>
										</div>
										<!-- time Picker -->
										<div class="bootstrap-timepicker">
											<div class="form-group">
											<label>Hora conferencia:</label>

											<div class="input-group">
												<input type="text" class="form-control timepicker" name="hourTalks" value="<?= $hora ?>">

												<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
												</div>
											</div>
											<!-- /.input group -->
											</div>
											<!-- /.form group -->
										</div>
										

										<div class="form-group">
											<label for="yearStudent">Duración conferencia</label>
											<select class="form-control" name="durationTalks">
											<?php 
												if ($duracion == '1 hora') {
													echo '
														<option selected>1 hora</option>
														<option>2 horas</option>
													';
												} elseif ($duracion == '2 horas') {
													echo '
														<option>1 hora</option>
														<option selected>2 horas</option>
													';
												}
											?>
											</select>
										</div>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer" style="padding-left: 25px;">
								<div style="display: inline-flex; position: relative; top: 5px; height: 57px; margin-top: 5px; margin-bottom: 5px;">
										<p class="text-center">
											<button class="button-edit" style="margin-right: 10px;" type="submit" name="update" value="true">
												<span>Actualizar</span>
											</button>
										</p>

										<p class="text-center">
											<a href="<?= FOLDER_PATH . '/admin/talks' ?>">
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

						<!-- /.box -->
					</div>
					<!--/.col (left) -->

				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php require(ROOT . '/' . PATH_VIEWS . 'aside_control.php'); ?>

	</div>
	
	
	<script src="/2019/src/admin/js/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="/2019/src/admin/js/bootstrap.min.js"></script>
	<!-- Select2 -->
	<script src="/2019/src/admin/js/select2.full.min.js"></script>
	<!-- FastClick -->
	<script src="/2019/src/admin/js/fastclick.js"></script>
	<!-- bootstrap datepicker -->
	<script src="/2019/src/admin/js/bootstrap-datepicker.min.js"></script>
	<!-- AdminLTE App -->
	<script src="/2019/src/admin/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="/2019/src/admin/js/demo.js"></script>
	<!-- bootstrap time picker -->
	<script src="/2019/src/admin/js/bootstrap-timepicker.min.js"></script>

	<?php require(ROOT . '/' . PATH_VIEWS . 'pushjs.php'); ?>


	<script>
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2()
			//Date picker
			$('#datepicker').datepicker({
				autoclose: true,
				format: 'yyyy-mm-dd'
			})
			//Timepicker
			$('.timepicker').timepicker({
				showInputs: false,
				minuteStep: 5
			})
		})
	</script>

	<script>
		var input = document.getElementById('numeroArticulo');
		input.oninvalid = function(event) {
    		event.target.setCustomValidity('Username should only contain lowercase letters. e.g. john');
		}
	</script>

</body>

</html>