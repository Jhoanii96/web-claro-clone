
<!--    
	
	¡NO UTILIZADO!
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / CHARLAS: 
	JHON ALVARADO ACHATA

-->

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Conferencias | XX CIIS</title>
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
	<!-- DataTables -->
	<link rel="stylesheet" href="/2019/src/admin/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="/2019/src/admin/css/bootstrap-timepicker.min.css">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/2019/src/admin/css/_all-skins.min.css">

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
					Charlas/Conferencias
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-table"></i><a href="<?= FOLDER_PATH . '/admin' ?>">
								Principal</a></a>
					</li>
					<li class="active">Conferencias</a></li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<!-- left column -->
					<!-- general form elements -->
					<div class="col-md-12">

						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Agregar conferencia</h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form method="post" role="form" autocomplete="off" enctype="multipart/form-data" action="/2019/admin/talks/save">
								<div class="box-body">
									<div class="col-md-6">
										<div class="form-group">
											<label for="titleTalks">Nombre evento</label>
											<input type="text" class="form-control" id="titleTalks" name="titleTalks" placeholder="Ingrese nombre evento" autofocus>
										</div>
										<div class="form-group">
											<label for="yearStudent">Tipo conferencia</label>
											<select class="form-control" name="typeTalks">
												<option value="1">Postmaster</option>
												<option value="2">Congreso internacional</option>
											</select>
										</div>
										<div class="form-group">
											<label>Nombre temática</label>
											<select class="form-control select2" style="width: 100%;" name="idTopics">
												<?php
												while ($rowdTopics = $data['datos_drop_topics']->fetch_assoc()) {
													echo '
														<option value="' . $rowdTopics['idTem'] . '">' . $rowdTopics['nombre'] . '</option>
													';
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Nombre ponente</label>
											<select class="form-control select2" style="width: 100%;" name="idSpeakers">
												<?php
												while ($rowdSpeakers = $data['datos_drop_speakers']->fetch_assoc()) {
													echo '
															<option value="' . $rowdSpeakers['idUsuario'] . '">' . $rowdSpeakers['nombres'] . '</option>
														';
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
												<input type="text" class="form-control pull-right" id="datepicker" name="dateTalks">
											</div>
										</div>
										<!-- time Picker -->
										<div class="bootstrap-timepicker">
											<div class="form-group">
												<label>Hora conferencia:</label>

												<div class="input-group">
													<input type="text" class="form-control timepicker" name="hourTalks">

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
												<option>1 hora</option>
												<option>2 horas</option>
											</select>
										</div>


									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-primary" style="margin-left: 15px; padding-left: 30px; padding-right: 30px;">Agregar conferencia</button>
								</div>
								<!-- /.box-footer -->
							</form>
						</div>

						<!-- /.box -->
					</div>
					<!--/.col (left) -->

				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Lista de conferencias</h3>
								<br><br>
								<div class="col-xs-4" style="padding-left: 0px; padding-right: 0px;">
									<div class="form-group">
										<label for="yearStudent">Tipo conferencia</label>
										<select class="form-control" id="tipoCharla" name="tipoCharla" style="width: 190px;">
											<option value="1">Postmaster</option>
											<option value="2">Congreso internacional</option>
											<option value="3" selected>Mostrar todos</option>
										</select>
									</div>
								</div>
							</div>

							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Nro</th>
											<th>Título</th>
											<th>Ponente</th>
											<th>Temática</th>
											<th>Conferencia</th>
											<th>Fecha y hora</th>
											<th>Duración</th>
											<th>Editar</th>
											<th>Borrar</th>
										</tr>
									</thead>
									<tbody class="list">
										<?php

										while ($rowCharlas = $data['datos_charlas']->fetch_assoc()) {
											echo '
													<tr>
													<td>' . $rowCharlas['idCha'] . '</td>	
													<td title="' . $rowCharlas['titulo'] . '">' . $rowCharlas['titulo'] . '</td>
													<td>' . $rowCharlas['nombres'] . '</td>
													<td>' . $rowCharlas['nombreTem'] . '</td>
													<td>' . $rowCharlas['tipoAct'] . '</td>
													<td>' . $rowCharlas['fechas'] . '</td>
													<td>' . $rowCharlas['duracion'] . '</td>
														<td class="button" align=\'center\'>
															<a href="' . FOLDER_PATH . '/admin/talks/edit/' . $rowCharlas['idCha'] . '">
																<input class="button-style" type=button value="Editar">
															</a>
														</td>
														<td class="button" align=\'center\'>
															<form><input class="button-style" type=submit value="Borrar"></form>
														</td>
													</tr>
													';
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th>Nro</th>
											<th>Título</th>
											<th>Ponente</th>
											<th>Temática</th>
											<th>Conferencia</th>
											<th>Fecha y hora</th>
											<th>Duración</th>
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
	<!-- DataTables -->
	<script src="/2019/src/admin/js/jquery.dataTables.min.js"></script>
	<script src="/2019/src/admin/js/dataTables.bootstrap.min.js"></script>
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
		$(function() {
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
		$(document).ready(function() {
			$("#tipoCharla").click(function() {
				var data = document.getElementById("tipoCharla").value;
				$('.list').load("/2019/app/ajax/talks_load.php", {
					activity: data
				});
			});
		});
	</script>

</body>

</html>