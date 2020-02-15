
<!--    
    
    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB CON ADMINLTE / PERFIL: 
  	JHON ALVARADO ACHATA

-->



<?php

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
  <title>User profile | El Dorado</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php require(ROOT . '/' . PATH_VIEWS . 'navbar_table.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User Profile - El Dorado
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= FOLDER_PATH ?>/admin"><i class="fa fa-tv"></i> Principal</a></li>
          <li class="active">User profile</li>
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
                  echo '<img class="profile-user-img img-responsive img-circle" src="' . FOLDER_PATH . '/' . $datosperfil[6] . '" alt="User profile picture">';
                } else {
                  echo '<img class="profile-user-img img-responsive img-circle" src="' . FOLDER_PATH . '/src/assets/image/fperfil/avatar1.png" alt="User profile picture">';
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

                  <!-- <li class="list-group-item">
                    <i class="fa fa-mobile-phone margin-r-5"></i> <strong> N° Celular</strong> <a class="pull-right"></a>
                  </li> -->

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
                        <input type="text" style="display: none" class="form-control" id="num" name="num" value="<?= $datosperfil[0] ?>">
                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform:uppercase" name="firstName" id="firstName" value="<?= $datosperfil[1] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Apellidos</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[A-Za-zÁÉÍÓÚñÑ ]+" style="text-transform:uppercase" name="lastName" id="lastName" value="<?= $datosperfil[2] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">E-Mail</label>

                      <div class="col-sm-10">
                        <input type="email" class="form-control" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="correo" id="correo" value="<?= $datosperfil[5] ?>">
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="col-sm-2 control-label">DNI</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" name="dni" id="dni" maxlength="8" value="">
                      </div>
                    </div> -->
                    <!-- <div class="form-group">
                      <label class="col-sm-2 control-label">Celular</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" pattern="[0-9 ]+" name="contact_point" id="contact_point" maxlength="15" value="">
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Rol usuario</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="rol" id="rol" value="<?= $datosperfil[8] ?>" readonly />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Género</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="gen" id="gen" value="<?= $genero ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Estado</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="status" id="status" value="<?= $estado ?>" readonly>
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
                        <button type="submit" style="border-radius: 0;" class="btn btn-primary" name="update" value="true">Actualizar</button>
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

</body>

</html>