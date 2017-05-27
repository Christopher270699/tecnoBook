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

$(function()
{
    //Fecha Nacimiento//
    $("#tf_fnacpersona").datepicker({dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    //Fecha Vence Poliza//
    $("#tf_polizaVence").datepicker({dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });

    //Edad Estudiante al cambiar fecha//
    $("#tf_fnacpersona").change(function() {
        $("#tf_edad").empty();
        var fechaNacimiento = $("#tf_fnacpersona").val();
        //Consulto año lectivo para realizar la resta y asignar la edad//
        $.getJSON('datosSistemaJavaScript', function(resul) {
            var edad = resul[0].annio_lectivo - (fechaNacimiento).substring(0, 4);
            $("#tf_edad").val(edad);
        });
    });

    //Carga los cantones//
    $("#tf_provincias").change(function() {
        $("#tf_cantones,#tf_distritos").empty();
        var idP = $("#tf_provincias").val();
        $.getJSON('../cargaCantones/' + idP, function(canton) {
            $('#tf_cantones').append('<option value="">Seleccione</option>');
            for (var iP = 0; iP < canton.length; iP++) {
                $("#tf_cantones").append('<option value="' + canton[iP].IdCanton + '">' + canton[iP].Canton + '</option>');
            }
        });
    });

    //Carga los distritos//
    $("#tf_cantones").change(function() {
        $("#tf_distritos").empty();
        var idD = $("#tf_cantones").val();
        //var ids = $(this).attr('rel');
        $.getJSON('../cargaDistritos/' + idD, function(distrito) {
            $('#tf_distritos').append('<option value="">Seleccione</option>');
            for (var iD = 0; iD < distrito.length; iD++) {
                $("#tf_distritos").append('<option value="' + distrito[iD].IdDistrito + '">' + distrito[iD].Distrito + '</option>');
            }
        });
    });

    //CARGA CANTONES PARA LA ESCUELA//
    $("#slt_provinciaPrim").change(function() {
        $("#slt_cantonPrim,#slt_distritoPrim,#tf_primaria").empty();
        var idP = $("#slt_provinciaPrim").val();
        $.getJSON('../cargaCantones/' + idP, function(canton) {
            $('#slt_cantonPrim').append('<option value="">SELECCIONE</option>');
            for (var iP = 0; iP < canton.length; iP++) {
                $("#slt_cantonPrim").append('<option value="' + canton[iP].IdCanton + '">' + canton[iP].Canton + '</option>');
            }
        });
    });
    //CARGA DISTRITOS PARA LA ESCUELA//
    $("#slt_cantonPrim").change(function() {
        $("#slt_distritoPrim,#tf_primaria").empty();
        var idD = $("#slt_cantonPrim").val();
        //var ids = $(this).attr('rel');
        $.getJSON('../cargaDistritos/' + idD, function(distrito) {
            $('#slt_distritoPrim').append('<option value="">SELECCIONE</option>');
            for (var iD = 0; iD < distrito.length; iD++) {
                $("#slt_distritoPrim").append('<option value="' + distrito[iD].IdDistrito + '">' + distrito[iD].Distrito + '</option>');
            }
        });
    });
    //CARGA LAS ESCUELAS DE ESOS DISTRITOS//
    $("#slt_distritoPrim").change(function() {
        $("#tf_primaria").empty();

        var idD = $("#slt_distritoPrim").val();

        //var ids = $(this).attr('rel');
        $.getJSON('../cargaEscuela/' + idD, function(escuela) {
            $('#tf_primaria').append('<option value="0">SELECCIONE</option>');
            for (var iD = 0; iD < escuela.length; iD++) {
                $("#tf_primaria").append('<option value="' + escuela[iD].id + '">' + escuela[iD].nombre + '</option>');
            }
            $("#tf_primaria").append('<option value="0">--OTRA--</option>');
        });
    });

    //Carga los datos del Encargado Legal//
    $("#buscarEncargado").click(function(event) {
        var idD = $("#tf_cedulaEncargado").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('../buscarEncargado/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Encargado").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Encargado").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombreEncargado").val(resulBusqueda[0].nombre);
                    $("#tf_telHabitEncargado").val("");
                    $("#tf_telcelularEncargado").val("");
                    $("#tf_ocupacionEncargado").val("");
                    $("#tf_emailEncargado").val("");
                }
            });
        }
    });

    //Carga los datos de la Madre//
    $("#buscarMadre").click(function(event) {
        var idD = $("#tf_cedulaMadre").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('../buscarMadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Madre").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Madre").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombreMadre").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaMadre").val("");
                    $("#tf_telCelMadre").val("");
                    $("#tf_ocupacionMadre").val("");
                }
            });
        }
    });

    //Carga los datos de la Madre//
    $("#buscarMadrePrematricula").click(function(event) {
        var idD = $("#tf_cedulaMadre").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarMadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Madre").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Madre").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombreMadre").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaMadre").val("");
                    $("#tf_telCelMadre").val("");
                    $("#tf_ocupacionMadre").val("");
                }
            });
        }
    });

    //Carga los datos de la Madre//
    $("#buscarMadrePrematriculaEditar").click(function(event) {
        var idD = $("#tf_cedulaMadre").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('../buscarMadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Madre").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Madre").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombreMadre").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaMadre").val("");
                    $("#tf_telCelMadre").val("");
                    $("#tf_ocupacionMadre").val("");
                }
            });
        }
    });

    //Carga los datos del Padre//
    $("#buscarPadre").click(function(event) {
        var idD = $("#tf_cedulaPadre").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('../buscarPadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Padre").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Padre").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombrePadre").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaPadre").val("");
                    $("#tf_telCelPadre").val("");
                    $("#tf_ocupacionPadre").val("");
                }
            });
        }
    });

    //Carga los datos del Padre//
    $("#buscarPadrePrematricula").click(function(event) {
        var idD = $("#tf_cedulaPadre").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarPadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Padre").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Padre").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombrePadre").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaPadre").val("");
                    $("#tf_telCelPadre").val("");
                    $("#tf_ocupacionPadre").val("");
                }
            });
        }
    });

    //Carga los datos del Padre//
    $("#buscarPadrePrematriculaEditar").click(function(event) {
        var idD = $("#tf_cedulaPadre").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('../buscarPadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Padre").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Padre").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombrePadre").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaPadre").val("");
                    $("#tf_telCelPadre").val("");
                    $("#tf_ocupacionPadre").val("");
                }
            });
        }
    });

    //Carga datos de Encargado Legal a Padre o Madre//
    $("#sel_parentesco").change(function() {
        var parentesco = $("#sel_parentesco").val();
        if (parentesco === 'Padre') {
            $("#tf_cedulaEncargado").val($("#tf_cedulaPadre").val());
            $("#tf_ape1Encargado").val($("#tf_ape1Padre").val());
            $("#tf_ape2Encargado").val($("#tf_ape2Padre").val());
            $("#tf_nombreEncargado").val($("#tf_nombrePadre").val());
            $("#tf_telHabitEncargado").val($("#tf_telCasaPadre").val());
            $("#tf_telcelularEncargado").val($("#tf_telCelPadre").val());
            $("#tf_ocupacionEncargado").val($("#tf_ocupacionPadre").val());
        } else
        {
            if (parentesco === 'Madre') {
                $("#tf_cedulaEncargado").val($("#tf_cedulaMadre").val());
                $("#tf_ape1Encargado").val($("#tf_ape1Madre").val());
                $("#tf_ape2Encargado").val($("#tf_ape2Madre").val());
                $("#tf_nombreEncargado").val($("#tf_nombreMadre").val());
                $("#tf_telHabitEncargado").val($("#tf_telCasaMadre").val());
                $("#tf_telcelularEncargado").val($("#tf_telCelMadre").val());
                $("#tf_ocupacionEncargado").val($("#tf_ocupacionMadre").val());
            }
        }
    });

    //Carga datos de Padre o Madre a PersonaEmergencia//
    $("#sel_parentescoCasoEmergencia").change(function() {
        var parentesco = $("#sel_parentescoCasoEmergencia").val();
        if (parentesco === 'Padre') {
            $("#tf_cedulaPersonaEmergencia").val($("#tf_cedulaPadre").val());
            $("#tf_ape1PersonaEmergencia").val($("#tf_ape1Padre").val());
            $("#tf_ape2PersonaEmergencia").val($("#tf_ape2Padre").val());
            $("#tf_nombrePersonaEmergencia").val($("#tf_nombrePadre").val());
            $("#tf_telHabitPersonaEmergencia").val($("#tf_telCasaPadre").val());
            $("#tf_telcelularPersonaEmergencia").val($("#tf_telCelPadre").val());
        } else
        {
            if (parentesco === 'Madre') {
                $("#tf_cedulaPersonaEmergencia").val($("#tf_cedulaMadre").val());
                $("#tf_ape1PersonaEmergencia").val($("#tf_ape1Madre").val());
                $("#tf_ape2PersonaEmergencia").val($("#tf_ape2Madre").val());
                $("#tf_nombrePersonaEmergencia").val($("#tf_nombreMadre").val());
                $("#tf_telHabitPersonaEmergencia").val($("#tf_telCasaMadre").val());
                $("#tf_telcelularPersonaEmergencia").val($("#tf_telCelMadre").val());
            }
        }
    });

    //Carga los datos de de la Persona En Caso de Emergencia//
    $("#buscarPersonaEmergencia").click(function(event) {
        var idD = $("#tf_cedulaPersonaEmergencia").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('../buscarPersonaEmergencia/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1PersonaEmergencia").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2PersonaEmergencia").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombrePersonaEmergencia").val(resulBusqueda[0].nombre);
                    $("#tf_telHabitPersonaEmergencia").val("");
                    $("#tf_telcelularPersonaEmergencia").val("");
                }
            });
        }
    });

    //Muestra casilla especialidad si nivel es > a 9//
    $("#sl_nivelMatricular").change(function() {
        var nivel = $("#sl_nivelMatricular").val();
        if (nivel > 9) {
            document.getElementById("especialidadLabel").style.display = 'block';
            document.getElementById("especialidad").style.display = 'block';
        }
        else {
            document.getElementById("especialidadLabel").style.display = 'none';
            document.getElementById("especialidad").style.display = 'none';
        }
    });

    //Modifico el nivel -1 si es repite//
    $("#sl_condicion").change(function() {
        var nivel = $("#sl_nivelMatricular").val();
        var condicion = $("#sl_condicion").val();
        if (condicion === "Repite") {
            $("#sl_nivelMatricular").val(nivel - 1);
        }
        nivel = $("#sl_nivelMatricular").val();
        if (nivel > 9) {
            document.getElementById("especialidadLabel").style.display = 'block';
            document.getElementById("especialidad").style.display = 'block';
        }
        else {
            document.getElementById("especialidadLabel").style.display = 'none';
            document.getElementById("especialidad").style.display = 'none';
        }
    });

    //Oculta Imput Enfermedad//
    $("#sel_enfermedad").change(function() {
        var variable = $("#sel_enfermedad").val();
        if (variable == 0) {
            $("#tf_enfermedadDescripcion").val("");
            document.getElementById("tf_enfermedadDescripcion").style.display = 'none';
        }
        else {
            document.getElementById("tf_enfermedadDescripcion").style.display = 'block';
        }
    });


    //matricula/ratificar


    //Carga los datos del Estudiante//
    $("#buscarEstudianteRatificar").click(function(event) {
        var idD = $("#tf_cedulaEstudiante").val();
        $.getJSON('buscarEstuRatif/' + idD, function(resulBusqueda) {
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

    //Carga los datos del Estudiante se setimo por ratificar//
    $("#buscarEstuRatificarSetimo").click(function(event) {
        var idD = $("#tf_cedulaEstudiante").val();
        $.getJSON('buscarEstuRatifSetimo/' + idD, function(resulBusqueda) {
            if (jQuery.isEmptyObject(resulBusqueda)) {
                alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
            } else {
                $("#tablaRatificar").empty();
                $('#tablaRatificar').append('<tr><td colspan="6" class="nombreTabla">LISTA DE ESTUDIANTES POR RATIFICAR</td></tr><tr><th>N°</th><th>Identificación</th><th>1º Apellido</th><th>2º Apellido</th><th>Nombre</th><th>Acción</th></tr>' +
                        '<tr><td>1</td>' +
                        '<td>' + idD + '</td>' +
                        '<td>' + resulBusqueda[0].apellido1 + '</td>' +
                        '<td>' + resulBusqueda[0].apellido2 + '</td>' +
                        '<td>' + resulBusqueda[0].nombre + '</td>' +
                        '<td><a class="btn-sm btn-primary" href="ratificarEstuSetimo/' + idD + '">Ratificar</a></td>' +
                        '</tr>');
            }
        });
    });

    //Carga los Grupos de un nivel en especifico//
    $("#sl_NivelesAsignarSeccion").change(function() {
        $("#sl_GruposAsignarSeccion").empty();
        $("#sl_SubGruposAsignarSeccion").empty();
        var nivelSeleccionado = $("#sl_NivelesAsignarSeccion").val();
        $.getJSON('../cargaGrupos/' + nivelSeleccionado, function(Gru) {
            $('#sl_GruposAsignarSeccion').append('<option value="">Seleccione</option>');
            for (var iP = 0; iP < Gru.length; iP++) {
                $("#sl_GruposAsignarSeccion").append('<option value="' + Gru[iP].grupo + '">' + Gru[iP].grupo + '</option>');
            }
        });
    });

    //Carga los SubGrupos de una Sección en especifico//
    $("#sl_GruposAsignarSeccion").change(function() {
        $("#sl_SubGruposAsignarSeccion").empty();
        var consulta = {nivelSeleccionado: $("#sl_NivelesAsignarSeccion").val(), grupoSeleccionado: $("#sl_GruposAsignarSeccion").val()};
        //Realizo la consulta
        $.post('../cargaSubGrupos/', consulta, function(seccionElegida, success) {
            for (var linea = 0; linea < seccionElegida.length; linea++) {
                $("#sl_SubGruposAsignarSeccion").append('<option value="' + seccionElegida[linea].sub_grupo + '">' + seccionElegida[linea].sub_grupo + '</option>');
            }
        }, "json");
    });
}); 