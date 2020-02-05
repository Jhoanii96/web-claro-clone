<div class="navbar-fixed-top" style="background-color: #da291c;height: 50px;">

	<div id="navbarcomputer" class="container hidden-xs" style="">
		<div class="row" style="min-height: 44px;">
			<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6 ">
				<img src="<?= FOLDER_PATH ?>/src/assets/image/500px-Claro.png" alt="Logo Distribuidor Claro" title="Logo Distribuidor Claro" class="img-responsive-inline" style="width: 70%; margin-top: 4px">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6 text-right">
				<span style="color: #FFFFFF;display: inline-block;font-size: 12px;margin-right: 15px;">Información y Contratación<br>Teléfono SIN COSTO</span>
				<div class="telefono" style="display: inline-block;">
					<img class="header" src="<?= FOLDER_PATH ?>/src/assets/image/telefone_header.png" style="width: 20px; margin-bottom: 7px;" alt="Ilustración de un teléfono en color blanco">
					<a href="tel:080078006" id="telefono900" style="font-size: 30px">
						0-800-78006
					</a>
				</div>
			</div>
		</div>
	</div>
	<nav id="barradenavegacion" class="navbar navbar-default navbar-fixed-top navbar-bg">
		<div class="container">
			<div class="navbar-header">
				<div class="navbarmobile col-xs-10">
					<img src="<?= FOLDER_PATH ?>/src/assets/image/logo_Claro.png" alt="Logo Distribuidor Claro" title="Logo Distribuidor Claro" class="img-responsive-inline" style="margin-top: 4px;">
				</div>
				<div class="col-xs-2">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar" style="margin-right: 0px;margin-top: 10px;">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
				<ul class="nav navbar-nav">
					<li><a href="<?= FOLDER_PATH ?>/?page=1" class="page-scroll<?php if ($data['flang_active'] == 1) {
																					echo ' active';
																				} ?>" id="MenuPostpago">Portabilidad Móvil</a></li>
					<li><a href="<?= FOLDER_PATH ?>/?page=2" class="page-scroll<?php if ($data['flang_active'] == 2) {
																					echo ' active';
																				} ?>" id="MenuHogar2play">2Play Internet + Teléfono Fijo</a></li>
					<li><a href="<?= FOLDER_PATH ?>/?page=3" class="page-scroll<?php if ($data['flang_active'] == 3) {
																					echo ' active';
																				} ?>" id="MenuHogar3play">3Play Internet + Teléfono Fijo + TV</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
</div>