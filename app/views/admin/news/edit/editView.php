
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / NOTICIAS - EDICIONES: 
	JHON ALVARADO ACHATA

-->


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Editar artículo: N° <?= $data['numArt'] ?> | XX CIIS</title>
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
								<h3 class="box-title">EDITAR ARTÍCULO: N° <?= $data['numArt'] ?></h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form role="form" method="POST" autocomplete="new-password" autocomplete="off" enctype="multipart/form-data">
							<?php

								$this->model = new adminModel();
								while($datosArticulo=$data['datos_articulo_edit']->fetch_assoc()){

									$titulo = $datosArticulo['titulo'];
									$stitulo = $datosArticulo['stitulo'];
									$descripcion = $datosArticulo['descripcion'];
									$imagen = $datosArticulo['imagen'];
									$ifecha = $datosArticulo['ifecha'];
									$ffecha = $datosArticulo['ffecha'];
									$efecha = $datosArticulo['efecha'];
									$nfecha = $datosArticulo['nfecha'];
									$enlace = $datosArticulo['enlace'];
									$prioridad = $datosArticulo['prioridad'];

									$nametags = '';
									$tagg = $this->model->mostrar_tarticulotag($datosArticulo['numero']);
									$counter = 0;
									$numResults = mysqli_num_rows($tagg);
									while($datosTagArticulo=$tagg->fetch_assoc()){
										if (++$counter == $numResults){
											$nametags = $nametags . $datosTagArticulo['tagname'];
										} else {
											$nametags = $nametags . $datosTagArticulo['tagname'] . ', ';
										}
									}

								}
							?>
								<div class="box-body">
									<div class="col-md-6">
										<input style="display:none">
										<input type="password" autocomplete="new-password" style="display:none">
										<div class="form-group">
											<label for="numeroArticulo">Número artículo</label>
											<input type="text" class="form-control" id="numeroArticulo" placeholder="Ingrese número artículo" 
												pattern="[0-9]+" maxlength="5" name="numart" value="<?= $data['numArt'] ?>" readonly>
										</div>
										<div class="form-group">
											<label for="tituloArticulo">Título</label>
											<input type="text" class="form-control" id="tituloArticulo" placeholder="Ingrese título" name="title" maxlength="200" value="<?= $titulo ?>" autofocus>
										</div>
										<div class="form-group">
											<label for="stituloArticulo">Título corto</label>
											<input type="text" class="form-control" id="stituloArticulo" placeholder="Ingrese título corto" name="stitle" maxlength="100" value="<?= $stitulo ?>">
										</div>
										<div class="form-group">
											<label>Descripción</label>
											<textarea class="form-control" rows="3" placeholder="Ingrese ..." name="desc"><?= $descripcion ?></textarea>
										</div>
										<div class="form-group">
											<label for="photoInputFile">Agregar imagen</label>
											<input style="display: none" type="text" id="uploadFile" name="textImage" readonly/>
											<input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg">
										</div>
										<div style="text-align: center; width: 300px;">
											<img id="imgg" height="200px" src="<?= $imagen ?>" alt="your image"/>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Fecha publicación</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker" name="date" value="<?= $ifecha ?>">
											</div>
										</div>
										<div class="form-group">
											<label>Fecha vencimiento</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker1" name="d" value="<?= $ffecha ?>">
											</div>
										</div>
										<div class="form-group">
											<label>Fecha apertura evento</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker2" name="devent" value="<?= $efecha ?>">
											</div>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="fechaFija" <?php if($nfecha == '1') {echo 'checked';} else {echo'';} ?>> No hay fecha fijada
											</label>
										</div>

										<div>
											<input name='tags' class='some_class_name' placeholder='Agregar tags' value="<?= $nametags ?>">
											<button class='tags--removeAllBtn' type='button'>Remove all tags</button>
										</div>

										<div class="form-group">
											<label for="url">URL (Opcional)</label>
											<input type="text" class="form-control" id="url" name="url" value="<?= $enlace ?>">
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="priority" <?php if($prioridad == '1') {echo 'checked';} else {echo'';} ?>> Prioridad
											</label>
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
											<a href="<?= FOLDER_PATH . '/admin/news' ?>">
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
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2()
			//Date picker
			$('#datepicker').datepicker({
				autoclose: true,
				format: 'yyyy-mm-dd'
			})
			$('#datepicker1').datepicker({
				autoclose: true,
				format: 'yyyy-mm-dd'
			})
			$('#datepicker2').datepicker({
				autoclose: true,
				format: 'yyyy-mm-dd'
			})
		})
	</script>
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