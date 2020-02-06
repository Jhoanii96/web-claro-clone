
<!--    
	
	AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / ESTUDIANTES - EDITAR: 
	JHON ALVARADO ACHATA

-->


<?php

while ($datosEstudiante = $data['datosEditar_estudiante']->fetch_assoc()) {

	$numEst = $datosEstudiante['numEst'];
	$nomEst = $datosEstudiante['nomEst'];
	$apeEst = $datosEstudiante['apeEst'];
	$dniEst = $datosEstudiante['dniEst'];
	$celEst = $datosEstudiante['celEst'];
	$emailEst = $datosEstudiante['emailEst'];
	$anioEst = $datosEstudiante['anioEst'];
	$paisEst = $datosEstudiante['paisEst'];
	$ciudadEst = $datosEstudiante['ciudadEst'];
	$instEst = $datosEstudiante['instEst'];
	$qrEst = $datosEstudiante['qrEst'];
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
						<h3 class="box-title">Editar estudiante: <?= $nomEst . ' ' . $apeEst ?></h3>
						<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
					</div>
					<!-- /.box-header -->
					<br>
					<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal" style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">

						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Número estudiante</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="" maxlength="5" id="numEst" name="numEst" value="<?= $data['numEst'] ?>" readonly />
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Nombres</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputName" placeholder="" style="height: auto;" name="firstName" value="<?= $nomEst ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputLast" class="col-sm-2 control-label">Apellidos</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputLast" placeholder="" style="height: auto;" name="lastName" value="<?= $apeEst ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputDni" class="col-sm-2 control-label">DNI</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputDni" placeholder="" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" name="dni" maxlength="8" value="<?= $dniEst ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="contact_point" class="col-sm-2 control-label">Celular</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="" name="contact_point" id="contact_point" maxlength="15" value="<?= $celEst ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" type="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" value="<?= $emailEst ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="yearStudent" class="col-sm-2 control-label">Año estudiante</label>

							<div class="col-sm-10">
								<select class="form-control" name="yearStudent">
									<?php
									if ($anioEst == 'Primero') {
										echo '
													<option value="Primero" selected>1er Año</option>
													<option value="Segundo">2do Año</option>
													<option value="Tercero">3er Año</option>
													<option value="Cuarto">4to Año</option>
													<option value="Quinto">5to Año</option>
													';
									} elseif ($anioEst == 'Segundo') {
										echo '
													<option value="Primero">1er Año</option>
													<option value="Segundo" selected>2do Año</option>
													<option value="Tercero">3er Año</option>
													<option value="Cuarto">4to Año</option>
													<option value="Quinto">5to Año</option>
													';
									} elseif ($anioEst == 'Tercero') {
										echo '
													<option value="Primero">1er Año</option>
													<option value="Segundo">2do Año</option>
													<option value="Tercero" selected>3er Año</option>
													<option value="Cuarto">4to Año</option>
													<option value="Quinto">5to Año</option>
													';
									} elseif ($anioEst == 'Cuarto') {
										echo '
													<option value="Primero">1er Año</option>
													<option value="Segundo">2do Año</option>
													<option value="Tercero">3er Año</option>
													<option value="Cuarto" selected>4to Año</option>
													<option value="Quinto">5to Año</option>
													';
									} elseif ($anioEst == 'Quinto') {
										echo '
													<option value="Primero">1er Año</option>
													<option value="Segundo">2do Año</option>
													<option value="Tercero">3er Año</option>
													<option value="Cuarto">4to Año</option>
													<option value="Quinto" selected>5to Año</option>
													';
									} elseif ($anioEst == '-') {
										echo '
													<option value="-" selected>Seleccione año</option>
													<option value="Primero">1er Año</option>
													<option value="Segundo">2do Año</option>
													<option value="Tercero">3er Año</option>
													<option value="Cuarto">4to Año</option>
													<option value="Quinto">5to Año</option>
													';
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label for="country" class="col-sm-2 control-label">País</label>
							<div class="col-sm-10">
								<select class="form-control select2" id="idpais" type="country" name="country" onchange="cambia()" required>
									<option value="" id="-">-</option>
									<option value="Perú">Perú</option>
									<option value="Chile">Chile</option>
									<option value="Brasil">Brasil</option>
									<option value="Mexico">México</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Francia">Francia</option>
									<option value="Colombia">Colombia</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Argentina">Argentina</option>
									<option value="Venezuela">Venezuela</option>
								</select>
							</div>
						</div>
						<script type="text/javascript">
							// Definimos las variables
							var opt_Perú = new Array("-", "Amazonas", "Ancash", "Apurímac", "Arequipa", "Ayacucho", "Cajamarca", "Callao", "Cusco", "Huancavelica", "Huanuco", "Ica", "Junin", "La Libertad", "Lambayeque", "Lima", "Loreto", "Madre De Dios", "Moquegua", "Pasco", "Piura", "Puno", "San Martín", "Tacna", "Tumbes", "Ucayali");
							var opt_Chile = new Array("-", "Arica y Parinacota", "Tarapacá", "Antofagasta", "Atacama", "Coquimbo", "Valparaiso", "Santiago", "O'Higgins", "Maule", "Ñuble", "Biobio", "La Araucania", "Los Rios", "Los Lagos", "Aysén", "Magallanes");
							var opt_Brasil = new Array("-", "Goiás", "Mato Grosso", "Distrito Federal", "Mato Grosso do Sul", "Alagoas", "Ceara", "Maranhão", "Paraíba", "Pernambuco", "Piauí", "Rio Grande do Norte", "Bahia", "Sergipe", "Acre", "Amapa", "Amazonas", "Para", "Rondônia", "Roraima", "Tocantins", "Espirito Santo", "Minas Gerais", "Rio de Janeiro", "São Paulo", "Paraná", "Rio Grande do Sul", "Santa Catarina");
							var opt_Mexico = new Array("-", "Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas", "Chihuahua", "Ciudad de Mexico", "Coahuila", "Colima", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Mexico", "Michoacan", "Morelos", "Nayarit", "Nuevo Leon", "Oaxaca", "Puebla", "Queretaro", "Quintana Roo", "San Luis Potosi", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatan", "Zacatecas");
							var opt_Ecuador = new Array("-", "Azuay", "Bolivar", "Cañar", "Carchi", "Chimborazo", "Cotopaxi", "El Oro", "Esmeraldas", "Galapagos", "Guayas", "Imbabura", "Loja", "Los Rios", "Manabi", "Morona Santiago", "Napo", "Orellana", "Pastaza", "Pichincha", "Santa Elena", "Sto. Domingo", "Sucumbios", "Tungurahua", "Zamora Chinchipe");
							// fTsachila
							var opt_Francia = new Array("-", "Paris", "Marsella", "Lyon", "Toulouse", "Niza", "Nantes", "Estrasburgo", "Montpellier", "Burdeos", "Lille");
							var opt_Colombia = new Array("-", "Amazonas", "Antioquia", "Arauca", "Atlántico", "Bolívar", "Boyaca", "Caldas", "Caqueta", "Casanare", "Cauca", "Cesar", "Choco", "Cordoba", "Cundinamarca", "Guainia", "Guaviare", "Huila", "La Guajira", "Magdalena", "Meta", "Nariño", "Norte de Santander", "Putumayo", "Quindio", "Risaralda", "San Andres y Provid.", "Santander", "Sucre", "Tolima", "Valle del Cauca", "Vaupes", "Vichada");
							var opt_Bolivia = new Array("-", "Beni", "Chuquisaca", "Cochabamba", "La Paz", "Oruro", "Pando", "Potosi", "Santa Cruz", "Tarija", "Bolivia");
							var opt_Argentina = new Array("-", "Buenos Aires", "Catamarca", "Chaco", "Chubut", "Cordoba", "Corrientes", "Entre Rios", "Formosa", "Jujuy", "La Pampa", "La Rioja", "Mendoza", "Misiones", "Neuquen", "Rio Negro", "Salta", "San Juan", "San Luis", "Santa Cruz", "Santa Fe", "Santiago del Estero", "Tierra del Fuegor", "Tucuman");
							var opt_Venezuela = new Array("-", "Coro", "El Tocuyo", "Borburata", "Barquisimeto", "Valencia", "Merida", "Caracas", "Carabellada", "Carora", "Los Teques", "Maracaibo", "Barinas", "San Juan", "La Guaira", "Los Puertos de A.", "La Victoria", "San Cristobal");

							function cambia() {
								var cosa;

								var e = document.getElementById("idpais");
								var cosa = e.options[e.selectedIndex].value;

								//Se toma el vamor de la "cosa seleccionada"
								//cosa = document.formulario1.cosa[document.formulario1.cosa.selectedIndex].value;
								//se chequea si la "cosa" esta definida
								if (cosa != 0) {
									//selecionamos las cosas Correctas
									mis_opts = eval("opt_" + cosa);
									//se calcula el numero de cosas
									num_opts = mis_opts.length;
									//marco el numero de opt en el select
									var o = document.getElementById("idciudad");


									o.length = num_opts;
									//para cada opt del array, la pongo en el select
									for (i = 1; i < num_opts; i++) {
										o.options[i].value = mis_opts[i];
										o.options[i].text = mis_opts[i];
									}
								} else {
									//si no habia ninguna opt seleccionada, elimino las cosas del select
									o.length = 1;
									//ponemos un guion en la unica opt que he dejado
									o.options[0].value = "";
									o.options[0].text = "";
								}
								//hacer un reset de las opts
								o.options[0].selected = true;

							}
						</script>

						<div class="form-group">
							<label for="city" class="col-sm-2 control-label">Ciudad</label>
							<div class="col-sm-10">
								<select class="form-control select2" id="idciudad" type="city" name="city" required>
									<option value="">-</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="institution" class="col-sm-2 control-label">Institución</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" type="institution" name="institution" value="<?= $instEst ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="qr" class="col-sm-2 control-label">Código QR</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" type="institution" name="qr" id="qr" maxlength="30" value="<?= $qrEst ?>" readonly>
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
									<a href="<?= FOLDER_PATH . '/admin/students' ?>">
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
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

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
		// get the OPTION we want selected
		var nombpais = "<?= $paisEst ?>";
		$('#idpais').children('option[value="' + nombpais + '"]').attr('selected', true);
		cambia();
		var nombciudad = "<?= $ciudadEst ?>";
		$('#idciudad').children('option[value="' + nombciudad + '"]').attr('selected', true);
		

		/* event listener */
		document.getElementsByName("dni")[0].addEventListener('input', doThing);
		document.getElementsByName("contact_point")[0].addEventListener('input', phoneNumber);

		/* function */
		function doThing() {
			document.getElementById("qr").value = btoa(this.value);
		}

		/* function */
		function phoneNumber() {

			var string2 = this.value;
			var phone = string2.replace(/(\d{2})(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 $4');
			document.getElementById("contact_point").value = phone;

		}
	</script>
</body>

</html>