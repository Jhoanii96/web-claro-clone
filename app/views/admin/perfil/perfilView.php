
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / PERFIL: 
  	JHON ALVARADO ACHATA

-->



<?php

date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'spanish');

$datos = $data['datos_usu']->fetch();
$datosperfil = $data['datos_perfil']->fetch(); 

if ($datosperfil[7] == '0') {
  $estado = 'Inactivo';
} elseif ($datosperfil[7] == '1') {
  $estado = 'Activo';
}

if ($datosperfil[9] == 'F') {
  $genero = 'Femenino';
} elseif ($datosperfil[9] == 'M') {
  $genero = 'Masculino';
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil de usuario | El Dorado</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="<?= FOLDER_PATH ?>/src/assets/image/favicon.ico">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/_all-skins.min.css">
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/pace.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <style>
    .circle {
        padding: 3px;
        border: 3px solid #d2d6de;
        margin-right: auto;
        margin-left: auto;
        width: 100px;
        height: 100px;
        max-width: 100%;
        border-radius: 50%;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }
    
    #swal2-content {
        font-size: 14px !important;
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
          Perfil de usuario [ <?= $datosperfil[1] . ' ' . $datosperfil[2] ?> ]
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= FOLDER_PATH ?>/admin"><i class="fa fa-tv"></i> Principal</a></li>
          <li class="active">Perfil de usuario</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                  
                <?php
                    if (!empty($datosperfil[6])) {
                      echo '<div class="circle" style="background-image: url(' . FOLDER_PATH . '/' . $datosperfil[6] . ');"></div>';
                    } else {
                      echo '<div class="circle" style="background-image: url(' . FOLDER_PATH . '/src/assets/image/fperfil/avatar1.png);"></div>';
                    }
                ?>
                  
                

                <h3 class="profile-username text-center" style="font-size: 16px"><?= $datosperfil[1] . ' ' . $datosperfil[2] ?></h3>

                <p class="text-muted text-center"><?= $datosperfil[8] ?></p>

                <ul class="list-group list-group-unbordered">
                  <hr>
                  <strong><i class="fa fa-envelope-o margin-r-5"></i> E-Mail</strong>

                  <p class="text-muted" style="color: #3c8dbc;">
                    <?= $datosperfil[5] ?>
                  </p>

                  <li class="list-group-item">
                    <i class="fa fa-birthday-cake margin-r-5"></i> <strong> Fecha de cumpleaños</strong> <a class="pull-right"><?= strftime("%d/", strtotime($datosperfil[11])) . ucfirst(strftime("%b", strtotime($datosperfil[11]))); ?></a>
                  </li>

                </ul>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Editar perfil</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nombres</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" name="firstName" id="firstName" value="<?= $datosperfil[1] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Apellidos</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" name="lastName" id="lastName" value="<?= $datosperfil[2] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">E-Mail</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo" value="<?= $datosperfil[5] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Fecha de nacimiento</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= strftime("%d de %B de %Y", strtotime($datosperfil[11])); ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Rol usuario</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $datosperfil[8] ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Género</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $genero ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Estado</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $estado ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mi CV</label>

                      <div class="col-sm-10">
                        <a class="form-control" href="<?= FOLDER_PATH . '/' . $datosperfil[12] ?>" target="_blank" rel="noopener noreferrer" style="display: block; padding-top: 7px;border-style: hidden;color: rgb(65, 65, 255);">- Ver CV en una nueva pestaña -</a>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSkills" class="col-sm-2 control-label">Agregar imagen</label>

                      <div class="col-sm-10">
                        <input style="display: none" type="text" id="uploadFile" name="textImage" readonly />
                        <input type="file" id="photoInputFile" name="image" accept="image/png,image/jpeg" style="margin-top: 4px;">
                      </div>
                    </div>
                    <?php
                    if (!empty($datosperfil[6])) {
                      echo '
                      <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10" style="text-align: center; width: 300px;">
                          <img id="imgg" height="200px" src="' . FOLDER_PATH . '/' . $datosperfil[6] . '" alt="your image">
                        </div>
                      </div>';
                    } else {
                      echo '
                      <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10" style="text-align: center; width: 300px;">
                          <img id="imgg" height="200px" src=""/>
                        </div>
                      </div>';
                    }
                    ?>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Código de acceso</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="code" id="code" value="<?= $datosperfil[3] ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" style="font-size: smaller;">Nueva contraseña</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button id="update_profile" type="button" data-name-text="Actualizando..." style="border-radius: 0;" class="btn btn-primary" name="update" value="true">Actualizar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
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

  <!-- jQuery 3 -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= FOLDER_PATH ?>/src/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?= FOLDER_PATH ?>/src/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= FOLDER_PATH ?>/src/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= FOLDER_PATH ?>/src/js/demo.js"></script>
  <!-- Pace -->
  <script src="<?= FOLDER_PATH ?>/src/js/pace.min.js"></script>
  <!-- Sweetalert2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

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

    $("#photoInputFile").change(function() {
      readURL(this);
    });
  </script>

  <script>
    document.getElementById("photoInputFile").onchange = function() {
      document.getElementById("uploadFile").value = this.files[0].name;
    };
  </script>
  
  <script>

		$('#update_profile').on('click', function() {
			var fname = $('#firstName').val();
			var lname = $('#lastName').val();
			var correo = $('#correo').val();
			var ufile = $('#uploadFile').val();
			var password = $('#password').val();
			var uprof = $('#update_profile').val();

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
			if (password.length != 0) {
				if (password.length < 6) {
    				swal("Atención!", "Debe ingresar la contraseña mayor de 6 caracteres", "warning");
    				return;
    			}
			}
			
		    var imgpath=document.getElementById('photoInputFile');
            if (!imgpath.value==""){
                var img=imgpath.files[0].size;
                var imgsize=img/1024; 
                if (imgsize > 1024) {
    				swal("Atención!", "Debe seleccionar una imagen menor de 1MB", "warning");
    				return;
    			}
            }

			var data = new FormData();

			data.append("fname", fname);
			data.append("lname", lname);
			data.append("correo", correo);
			data.append("ufile", ufile);
			data.append("update", uprof);
			data.append("image", $('input[type=file]')[0].files[0]);
			
			data.append("password", password);

			$.ajax({
				beforeSend: function() {
					Pace.restart();
					var btnadd = document.getElementById('update_profile');
					var text = btnadd.getAttribute('data-name-text');
					$("#update_profile").html('');
					$("#update_profile").append("" + text + "&ThinSpace;&ThinSpace;<span id='spinner-pf' class='fa fa-spinner fa-spin'></span>");
					$("#update_profile").attr("disabled", true);
				},
				url: "<?= FOLDER_PATH ?>/admin/perfil",
				type: "POST",
				data: data,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
				success: function() {
					$("#spinner-pf").remove();
					$("#update_profile").html('Actualizado');
					$("#update_profile").attr("disabled", false);
					setTimeout(function() {
						location.href = "<?= FOLDER_PATH ?>/admin/perfil";
					}, 500);
				}
			})
		});
	</script>

</body>

</html>