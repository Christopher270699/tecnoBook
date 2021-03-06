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
                $('#tablaRatificar').append('<tr><th colspan="6" class="nombreTabla text-center">LIBROS ENCONTRADOS</th></tr><tr><th>N°</th><th>Título</th><th>Autor</th><th>Código</th><th>Descriptor</th><th>Editorial</th></tr>');
                for (var i = 0; i < resulBusqueda.length; i++) {
                    $('#tablaRatificar').append('<tr><td>' + (i + 1) + '</td>' +
                            '<td>' + resulBusqueda[i].titulo + '</td>' +
                            '<td>' + resulBusqueda[i].autor + '</td>' +
                            '<td>' + resulBusqueda[i].codigo + '</td>' +
                            '<td>' + resulBusqueda[i].categoria + '</td>' +
                            '<td>' + resulBusqueda[i].editorial + '</td>' +
                            '</tr>');
                }
            }
        }, "json");
    });
});