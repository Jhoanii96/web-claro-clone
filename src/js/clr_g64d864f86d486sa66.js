class Callback{
 
  constructor(url){
    this.url=url;
    this.numero='';
    this.extra={};
    this.ciudad='';
    this.tipo_llamada='';
    this.email='';
    this.nombre='';
  }

  enviar(){
    let objeto={
             "_token": $("#_token").val(),
             "numero" : this.numero,
             "tipo" : this.tipo_llamada,
             "extra" : this.extra
            }; console.log(objeto);
     $.ajax({
          type: "POST",
          url: this.url,
          dataType: 'json',
          data: objeto,
      }).done( function(res) {
          console.log(res);
      }).fail( function(res) {
          console.log(res);
      });
  }

  // recibe los parametros de elemento form y evento
  setVariablesPorFormulario(elementForm,event){
    event.preventDefault();
    let form = elementForm.serialize();
    let objForm=this.getVariables(form);
    for(let i in objForm){
        if(i=='numero') this.numero= objForm[i];
        if(i=='ciudad') this.ciudad= objForm[i];
        if(i=='tipo_llamada') this.tipo_llamada= objForm[i];
        if(i=='email') this.email= objForm[i];
        if(i=='nombre') this.nombre= objForm[i];
    }
    if(this.tipo_llamada=='fijo'){
      this.nombre_cola=this.cola_fijo;
      this.numero= this.ciudad+this.numero;
    }
    if(this.tipo_llamada=='movil') this.nombre_cola=this.cola_movil;
  }

  setColaDefault(tipo){
    this.tipo_llamada=tipo;
    if(tipo=='fijo'){this.nombre_cola=this.cola_fijo;}
    if(tipo=='movil'){this.nombre_cola=this.cola_movil;}
  }

  setNumero(numero){
    this.numero=numero;
  }

  getNumero(){
    return this.numero;
  }

  setExtra(extra={}){
    this.extra=extra;
  }

  getVariables(getString){
    var GET = getString.split('&');
        var get = {};

        // recorremos todo el array de valores
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
  }
}

class Callback2{

  constructor(url){
    this.url=url;
    this.numero='';
    this.extra={};
    this.ciudad='';
    this.tipo_llamada='';
    this.email='';
    this.nombre='';
  }

  enviar(){
    let objeto={
             "_token": $("#_token").val(),
             "numero" : this.numero,
             "tipo" : this.tipo_llamada,
             "extra" : this.extra
            };

    $.ajax({
          type: "POST",
          url: this.url,
          dataType: 'json',
          data: objeto,
      }).done( function(res) {
          console.log(res);
      }).fail( function(res) {
          console.log(res);
      });
  }

  setColaDefault(tipo){
    this.tipo_llamada=tipo;
    if(tipo=='fijo'){this.nombre_cola=this.cola_fijo;}
    if(tipo=='movil'){this.nombre_cola=this.cola_movil;}
  }

  setNumero(numero){
    this.numero=numero;
  }

  getNumero(){
    return this.numero;
  }

  setExtra(extra={}){
    this.extra=extra;
  }

  // recibe los parametros de elemento form y evento
  setVariablesPorFormulario(elementForm,event){
    event.preventDefault();
    let form = elementForm.serialize();
    let objForm=this.getVariables(form);
    for(let i in objForm){
        if(i=='numero') this.numero= objForm[i];
        if(i=='ciudad') this.ciudad= objForm[i];
        if(i=='tipo_llamada') this.tipo_llamada= objForm[i];
        if(i=='email') this.email= objForm[i];
        if(i=='nombre') this.nombre= objForm[i];

    }
    if(this.tipo_llamada=='fijo'){
      this.nombre_cola=this.cola_fijo;
      this.numero= this.ciudad+this.numero;
    }
    if(this.tipo_llamada=='movil') this.nombre_cola=this.cola_movil;
  }

  getVariables(getString){
    var GET = getString.split('&');
        var get = {};

        // recorremos todo el array de valores
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
  }
}

class Utilidad{

  constructor(){
    this.lista_negra= listaNegra;
    this.horario_atencion= horario_atencion;
    this.lista_tsource=lista_tsource;
    this.tsource=this.getTSource();
  }

