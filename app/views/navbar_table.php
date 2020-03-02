<?php


/* 
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB: 
	JHON ALVARADO ACHATA
	
*/


?>

<header class="main-header">

	<!-- Logo -->
	<a href="#" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini">CLARO</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg" style="letter-spacing: -1px;">Atención CLARO</span>
	</a>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">

				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php
						if (empty($datos[6])) {
							echo '<div class="circle_nav" style="background-image: url(' . FOLDER_PATH . '/src/assets/image/fperfil/avatar1.png);"></div>';
						} else {
							echo '<div class="circle_nav" style="background-image: url(' . FOLDER_PATH . '/' . $datos[6] . ');"></div>';
						}
						?>
						<span class="hidden-xs"><?= $datos[1] . ' ' . $datos[2] ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<div style="height: 96px; width: 96px; margin-left: auto; margin-right: auto; border-radius: 50%; border: 3px solid; border-color: rgba(255, 255, 255, 0.2);">
								<?php
									if (empty($datos[6])) {
										echo '<div class="circle_dropdown" style="background-image: url(' . FOLDER_PATH . '/src/assets/image/fperfil/avatar1.png);"></div>';
									} else {
										echo '<div class="circle_dropdown" style="background-image: url(' . FOLDER_PATH . '/' . $datos[6] . ');"></div>';
									}
								?>
							</div>
							<p>
								<?= $datos[1] . ' ' . $datos[2] ?>
								<small style="margin-top: 7px; font-size: 14px;"><?= $datos[8] ?></small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?= FOLDER_PATH . '/admin/perfil' ?>" class="btn btn-default btn-flat">Perfil</a>
							</div>
							<div class="pull-right">
								<a href="<?= FOLDER_PATH . '/login/salir' ?>" class="btn btn-default btn-flat">Salir</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>

	</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel" style="padding-left: 7px;">
			<div class="pull-left image" style="POSITION: relative; top: 6px;">
				<?php
				if (empty($datos[6])) {
					echo '<div class="circle_navleft" style="background-image: url(' . FOLDER_PATH . '/src/assets/image/fperfil/avatar1.png);"></div>';
				} else {
					echo '<div class="circle_navleft" style="background-image: url(' . FOLDER_PATH . '/' . $datos[6] . ');"></div>';
				}
				?>
				<p></p>
			</div>
			<div class="pull-left info" style="padding-top: 0px; padding-bottom: 0px; top: 0px; bottom: 0px; width: 170px; padding-left: 0px; padding-right: 0px; margin-left: 5px;">
				<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: block; width: 100%;">
					<p style="white-space: normal; font-size: 12px; margin-bottom: 6px;"><?= $datos[1] . ' ' . $datos[2] ?></p>
					<small><?= $datos[8] ?></small>
				</div>

			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">NAVEGACIÓN PRINCIPAL</li>
			<!-- <li class="active menu-open"> -->
			<?php if ($datos[8] != 'Administrador') { ?>
			<li>
				<a href="<?= FOLDER_PATH . '/admin' ?>">
					<i class="fa fa-tv"></i> <span>Principal</span>
				</a>
			</li>
			<?php }  ?>
			<?php if ($datos[8] != 'Ejecutivo') { ?>
			<li class="treeview">
				
				<a href="#">
					<i class="fa fa-file-o"></i>
					<span>Registro</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<!--<li><a href="javascript:;"><i class="fa fa-circle-o"></i> Atenciones</a></li>-->
					<li><a href="<?= FOLDER_PATH . '/admin/clientes' ?>"><i class="fa fa-circle-o"></i> Clientes</a></li>
				</ul>
			
			</li>
			<?php }  ?>
			
			<?php 
			
				if ($datos[8] == 'Gerente' || $datos[8] == 'Administrador') {
					echo '
					
						<li>
							<a href="' . FOLDER_PATH . '/admin/user">
								<i class="fa fa-user-o"></i> <span>Usuarios</span>
							</a>
						</li>
					
					';
				}
			?>
			
			<?php
			/* if ($data['rol'] == "Super Administrador") {
				echo "
					<li>
	        			<a href=" . FOLDER_PATH . "/admin/news>
	          				<i class=\"fa fa-newspaper-o\"></i> <span>Noticias</span>
	        			</a>
					  </li>
					  ";
			} */
			?>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>