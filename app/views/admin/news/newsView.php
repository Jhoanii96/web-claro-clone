
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / NOTICIAS: 
	JHON ALVARADO ACHATA

-->


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Noticias | XX CIIS</title>
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
					Noticias
					<small>Administración</small>
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
					<!-- left column -->
					<!-- general form elements -->
					<div class="col-md-12">

						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Agregar Artículo</h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
							</div>
							<!-- /.box-header -->
							<!-- form start -->

							<form role="form" method="POST" autocomplete="new-password" autocomplete="off" enctype="multipart/form-data" action="/2019/admin/news/save">
								<div class="box-body">
									<div class="col-md-6">
										<input style="display:none">
										<input type="password" autocomplete="new-password" style="display:none">
										<div class="form-group">
											<label for="numeroArticulo">Número artículo</label>
											<input type="text" class="form-control" id="numeroArticulo" placeholder="Ingrese número artículo" 
												pattern="[0-9]+" maxlength="5" name="numart" autofocus>
										</div>
										<div class="form-group">
											<label for="tituloArticulo">Título</label>
											<input type="text" class="form-control" id="tituloArticulo" placeholder="Ingrese título" name="title" maxlength="200">
										</div>
										<div class="form-group">
											<label for="stituloArticulo">Título corto</label>
											<input type="text" class="form-control" id="stituloArticulo" placeholder="Ingrese título corto" name="stitle" maxlength="100">
										</div>
										<div class="form-group">
											<label>Descripción</label>
											<textarea class="form-control" rows="3" placeholder="Ingrese ..." name="desc"></textarea>
										</div>
										<div class="form-group">
											<label for="photoInputFile">Agregar imagen</label>
											<input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Fecha publicación</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker" name="date">
											</div>
										</div>
										<div class="form-group">
											<label>Fecha vencimiento</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker1" name="d">
											</div>
										</div>
										<div class="form-group">
											<label>Fecha apertura evento</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker2" name="devent">
											</div>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="fechaFija"> No hay fecha fijada
											</label>
										</div>

										<div>
											<input name='tags' class='some_class_name' placeholder='Agregar tags' value=''>
											<button class='tags--removeAllBtn' type='button'>Remove all tags</button>
										</div>

										<div class="form-group">
											<label for="url">URL (Opcional)</label>
											<input type="text" class="form-control" id="url" name="url">
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="priority"> Prioridad
											</label>
										</div>
									</div>
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-primary"
										style="margin-left: 15px; padding-left: 30px; padding-right: 30px;">Agregar noticia</button>
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
								<h3 class="box-title">Tabla de noticias</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Nro</th>
											<th>Título</th>
											<th>F.Publicación</th>
											<th>F.Vencimiento</th>
											<th>Etiquetas</th>
											<th>URL</th>
											<th>Editar</th>
											<th>Borrar</th>
										</tr>
									</thead>
									<tbody>
										
									<?php 
												
												$this->model = new adminModel();
												while($rowArticulo=$data['datos_articulo']->fetch_assoc()){
													$nametags = '';
													$tagg = $this->model->mostrar_tarticulotag($rowArticulo['numero']);
													$counter = 0;
													$numResults = mysqli_num_rows($tagg);
													while($rowTagArticulo=$tagg->fetch_assoc()){
														if (++$counter == $numResults){
															$nametags = $nametags . $rowTagArticulo['tagname'];
														} else {
															$nametags = $nametags . $rowTagArticulo['tagname'] . ', ';
														}
														
													}
													echo '
													<tr>
														<td>'.$rowArticulo['numero'].'</td>	
														<td title="'.$rowArticulo['titulo'].'">'.$rowArticulo['titulo'].'</td>
														<td>'.$rowArticulo['ifecha'].'</td>
														<td>'.$rowArticulo['ffecha'].'</td>
														<td title="'.$nametags.'">'.$nametags.'</td>
														<td>
															<a href="'.$rowArticulo['enlace'].'" target="_blank">
																'.$rowArticulo['enlace'].'
															</a>
														</td>
														<td class="button" align=\'center\'>
															<a href="' . FOLDER_PATH . '/admin/news/edit/' . $rowArticulo['numero'] . '">
																<button type="button" class="btn btn-block btn-success">Editar</button>
															</a>
														</td>
														<td class="button" align=\'center\'>
															<form><button type="button" class="btn btn-block btn-danger">Eliminar</button></form>
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
											<th>F.Publicación</th>
											<th>F.Vencimiento</th>
											<th>Etiquetas</th>
											<th>URL</th>
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


</body>

</html>