<?php
/*

    AUTOR DE PROGRAMACIÓN Y DISEÑO DE LA PAGINA WEB / PRINCIPAL-HOME: 
	JHON ALVARADO ACHATA
	
	COLABORACIONES Y MODIFICACIONES:
	JOSUE ALDAIR MAMANI CARIAPAZA
	LEANDRO ANDRÉ RAMOS VALDEZ
    
*/

$habilitar = false;

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>XX Congreso Internacional de Informatica y Sistemas</title>
	<meta name="keywords" content="XXCIIS, xxciis, CIISXX, ciisxx, postmaster, ciis turismo, feria tecnologica, tacna ciis, congreso internacional, concursos, conference, technology, university, universidad">
	<meta name="description" content="El XX Congreso Internacional de Informática y Sistemas brindando todo una gama de conocimiento con ponentes de la mejor excelencia posible de distintos países con distinto temas de la actualidad de la informática, fecha del gran evento Noviembre 2019.">
	<script src="src/js/hm.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120253818-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-120253818-1');
	</script>
	<meta name="theme-color" content="#01006d">
	<meta name="msapplication-navbutton-color" content="#01006d">
	<meta name="apple-mobile-web-app-status-bar-style" content="#01006d">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="shortcut icon" href="src/assets/media/image/icon.png">
	<style type="text/css" href="src/css/main.css?<?= CSS_MAIN ?>"></style>
	<link rel="stylesheet" type="text/css" href="src/css/main.min.css?<?= CSS_MAIN_MIN ?>">
	<link rel="stylesheet" type="text/css" href="src/css/main_2.min.css?<?= CSS_MAIN_2_MIN ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="src/css/main_3.min.css?<?= CSS_MAIN_3_MIN ?>">
	<style type="text/css">
		.gm-style {
			font: 400 11px Roboto, Arial, sans-serif;
			text-decoration: none
		}

		.gm-style img {
			max-width: none
		}

		.contador {
			font: 400 11px Roboto, Arial, sans-serif !important;
			text-decoration: none
		}
	</style>
	<style>
		header#home .wrapper h1 {
			font-size: 2.0em
		}
	</style>
	<link rel="stylesheet" type="text/css" href="src/css/countdown.css">
</head>

