
<!--    
	
	¡NO UTILIZADO!
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / PONENTES - EDITAR: 
	JHON ALVARADO ACHATA

-->



<?php

while($datosPonente=$data['datos_ponente_edit']->fetch_assoc()){

	$idPonente = $datosPonente['idUsuario'];
	$nombre = $datosPonente['nombre'];
	$apellido = $datosPonente['apellido'];
	$dniUsu = $datosPonente['dniUsu'];
	$celUsu = $datosPonente['celUsu'];
	$emailUsu = $datosPonente['emailUsu'];
	
	$pais = $datosPonente['pais'];
	$ciudad = $datosPonente['ciudad'];
	$foto_ponente = $datosPonente['foto'];
	$empresa = $datosPonente['empresa'];
	$abreviatura = $datosPonente['abreviatura'];
	
	$bandera = $datosPonente['bandera'];
	$descripcion = $datosPonente['descripcion'];
	$link = $datosPonente['link'];

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
						<h3 class="box-title">Editar ponente: <?= $nombre . ' ' . $apellido ?></h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
					</div>
							<!-- /.box-header -->
						<br>
						<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal" style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">
								
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Número ponente</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder=""
											maxlength="5" id="numPon" name="numPon" value="<?= $idPonente ?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Nombres</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputName" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+"
											name="firstName" value="<?= $nombre ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputLast" class="col-sm-2 control-label">Apellidos</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputLast" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+"
											name="lastName" value="<?= $apellido ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputDni" class="col-sm-2 control-label">DNI</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputDni" placeholder=""
											name="dni" maxlength="11" value="<?= $dniUsu ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="contact_point" class="col-sm-2 control-label">Celular</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="" name="contact_point"
											id="contact_point" maxlength="20" value="<?= $celUsu ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="correo" class="col-sm-2 control-label">Email</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="email"
											pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo" value="<?= $emailUsu ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="country" class="col-sm-2 control-label">País</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="country" name="country" value="<?= $pais ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="uploadBtn" class="col-sm-2 control-label" style="font-size: 12px;">Agregar imagen bandera</label>
									<input style="display: none" type="text" id="uploadFile" name="textFlag" readonly/>
									<div class="col-sm-10">
										<input type="file" id="uploadBtn" name="imageFlag" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-2"></div>
									<div class="col-sm-10" style="text-align: center; width: 300px;">
										<img id="imgFlag" height="50px" src="<?= $bandera ?>" alt="your image"/>
									</div>
								</div>
								<div class="form-group">
									<label for="city" class="col-sm-2 control-label">Ciudad</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="city" name="city" value="<?= $ciudad ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="uploadBtnPhoto" class="col-sm-2 control-label" style="font-size: 12px;">Agregar foto ponente</label>
									<input style="display: none" type="text" id="uploadFilePhoto" name="textPhoto" readonly/>
									<div class="col-sm-10">
										<input type="file" id="uploadBtnPhoto" name="imagePhoto" accept="image/png,image/jpeg" style="margin-top: 4px;">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-2"></div>
									<div class="col-sm-10" style="text-align: center; width: 300px;">
										<img id="imgPhoto" height="200px" src="<?= $foto_ponente ?>" alt="your image"/>
									</div>
								</div>
								<div class="form-group">
									<label for="institution" class="col-sm-2 control-label">Nombre empresa</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="institution" id="institution" value="<?= $empresa ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="titulo" class="col-sm-2 control-label">Título profesional</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" pattern="[A-Za-z. ]+[.]" name="titulo" id="titulo" value="<?= $abreviatura ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Descripción ponente</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="5" placeholder="Ingrese ..." name="descripcion"><?= $descripcion ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="link" class="col-sm-2 control-label"  style="font-size: 9px;">Enlace externo - más información</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="link" id="link" value="<?= $link ?>">
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
											<a href="<?= FOLDER_PATH . '/admin/speakers' ?>">
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
		function readURL1(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#imgFlag')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
		function readURL2(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#imgPhoto')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#uploadBtn").change(function() {
			readURL1(this);
		});
		$("#uploadBtnPhoto").change(function() {
			readURL2(this);
		});
	</script>

	<script>
		document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.files[0].name;
		};
		document.getElementById("uploadBtnPhoto").onchange = function () {
			document.getElementById("uploadFilePhoto").value = this.files[0].name;
		};
	</script>

</body>

</html>