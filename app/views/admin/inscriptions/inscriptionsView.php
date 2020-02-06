
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / INSCRIPCION: 
	JOSUE ALDAIR MAMANI CARIAPAZA

	COLABORACIONES Y MODIFICACIONES:
	JHON ALVARADO ACHATA

-->


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Inscripciones Conferencia | XX CIIS</title>
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
					Inscripciones Charlas/Conferencias
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?= FOLDER_PATH ?>/"><i class="fa fa-table"></i>Inicio</a></li>
					<li class="active">Inscripciones</a></li>
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
								<h3 class="box-title">Inscribir usuario</h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form class="form" autocomplete="off" method="post" action="/2019/admin/inscriptions/save">
								<div class="box-body">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre usuario</label>
											<select name="idUsuario" class="form-control select2" style="width: 100%;">
												<?php
													$this->model = new adminModel();
													$result1 = $this->model->mostrar_nombrealumnos();
													if ($result1->num_rows > 0) {
														while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
															
															if ($data['nombre_usuario'] == ($row['nombre_usuario'] . ' ' . $row['apellido_usuario'])) {
																echo '
																	<option value="' . $row['id_usuario'] . '" selected>
																		' . $row['nombre_usuario'] . ' ' . $row['apellido_usuario'] . ' 
																	</option>
																';
															} else {
																echo '
																	<option value="' . $row['id_usuario'] . '">
																		' . $row['nombre_usuario'] . ' ' . $row['apellido_usuario'] . ' 
																	</option>
																';
															}															
														}
													}
												?>
														
											</select>
										</div>
										<div class="form-group">
											<label>Fecha inscripción - automática</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" name="fechaInscripcion" value="<?= date('Y-m-d', strtotime(date('Y-m-d'))); ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label for="tipoConferencia">Conferencia</label>
											<select class="form-control" id="tipoConferencia" name="tipoConferencia">
												<option value="1">Postmaster</option>
												<option value="2" selected>Congreso internacional</option>
											</select>
										</div>
										<div class="form-group">
											<label for="tipoInscripcion">Tipo inscripción</label>
											<input type="text" class="form-control" name="tipoInscripcion" value="Plataforma" readonly />
											<!-- <input type="text" class="form-control" id="numeroArticulo" value="Internet" readonly/> -->
										</div>
									</div>

									<div class="col-md-6">
										<div class="col-md-6">
											<div class="form-group">
												<label for="tipoPago">Tipo pago</label>
												<select class="form-control" id="tipoPago" name="tipoPago">
													<option value="1">Efectivo</option> <!-- Plataforma -->
													<option value="2">Voucher</option> <!-- Pre-inscripción -->
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="pagoAdelanto">Pago Inicial/Total</label>
												<input type="text" class="form-control" name="pagoAdelanto">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="pagoTotal">Costo Inscripción</label>
												<select class="form-control" name="pagoTotal">
													<?php 
													
														if ($data['tipo_usuario_pago'] == "100") {
															echo '
																<option value="100" selected>S/.100.00</option>
																<option value="140">S/.140.00</option>
																<option value="80">S/.80.00</option>
																<option value="70">S/.70.00</option>
																<option value="50">S/.50.00</option>
															';
														} elseif ($data['tipo_usuario_pago'] == "140") {
															echo '
																<option value="100">S/.100.00</option>
																<option value="140" selected>S/.140.00</option>
																<option value="80">S/.80.00</option>
																<option value="70">S/.70.00</option>
																<option value="50">S/.50.00</option>
															';
														} else {
															echo '
																<option value="100" selected>S/.100.00</option>
																<option value="140">S/.140.00</option>
																<option value="80">S/.80.00</option>
																<option value="70">S/.70.00</option>
																<option value="50">S/.50.00</option>
															';
														}
														
													?>
												</select>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="estadoPreinscripcion">Estado inscripcion</label>
												<select class="form-control" name="estadoPreinscripcion">
													<option value="1">En espera</option>
													<option value="2" selected>Inscrito</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="pagoTotal">Código asistencia</label>
												<input id="casist" type="text" class="form-control" name="codAsist">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="pagoTotal">Número operación</label>
												<input type="text" class="form-control" name="numOper">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<!-- <label for="link_photo_voucher">Agregar imagen</label> -->
												<input type="hidden" name="link_photo_voucher" accept="image/png,image/jpeg">
											</div>
										</div>

										<div class="col-md-12">
											<div class="box-footer">
												<br>
												<button id="aver" type="submit" class="btn btn-primary">Inscribir usuario</button>
											</div>
										</div>
									</div>

								</div>
								<!-- /.box-body -->

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
							</div>

							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Id</th>
											<th>DNI</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Tipo conferencia</th>
											<th>Fecha inscripción</th>
											<th>Tipo inscripción</th>
											<th>Pago abonado</th>
											<th>Saldo</th>
											<th>Código</th>
											<th>Editar</th>
											<th>Borrar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($rowInscripcion = $data['datos_inscripcion']->fetch_assoc()) {
											$saldo = $rowInscripcion['pagIns'] - $rowInscripcion['paaIns'];
											if ($rowInscripcion['epiIns'] == 1) {
												$estado = "En espera";
											} elseif ($rowInscripcion['epiIns'] == 2) {
												$estado = "Inscrito";
											}
											if ($rowInscripcion['tpaIns'] == 1) {
												$tipo_pago = "Efectivo";
											} elseif ($rowInscripcion['tpaIns'] == 2) {
												$tipo_pago = "Voucher";
											} 
											$nombre = $rowInscripcion['nomIns'] . ' ' . $rowInscripcion['apeIns'];
											$nombre = base64_encode(utf8_encode($nombre));
											echo '
												<tr>
													<td>' . $rowInscripcion['numIns'] . '</td>
													<td>' . $rowInscripcion['dniIns'] . '</td>
													<td>' . $rowInscripcion['nomIns'] . '</td>
													<td>' . $rowInscripcion['apeIns'] . '</td>
													<td>' . $rowInscripcion['actIns'] . '</td>
													<td>' . $rowInscripcion['fecIns'] . '</td>
													<td>' . $rowInscripcion['tipIns'] . '</td>
													<td><a target="_blank" href="' . FOLDER_PATH . '/impresion/' . $rowInscripcion['pagIns'] . '/'. $nombre .'"> S/. ' . $rowInscripcion['pagIns'] .'</a></td>
													<td>S/. ' . $saldo . '.00 </td>
													<td>' . $rowInscripcion['codAsistencia'] . '</td>
													<td class="button" align=\'center\'>
														<a href="' . FOLDER_PATH . '/admin/inscriptions/edit/' . $rowInscripcion['numIns'] . '">
														<input class="button-style" type=button value="Editar">
														</a>
													</td>
													<td class="button" align=\'center\'>
														<a href="' . FOLDER_PATH . '/admin/inscriptions/delete/' . $rowInscripcion['numIns'] . '">
															<input class="button-style" type="submit" value="Borrar">
														</a>
													</td>
												</tr>
												';
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th>Nro</th>
											<th>DNI</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>conferencia</th>
											<th>Fecha</th>
											<th>Tipo inscripción</th>
											<th>Pago abonado</th>
											<th>Saldo</th>
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
				autoclose: true
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

	<!-- <script>
		$(document).ready(function() {
			$("#select").click(function() {
				var data = document.getElementById("tipoCharla").value;
				$('.list').load("/2019/app/ajax/talks_load.php", {
					activity: data
				});
			});
		});
	</script> -->

</body>

</html>