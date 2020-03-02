<?php

setlocale(LC_ALL, ".UTF-8", 'Spanish_Peru', 'Spanish');
$datos = $data['datos_usu']->fetch();

?>

<!DOCTYPE html>
<html lang="es">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
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

      .modal-lg,
      .modal-xl {
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
    
    @media (max-width: 1400px) {
        .ctrl_with {
            width: 100%;
        }
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

<script>
    /* if (Notification.permission !== "granted") {
      Notification.requestPermission()
           .then(function() {});
    }; */ 
    
    // request permission on page load
document.addEventListener('DOMContentLoaded', function() {
 if (!Notification) {
  alert('Desktop notifications not available in your browser. Try Chromium.');
  return;
 }

 if (Notification.permission !== 'granted')
  Notification.requestPermission();
});


function notifyMe() {
 if (Notification.permission !== 'granted')
  Notification.requestPermission();
 else {
  var notification = new Notification('Notification title', {
   icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
   body: 'Hey there! You\'ve been notified!',
  });
  notification.onclick = function() {
   window.open('http://stackoverflow.com/a/13328397/1269037');
  };
 }
}
    
</script>

</html>