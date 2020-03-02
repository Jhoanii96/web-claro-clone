<?php

$datos = $data['datos_usu']->fetch();
$datos_usuario = $data['datos_usuario']->fetch();

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?= FOLDER_PATH ?>/src/assets/image/favicon.ico">
	<title>Editar organizador | XX CIIS</title>
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
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/pace.min.css">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/_all-skins.min.css">

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
		
		.dropzone {
			width: 100%;
			height: 200px;
			border: 2px dashed #ccc;
			color: #ccc;
			line-height: 200px;
			text-align: center;
		}

		.dropzone.dragover {
			border-color: #000;
			color: #000;
		}
		
		.col-md-12 {
		    width: 100%;
		}
		
		@media (max-width: 767px) {
		    .content-wrapper {
		        display: flex;
                width: 100%;
		    }
		}
	</style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php require(ROOT . '/' . PATH_VIEWS . 'navbar_table.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" style="display: flex; padding-top: 17px;">
			<!-- Content Header (Page header) -->
			<br>
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">EDITAR USUARIO: <?= $datos_usuario[1] . ' ' . $datos_usuario[2] ?></h3>
						<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
					</div>
					<!-- /.box-header -->
					<br>
					<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal" style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">

						<div class="form-group">
							<label class="col-sm-2 control-label">Nombres</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="fname" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+" name="fname" value="<?= $datos_usuario[1] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Apellidos</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="lname" placeholder="" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ ]+" name="lname" value="<?= $datos_usuario[2] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">E-mail</label>

							<div class="col-sm-10">
								<input autocomplete="off" class="form-control" type="text" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo" value="<?= $datos_usuario[3] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Estado</label>

							<div class="col-sm-10">
								<select class="form-control" name="status" id="status">
									<option value="1" <?php ($datos_usuario[4] == 1) ? print(' selected') : ''; ?>>Activo</option>
									<option value="0" <?php ($datos_usuario[4] == 0) ? print(' selected') : ''; ?>>Inactivo</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Fecha de nacimiento</label>

							<div class="col-sm-10">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input id="date" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="<?= date_format(date_create($datos_usuario[11]),"d/m/Y") ?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Género</label>

							<div class="col-sm-10">
								<select class="form-control" name="gen" id="gender">
									<option value="M" <?php ($datos_usuario[5] == 'M') ? print(' selected') : ''; ?>>Masculino</option>
									<option value="F" <?php ($datos_usuario[5] == 'F') ? print(' selected') : ''; ?>>Femenino</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Rol usuario</label>

							<div class="col-sm-10">
								<select class="form-control" name="rol" id="rol_user" onchange="selectSupr(this)">
									<option value="1" <?php ($datos_usuario[6] == 1) ? print(' selected') : ''; ?>>Gerente</option>
									<option value="2" <?php ($datos_usuario[6] == 2) ? print(' selected') : ''; ?>>Administrador</option>
									<option value="3" <?php ($datos_usuario[6] == 3) ? print(' selected') : ''; ?>>Supervisor</option>
									<option value="4" <?php ($datos_usuario[6] == 4) ? print(' selected') : ''; ?>>Ejecutivo</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="select_supr" <?php ($datos_usuario[6] == 4) ? print('style="display: block;"') : print('style="display: none;"'); ?>>
							<label class="col-sm-2 control-label">Supervisor</label>

							<div class="col-sm-10">
								<select class="form-control" name="supr" id="supr">
									<?php
									while ($data_row = $data['supervisor']->fetch()) {
										if (isset($datos_usuario[7])) {
											if ($data_row[0] == $datos_usuario[7]) {
												echo '
														<option value="' . $data_row[0] . '" selected>' . $data_row[1] . ' ' . $data_row[2] . '</option>
													';
											} else {
												echo '
														<option value="' . $data_row[0] . '">' . $data_row[1] . ' ' . $data_row[2] . '</option>
													';
											}
										} else {
											echo '
													<option value="' . $data_row[0] . '">' . $data_row[1] . ' ' . $data_row[2] . '</option>
												';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Agregar foto</label>

							<div class="col-sm-10">
							    <input style="display: none" type="text" id="uploadFile" name="textImage" readonly />
								<input type="file" id="photoInputFilePhoto" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2"></div>
							<div class="col-sm-10" style="text-align: center; width: 300px;">
								<?php
								if (isset($datos_usuario[8])) {
									echo '<img id="imgg" height="200px" src="' . FOLDER_PATH . '/' . $datos_usuario[8] . '" alt="your image" />';
								} else {
									echo '<img id="imgg" height="200px" src="' . FOLDER_PATH . '/src/assets/image/fperfil/avatar1.png" alt="your image" />';
								}
								?>

							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Agregar CV</label>

							<div class="col-sm-10">
							    <?php 
									if (isset($datos_usuario[12])) {
									    echo '<a href="' . FOLDER_PATH . '/' . $datos_usuario[12] . '" target="_blank" rel="noopener noreferrer" style="display: block; padding-top: 7px;">- Ver CV en una nueva pestaña -</a>';
									    echo '<input id="up_pdf" style="display: none;" value="' . $datos_usuario[12] . '">';
    								} else {
    								    echo '<input id="up_pdf" style="display: none;" value="no_pdf">';
    								}
								?>
							    <div id="uploads"></div>
								<div class="dropzone" id="dropzone" style="display: block;">Arrastre archivo PDF aquí para subirlo</div>
								<input id="filepdf" type="file" style="display: none;" accept="application/pdf"/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Código</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" type="text" name="code" id="code" value="<?= $datos_usuario[9] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Contraseña</label>

							<div class="col-sm-10">
								<input type="password" class="form-control" name="password" id="password" autocomplete="new-password" value="<?= $datos_usuario[10] ?>">
							</div>
						</div>

						<div class="box-footer" style="padding-left: 25px;">
							<div style="display: inline-flex; position: relative; top: 5px; height: 57px; margin-top: 5px; margin-bottom: 5px;">
								<p class="text-center">
									<button type="button" data-name-text="Actualizando..." class="button-edit" name="update" value="true" id="usredt">
										Actualizar
									</button>
								</p>

								<p class="text-center">
									<a href="<?= FOLDER_PATH . '/admin/user' ?>">
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
	<!-- InputMask -->
	<script src="<?= FOLDER_PATH ?>/src/js/jquery.inputmask.js"></script>
	<script src="<?= FOLDER_PATH ?>/src/js/jquery.inputmask.date.extensions.js"></script>
	<script src="<?= FOLDER_PATH ?>/src/js/jquery.inputmask.extensions.js"></script>
	<!-- Pace -->
	<script src="<?= FOLDER_PATH ?>/src/js/pace.min.js"></script>
	<!-- Sweetalert2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
	

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
		$('#date').inputmask('dd/mm/yyyy', {
			'placeholder': 'dd/mm/yyyy'
		})
	</script>

	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#imgg')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#photoInputFilePhoto").change(function() {
			readURL(this);
		});
	</script>

	<script>

		document.getElementById("photoInputFilePhoto").onchange = function() {
			document.getElementById("uploadFile").value = this.files[0].name;
		};

		var pdf_file;

		(function() {
			var dropzone = document.getElementById('dropzone');
			var fileupload = $("#filepdf");

			var upload = function(files) {
				pdf_file = files[0];
				document.getElementById("dropzone").style.lineHeight = "normal";
				document.getElementById("dropzone").style.color = "rgb(253, 0, 0)";
				document.getElementById("dropzone").style.border = "2px inset rgb(255, 77, 0)";
				$("#dropzone").html('<i class="fa fa-file-pdf-o" style="font-size: 60px; display: block; height: 125px; padding-top: 55px; color: rgb(255, 38, 38);"></i><span id="title_pdf" style="display: block; height: 75px; color: rgb(255, 38, 38);">' + pdf_file.name + '</span>');
			}

			dropzone.ondrop = function(e) {
				e.preventDefault();
				this.className = 'dropzone';
				if (e.dataTransfer.files.length >= 2) {
					swal("Atención!", "Debe ingresar solamente (1) archivo PDF", "warning");
					return;
				}
				if (e.dataTransfer.files[0].type != 'application/pdf') {
					swal("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
					return;
				}
				upload(e.dataTransfer.files);
			}

			dropzone.onmouseover = function() {
				document.getElementById("dropzone").style.cursor = "pointer";
				document.getElementById("dropzone").style.backgroundColor = "rgb(247, 247, 255)";
				document.getElementById("dropzone").style.color = "#777777";
			}
			dropzone.onmouseleave = function() {
				document.getElementById("dropzone").style.backgroundColor = "rgb(255, 255, 255)";
				document.getElementById("dropzone").style.color = "#ccc";
			}

			dropzone.onclick = function() {
				document.getElementById("dropzone").style.backgroundColor = "rgb(0, 0, 0)";
				fileupload.click();
			}

			fileupload.change(function () {
				if (this.files.length >= 2) {
					swal("Atención!", "Debe ingresar solamente (1) archivo PDF", "warning");
					return;
				}
				if (this.files[0].type != 'application/pdf') {
					swal("Atención!", "Debe se ingresado solo el archivo PDF", "warning");
					return;
				}
				upload(this.files);
			});

			dropzone.ondragover = function() {
				this.className = 'dropzone dragover';
				return false;
			}

			dropzone.ondragleave = function() {
				this.className = 'dropzone';
				return false;
			}
		}());

		function selectSupr(e) {
			var nom_value = e.value;
			if (nom_value == 4) {
				document.getElementById("select_supr").style.display = "block";
			} else {
				document.getElementById("select_supr").style.display = "none";
			}
		}
		
		$('#usredt').on('click', function() {
			var codus = <?= $datos_usuario[0] ?>;
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var correo = $('#correo').val();
			var status = $("#status").children("option:selected").val();
			var gender = $("#gender").children("option:selected").val();
			var date = $('#date').val();
			var rol_user = $("#rol_user").children("option:selected").val();
			var supr = $("#supr").children("option:selected").val();
			var textImage = $('#uploadFile').val();
			var textpdf = $('#up_pdf').val();
			var code = $('#code').val();
			var password = $('#password').val();
			var update = $('#usredt').val();
            
            <?php 
				if (!isset($datos_usuario[12])) {
				    echo 'if (pdf_file == null) {
        				swal("Atención!", "Debe ingresar el CV del usuario", "warning");
        				return;
        			}';
    			}
			?>
			if (fname == "") {
				swal("Atención!", "Debe ingresar el nombre del usuario", "warning");
				return;
			}
			if (lname == "") {
				swal("Atención!", "Debe ingresar el apellido del usuario", "warning");
				return;
			}
			if (correo == "") {
				swal("Atención!", "Debe ingresar el correo del usuario", "warning");
				return;
			}
			if (date == "") {
				swal("Atención!", "Debe ingresar la fecha de nacimiento del usuario", "warning");
				return;
			}
			if (code.length != 0) {
				if (code.length < 4) {
					swal("Atención!", "El nombre de acceso del usuario debe contener más de 4 caracteres", "warning");
					return;
				}
			} else {
				swal("Atención!", "Debe ingresar el nombre de acceso del usuario", "warning");
				return;
			}
			if (password.length != 0) {
				if (password.length < 6) {
					swal("Atención!", "Debe ingresar la contraseña mayor de 6 caracteres", "warning");
					return;
				}
			}

			var data = new FormData();

			data.append("codus", codus);
			data.append("fname", fname);
			data.append("lname", lname);
			data.append("correo", correo);
			data.append("status", status);
			data.append("gender", gender);
			data.append("date", date);
			data.append("rol_user", rol_user);
			data.append("supr", supr);
			data.append("textImage", textImage);
			data.append("image", $('input[type=file]')[0].files[0]);
			data.append("file_pdf", pdf_file);
			data.append("textpdf", textpdf);
			data.append("code", code);
			data.append("password", password);
			data.append("update", update);

			$.ajax({
				beforeSend: function() {
					Pace.restart();
					var btnadd = document.getElementById('usredt');
					var text = btnadd.getAttribute('data-name-text');
					$("#usredt").html('');
					$("#usredt").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-us' class='fa fa-spinner fa-spin'></span>");
					$("#usredt").attr("disabled", true);
				},
				url: "<?= FOLDER_PATH ?>/admin/user/edit",
				type: "POST",
				data: data,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
				success: function() {
					$("#spinner-us").remove();
					$("#usredt").html('Modificado');
					$("#usredt").attr("disabled", false);
					setTimeout(function() {
						location.href = "<?= FOLDER_PATH ?>/admin/user";
					}, 500);
				}
			})
		});
	</script>

</body>

</html>