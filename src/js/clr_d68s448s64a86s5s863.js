$(document).ready(function(){
  $(".tag-Inbound").click(function(){
    enviotagManager(Event="Inbound",EventCategory="Inbound",EventAction="Inbound",EventLabel="Inbound - "+ nombre_tab);
  });

  $(".botonSubmit").click(function(){
    validarTerminos();
  });
});

var sticky = $('#idFooter').offset();

$(window).scroll(function() {
  if (window.pageYOffset <= 1100) {
    $('#formulario-principal .form-animate').removeClass("topForm");
    $('#formulario-principal .btn-animate').removeClass("topForm");
    $('.BoxRedHeader').removeClass("topForm");
    $('#formulario-principal .btn-animate').addClass("btn");
    $('#formulario-principal .btn-animate').addClass("btn-block");
    $('#formulario-principal .btn-animate').addClass("buttonFormPrimary");
  } else {
    $('#formulario-principal .form-animate').addClass("topForm");
    $('#formulario-principal .btn-animate').addClass("topForm");
    $('#formulario-principal .btn-animate').removeClass("btn");
    $('#formulario-principal .btn-animate').removeClass("btn-block");
    $('#formulario-principal .btn-animate').removeClass("buttonFormPrimary");
    $('.BoxRedHeader').addClass("topForm");
  }
});

// Smooth scrolling using jQuery easing
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: ((target.offset() && target.offset().top) ? target.offset().top : 0 != - 54)
      }, 1000, "easeInOutExpo");
      return false;
    }
  }
});


// Closes responsive menu when a scroll trigger link is clicked
$('.js-scroll-trigger').click(function() {
  $('.navbar-collapse').collapse('hide');
});


$(document).ready(function(){
  // Collapse Navbar
  var navbarCollapse = function() {
    if (($("#mainNav").offset() && $("#mainNav").offset().top) ? target.offset().top : 0 > 100) {
      $("#mainNav").addClass("navbar-shrink");
      $("#mainNav").addClass("shadow");

    } else {
      $("#mainNav").removeClass("navbar-shrink");
      $("#mainNav").removeClass("shadow");
    }
     if (($("#mainNav").offset() && $("#mainNav").offset().top) ? target.offset().top : 0 > 200 && (screen.width > 991)  ) {
      $(".ocultarForm").hide();
    }else{
      $(".ocultarForm").show();
    }
  };
    // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  envioFormulariosCallback();
});

 function getGETUrl(){
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};

            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }else{
          return {};
        }
    }


function envioFormulariosCallback(){
  // para el envio Callback1 parametros (cola,url)
  const callback1= new Callback('/callback-v2');
  callback1.setColaDefault("movil");
  // funcciones de utilidad como llo son lista negra, horario de atencion, tsorce .....
  const utilidad= new Utilidad();
  utilidad.cargarTsource('movil'); // funcion para cargar tsource

  // para envio formulario callback principal
  $("#formulario-principal").submit(function(event){
    if (utilidad.validarHorarioAtencion()) {
      // se envia el elemeto form y evento
      console.log('submit')
      callback1.setVariablesPorFormulario($("#formulario-principal"),event);
      console.log('pre extra')
      callback1.setExtra({tsource:window.location.href});
      if(utilidad.validarListaNegra(callback1.getNumero())){
      console.log('pre enviar')
        callback1.enviar();
        enviotagManager(Event="Envio de formulario",EventCategory="Callback",EventAction="Envio de formulario",EventLabel="Formulario Principal - "+ nombre_tab);
      }
      console.log('next done');
      utilidad.gracias(event);
    }else{
      utilidad.fueraHorario();
    }
  });

  // para envio formulario callback Modal
  $("#form-contato").submit(function(event){
    if (utilidad.validarHorarioAtencion()) {
      // se envia el elemeto form y evento
      callback1.setVariablesPorFormulario($("#form-contato"),event);
      callback1.setExtra({tsource:window.location.href});
      if(utilidad.validarListaNegra(callback1.getNumero())){
        callback1.enviar();
        enviotagManager(Event="Envio de formulario",EventCategory="Callback",EventAction="Envio de formulario",EventLabel="Formulario Footer - "+ nombre_tab);
      }
      utilidad.gracias(event);
    }else{
      utilidad.fueraHorario();
    }
  });

  // para envio formulario callback Modal
  $("#formulario-modal").submit(function(event){
    if (utilidad.validarHorarioAtencion()) {
      // se envia el elemeto form y evento
      callback1.setVariablesPorFormulario($("#formulario-modal"),event);
      callback1.setExtra({tsource:window.location.href});
      if(utilidad.validarListaNegra(callback1.getNumero())){
        callback1.enviar();
        enviotagManager(Event="Envio de formulario",EventCategory="Callback",EventAction="Envio de formulario",EventLabel="Formulario Modal - "+ nombre_tab);
      }
      utilidad.gracias(event);
    }else{
      utilidad.fueraHorario();
    }
  });

  // para envio formulario callback Footer
  $("#formulario-footer").submit(function(event){
    if (utilidad.validarHorarioAtencion()) {
      // se envia el elemeto form y evento
      callback1.setVariablesPorFormulario($("#formulario-footer"),event);
      callback1.setExtra({tsource:window.location.href});
      if(utilidad.validarListaNegra(callback1.getNumero())){
        callback1.enviar();
        enviotagManager(Event="Envio de formulario",EventCategory="Callback",EventAction="Envio de formulario",EventLabel="Formulario Footer - "+ nombre_tab);
      }
      utilidad.gracias(event);
    }else{
      utilidad.fueraHorario();
    }
  });
}

function ocultarMovil(tipo=true){
    if(!tipo){
      $(".ocultarMovil").removeClass("d-none");
      $(".labelFijo").removeClass("label-default");
      $(".labelMovil").removeClass("label-active");
      $(".labelFijo").addClass("label-active");
      $(".labelMovil").addClass("label-default");
    }else{
      $(".ocultarMovil").addClass("d-none");
      $(".labelFijo").removeClass("label-active");
      $(".labelFijo").addClass("label-default");
      $(".labelMovil").removeClass("label-default");
      $(".labelMovil").addClass("label-active");
    }
}

function enviotagManager(Event="",EventCategory="",EventAction="",EventLabel=""){
  let objeto = { 
                    "event": Event,
                    "EventCategory": EventCategory,
                    "EventAction": EventAction,
                    "EventLabel": EventLabel
                }
                console.log(objeto);
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push(objeto);

}

function aceptoPoliticas(element) {
  var elementForm= $(element).parent().parent().parent().parent().parent();
  var idForm= elementForm.attr("id"); 

  if ($(element).is(":checked")) { 
    $("#"+idForm+" .invalid-feedback").addClass('d-none');
    $("#"+idForm+" .invalid-feedback").removeClass('d-block');
  }else{
    $("#"+idForm+" .invalid-feedback").removeClass('d-none');
    $("#"+idForm+" .invalid-feedback").addClass('d-block');
  }
}

function validarTerminos() {
  $.each(document.forms,function(k,v) {
    $.each(v,function(k2,v2) {
      if($(v2).attr('name')=='acepta_terminos'){
        aceptoPoliticas(v2);
      }
    });
  });
}