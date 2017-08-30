$(function ()
{
    //BUSCADOR
    $("#buscarEstudianteRatificar").click(function (event) {
        var idD = $("#tf_cedulaEstudiante").val();
        $.getJSON('buscarEstuRatif/' + idD, function (resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("El libro a buscar no ha sido encontrado.\nPor favor, veifique los datos ingresados.");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><th colspan="6" class="nombreTabla text-center">LIBROS ENCONTRADOS</th></tr><tr><th>N°</th><th>Título</th><th>Autor</th><th>Categoría</th><th>Editorial</th></tr>');
                for (var i = 0; i < resulBusqueda.length; i++) {
                    $('#tablaRatificar').append('<tr><td>1</td>' +
                            '<td>' + resulBusqueda[i].titulo + '</td>' +
                            '<td>' + resulBusqueda[i].autor + '</td>' +
                            '<td>' + resulBusqueda[i].categoria + '</td>' +
                            '<td>' + resulBusqueda[i].editorial + '</td>' +
                            '</tr>');
                }
            }
        });
    });
});