<body style=""><?php require(ROOT . '/' . PATH_VIEWS . 'head.php'); ?><header id="home">
		<div class="wrapper">
			<h1 style="margin-top: 0px;">CONGRESO INTERNACIONAL DE INFORMÁTICA Y SISTEMAS</h1> <img src="src/assets/media/image/logo_ciis_blank.png" style="width: 325px; margin: 10px 10px; margin-top: 40px; margin-bottom: 40px;" alt="CIIS">
			<h3>Universidad Nacional Jorge Basadre Grohmann</h3>
		</div>
	</header>
	<main id="home">
		<section>
			<div id="anc_topics" class="bg-gray-translucent">
				<div class="container-outer">
					<div class="container">
						<div class="soft-double-ends">
							<h2 class="heading-block ff-thin text-huge fc-inverse text-center text-shadow soft-top bd-inverse-top text-normal"> Noticias</h2>
						</div>
						<div class="row row-tighten equalize push-double-bottom"></div>
						<div class="row push-double-bottom">
							<div class="col-md-6 col-md-offset-3">
								<p class="push-top text-center"><a href="<?= FOLDER_PATH . '/noticias' ?>" class="btn btn-md btn-block btn-transparent btn-inverse">Más</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="past">
			<div class="wrapper">
				<h2 style="text-align: center; color: #000b63;">Conoce más del evento</h2>
				<div id="content">
					<article id="video">
						<div class="videoWrapper"><iframe width="560" height="315" src="https://www.youtube.com/embed/FdkGY17DTDw?enablejsapi=1&amp;modestbranding=1&amp;rel=0&amp;showinfo=1&amp;fs=1" frameborder="0" allowfullscreen=""></iframe></div>
					</article>
					<article id="video">
						<div class="videoWrapper"><iframe width="560" height="315" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fciistacna%2Fvideos%2F2269582133324420%2F&show_text=0&width=560&frameborder=0&data-allowfullscreen=true" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe></div>
					</article>
				</div>
			</div>
		</section>
		<section id="empresas" style="background: linear-gradient(180deg, #e0e0e0 0, #ffffff 100%);">
			<div class="head">
				<h3 style="color: #000b63">Auspiciadores</h3>
			</div>
			<div id="auspiciadores"> 
				<a href="javascript:void(0);" style="width: 120px !important;"> 
				<img src="src/assets/media/sponsors/la-glorieta.png?v=1.0.1" alt="Glorieta"> </a>
				<a href="javascript:void(0);" style="width: 110px !important;"> 
				<img src="src/assets/media/sponsors/munay-wasi.png" alt="Munay Wasi"> </a>
				<a href="javascript:void(0);" style="width: 110px !important;"> 
				<img src="src/assets/media/sponsors/capriccio.png" alt="Capriccio"> </a>
				<a href="javascript:void(0);" style="width: 105px !important;"> 
				<img src="src/assets/media/sponsors/esdit.png" alt="ESDIT"> </a><a href="http://egatur.edu.pe/web/index.php" style="width: 70px !important;margin-left: 25px;margin-right: 25px;" target="_blank"> <img src="src/assets/media/sponsors/egatur.png" alt="EGATUR"> </a><a href="http://www.princesshostal.com/web/" style="width: 110px !important;" target="_blank"> <img src="src/assets/media/sponsors/princess.png" alt="Princess"> </a><a href="https://m.facebook.com/gigantographic.gigantographic" style="width: 110px !important;" target="_blank"> <img src="src/assets/media/sponsors/gigantographic.png" alt="GigantoGraphinc"> </a><a href="javascript:void(0);" style="width: 80px !important;"> <img src="src/assets/media/sponsors/cuneo.png" alt="Cuneo"> </a><a href="https://m.facebook.com/dora.santa.1865" style="width: 220px !important;" target="_blank"> <img src="src/assets/media/sponsors/dora_santamaria.png" alt="Santa María"> </a> <a href="javascript:void(0);" style="width: 110px !important;"> <img src="src/assets/media/sponsors/munayki2.png?v=1.0.1" alt="Munayki"> </a><a href="javascript:void(0);" style="width: 120px !important;"> <img src="src/assets/media/sponsors/rildo.png" alt="Rildo"> </a><a href="javascript:void(0);" style="width: 140px !important;"> <img src="src/assets/media/sponsors/elena.png" alt="Santa Elena"> </a><a href="https://www.imprentapubligraff.com" style="width: 90px !important;" target="_blank"> <img src="src/assets/media/sponsors/publigraff.png" alt="Publigraff"> </a><a href="javascript:void(0);" style="width: 90px !important;"> <img src="src/assets/media/sponsors/montoya.png" alt="Montoya"> </a><a href="javascript:void(0);" style="width: 130px !important;"> <img src="src/assets/media/sponsors/graphic.png" alt="MundoGraphic"> </a><a href="javascript:void(0);" style="width: 160px !important;"> <img src="src/assets/media/sponsors/martin.png" alt="SanMartin"> </a><a href="javascript:void(0);" style="width: 105px !important;"> <img src="src/assets/media/sponsors/almonacid.jpeg" alt="Amonacid"> </a><a href="http://www.restauranteuros.com/" style="width: 100px !important;" target="_blank"> <img src="src/assets/media/sponsors/urus.png" alt="Urus"> </a><a href="http://www.tunkimayo.com.pe/" style="width: 90px !important;" target="_blank"> <img src="src/assets/media/sponsors/tunkimayo.png" alt="Tunkimayo"> </a><a href="javascript:void(0);" style="width: 100px !important;"> <img src="src/assets/media/sponsors/puckos.png" alt="Puckos"> </a><a href="javascript:void(0);" style="width: 150px !important;"> <img src="src/assets/media/sponsors/novedad.png" alt="Novedad"> </a> <a href="javascript:void(0);" style="width: 120px !important;"> <img src="src/assets/media/sponsors/conquistador.jpeg" alt="Conquistador"> </a><a href="javascript:void(0);" style="width: 170px !important;"> <img src="src/assets/media/sponsors/copacabana.png" alt="Copacabana"> </a><a href="javascript:void(0);" style="width: 100px !important;"> <img src="src/assets/media/sponsors/solary.jpeg" alt="Solary"> </a><a href="javascript:void(0);" style="width: 75px !important;"> <img src="src/assets/media/sponsors/spirit.png" alt="Spirit"> </a></div>
		</section>
		<section id="empresas" style="background: linear-gradient(360deg, #e0e0e0 0, green 5%);">
			<div class="head">
				<h3 style="color: #efefef;">DELEGACIONES</h3>
			</div>
			<div id="auspiciadores"> <a href="http://www.uncp.edu.pe/" style="width: 200px !important;"> <img src="src/assets/media/deleg/huancayo.png"> </a><a href="https://portal.unap.edu.pe/" style="width: 200px !important;"> <img src="src/assets/media/deleg/altiplano.png"> </a></div>
		</section>
		<section id="newsletter">
			<div class="wrapper">
				<h3>Entérate de todo</h3>
				<p><a style="color:#fff;">Síguenos en nuestras redes sociales</a></p>
				<ul>
					<li><a href="https://www.flickr.com/photos/160684070@N02/albums" target="_blank" title="Flickr de CIIS XX"><i class="fab fa-flickr"></i></a></li>
					<li><a href="https://www.instagram.com/xx_ciis" target="_blank" title="Instagram de CIIS XX"><i class="fab fa-instagram"></i></a></li>
					<li><a href="https://www.youtube.com/user/ciistacna" target="_blank" title="YouTube de CIIS XX"><i class="fab fa-youtube"></i></a></li>
					<li><a href="https://www.facebook.com/ciistacna" target="_blank" title="Facebook de CIIS XX"><i class="fab fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/ciistacna" target="_blank" title="Twitter de CIIS XX"><i class="fab fa-twitter"></i></a></li>
				</ul>
			</div>
		</section>
		<section class="mainphotos">
			<div class="head">
				<h3 class="">En la edición 2018</h3>
			</div>
			<div id="photos"> <img src="src/assets/media/image/home1.jpg"> <img src="src/assets/media/image/home2.jpg"> <img src="src/assets/media/image/home3.jpg"> <img class="big" src="src/assets/media/image/home4.jpg"> <img class="big" src="src/assets/media/image/home5.jpg"> <img src="src/assets/media/image/home6.jpg"> <img src="src/assets/media/image/home7.jpg"> <img src="src/assets/media/image/home8.jpg"> <img class="big" src="src/assets/media/image/home9.jpg"> <img class="big" src="src/assets/media/image/home10.jpg"> <img class="small responsive-hide" src="src/assets/media/image/home11.jpg"> <img class="small responsive-hide" src="src/assets/media/image/home12.jpg"> <img class="small responsive-hide" src="src/assets/media/image/home13.jpg"> <a class="small responsive-hide" href="https://www.flickr.com/photos/160684070@N02/albums" target="_blank"> <i class="fa fa-camera"></i>Ver más fotos</a></div>
		</section>
		<section id="infoinscription" style="border-bottom: -1px solid #b20000;">
			<div class="wrapper">
				<h3>Inscríbete al XX CIIS</h3>
				<p><a style="color:#fff;" target="_blank">Este evento comenzará en noviembre del 2019 <br>para más información ingrese <a href="https://www.facebook.com/ciistacna/" style="color: #6737c7;text-decoration: underline;" target="_blank">aquí</a> o comuníquenos al <i class="fab fa-whatsapp"></i> +51 971243797</a></p>
			</div>
		</section>
	</main>
	
	<?php require(ROOT . '/' . PATH_VIEWS . 'foot.php'); ?>
	
	<script src="src/js/jquery-1.10.1.min.js"></script>
	<script src="src/js/home.js"></script><!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml: true,
				version: 'v4.0'
			});
		};
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script><!-- Your customer chat code -->
	<div class="fb-customerchat" attribution=setup_tool page_id="169105266515410" logged_in_greeting="¡Hola! ¿Cómo podemos ayudarte?" logged_out_greeting="¡Hola! ¿Cómo podemos ayudarte?"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId: '2433332966901241',
				autoLogAppEvents: true,
				xfbml: true,
				version: 'v4.0'
			});
		};
	</script>
	<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

</body>

</html>