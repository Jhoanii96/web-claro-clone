
<?php 

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

  </div>
  <!-- ./wrapper -->
  
  <!-- jQuery 3 -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= FOLDER_PATH ?>/src/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.dataTables.min.js"></script>
  <script src="<?= FOLDER_PATH ?>/src/js/dataTables.bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?= FOLDER_PATH ?>/src/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= FOLDER_PATH ?>/src/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.sparkline.min.js"></script>
  <!-- Pace -->
  <script src="<?= FOLDER_PATH ?>/src/js/pace.min.js"></script>
  <!-- jvectormap  -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= FOLDER_PATH ?>/src/js/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="<?= FOLDER_PATH ?>/src/js/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= FOLDER_PATH ?>/src/js/Chart.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= FOLDER_PATH ?>/src/js/demo.js"></script>
  
  <script>
    $(function() {
      $('#example1').DataTable({
        order: [0, "desc"]
      })
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

  <!-- EVENTO SELECT STATUS -->
  <script type="text/javascript">
    function selectStatus(codeStatus) {
      var nom_value = $("#data-status-" + codeStatus).val();
      var code = codeStatus;

      var data = new FormData();

      data.append("novl", nom_value);
      data.append("code", code);

      $.ajax({
        beforeSend: function() {
          Pace.restart();
          $("#data-status").prop("disabled", true);
        },
        url: "<?= FOLDER_PATH ?>/admin/attention/s_in",
        type: "POST",
        data: data,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false, // NEEDED, DON'T OMIT THIS
        success: function(data) {
          $("#data-status").prop("disabled", false);
          setTimeout(function () {
              location.href = "<?= FOLDER_PATH ?>/admin";
          }, 100);
        }
      })
    }
  </script>

</body>

</html>