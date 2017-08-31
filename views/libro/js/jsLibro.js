$(function ()
{
    //Carga los datos del Estudiante//
    $("#buscarEstudianteRatificar").click(function (event) {
        $mensaje = "'¿Desea eliminar este libro?'";
        var txt_descripcionConsulta = $("#txt_descripcionConsulta").val();
        var consulta = {txt_descripcionConsulta: $("#txt_descripcionConsulta").val(), txt_datosBuscar: $("#tf_cedulaEstudiante").val()};
        //Realizo la consulta
        $.post('buscarEstuRatif/', consulta, function (resulBusqueda, success) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("El libro a buscar no ha sido encontrado.\nPor favor, verifique los datos ingresados.");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><th colspan="6" class="nombreTabla text-center">LIBROS ENCONTRADOS</th></tr><tr><th>N°</th><th>Título</th><th>Autor</th><th>Código</th><th>Descriptor</th><th>Editorial</th><th>Acción</th></tr>');
                for (var i = 0; i < resulBusqueda.length; i++) {
                    $('#tablaRatificar').append('<tr><td>' + (i + 1) + '</td>' +
                            '<td>' + resulBusqueda[i].titulo + '</td>' +
                            '<td>' + resulBusqueda[i].autor + '</td>' +
                            '<td>' + resulBusqueda[i].codigo + '</td>' +
                            '<td>' + resulBusqueda[i].categoria + '</td>' +
                            '<td>' + resulBusqueda[i].editorial + '</td>' +
                            '<td><a class="btn-sm btn-warning" href="editarLibro/' + resulBusqueda[i].codigo + '">Editar</a> ' +
                            '<a class="btn-sm btn-danger" href="eliminarLibro/' + resulBusqueda[i].codigo + '" onclick = "return confirm(' + $mensaje + ')";>Eliminar</a></td>' +
                            '</tr>');
                }
            }
        }, "json");
        /*
         $.getJSON('buscarEstuRatif/' + txt_descripcionConsulta, function (resulBusqueda) {
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
         '<td><a class="btn-sm btn-warning" href="editarLibro/' + resulBusqueda[i].codigo + '">Editar</a> ' +
         '<a class="btn-sm btn-danger" href="eliminarLibro/' + resulBusqueda[i].codigo + '">Eliminar</a></td>' +
         '</tr>');
         }
         }
         });
         */
    });
});