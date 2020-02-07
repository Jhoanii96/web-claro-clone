<?php


/* 
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB: 
	JHON ALVARADO ACHATA
	
*/

$datos = $data['datos_usu']->fetch();

function time2str($ts)
{

	date_default_timezone_set('America/Lima');

	if (!ctype_digit($ts)) {
		$ts = strtotime($ts);
	}

	$fecha_ahora = (new \DateTime())->format('Y-m-d H:i:s');
	$fecha_ahora = strtotime($fecha_ahora);

	$diff = $fecha_ahora - $ts;
	if ($diff == 0) {
		return 'now';
	} elseif ($diff > 0) {
		$day_diff = floor($diff / 86400);
		if ($day_diff == 0) {
			if ($diff < 60) return 'Justo ahora';
			if ($diff < 120) return 'Hace 1 minuto';
			if ($diff < 3600) return 'Hace ' . floor($diff / 60) . ' minutos';
			if ($diff < 7200) return 'Hace 1 hora';
			if ($diff < 86400) return 'Hace ' . floor($diff / 3600) . ' horas';
		}
		if ($day_diff == 1) {
			return 'Ayer';
		}
		if ($day_diff < 7) {
			return 'Hace ' . $day_diff . ' días';
		}
		if ($day_diff < 31) {
			return 'Hace ' . ceil($day_diff / 7) . ' semanas';
		}
		if ($day_diff < 60) {
			return 'El mes pasado';
		}
		return date('F Y', $ts);
	} else {
		$diff = abs($diff);
		$day_diff = floor($diff / 86400);
		if ($day_diff == 0) {
			if ($diff < 120) {
				return 'in a minute';
			}
			if ($diff < 3600) {
				return 'in ' . floor($diff / 60) . ' minutes';
			}
			if ($diff < 7200) {
				return 'in an hour';
			}
			if ($diff < 86400) {
				return 'in ' . floor($diff / 3600) . ' hours';
			}
		}
		if ($day_diff == 1) {
			return 'Tomorrow';
		}
		if ($day_diff < 4) {
			return date('l', $ts);
		}
		if ($day_diff < 7 + (7 - date('w'))) {
			return 'next week';
		}
		if (ceil($day_diff / 7) < 4) {
			return 'in ' . ceil($day_diff / 7) . ' weeks';
		}
		if (date('n', $ts) == date('n') + 1) {
			return 'next month';
		}
		return date('F Y', $ts);
	}
}


?>

<header class="main-header">

	<!-- Logo -->
	<a href="#" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini">CIIS</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg" style="letter-spacing: -1px;">CIIS UNJBG</span>
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

				<!-- Notifications: style can be found in dropdown.less -->
				<li id="notifications" class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
					</a>
					<ul class="dropdown-menu" style="width: 350px;">
						<li class="header">Notificaciones</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								<!-- <li> <a href="#" align='center'> No tiene notificaciones </a></li>-->
								<?php
								/* while ($datoBellNotificacion = $data['BellNtf']->fetch_array()) {

									$fecha = time2str($datoBellNotificacion['date_notify']);

									echo '
										<li>
											<a href="' . FOLDER_PATH . '/admin/preinscriptions/show/' . $datoBellNotificacion['id_inscripcion'] . '" target="_blank" style="display: flex;">
												<div style="width: 70%;">
													<span>' . $datoBellNotificacion['name_notify'] . '</span>
												</div>
												<div style="width: 30%;">
													<small><i class="fa fa-clock-o"></i> ' . $fecha . '</small>
												</div>
											</a>
										</li>
									';
								} */
								?>
							</ul>
						</li>
					</ul>
				</li>



				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php
						if (empty($datos[6])) {
							echo '<img src="src/assets/image/fperfil/avatar1.png" class="user-image" alt="User Image">';
						} else {
							echo '<img src="' . FOLDER_PATH . '/' . $datos[6] . '" class="user-image" alt="User Image">';
						}
						?>
						<span class="hidden-xs"><?= $datos[1] . ' ' . $datos[2] ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<?php
							if (empty($datos[6])) {
								echo '<img src="src/assets/image/fperfil/avatar1.png" class="img-circle" alt="User Image">';
							} else {
								echo '<img src="' . FOLDER_PATH . '/' . $datos[6] . '" class="img-circle" alt="User Image">';
							}
							?>
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
				if ($datos[6] == '/2019/src/assets/media/image/') {
					echo '<img src="/2019/src/assets/media/image/avatar-male3.png" class="img-circle" alt="User Image">';
				} else {
					echo '<img src="' . FOLDER_PATH . '/' . $datos[6] . '" class="img-circle" alt="User Image">';
				}
				?>
				<p>
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
			<li>
				<a href="<?= FOLDER_PATH . '/admin' ?>">
					<i class="fa fa-table"></i> <span>Inicio</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-user-o"></i>
					<span>Usuarios</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= FOLDER_PATH . '/admin/students' ?>"><i class="fa fa-circle-o"></i> Estudiantes</a></li>
					<li><a href="<?= FOLDER_PATH . '/admin/professionals' ?>"><i class="fa fa-circle-o"></i> Profesionales</a></li>
					<li><a href="<?= FOLDER_PATH . '/admin/speakers' ?>"><i class="fa fa-circle-o"></i> Ponentes</a></li>
					<?php
					/* if ($data['rol'] == "Super Administrador") {
						echo "<li><a href=" . FOLDER_PATH . "/admin/organizers><i class=\"fa fa-circle-o\"></i> Organizadores</a></li>";
					} */
					?>
					<li><a href="#"><i class="fa fa-circle-o"></i> Reportes</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-file-text-o"></i>
					<span>Pre/Incripciones</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= FOLDER_PATH . '/admin/inscriptions' ?>"><i class="fa fa-circle-o"></i> Conferencia (Inscripción)</a></li>
					<li><a href="<?= FOLDER_PATH . '/admin/preinscriptions' ?>"><i class="fa fa-circle-o"></i> Conferencia (Pre-inscripción)</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Concursos</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Talleres</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-calendar-check-o"></i>
					<span>Registrar (Eventos)</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?= FOLDER_PATH . '/admin/talks' ?>"><i class="fa fa-circle-o"></i> Charlas/Conferencias</a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> Concursos</a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> Talleres CIIS</a></li>
				</ul>
			</li>
			<li>
				<a href="<?= FOLDER_PATH . '/admin/topics' ?>">
					<i class="fa fa-star"></i> <span>Temáticas</span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);">
					<i class="fa fa-diamond"></i> <span>Auspiciadores</span>
				</a>
			</li>
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
			<li>
				<a href="<?= FOLDER_PATH . '/admin/user' ?>">
					<i class="fa fa-user-o"></i> <span>Usuarios</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>