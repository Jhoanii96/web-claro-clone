<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Portabilidad móvil Perú</title>

	<!-- load styles -->
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/clr_v6dsa45d6sa13a45sa32.css" async>
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/clr_d4865dfs4f5d6s456ff5f.css" async>
	<link rel="stylesheet" href="<?= FOLDER_PATH ?>/src/css/clr_t486f45g64g56gt44g6t.css" async>
	<!-- <link rel="stylesheet" type="text/css" href="https://portabilidadmovil.com.pe/css/animaciones.css?v-14" async> -->
	<link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/clr_ds4a8d64sa86d4s86a44.css" async />
	<link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/clr_m49d654s86asr486r452.css" async />
	<link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/clr_f648f6564f16sa6d4s6a.css" async />
	<link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/clr_s4d864dsa6d4486vf5f2.css" async />
	<link rel="stylesheet" type="text/css" href="<?= FOLDER_PATH ?>/src/css/clr_w23f153d56d46fsdf56f1z.css" async />
	<!-- endload styles -->

</head>

<body>
	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-light bg-light q-pa-0 barNavbar " style="height: 10vh;">
		<div class="col-12 col-lg-6 col-md-6">
			<a class="navbar-brand" href="#" style="text-align: center">
				<img src="<?= FOLDER_PATH ?>/src/assets/image/500px-Claro.png" alt="" style="width: 40%">
			</a>
		</div>
		<!-- <img src="<?= FOLDER_PATH ?>/src/assets/image/telefone_header.png" id="" class="imgPhone"> -->
		<div class="col-12 col-lg-6 col-md-6 BoxRed row align-items-center" style="text-align: right">
			<div class="col-4">
				<span style="color: #FFFFFF;display: inline-block;font-size: 0.8vw;;margin-right: 15px;">Información y Contratación<br>Teléfono SIN COSTO</span>
			</div>
			<div class="col-1 q-pa-0 hidenCell">
				<div class="d-flex align-items-center">
					<img src="<?= FOLDER_PATH ?>/src/assets/image/telefone_header.png" id="" class="imgPhone">
				</div>
			</div>
			<div class="col-4 col-md-4 textNavbar din-black">
				<a class="TeflNav tag-Inbound" href="tel:0800 720 1234">0800 720 1234</a> <br>
			</div>
		</div>
	</nav>
	<div class="navlink" style="background-color: #000000;">
		<nav class="navbar2" style="height: 6.1vh;margin-top: 10vh;">
			<ul>
				<li>
					<a href="index.php" class="page-scroll active" id="MenuPostpago">Portabilidad Móvil</a>
				</li>
				<li>
					<a href="hogar2play.php" class="page-scroll" id="MenuHogar2play">2Play Internet + Teléfono Fijo</a>
				</li>
				<li>
					<a href="hogar3play.php" class="page-scroll" id="MenuHogar3play">3Play Internet + Teléfono Fijo + TV</a>
				</li>
			</ul>
		</nav>
	</div>


	<header class="background-header row-flex align-items-center">
		<div class="row m-0 col-12 mt-5 pt-5">

		</div>



		<!-- <a href="#" class="">
			<div class="col-3 BoxRedHeader row m-0 justify-content-center align-items-center pt-2 pb-2">
				<div class="col-7 pl-2 p-0">
					<h2 class="textLinea textBotonHogar m-0" style="font-weight: inherit;">
						También tenemos <br> planes para tu hogar
					</h2>
				</div>
				<div class="col-2 row m-0 justify-content-end p-0">
					<div class="d-flex align-items-center">
						<img src="<?= FOLDER_PATH ?>/src/assets/image/home.png">
					</div>
				</div>
			</div>
		</a> -->
	</header>

	<div class="ocultarForm">
		<form class="form-fixed-principal col-lg-3 col-12 formClaro form-callback formulario-principal" id="formulario-principal" style="max-width: 22rem !important; position: absolute">
			<div class="ClassMigrar text-center">
				Migra llamando a:


			</div>
			<div class="Classlinea text-center">
				<h5 class="textLinea">Línea gratuita</h5>
				<a class="NumLlama" href="tel:080078023">0800 78023</a>
			</div>
			<div class="form-animate card text-center">
				<h6 class="textLinea mb-2 mt-2" style="font-weight: inherit;">O nosotros te llamamos</h6>
				<div class="row m-0 justify-content-center">
					<div class="col-6 p-0 d-flex align-items-center justify-content-end">
						<h5 class="textElige" style="font-weight:inherit;">Elige tu opción</h5>
					</div>
					<div class=" col-5 row-flex">
						<div class="col-12 d-column" style="padding: 0px;">
							<input type="radio" id="tipo_movilform" name="tipo_llamada" style="display: none;" value="movil" onclick="ocultarMovil(true)" checked="checked">
							<label class="labelMovil label-active m-0" for="tipo_movilform">
								Móvil
							</label>

							<input type="radio" id="tipo_llamadaform" name="tipo_llamada" style="display: none;" value="fijo" onclick="ocultarMovil(false)">
							<label class="labelFijo label-default m-0" for="tipo_llamadaform">
								Fijo
							</label>
						</div>
					</div>
				</div>
				<div class="row m-0 mb-2 ocultarMovil d-none">
					<div class="col-11 ml-auto mr-auto">
						<select class="inputFormSection2" name="">
							<div class="inputFormSection2">
								<option value="">Departamento</option>
								<option value="41">Amazonas</option>
								<option value="43">Ancash</option>
								<option value="83">Apurimac</option>
								<option value="54">Arequipa</option>
								<option value="66">Ayacucho</option>
								<option value="76">Cajamarca</option>
								<option value="14">Callao</option>
								<option value="84">Cusco</option>
								<option value="67">Huancavelica</option>
								<option value="62">Huánuco</option>
								<option value="34">Ica</option>
								<option value="64">Junín</option>
								<option value="44">La Libertad</option>
								<option value="74">Lambayeque</option>
								<option value="1">Lima </option>
								<option value="65">Loreto</option>
								<option value="82">Madre de Dios</option>
								<option value="53">Moquegua</option>
								<option value="63">Pasco</option>
								<option value="74">Piura</option>
								<option value="51">Puno</option>
								<option value="42">San Martín</option>
								<option value="54">Tacna</option>
								<option value="72">Tumbes</option>
								<option value="61">Ucayali</option>

							</div>

						</select>
					</div>
				</div>

				<div class="col-11 row m-0 mb-2 justify-content-center ml-auto mr-auto">
					<div class="col-12 p-0 text-center">
						<input type="text" name="numero" class="inputFormSection2" placeholder="Ingresa tu Número" required="required">
					</div>
				</div>

				<div class="mt-1 mb-1">
					<div class="input-group col-11 row m-0 justify-content-center">
						<div class="input-checkbox col-1">
							<input class="" type="checkbox" autocomplete="off" name="acepta_terminos" id="check_1-principal-form" required="" onclick="aceptoPoliticas(this)">
							<label class="form-check-label textTerminos" id="check_label_1" for="check_1-principal-form">
							</label>
						</div>
						<div class="col-10 eow m-0 p-0 align-items-center text-right">
							<label class="form-check-label textTerminos">
								<a class="TextTerminos" href="https://portabilidadmovil.com.pe/terminos" target="_black">Autorizo el tratamiento de mis datos personales</a>
							</label>
						</div>
						<div class="invalid-feedback">
							Es requerido aceptar políticas.
						</div>
					</div>
				</div>

				<div class="row m-0 justify-content-center">
					<div class="col-11">
						<button id="a" type="submit" class="btn-animate btn btn-block buttonFormPrimary botonSubmit">TE LLAMAMOS</button>
					</div>
				</div>

			</div>

		</form>
	</div>
	<div class="d-none" id="plantilla-gracias">
		<div class="p-4">
			<div class="">
				<div class=" text-right text-dark text-center">
					<h3 class="">Gracias por comunicarte, te contactaremos pronto</h3>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="justify-center w100white w100white_modal" style="color:#fff;">
					<form class="formClaro formClaro_modal form-callback" id="formulario-modal">
						<div class="ClassMigrar text-center">
							Migra llamando a:

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="font-size: 25px;">&times;</span>
							</button>

						</div>
						<div class="Classlinea text-center">
							<h5 class="textLinea">Linea gratuita</h5>
							<a class="NumLlama" href="tel:080078023">0800 78023</a>
						</div>
						<div class="form-animate card text-center">
							<h6 class="textLinea mb-2 mt-2" style="font-weight: inherit;">O nosotros te llamamos</h6>
							<div class="row m-0 justify-content-center">
								<div class="col-6 p-0 d-flex align-items-center justify-content-end">
									<h5 class="textElige" style="font-weight:inherit;">Elige tu opción</h5>
								</div>
								<div class=" col-5 row-flex">
									<div class="col-12 d-column" style="padding: 0px;">
										<input type="radio" id="tipo_movildevice" name="tipo_llamada" style="display: none;" value="movil" onclick="ocultarMovil(true)" checked="checked">
										<label class="labelMovil label-active m-0" for="tipo_movildevice">
											Móvil
										</label>

										<input type="radio" id="tipo_llamadadevice" name="tipo_llamada" style="display: none;" value="fijo" onclick="ocultarMovil(false)">
										<label class="labelFijo label-default m-0" for="tipo_llamadadevice">
											Fijo
										</label>
									</div>
								</div>
							</div>
							<div class="row m-0 mb-2 ocultarMovil d-none">
								<div class="col-11 ml-auto mr-auto">
									<select class="inputFormSection2" name="">
										<div class="inputFormSection2">
											<option value="">Departamento</option>
											<option value="41">Amazonas</option>
											<option value="43">Ancash</option>
											<option value="83">Apurimac</option>
											<option value="54">Arequipa</option>
											<option value="66">Ayacucho</option>
											<option value="76">Cajamarca</option>
											<option value="14">Callao</option>
											<option value="84">Cusco</option>
											<option value="67">Huancavelica</option>
											<option value="62">Huánuco</option>
											<option value="34">Ica</option>
											<option value="64">Junín</option>
											<option value="44">La Libertad</option>
											<option value="74">Lambayeque</option>
											<option value="1">Lima </option>
											<option value="65">Loreto</option>
											<option value="82">Madre de Dios</option>
											<option value="53">Moquegua</option>
											<option value="63">Pasco</option>
											<option value="74">Piura</option>
											<option value="51">Puno</option>
											<option value="42">San Martín</option>
											<option value="54">Tacna</option>
											<option value="72">Tumbes</option>
											<option value="61">Ucayali</option>

										</div>

									</select>
								</div>
							</div>

							<div class="col-11 row m-0 mb-2 justify-content-center ml-auto mr-auto">
								<div class="col-12 p-0 text-center">
									<input type="text" name="numero" class="inputFormSection2" placeholder="Ingresa tu Número" required="required">
								</div>
							</div>

							<div class="mt-1 mb-1">
								<div class="input-group col-11 row m-0 justify-content-center">
									<div class="input-checkbox col-1">
										<input class="" type="checkbox" autocomplete="off" name="acepta_terminos" id="check_1-principal-device" required="" onclick="aceptoPoliticas(this)">
										<label class="form-check-label textTerminos" id="check_label_1" for="check_1-principal-device">
										</label>
									</div>
									<div class="col-10 eow m-0 p-0 align-items-center text-right">
										<label class="form-check-label textTerminos">
											<a class="TextTerminos" href="https://portabilidadmovil.com.pe/terminos" target="_black">Autorizo el tratamiento de mis datos personales</a>
										</label>
									</div>
									<div class="invalid-feedback">
										Es requerido aceptar políticas.
									</div>
								</div>
							</div>

							<div class="row m-0 justify-content-center">
								<div class="col-11">
									<button id="a" type="submit" class="btn-animate btn btn-block buttonFormPrimary botonSubmit">TE LLAMAMOS</button>
								</div>
							</div>

						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="container-fluid">

		<div class="row background-black">
			<div class="col-12 justify-content-between">
				<div class="container-fluid footer2">
					<div class="row">
						<div class="classMovilfootes2 col-md-3 col-sm-12 d-flex align-items-center justify-content-center">
							<img src="<?= FOLDER_PATH ?>/src/assets/image/footer_logo.png" alt="logoClaro">
						</div>
						<div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-center text-center">
							<p class="textFooterlegal">Aviso legal | política de privacidad | consideraciones generales del producto</p>
						</div>
						<div class="classMovilfootes2 col-md-3 col-sm-12 d-flex flex-column align-items-center justify-content-center text-center">
							<p class="textFooterinf">Infórmate llamando al</p>
							<span class="fontNumber">0800 720 1234</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>

