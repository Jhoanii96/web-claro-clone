
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de administración | CIIS</title>
  <link rel="shortcut icon" href="/2019/src/assets/media/image/icon.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/2019/src/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/2019/src/admin/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/2019/src/admin/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/2019/src/admin/css/jquery-jvectormap.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/2019/src/admin/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/2019/src/admin/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/2019/src/admin/css/_all-skins.min.css">

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
          Congreso Internacional en Informática y Sistemas
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-table"></i> Principal</a></li>
          <li class="active">Inicio</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-list-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Asistentes pendientes</span>
                <span class="info-box-number"><?= $data['numap'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Asistentes inscritos</span>
                <span class="info-box-number"><?= $data['numai'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-person-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Asist. Estudiantes (Ins.)</span>
                <span class="info-box-number"><?php echo $data['numaie']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="ion ion-ios-personadd-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Asist. Profesionales (Ins.)</span>
                <span class="info-box-number"><?= $data['numaip'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->




        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tabla de pre-inscripciones &MediumSpace;<span style="background-color: #007a80;color: white;font-size: 14px;">&MediumSpace;en espera&MediumSpace;</span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Nro</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha pre-inscripción</th>
                      <th>País</th>
                      <th>Ciudad</th>
                      <th>Ver informe</th>
                      <th>Aprobar</th>
                      <th>Denegar</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    /* while ($rowPreins = $data['preinscripcion']->fetch_assoc()) {

                      if ($rowPreins['tipo'] == '3') {
                        $pais = $rowPreins['pais_pro'];
                        $ciudad = $rowPreins['ciudad_pro'];
                      } elseif ($rowPreins['tipo'] == '4') {
                        $pais = $rowPreins['pais_est'];
                        $ciudad = $rowPreins['ciudad_est'];
                      }

                      $estado = 'En espera';
                      $color = '#007a80';

                      $nombre = $rowPreins['nombre'] . ' ' . $rowPreins['apellido'];
                      $nombre = base64_encode(utf8_encode($nombre));

                      echo '
											<tr>
												<td>' . $rowPreins['id'] . '</td>	
												<td>' . $rowPreins['nombre'] . '</td>
												<td>' . $rowPreins['apellido'] . '</td>
                        <td>' . $rowPreins['fecha'] . '</td>
                        <td>' . $pais . '</td>
                        <td>' . $ciudad . '</td>
												<td align=\'center\'>
													<a href="' . FOLDER_PATH . '/admin/dashboard/show/' . $rowPreins['id'] . '" target="_blank" style="text-decoration: underline;">
														Ver detalle
													</a>
												</td>
												<td class="button" align=\'center\'>
													<a href="' . FOLDER_PATH . '/admin/dashboard/accept/' . $rowPreins['id'] . '/' . $rowPreins['email'] . '/' . $nombre . '">
														<button type="button" style="color: black;">Inscribir</button>
													</a>
												</td>
												<td class="button" align=\'center\'>
													<a href="' . FOLDER_PATH . '/admin/dashboard/decline/' . $rowPreins['id'] . '">
														<button type="button" style="color: black;">Denegar</button>
													</a>
												</td>
											</tr>
											'; 
                    }*/
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nro</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha pre-inscripción</th>
                      <th>País</th>
                      <th>Ciudad</th>
                      <th>Ver informe</th>
                      <th>Aprobar</th>
                      <th>Denegar</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
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
  <script src="/2019/src/admin/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/2019/src/admin/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="/2019/src/admin/js/jquery.dataTables.min.js"></script>
  <script src="/2019/src/admin/js/dataTables.bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="/2019/src/admin/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/2019/src/admin/dist/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="/2019/src/admin/js/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="/2019/src/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/2019/src/admin/js/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="/2019/src/admin/js/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="/2019/src/admin/js/Chart.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/2019/src/admin/dist/js/demo.js"></script>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>


  <script src="/2019/src/js/push.min.js"></script>


  <script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('b2fe8e2fa5b2da11752d', {
      cluster: 'mt1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      if (data.admin == 'new_user') {
        $.ajax({
          url: "<?= FOLDER_PATH ?>/notify/notifications",
          success: function(result) {
            $("#notifications").html(result);
          }
        });
        $.ajax({
          url: "<?= FOLDER_PATH ?>/notify/asistentes",
          success: function(result) {
            $("#nusers").html(result);
          }
        });

        Push.create("CIIS Tacna notificaciones", {
          body: data.name,
          icon: "https://scontent.faqp2-1.fna.fbcdn.net/v/t1.0-9/49213040_2150474188378498_2669784385959493632_n.png?_nc_cat=110&_nc_oc=AQkMB69MW-LlEG_rEIHNBx-4S5yJhoOHjOZgrP5-GUiLGHr3rXK2xHldapz4HnQW6L8&_nc_ht=scontent.faqp2-1.fna&oh=c189ef56bad43f5150a4aad80b861546&oe=5E2A1AE9",
          timeout: 60000,
          onClick: function() {
            window.open('<?= FOLDER_PATH ?>/admin', '_blank');
            this.close();
          }
        });

        var audio = new Audio('<?= FOLDER_PATH ?>/src/assets/media/sound/notification.mp3');
        var promise = audio.play();
        if (promise) {
          promise.catch(function(error) {
            console.error(error);
          });
        }
      }
    });
  </script>

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



</body>

</html>