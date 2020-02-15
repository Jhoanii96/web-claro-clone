
<?php 

  setlocale(LC_ALL, ".UTF-8", 'Spanish_Peru', 'Spanish');
  $datos = $data['datos_usu']->fetch();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de administración | Claro</title>
  <link rel="shortcut icon" href="<?= FOLDER_PATH ?>/src/assets/image/favicon.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/jquery-jvectormap.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/dataTables.bootstrap.min.css">
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
    .center_cell {
      text-align: center;
    }

    .ctrl_with {
      display: inline-block;
      width: 75%;
    }

    .btn_style {
      background-color: #e00000;
      border-style: none;
      color: #eaeaea;
      border-radius: 7%;
      border: 2px solid #fff;
    }

    .btn_style:hover {
      border: 2px solid #e0df00;
      transition: 0.5s;
    }

    .btn_style:focus {
      outline: none;
    }

    @media (min-width: 992px) {
      .modal-lg, .modal-xl {
          max-width: 800px;
      }
    }

    @media (min-width: 1200px) {
      .modal-xl {
          max-width: 1140px;
      }
    }
    .modal-backdrop {
        background-color: rgba(255, 255, 255, 1);
        filter: blur(10px);
    }
  </style>

  <script src="<?= FOLDER_PATH ?>/src/js/push.min.js"></script>
</head>


<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <?php require(ROOT . '/' . PATH_VIEWS . 'navbar_table.php'); ?>

    
    <?php 

      if ($datos[8] == 'Gerente') {

        require(ROOT . '/' . PATH_VIEWS . 'admin/principal/principal1View.php'); 

      } elseif ($datos[8] == 'Administrador') {
        
        require(ROOT . '/' . PATH_VIEWS . 'admin/principal/principal2View.php'); 

      } elseif ($datos[8] == 'Supervisor') {
        
        require(ROOT . '/' . PATH_VIEWS . 'admin/principal/principal3View.php'); 

      } elseif ($datos[8] == 'Ejecutivo') {
        
        require(ROOT . '/' . PATH_VIEWS . 'admin/principal/principal4View.php'); 

      }
      
    
    ?>


    <?php require(ROOT . '/' . PATH_VIEWS . 'aside_control.php'); ?>

  

</body>

</html>