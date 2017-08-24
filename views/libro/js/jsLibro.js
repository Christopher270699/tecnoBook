$(function ()
{//Carga los datos del Estudiante//
    $("#buscarLibroRatificar").click(function (event) {
        var idD = $("#txt_nombreLibro").val();
        alert(1);
        $.getJSON('buscarLibRatif/' + idD, function (resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
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