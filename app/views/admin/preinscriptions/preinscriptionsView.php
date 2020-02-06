
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / PREINSCRIPCIONES: 
	JHON ALVARADO ACHATA

-->



<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Pre-inscripciones Conferencia | XX CIIS</title>
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
					Lista de Pre-Inscripciones ─ Congreso Internacional
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-newspaper-o"></i><a href="<?= FOLDER_PATH . '/admin' ?>">
								Principal</a></a>
					</li>
					<li class="active">Noticias</a></li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-hover" style="font-size: 12px;">
									<thead>
										<tr>
											<th>Nro</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Fecha pre-inscripción</th>
											<th>Estado</th>
											<th>Ver informe</th>
											<th>Aprobar</th>
											<th>Denegar</th>
										</tr>
									</thead>
									<tbody>

										<?php
										while ($rowPreins = $data['preinscripciones']->fetch_assoc()) {
											if ($rowPreins['estado'] == '0') {
												$estado = 'En espera';
												$color = '#007a80';
											} elseif ($rowPreins['estado'] == '1') {
												$estado = 'Inscrito';
												$color = '#1400d2';
											} elseif ($rowPreins['estado'] == '2') {
												$estado = 'Denegado';
												$color = '#9e0707';
											}

											$nombre = $rowPreins['nombre'] . ' ' . $rowPreins['apellido'];
											$nombre = base64_encode(utf8_encode($nombre));

											echo '
											<tr>
												<td>' . $rowPreins['id'] . '</td>	
												<td>' . $rowPreins['nombre'] . '</td>
												<td>' . $rowPreins['apellido'] . '</td>
												<td>' . $rowPreins['fecha'] . '</td>
												<td><p align=\'center\' style="background-color: ' . $color . ';color: white;white-space: nowrap; padding: 0px 4px;">' . $estado . '</p></td>
												<td align=\'center\'>
													<a href="' . FOLDER_PATH . '/admin/preinscriptions/show/' . $rowPreins['id'] . '" target="_blank" style="text-decoration: underline;">
														Ver detalle
													</a>
												</td>
												<td class="button" align=\'center\'>
													<a href="' . FOLDER_PATH . '/admin/preinscriptions/accept/' . $rowPreins['id'] . '/' . $rowPreins['email'] . '/' . $nombre . '">
														<button type="button" style="color: black;">Inscribir</button>
													</a>
												</td>
												<td class="button" align=\'center\'>
													<a href="' . FOLDER_PATH . '/admin/preinscriptions/decline/' . $rowPreins['id'] . '">
														<button type="button" style="color: black;">Denegar</button>
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
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Fecha pre-inscripción</th>
											<th>Estado</th>
											<th>Ver informe</th>
											<th>Aprobar</th>
											<th>Denegar</th>
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

	<script>
		var input = document.getElementById('numeroArticulo');
		input.oninvalid = function(event) {
			event.target.setCustomValidity('Username should only contain lowercase letters. e.g. john');
		}
	</script>

	<script>
		$(document).ready(function() {
			$("#select").click(function() {
				var data = document.getElementById("tipoCharla").value;
				$('.list').load("/2019/app/ajax/talks_load.php", {
					activity: data
				});
			});
		});
	</script>

</body>

</html>