
<!--    
	
	¡NO UTILIZADO!
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / PONENTES: 
	JHON ALVARADO ACHATA

-->

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Ponentes | XX CIIS</title>
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
					Ponentes
					<small>Usuarios</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-table"></i><a href="<?= FOLDER_PATH . '/admin' ?>">
								Principal</a></a>
					</li>
					<li class="active">Usuarios</a></li>
					<li class="active">Ponentes</a></li>
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

							<form method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off" action="/2019/admin/speakers/save">
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Nombres</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputName" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+"
											name="firstName">
									</div>
								</div>
								<div class="form-group">
									<label for="inputLast" class="col-sm-2 control-label">Apellidos</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputLast" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+"
											name="lastName">
									</div>
								</div>
								<div class="form-group">
									<label for="inputDni" class="col-sm-2 control-label">DNI</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputDni" placeholder=""
											name="dni" maxlength="11">
									</div>
								</div>

								<div class="form-group">
									<label for="contact_point" class="col-sm-2 control-label">Celular</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="" name="contact_point"
											id="contact_point" maxlength="15">
									</div>
								</div>

								<div class="form-group">
									<label for="correo" class="col-sm-2 control-label">Email</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="email"
											pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo">
									</div>
								</div>

								<div class="form-group">
									<label for="country" class="col-sm-2 control-label">País</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="country" name="country">
									</div>
								</div>
								<div class="form-group">
									<label for="uploadBtn" class="col-sm-2 control-label" style="font-size: 12px;">Agregar imagen bandera</label>
									<div class="col-sm-10">
										<input type="file" id="uploadBtn" name="imageFlag" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<label for="city" class="col-sm-2 control-label">Ciudad</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="city" name="city">
									</div>
								</div>
								<div class="form-group">
									<label for="uploadBtnPhoto" class="col-sm-2 control-label" style="font-size: 12px;">Agregar foto ponente</label>

									<div class="col-sm-10">
										<input type="file" id="uploadBtnPhoto" name="imagePhoto" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<label for="institution" class="col-sm-2 control-label">Nombre empresa</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="institution" id="institution">
									</div>
								</div>
								<div class="form-group">
									<label for="titulo" class="col-sm-2 control-label">Título profesional</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" pattern="[A-Za-z. ]+[.]" name="titulo" id="titulo">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Descripción ponente</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" placeholder="Ingrese ..." name="descripcion"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="link" class="col-sm-2 control-label"  style="font-size: 9px;">Enlace externo - más información</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="link" id="link">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-primary">Agregar Ponente</button>
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
											<h3 class="box-title">Tabla de ponentes</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body">
											<table id="example1" class="table table-bordered table-hover" style="font-size: 11px;">
												<thead>
													<tr>
														<th>Nro</th>
														<th>Abr.</th>
														<th>Nombres</th>
														<th>Apellidos</th>
														<th>DNI</th>
														<th>Celular</th>
														<th>E-Mail</th>
														<th>País</th>
														<th>Ciudad</th>
														<th>Empresa</th>
														<th>Editar</th>
														<th>Borrar</th>
													</tr>
												</thead>
												<tbody>

												<?php 
												
												while($rowPonente=$data['datos_ponente']->fetch_assoc()){
												echo '
												<tr>
													<th>'.$rowPonente['idUsuario'].'</th>
													<th>'.$rowPonente['abreviatura'].'</th>
													<th>'.$rowPonente['nombre'].'</th>
													<th>'.$rowPonente['apellido'].'</th>
													<th>'.$rowPonente['dniUsu'].'</th>
													<th>'.$rowPonente['celUsu'].'</th>
													<th>'.$rowPonente['emailUsu'].'</th>
													<th>'.$rowPonente['pais'].'</th>
													<th>'.$rowPonente['ciudad'].'</th>
													<th>'.$rowPonente['empresa'].'</th>
													<td class="button" align=\'center\'>
														<a href="' . FOLDER_PATH . '/admin/speakers/edit/' . $rowPonente['idUsuario'] . '">
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
														<th>Nro</th>
														<th>Abr.</th>
														<th>Nombres</th>
														<th>Apellidos</th>
														<th>DNI</th>
														<th>Celular</th>
														<th>E-Mail</th>
														<th>País</th>
														<th>Ciudad</th>
														<th>Empresa</th>
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

</body>

</html>