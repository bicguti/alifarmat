jQuery(document).ready(function($) {

  options={
    sticky_class: 'sticky',
    custom_back_text: true,
    back_text: 'Atras',
    is_hover: true,
    mobile_show_parent_link: false,
    scrolltop: true
  }
  $(document).foundation('topbar', options);

  $.datepicker.regional["es"]={//configuracion para el datepicker en idioma españo-latinoamericano
    closeText: 'Cerrar',
    prevText: 'anterior',
    nextText: 'Siguiente',
    CurrentText: 'Hoy',
    monthNames:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort:['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames:['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    dayNamesShort:['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
    dayNamesMin:['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
    weekHeader:'Sm',
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: '',
    changeMonth:true,
    changeYear:true,
    yearRange: "1930:2050",
    defaultDate:"-30y",
  };//fin de la configuración del datapicker

  $.datepicker.setDefaults($.datepicker.regional["es"]);//asignar las configuraciones al datapicker
  $('.datepicker').datepicker();//asignar un datapicker a los elementos que tengan una clase llamada datapicker

  $('.departamento').change(function(event) {
    event.preventDefault();

    var URLdomain = window.location.host;
    var protocolo = window.location.protocol;
    var url = protocolo+'//'+URLdomain+'/municipio';

    var depto = $(this).val();
    if (depto != '') {
        $('#ventanaModal').foundation('reveal', 'open');
        $.ajax({
          url: url,
          type: 'GET',
          data:{id: depto}
        }).done(function() {
          console.log('success');
        }).fail(function() {
          //$('#myModal').modal('hide');
          setTimeout(function(){$('#ventanaModal').foundation('reveal', 'close')}, 500);
          alert('Lo sentimos parece que a ocurrido un error al intentar recuperar la información de la base de datos');
          console.log('error');
        }).success(function(data) {
            var json = JSON.parse(data);
            var html = '';
            html += '<option selected="selected">Seleccione municipio...</option>';
            for (muni in json) {
              html += '<option value="'+json[muni].id_municipio+'"> '+json[muni].nombre_municipio.toUpperCase()+' </option>';
            }
            $('#municipio').html(html);
            //$('#myModal').modal('hide');
            setTimeout(function(){$('#ventanaModal').foundation('reveal', 'close')}, 500);
            console.log('complete');
        });//fin de la peticion ajax
    } else {
      alert('Por favor seleccione un departamento!!!');
    }//fin del if else
  });//fin del evento change

  //evnto donde se busca a una persona en la base de datos por medio de una peticióin ajax y se obtienen los datos como nombres y apellidos
  // y su correo electronico
  $('#btn-search').click(function(event) {
    event.preventDefault();
    var apellidos = $('#apellidos_persona').val();
    var URLdomain = window.location.host;
    var protocolo = window.location.protocol;
    var url = protocolo+'//'+URLdomain+'/persona';
    if (apellidos != '') {
      $('#ventanaModal').foundation('reveal', 'open');//mostramos el mensaje de carga
      $.ajax({
        url: url,
        type: 'GET',
        data: {apellidos:apellidos}
      }).done(function() {
        console.log('done');
      }).error(function(data) {
        setTimeout(function(){$('#ventanaModal').foundation('reveal', 'close')}, 500);
        console.log('Error'+data);
        alert('Lo sentimos parece que a ocurrido un error al intentar recuperar la información de la base de datos, por favor vuelve a intentarlo más tarde!!!');
      }).success(function(data) {
        if (data.length == 0) {
          alert('Lo sentimos no se encontro ningun empleado con los apellidos especificados!!!')
        }else {
          var json =JSON.parse(data);
          var nombres = '';
          var apellidos = '';
          var correo = '';
          for(persona in json)
          {
            nombres = json[persona].nombres_empleado;
            apellidos = json[persona].apellidos_empleados;
            correo = json[persona].correo_empleado;
          }
          $('#name').val(nombres + ' '+ apellidos);
          $('#email').val(correo);
        }
        setTimeout(function(){$('#ventanaModal').foundation('reveal', 'close')}, 500);
      });//fin de la petición ajax
    }else {
      alert('El campo Buscar Persona es requerido, por favor ingrese los apellidos de la persona a buscar');
    }

  });//fin del evento click


});
