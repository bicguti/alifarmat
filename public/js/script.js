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

  $('.municipio').change(function(event) {
    event.preventDefault();
    var depto = $(this).val();
    $.ajax({
      url: url,
      type: 'GET',
      data:{id: depto}
    }).done(function() {
      console.log('success');
    }).fail(function() {
      console.log('erro');
    }).always(function(data) {
        var json = JSON.parse(data);
        
    });//fin de la peticion ajax

  });//fin del evento change

});
