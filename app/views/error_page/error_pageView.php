
<?php
/*

    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB / PÁGINA - ERROR: 
    JHON ALVARADO ACHATA
    
*/
?>


<!DOCTYPE html>

<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>404 Not Found</title>
  <link rel="shortcut icon" href="src/assets/media/image/icon.png">

  <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/main.min.css?<?= CSS_MAIN_MIN ?>">
  <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/main_3.min.css?<?= CSS_MAIN_3_MIN ?>">
  <link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/error.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <style>
    nav#main-nav {
      box-shadow: 0 0 5px -2px rgba(0, 0, 0, .6);
    }
  </style>

</head>

<body>

  <?php require(ROOT . '/' . PATH_VIEWS . 'head.php'); ?>




  <!-- Main Content -->
  <main id="page" class="page" style="margin-top: 110px;">


    <!-- Page Feature -->
    <div class="page_feature">


      <div class="page_divider">
        <div class="page_divider_cell"></div>
      </div>


    </div>
    <!-- END: Page Feature -->


    <!-- Page Row -->
    <div class="page_row">


      <!-- Page Header -->
      <header class="page_header">
        <nav class="breadcrumb_nav" aria-labelledby="breadcrumb_nav_label">
          <h2 class="visually_hidden" id="breadcrumb_nav_label">Breadcrumb</h2>
          <div class="breadcrumb_item"><a href="<?= FOLDER_PATH ?>" class="breadcrumb_link breadcrumb_home" itemprop="url"><span itemprop="title">Home</span></a></div>
          <div class="breadcrumb_current"><span itemprop="title">Página no encontrada</span></div>
        </nav>
        <div class="tabs"></div>

      </header>
      <!-- END: Page Header -->

      <!-- Page Container -->
      <div class="page_container">


        <!-- Sub Nav Sidebar -->
        <div class="sub_nav_sidebar">




        </div>
        <!-- END: Sub Nav Sidebar -->

        <!-- Main Content -->
        <div class="page_content">



          <!-- Typography -->
          <div class="typography">
            <h1>Página no encontrada</h1>
          </div>

          <div class="region region-content">
            <div class="typography">
              <div class="intro">
                <div class="field field-name-field-subhead field-type-text-long field-label-hidden">
                  <div class="field-items">
                    <div class="field-item even">
                      <p>Lo sentimos, pero no pudimos encontrar esa página.</p>
                      <p>Le sugerimos que retorne a la&nbsp;<a href="<?= FOLDER_PATH ?>" style="background-color:rgb(255, 255, 255)">página principal</a>&nbsp;para seguir navegando en nuestro sitio.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- END: Main Content -->

        <!-- Sidebar -->
        <!-- END: Sidebar -->

      </div>
      <!-- END: Page Container -->

    </div>
    <!-- END: Page Row -->


  </main>
  <!-- END: Main Content -->




  <?php require(ROOT . '/' . PATH_VIEWS . 'foot.php'); ?>

  <script src="<?= FOLDER_PATH ?>/src/js/jquery.min.js"></script>

</body>

</html>