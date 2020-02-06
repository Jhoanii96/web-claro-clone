
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / INSCRIPCION - EDICIONES: 
	JOSUE ALDAIR MAMANI CARIAPAZA

	COLABORACIONES Y MODIFICACIONES:
	JHON ALVARADO ACHATA

-->


<?php
while($datosInscripcion=$data['datosEditar_inscripcion']->fetch_assoc()){
	$numIns = $datosInscripcion['numIns'];
	$nomIns = $datosInscripcion['nomIns']; 
	$apeIns = $datosInscripcion['apeIns'];
	$actIns = $datosInscripcion['actIns']; 
	$fecIns = $datosInscripcion['fecIns']; 
	$tipIns = $datosInscripcion['tipIns'];
	$pagIns = $datosInscripcion['pagIns']; 
	$paaIns = $datosInscripcion['paaIns'];
	$tpaIns = $datosInscripcion['tpaIns']; 
	$epiIns = $datosInscripcion['epiIns']; 
	$fvoucher = $datosInscripcion['fvoucher']; 
	$codAsistencia = $datosInscripcion['codAsistencia']; 
	$numOperacion = $datosInscripcion['numOperacion']; 

	$saldo  = $datosInscripcion['pagIns']-$datosInscripcion['paaIns'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
	<title>Editar Inscripcion | XX CIIS</title>
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

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


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
						<h3 class="box-title">Editar datos de Inscripcion: <?= $nomIns . ' ' . $apeIns ?></h3>
								<!-- <div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
								</div> -->
					</div>
							<!-- /.box-header -->
						<br>
						<form method="POST" enctype="multipart/form-data" autocomplete="off" class="form-horizontal" style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">
								
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Id Inscripcion</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder=""
											maxlength="5" id="numIns" name="numIns" value="<?= $data['numIns'] ?>" readonly/>
									</div>
								</div>
								<div class="form-group">
										<label for="actIns" class="col-sm-2 control-label" >Conferencia</label>
										<div class="col-sm-10">
										<select class="form-control" id="text" name="actIns">
											<?php 
												if ($actIns == "Postmaster") {
													echo '
														<option value="1" selected>Postmaster</option>
														<option value="2">Congreso internacional</option>
													';
												} elseif ($actIns == "Congreso internacional") {
													echo '
														<option value="1">Postmaster</option>
														<option value="2" selected>Congreso internacional</option>
													';
												}
											?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="fecIns" class="col-sm-2 control-label">Fecha inscripcion</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="" name="fecIns"
											id="fecIns" value="<?= $fecIns ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="tipIns" class="col-sm-2 control-label">Tipo Inscripción</label>

									<div class="col-sm-10">
										<input type="text" class="form-control" type="text" name="tipIns" id="tipIns" value="<?= $tipIns ?>" readonly>
									</div>
								</div>

								<div class="form-group">
									<label for="tpaIns" class="col-sm-2 control-label">Tipo pago</label>
									<div class="col-sm-10">
										<select class="form-control" name="tpaIns">
											<?php 
												if ($tpaIns == '1') {
											?>
													<option selected value="1">Efectivo</option>
													<option value="2">Voucher</option>
											<?php
												} elseif ($tpaIns == '2') {
											?>
													<option value="1">Efectivo</option>
													<option selected value="2">Voucher</option>
											<?php
												} 
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="paaIns" class="col-sm-2 control-label">Pago abonado (S/.)</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="paaIns" value="<?= $paaIns ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="pagIns" class="col-sm-2 control-label">Costo Inscripcion (S/.)</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="pagIns" value="<?= $pagIns ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="pagIns" class="col-sm-2 control-label">Saldo (S/.)</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="" value="<?= $saldo ?>.00" readonly>
									</div>
								</div>
								
								<div class="form-group">
									<label for="epiIns" class="col-sm-2 control-label">Estado Inscripcion</label>

									<div class="col-sm-10">
										<select class="form-control" name="epiIns">
											<?php 
												if ($epiIns == '1') {
											?>
													<option selected value="1">En espera</option>
													<option value="2">Inscrito</option>
											<?php
												} elseif ($epiIns == '2') {
											?>
													<option value="1">En espera</option>
													<option selected value="2">Inscrito</option>
											<?php
												} 
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Código asistencia</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="codAsistencia" value="<?= $codAsistencia ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Número operación</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="numOperacion" value="<?= $numOperacion ?>">
									</div>
								</div>

								<div class="form-group">
			                      <div class="col-sm-2"></div>
			                      <div class="col-sm-10" style="text-align: center; width: 300px;">
			                        <img id="" height="200px" src="<?= $fvoucher ?>" alt="Foto de voucher" />
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
											<a href="<?= FOLDER_PATH . '/admin/inscriptions' ?>">
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
		/* event listener */
		document.getElementsByName("dni")[0].addEventListener('input', doThing);
		document.getElementsByName("contact_point")[0].addEventListener('input', phoneNumber);
		/* function */
		function doThing(){
			document.getElementById("qr").value = btoa(this.value);
		}
		/* function */
		function phoneNumber(){
			var string2 = this.value;
			var phone = string2.replace(/(\d{2})(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 $4');
			document.getElementById("contact_point").value = phone;
		}
	</script>
</body>

</html>