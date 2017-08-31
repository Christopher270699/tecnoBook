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
    $("#txt_fechaPedido").datepicker({dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
    //Fecha Nacimiento//
    $("#txt_fechaEntrega").datepicker({dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
    //Carga los datos del Estudiante//
    $("#buscarEstudianteRatificar").click(function (event) {
        $mensaje = "'¿Ya se ha entregado el libro?'";
        var txt_descripcionConsulta = $("#txt_descripcionConsulta").val();
        var consulta = {txt_descripcionConsulta: $("#txt_descripcionConsulta").val(), txt_datosBuscar: $("#tf_cedulaEstudiante").val()};
        //Realizo la consulta
        $.post('buscarEstuRatif/', consulta, function (resulBusqueda, success) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("El libro a buscar no ha sido encontrado.\nPor favor, verifique los datos ingresados.");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><th colspan="6" class="nombreTabla text-center">PRÉSTAMOS ENCONTRADOS</th></tr><tr><th>ID</th><th>Nombre del Libro</th><th>Nombre del Estudiante</th><th>Fecha del Pedido</th><th>Fecha de Entrega</th><th>Acción</th></tr>');
                for (var i = 0; i < resulBusqueda.length; i++) {
                    $('#tablaRatificar').append('<tr><td>' + resulBusqueda[i].id + '</td>' +
                            '<td>' + resulBusqueda[i].nombreLibro  + '</td>' +
                            '<td>' + resulBusqueda[i].nombreEstudiante + '</td>' +
                            '<td>' + resulBusqueda[i].fechaPedido + '</td>' +
                            '<td>' + resulBusqueda[i].fechaEntrega + '</td>' +
                            '<td><a class="btn-sm btn-warning" href="editarFactura/' + resulBusqueda[i].id + '">Editar</a> ' +
                            '<a class="btn-sm btn-danger" href="eliminarFactura/' + resulBusqueda[i].id + '" onclick = "return confirm(' + $mensaje + ')";>Devuelto</a></td>' +
                            '</tr>');
                }
            }
        }, "json");
    });
});