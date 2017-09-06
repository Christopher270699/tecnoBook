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
                            '<td>' + resulBusqueda[i].nombreLibro + '</td>' +
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

    //Carga los Grupos//
    $("#tf_Niveles").change(function () {
        $("#listaEstudiantes").empty();
        $("#tf_Grupos").empty();
        var nivelSeleccionado = $("#tf_Niveles").val();
        $.getJSON('../factura/cargaGrupos/' + nivelSeleccionado, function (Gru) {
            $('#tf_Grupos').append('<option value="">Seleccione</option>');
            for (var iP = 0; iP < Gru.length; iP++) {
                $("#tf_Grupos").append('<option value="' + Gru[iP].grupo + '">' + Gru[iP].grupo + '</option>');
            }
        });
    });
    $("#tf_Grupos").change(function () {
        //Activo la Animación para carga de datos
        $("#listaEstudiantes").empty();
        var banderaGrupoB = 0;
        var banderaGrupoC = 0;
        var consulta = {nivelSeleccionado: $("#tf_Niveles").val(), grupoSeleccionado: $("#tf_Grupos").val()};
        //Realizo la consulta
        $.post('../factura/cargaSeccion/', consulta, function (seccionElegida, success) {
            var arraySalida = "";
            arraySalida += '<thead><tr><td colspan="5" class="text-center">' + consulta.nivelSeleccionado + '-' + consulta.grupoSeleccionado + '</td></tr>';
            arraySalida += '<tr><td colspan="5" class="text-center">&nbsp;</td></tr><tr><td colspan="5" class="text-center">Grupo A</td></tr>';
            arraySalida += '<tr><th>N°</th><th>Identificación</th><th>Nombre del Estudiante</th><th>Condición</th><th class="text-center">Opciones</th></tr></thead><tbody>';
            for (var linea = 0; linea < seccionElegida.length; linea++) {
                if (seccionElegida[linea].sub_grupo == 'B' && banderaGrupoB == 0) {
                    arraySalida += '<tr><td colspan="4" class="text-center">&nbsp;</td></tr><tr><td colspan="4" class="text-center">Grupo B</td></tr>';
                    banderaGrupoB = 1;
                } else if (seccionElegida[linea].sub_grupo == 'C' && banderaGrupoC == 0) {
                    arraySalida += '<tr><td colspan="4" class="text-center">&nbsp;</td></tr><tr><td colspan="4" class="text-center">Grupo C</td></tr>';
                    banderaGrupoC = 1;
                }
                arraySalida += '<tr><td>' + (linea + 1) + '</td><td>' +
                        seccionElegida[linea].cedula + '</td><td>' + seccionElegida[linea].apellido1 + ' ' +
                        seccionElegida[linea].apellido2 + ' ' + seccionElegida[linea].nombre + '</td><td>' +
                        seccionElegida[linea].condicion + '</td>';
                arraySalida += '<td><a class="btn-sm btn-primary" href="modificarSeccion/' + seccionElegida[linea].cedula + '">Agregar</a></td></tr>';
            }
            arraySalida += '<tr><td colspan="5" class="text-center">Ultima Línea</td></tr></tbody>';
            $('#listaEstudiantes').append(arraySalida);
        }, "json");
    });
//fin cargar
});