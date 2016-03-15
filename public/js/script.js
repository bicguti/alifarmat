jQuery(document).ready(function($) {

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
    $.ajax({
      url: url,
      type: 'GET',
      data:{id: depto}
    }).done(function() {
      console.log('success');
    }).fail(function() {
      $('#myModal').modal('hide');
      alert('Lo sentimos parece que a ocurrido un error al intentar recuperar la información de la base de datos');
      console.log('error');
    }).always(function(data) {
        var json = JSON.parse(data);
        var html = '<select class="form-control" name="id_departamento">';
        html += '<option>Seleccione municipio...</option>';
        for (muni in json) {
          html += '<option value="'+json[muni].id_municipio+'"> '+json[muni].nombre_municipio.toUpperCase()+' </option>';
        }
        html += '</select>';
        $('#municipio').html(html);
        $('#myModal').modal('hide');
    });//fin de la peticion ajax

  });//fin del evento change

});
