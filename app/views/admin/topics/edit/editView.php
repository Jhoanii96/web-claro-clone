
<!--    
	
	¡NO UTILIZADO!
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / TEMATICAS: 
	JHON ALVARADO ACHATA

-->


<?php

while($datosTematica=$data['datos_topics']->fetch_assoc()){

	$idTem = $datosTematica['idTem'];
	$nombre = $datosTematica['nombre'];
	$imagen = $datosTematica['imagen'];
	$descripcion = $datosTematica['descripcion'];

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Editar temática: <?= $nombre ?> | XX CIIS</title>
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/2019/src/admin/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/2019/src/admin/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/2019/src/admin/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/2019/src/admin/css/AdminLTE.min.css">
	
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/2019/src/admin/css/_all-skins.min.css">
	<link rel="stylesheet" href="/2019/src/admin/css/tagify.css">
	
	<script src="/2019/src/admin/js/jquery.min.js"></script>

	<script>
		// if IE, add IE tagify's polyfills
		! function (d) {
			if (!d.currentScript) {
				var s = d.createElement('script');
				s.src = 'dist/tagify.polyfills.min.js';
				d.head.appendChild(s);
			}
		}(document)
	</script>
	<script src="/2019/src/admin/js/tagify.js"></script>
	<script src="/2019/src/admin/js/jQuery.tagify.min.js"></script>

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
								<h3 class="box-title">EDITAR TEMÁTICA: N° <?= $nombre ?></h3>
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
										<input type="password" autocomplete="new-password" style="display:none">
										<div class="form-group">
											<label>Número temática</label>
											<input type="text" class="form-control"	pattern="[0-9]+" maxlength="5" name="idTem" value="<?= $idTem ?>" readonly>
										</div>
										<div class="form-group">
											<label for="photoInputFile">Agregar imagen</label>
											<input style="display: none" type="text" id="uploadFile" name="image_name" readonly/>
											<input type="file" placeholder="Añadir icono [png]" id="photoInputFile" name="image" accept="image/png">
										</div>
										<div style="text-align: center; width: 300px;">
											<img id="imgg" height="80px" src="<?= $imagen ?>" alt="your image"/>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Nombre temática</label>
											<input type="text" class="form-control" placeholder="Ingrese nombre temática" 
												name="titleTopics" value="<?= $nombre ?>" autofocus>
										</div>
										<div class="form-group">
											<label>Descripción</label>
											<textarea class="form-control" rows="3" placeholder="Ingrese ..." name="description"><?= $descripcion ?></textarea>
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
											<a href="<?= FOLDER_PATH . '/admin/topics' ?>">
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
	
	<!-- Bootstrap 3.3.7 -->
	<script src="/2019/src/admin/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="/2019/src/admin/js/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="/2019/src/admin/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="/2019/src/admin/js/demo.js"></script>

	<?php require(ROOT . '/' . PATH_VIEWS . 'pushjs.php'); ?>

	<script>
		var input = document.getElementById('numeroArticulo');
		input.oninvalid = function(event) {
    		event.target.setCustomValidity('Username should only contain lowercase letters. e.g. john');
		}
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