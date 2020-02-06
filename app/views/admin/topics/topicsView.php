
<!--    
	
	¡NO UTILIZADO!
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / TEMATICAS: 
	JHON ALVARADO ACHATA

-->


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Temáticas | XX CIIS</title>
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

	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/2019/src/admin/css/_all-skins.min.css">
	<script src="/2019/src/admin/js/jquery.min.js"></script>
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
					Temática
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-table"></i><a href="<?= FOLDER_PATH . '/admin' ?>">
								Principal</a></a>
					</li>
					<li class="active">Temática</a></li>
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
								<h3 class="box-title">Agregar Temática</h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form method="post" role="form" autocomplete="off" enctype="multipart/form-data" action="/2019/admin/topics/save">
								<div class="box-body">
									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre temática</label>
											<input type="text" class="form-control" placeholder="Ingrese nombre temática" name="titleTopics" autofocus>
										</div>
										<div class="form-group">
											<label>Descripción</label>
											<textarea class="form-control" rows="3" placeholder="Ingrese ..." name="description"></textarea>
										</div>
										<div class="form-group">
											<label for="photoInputFile">Agregar imagen</label>
											<input style="display: none" type="text" id="uploadFile" name="textImage" readonly />
											<input type="file" id="photoInputFile" name="image" id="uploadBtn" accept="image/png,image/jpeg">
										</div>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-primary" style="margin-left: 15px; padding-left: 30px; padding-right: 30px;">Agregar temática</button>
								</div>
								<!-- /.box-footer -->
							</form>



							<div class="col-md-12" style="border-top: 1px solid #d2d2d2;"></div>


							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Nro</th>
											<th>Título</th>
											<th>Descripción</th>
											<th>Editar</th>
											<th>Borrar</th>
										</tr>
									</thead>
									<tbody>
										<?php

										while ($rowTematicas = $data['datos_topics']->fetch_assoc()) {
											echo '
												<tr>
													<td>' . $rowTematicas['idTem'] . '</td>	
													<td title="' . $rowTematicas['nombre'] . '">' . $rowTematicas['nombre'] . '</td>
													<td title="' . $rowTematicas['descripcion'] . '">' . $rowTematicas['descripcion'] . '</td>
													<td class="button" align=\'center\'>
														<a href="' . FOLDER_PATH . '/admin/topics/edit/' . $rowTematicas['idTem'] . '">
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
											<th>Descripción</th>
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
					<!--/.col (left) -->

				</div>
				<!-- /.row -->

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<?php require(ROOT . '/' . PATH_VIEWS . 'aside_control.php'); ?>

	</div>
	<!-- ./wrapper -->
	<script src="/2019/src/admin/js/main2.js"></script>


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

</body>

</html>