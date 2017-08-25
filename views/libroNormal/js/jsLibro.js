$(function ()
{//Carga los datos del Estudiante//
    $("#buscarLibroRatificar").click(function (event) {
        var idD = $("#txt_nombreLibro").val();
        alert("ERROR");
        $.getJSON('buscarLibRatif/' + idD, function (resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("ERROR");
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