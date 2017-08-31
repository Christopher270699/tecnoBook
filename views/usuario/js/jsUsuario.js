$(function ()
{
//Carga los datos del Estudiante//
    $("#buscarEstudianteRatificar").click(function (event) {
        var idD = $("#tf_cedulaEstudiante").val();
        $.getJSON('buscarEstuRatif/' + idD, function (resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("El usuario a buscar no ha sido encontrado.\nPor favor, verifique los datos ingresados.");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><th colspan="6" class="nombreTabla text-center">USUARIOS ENCONTRADOS</th></tr><tr><th>N°</th><th>Nombre de Usuario</th><th>Nombre Completo</th><th>Cédula</th><th>Correo Electrónico</th><th>Télefono</th><th>Sección</th><th>Acción</th></tr>');
                for (var i = 0; i < resulBusqueda.length; i++) {
                    $('#tablaRatificar').append('<tr><td>' + i + '</td>' +
                            '<td>' + resulBusqueda[i].nombreUsuario + '</td>' +
                            '<td>' + resulBusqueda[i].nombre + '</td>' +
                            '<td>' + resulBusqueda[i].cedula + '</td>' +
                            '<td>' + resulBusqueda[i].correo + '</td>' +
                            '<td>' + resulBusqueda[i].telefono + '</td>' +
                            '<td>' + resulBusqueda[i].seccion + '</td>' +
                            '<td><a class="btn-sm btn-warning" href="editarUsuario/' + resulBusqueda[i].nombreUsuario + '">Editar</a> ' +
                            '<a class="btn-sm btn-danger" href="eliminarUsuario/' + resulBusqueda[i].nombreUsuario + '">Eliminar</a></td>' +
                            '</tr>');
                }
            }
        });
    });
});
