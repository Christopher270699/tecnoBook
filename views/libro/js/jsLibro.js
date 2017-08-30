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
    //Fecha Nacimiento//
    $("#txt_fechaPublicacion").datepicker({dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    //Carga los datos del Estudiante//
    $("#buscarEstudianteRatificar").click(function (event) {
        var idD = $("#tf_cedulaEstudiante").val();
        $.getJSON('buscarEstuRatif/' + idD, function (resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("El libro a buscar no ha sido encontrado.\nPor favor, veifique los datos ingresados.");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><th colspan="6" class="nombreTabla text-center">LIBROS ENCONTRADOS</th></tr><tr><th>N°</th><th>Título</th><th>Autor</th><th>Categoría</th><th>Editorial</th><th>Acción</th></tr>');
                for (var i = 0; i < resulBusqueda.length; i++) {
                    $('#tablaRatificar').append('<tr><td>1</td>' +
                            '<td>' + resulBusqueda[i].titulo + '</td>' +
                            '<td>' + resulBusqueda[i].autor + '</td>' +
                            '<td>' + resulBusqueda[i].categoria + '</td>' +
                            '<td>' + resulBusqueda[i].editorial + '</td>' +
                            '<td><a class="btn-sm btn-warning" href="editarLibro/' + resulBusqueda[i].id + '">Editar</a> ' +
                            '<a class="btn-sm btn-danger" href="eliminarLibro/' + resulBusqueda[i].id + '">Eliminar</a></td>' +
                            '</tr>');
                }
            }
        });
    });
});