<!-- Script -->
<script type="text/javascript" async src="<?= FOLDER_PATH ?>/src/js/clr_j6dds4a86d48s6a486c.js"></script>
<script type="text/javascript" async src="<?= FOLDER_PATH ?>/src/js/clr_d68s448s64a86s5s863.js"></script>

<script type="text/javascript">
	var listaNegra = [998731350, 3178958630, 913698028, 948612902, 918633632, 947008759, 990826441, 977983310, 970353505];
	var horario_atencion = {
		"default": {
			"lunes": {
				"numero_dia": 1,
				"hora_inicio": 8,
				"hora_fin": 20
			},
			"martes": {
				"numero_dia": 2,
				"hora_inicio": 8,
				"hora_fin": 20
			},
			"miercoles": {
				"numero_dia": 3,
				"hora_inicio": 8,
				"hora_fin": 20
			},
			"jueves": {
				"numero_dia": 4,
				"hora_inicio": 8,
				"hora_fin": 20
			},
			"viernes": {
				"numero_dia": 5,
				"hora_inicio": 8,
				"hora_fin": 20
			},
			"sabado": {
				"numero_dia": 6,
				"hora_inicio": 8,
				"hora_fin": 19
			},
			"domingo": {
				"numero_dia": 0,
				"hora_inicio": 0,
				"hora_fin": 0
			}
		},
		"opcion-2": {
			"lunes": {
				"numero_dia": 1,
				"hora_inicio": 7,
				"hora_fin": 22
			},
			"martes": {
				"numero_dia": 2,
				"hora_inicio": 7,
				"hora_fin": 22
			},
			"miercoles": {
				"numero_dia": 3,
				"hora_inicio": 7,
				"hora_fin": 22
			},
			"jueves": {
				"numero_dia": 4,
				"hora_inicio": 7,
				"hora_fin": 22
			},
			"viernes": {
				"numero_dia": 5,
				"hora_inicio": 7,
				"hora_fin": 22
			},
			"sabado": {
				"numero_dia": 6,
				"hora_inicio": 7,
				"hora_fin": 19
			},
			"domingo": {
				"numero_dia": 0,
				"hora_inicio": 7,
				"hora_fin": 18
			}
		}
	};
	var lista_tsource = {
		"fijo": {
			"default": {
				"nombre": "nombre",
				"default": 0,
				"numero": "015434543",
				"lbl_numero": "5434543"
			},
			"bogota": {
				"nombre": "Bogot\u00e1",
				"default": 1,
				"numero": "888888888",
				"lbl_numero": "000000000"
			}
		},
		"movil": {
			"default": {
				"nombre": "nombre",
				"default": 1,
				"numero": "0313791587",
				"lbl_numero": "313791587"
			},
			"bogota": {
				"nombre": "Bogot\u00e1",
				"default": 0,
				"numero": "0313791587",
				"lbl_numero": "313791587"
			}
		}
	};
	var loadScripts = null;
	var nombre_tab = "Home";

	var hideLoad = function() {}

	function downloadJSAtOnload() {

		loadScripts = function() {
			setTimeout(
				function() {

					// script general
					var element = document.createElement("script");
					element.src = "<?= FOLDER_PATH ?>/src/js/clr_d68s448s64a86s5s863.js";
					document.body.appendChild(element);

					// script modulo
					var js = ["<?= FOLDER_PATH ?>\/src\/js\/script.js"];
					for (var i = js.length - 1; i >= 0; i--) {
						var element = document.createElement("script");
						element.src = js[i];
						document.body.appendChild(element);

						//Coloco en el ultimo script cargado un onload
						if (i == 0) {
							element.setAttribute('onload', 'hideLoad();');
						}
					}


				}, 0);
		};

		// script bootstrap
		var element = document.createElement("script");
		element.src = "<?= FOLDER_PATH ?>/src/js/clr_d486d486s4a86d4d.js";
		document.body.appendChild(element);
		// script bootstrap min
		var element = document.createElement("script");
		element.src = "<?= FOLDER_PATH ?>/src/js/clr_g48f64d8s6a4d86d4s.js";
		document.body.appendChild(element);
		// script fontweasome
		var element = document.createElement("script");
		element.src = "<?= FOLDER_PATH ?>/src/js/clr_i8464dsa63as3d11d59.js";
		document.body.appendChild(element);

		// script callback
		var element = document.createElement("script");
		element.src = "<?= FOLDER_PATH ?>/src/js/clr_g64d864f86d486sa66.js";
		element.setAttribute('onload', 'functionsPostCallBack();');
		document.body.appendChild(element);
	}

	if (window.addEventListener) {
		window.addEventListener("load", function() {
			setTimeout(function() {
				downloadJSAtOnload();
			}, 0)
		}, false);
	} else if (window.attachEvent) {
		window.attachEvent("onload", function() {
			setTimeout(function() {
				downloadJSAtOnload();
			}, 0)
		});
	} else {
		window.onload = function() {
			setTimeout(function() {
				downloadJSAtOnload();
			}, 0);
		}
	}
</script>

</html>