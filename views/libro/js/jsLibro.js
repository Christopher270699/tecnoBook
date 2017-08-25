$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

$(function ()
{
    //FECHAS
    $("#txt_fechaPublicacion").datepicker({dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    //BUSCADOR//
    $("#buscarTituloLibro").click(function (event) {
        var idD = $("#tf_titulo").val();
        $.getJSON('buscarLibro/' + idD, function (resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("Libro no encontrado.");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><td colspan="5" class="nombreTabla">LISTA DE ESTUDIANTES POR RATIFICAR</td></tr><tr><th>N°</th><th>Identificación</th><th>1º Apellido</th><th>2º Apellido</th><th>Nombre</th><th>Nivel</th><th>Grupo</th><th>Subgrupo</th><th>Acción</th></tr>' +
                        '<tr><td>1</td>' +
                        '<td>' + idD + '</td>' +
                        '<td>' + resulBusqueda[0].apellido1 + '</td>' +
                        '<td>' + resulBusqueda[0].apellido2 + '</td>' +
                        '<td>' + resulBusqueda[0].nombre + '</td>' +
                        '<td>' + resulBusqueda[0].nivel + '</td>' +
                        '<td>' + resulBusqueda[0].grupo + '</td>' +
                        '<td>' + resulBusqueda[0].sub_grupo + '</td>' +
                        '<td><a class="btn-sm btn-primary" href="ratificarEstudiante/' + idD + '">Ratificar</a></td>' +
                        '</tr>');
            }
        });
    });
});