  validarListaNegra(numero){
    let res=true;
      $.each(this.lista_negra, function(k,v){
          if (numero==v) {
              res= false;
          }
      });
      return res;
  }

  validarHorarioAtencion(opcion='default'){
      let res= false;
      let hoy = new Date();
      let anio = hoy.getFullYear();
      let dia = hoy.getDate();
      let mes= hoy.getMonth();
          mes= parseFloat(mes+1)<parseFloat(10) ? '0'+parseFloat(mes+1) : parseFloat(mes+1);
          dia= parseFloat(dia)<parseFloat(10) ? dia : parseFloat(dia);
      let hora= hoy.getHours();
          hora= parseFloat(hora)<parseFloat(10) ? parseFloat(hora) : parseFloat(hora);
      let minuto= hoy.getMinutes();
          minuto= parseFloat(minuto)<parseFloat(10) ? parseFloat(minuto) : parseFloat(minuto);
      let segundos= hoy.getSeconds();
          segundos= parseFloat(segundos)<parseFloat(10) ? parseFloat(segundos) : parseFloat(segundos);
      let diaSemanaNumero = hoy.getDay();
      let horaDia = hoy.getHours();

      $.each(this.horario_atencion[opcion], function(k,v){
          if(parseFloat(diaSemanaNumero)==parseFloat(v.numero_dia) && parseFloat(horaDia) >= parseFloat(v.hora_inicio) && parseFloat(horaDia) < parseFloat(v.hora_fin)){
              res=true;
          }
      });
      return res;
  }

  // funciones para asignar numeros telefonicos dependiendo del tsource
  getTSource(){
      var vars=this.getGET();
      return vars["tsource"] ? vars["tsource"] : '';
  }

  cargarTsource(opcion='fijo'){
      var tmpTsourse= this;
      if(tmpTsourse.tsource!=null || tmpTsourse.tsource !=''){
          var validarFuente=0;
          var datosDefault={"nombre": "", "default":0, "numero": "", "lbl_numero":""};
          $.each(lista_tsource[opcion], function(k, v){
              if(k==tmpTsourse.tsource){
                      validarFuente=1;
                      tmpTsourse.cargarInfo(v.numero, v.numero, v.nombre, opcion,v.default);
              }else{
                if(v.default==1){
                    datosDefault=v;
                }
              }
          });
          if (validarFuente==0) {
              tmpTsourse.cargarInfo(datosDefault.numero, datosDefault.numero, datosDefault.nombre, opcion, datosDefault.default);
          }
      }else{
          $.each(lista_tsource[opcion], function(k, v){
              if(v.default==1){
                      tmpTsourse.cargarInfo(v.numero, v.numero,v.nombre, opcion, v.default);
              }
          });
      }
  }

  getGET(){
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

  // carga informacion al agregar las sigientes clases a la etiqueta
  cargarInfo(numero='', lbl_numero='', nombre='',tipo='', es_default=0){
          $(".lbl_numero-"+tipo).html(lbl_numero);
          $(".callMovil-"+tipo).attr('href', 'tel:'+numero);
          $(".lbl_nombre-"+tipo).text(nombre);

          if(es_default==1){
              $(".mostar_default-"+tipo).removeClass('d-none');
          }else{
              $(".mostar_default-"+tipo).addClass('d-none');
          }
  }
  // fin opciones de tsource

  gracias(event){
    console.log('==========pre==============')
    var el = $(event.target);
    console.log(el/*.parentElement*/);
    console.log('=======gracias======')
var Mensajegracias= $("#plantilla-gracias").html();
$("form.form-callback").html(Mensajegracias);
    // $("form.form-callback");
    // $("form.form-callback").html(Mensajegracias);
    console.log('gracias end');
}

  fueraHorario() {
      var Mensaje= $("#platilla-fuera_horario").html();
      $("form.form-callback").parent().html(Mensaje);
  }

  getVariablesSerialize(getString){
    var GET = getString.split('&');
        var get = {};

        // recorremos todo el array de valores
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
  }
}
