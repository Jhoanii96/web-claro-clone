
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

							<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal" action="<?= FOLDER_PATH ?>/admin/organizers/save">
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Nombres</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputName" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+"
											style="text-transform:uppercase" name="firstName">
									</div>
								</div>
								<div class="form-group">
									<label for="inputLast" class="col-sm-2 control-label">Apellidos</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputLast" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+"
											style="text-transform:uppercase" name="lastName">
									</div>
								</div>
								
								<div class="form-group">
									<label for="correo" class="col-sm-2 control-label">E-mail</label>

									<div class="col-sm-10">
										<input autocomplete="off" class="form-control" type="text"
										pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo">
									</div>
								</div>
								<div class="form-group">
									<label for="status" class="col-sm-2 control-label">Estado</label>

									<div class="col-sm-10">
										<select class="form-control" name="status">
											<option value="1">Activo</option>
											<option value="0">Inactivo</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Género</label>

									<div class="col-sm-10">
										<select class="form-control" name="gen">
											<option value="M">Masculino</option>
											<option value="F">Femenino</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="yearStudent" class="col-sm-2 control-label">Rol usuario</label>

									<div class="col-sm-10">
										<select class="form-control" name="rol">
											<option value="1">Gerente</option>
											<option value="2">Administrador</option>
											<option value="3">Supervisor</option>
											<option value="4">Ejecutivo</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Supervisor</label>

									<div class="col-sm-10">
										<select class="form-control" name="supr">
											<option value="desc">etc</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="photoInputFilePhoto" class="col-sm-2 control-label">Agregar foto</label>

									<div class="col-sm-10">
										<input type="file" id="photoInputFilePhoto" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<label for="code" class="col-sm-2 control-label">Código</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="code" id="code">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Contraseña</label>

									<div class="col-sm-10">
										<input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" style="border-radius: 0" class="btn btn-primary">Agregar usuario</button>
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
													$this->model = new adminModel();
													while($row=$data['table_user']->fetch()){
														echo '
															<tr>
																<td>'.$row[0].'</td>	
																<td>'.$row[1].'</td>
																<td>'.$row[2].'</td>	
																<td>'.$row[5].'</td>
																<td>'.$row[8].'</td>
																<td>'.$row[3].'</td>
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

</body>

</html>