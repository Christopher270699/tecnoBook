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
    $("#tf_provincias_NI").change(function() {
        $("#tf_cantones_NI,#tf_distritos_NI").empty();
        var idP = $("#tf_provincias_NI").val();
        $.getJSON('cargaCantones/' + idP, function(canton) {
            $('#tf_cantones_NI').append('<option value="">Seleccione</option>');
            for (var iP = 0; iP < canton.length; iP++) {
                $("#tf_cantones_NI").append('<option value="' + canton[iP].IdCanton + '">' + canton[iP].Canton + '</option>');
            }
        });
    });

    //Carga los distritos//
    $("#tf_cantones_NI").change(function() {
        $("#tf_distritos_NI").empty();
        var idD = $("#tf_cantones_NI").val();
        //var ids = $(this).attr('rel');
        $.getJSON('cargaDistritos/' + idD, function(distrito) {
            $('#tf_distritos_NI').append('<option value="">Seleccione</option>');
            for (var iD = 0; iD < distrito.length; iD++) {
                $("#tf_distritos_NI").append('<option value="' + distrito[iD].IdDistrito + '">' + distrito[iD].Distrito + '</option>');
            }
        });
    });

    //CARGA CANTONES PARA LA ESCUELA//
    $("#slt_provinciaPrim").change(function() {
        $("#slt_cantonPrim,#slt_distritoPrim,#tf_primaria").empty();
        var idP = $("#slt_provinciaPrim").val();
        $.getJSON('cargaCantones/' + idP, function(canton) {
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
        $.getJSON('cargaDistritos/' + idD, function(distrito) {
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
        $.getJSON('cargaEscuela/' + idD, function(escuela) {
            $('#tf_primaria').append('<option value="0">SELECCIONE</option>');
            for (var iD = 0; iD < escuela.length; iD++) {
                $("#tf_primaria").append('<option value="' + escuela[iD].id + '">' + escuela[iD].nombre + '</option>');
            }
            $("#tf_primaria").append('<option value="0">--OTRA--</option>');
        });
    });

    //Carga los datos del Estudiante//
    $("#buscarEstudiante").click(function(event) {
        var idD = $("#tf_cedulaEstudiante").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarEstudiante/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombre").val(resulBusqueda[0].nombre);
                    $("#tf_fnacpersona").val(resulBusqueda[0].fechaNacimiento);
                    //Consulto año lectivo para realizar la resta y asignar la edad//
                    $.getJSON('datosSistemaJavaScript', function(resul) {
                        var edad = resul[0].annio_lectivo - (resulBusqueda[0].fechaNacimiento).substring(0, 4);
                        $("#tf_edad").val(edad);
                    });
                    $("#tf_genero").val(resulBusqueda[0].sexo);
                }
            });
        }
    });

    //Carga los datos del Estudiante//
    $("#buscarEstuPrematricula").click(function(event) {
        var idD = $("#tf_cedulaEstudiante").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarEstuPrematricula/' + idD, function(resulPrematricula) {
                if (jQuery.isEmptyObject(resulPrematricula)) {
                    $.getJSON('buscarEstudiante/' + idD, function(resulBusqueda) {
                        if (jQuery.isEmptyObject(resulBusqueda)) {
                            alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                        } else {
                            $("#tf_ape1").val(resulBusqueda[0].primerApellido);
                            $("#tf_ape2").val(resulBusqueda[0].segundoApellido);
                            $("#tf_nombre").val(resulBusqueda[0].nombre);
                            $("#tf_fnacpersona").val(resulBusqueda[0].fechaNacimiento);
                            //Consulto año lectivo para realizar la resta y asignar la edad//
                            $.getJSON('datosSistemaJavaScript', function(resul) {
                                var edad = resul[0].annio_lectivo - (resulBusqueda[0].fechaNacimiento).substring(0, 4);
                                $("#tf_edad").val(edad);
                            });
                            $("#tf_genero").val(resulBusqueda[0].sexo);
                        }
                    });
                } else {
                    alert("Este estudiante ya se encuentra ingresado en Pre-Matricula, si desea hacer alguna modificación por favor diríjase a Matricula->Lista Pre-Matricula y luego en Editar");
                }
            });
        }
    });

    //Carga los datos del Encargado Legal//
    $("#buscarEncargado_NI").click(function(event) {
        var idD = $("#tf_cedulaEncargado_NI").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarEncargado/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Encargado_NI").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Encargado_NI").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombreEncargado_NI").val(resulBusqueda[0].nombre);
                    $("#tf_telHabitEncargado").val("");
                    $("#tf_telcelularEncargado").val("");
                    $("#tf_ocupacionEncargado").val("");
                    $("#tf_emailEncargado").val("");
                }
            });
        }
    });

    //Carga los datos de la Madre//
    $("#buscarMadre_NI").click(function(event) {
        var idD = $("#tf_cedulaMadre_NI").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarMadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Madre_NI").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Madre_NI").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombreMadre_NI").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaMadre").val("");
                    $("#tf_telCelMadre").val("");
                    $("#tf_ocupacionMadre").val("");
                }
            });
        }
    });

    //Carga los datos del Padre//
    $("#buscarPadre_NI").click(function(event) {
        var idD = $("#tf_cedulaPadre_NI").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarPadre/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1Padre_NI").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2Padre_NI").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombrePadre_NI").val(resulBusqueda[0].nombre);
                    $("#tf_telCasaPadre").val("");
                    $("#tf_telCelPadre").val("");
                    $("#tf_ocupacionPadre").val("");
                }
            });
        }
    });

    //Carga datos de Encargado Legal a Padre o Madre//
    $("#sel_parentesco_NI").change(function() {
        var parentesco = $("#sel_parentesco_NI").val();
        if (parentesco === 'Padre') {
            $("#tf_cedulaEncargado_NI").val($("#tf_cedulaPadre_NI").val());
            $("#tf_ape1Encargado_NI").val($("#tf_ape1Padre_NI").val());
            $("#tf_ape2Encargado_NI").val($("#tf_ape2Padre_NI").val());
            $("#tf_nombreEncargado_NI").val($("#tf_nombrePadre_NI").val());
            $("#tf_telHabitEncargado").val($("#tf_telCasaPadre").val());
            $("#tf_telcelularEncargado").val($("#tf_telCelPadre").val());
            $("#tf_ocupacionEncargado").val($("#tf_ocupacionPadre").val());
        } else
        {
            if (parentesco === 'Madre') {
                $("#tf_cedulaEncargado_NI").val($("#tf_cedulaMadre_NI").val());
                $("#tf_ape1Encargado_NI").val($("#tf_ape1Madre_NI").val());
                $("#tf_ape2Encargado_NI").val($("#tf_ape2Madre_NI").val());
                $("#tf_nombreEncargado_NI").val($("#tf_nombreMadre_NI").val());
                $("#tf_telHabitEncargado").val($("#tf_telCasaMadre").val());
                $("#tf_telcelularEncargado").val($("#tf_telCelMadre").val());
                $("#tf_ocupacionEncargado").val($("#tf_ocupacionMadre").val());
            }
        }
    });

    //Carga datos de Padre o Madre a PersonaEmergencia//
    $("#sel_parentescoCasoEmergencia_NI").change(function() {
        var parentesco = $("#sel_parentescoCasoEmergencia_NI").val();
        if (parentesco === 'Padre') {
            $("#tf_cedulaPersonaEmergencia_NI").val($("#tf_cedulaPadre_NI").val());
            $("#tf_ape1PersonaEmergencia_NI").val($("#tf_ape1Padre_NI").val());
            $("#tf_ape2PersonaEmergencia_NI").val($("#tf_ape2Padre_NI").val());
            $("#tf_nombrePersonaEmergencia_NI").val($("#tf_nombrePadre_NI").val());
            $("#tf_telHabitPersonaEmergencia").val($("#tf_telCasaPadre").val());
            $("#tf_telcelularPersonaEmergencia").val($("#tf_telCelPadre").val());
        } else
        {
            if (parentesco === 'Madre') {
                $("#tf_cedulaPersonaEmergencia_NI").val($("#tf_cedulaMadre_NI").val());
                $("#tf_ape1PersonaEmergencia_NI").val($("#tf_ape1Madre_NI").val());
                $("#tf_ape2PersonaEmergencia_NI").val($("#tf_ape2Madre_NI").val());
                $("#tf_nombrePersonaEmergencia_NI").val($("#tf_nombreMadre_NI").val());
                $("#tf_telHabitPersonaEmergencia").val($("#tf_telCasaMadre").val());
                $("#tf_telcelularPersonaEmergencia").val($("#tf_telCelMadre").val());
            }
        }
    });

    //Carga los datos de de la Persona En Caso de Emergencia//
    $("#buscarPersonaEmergencia_NI").click(function(event) {
        var idD = $("#tf_cedulaPersonaEmergencia_NI").val();
        if (jQuery.isEmptyObject(idD)) {
            alert("Por favor ingrese el número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
        } else {
            $.getJSON('buscarPersonaEmergencia/' + idD, function(resulBusqueda) {
                if (jQuery.isEmptyObject(resulBusqueda)) {
                    alert("Persona no encontrada, verifique el formato (ceros y guiones) y número de identificación.\nEj: 2-0456-0789, 1-1122-0567.\nNota: La Base de Datos esta actualizada al 2013 y solo posee Costarricenses y Nacionalizados");
                } else {
                    $("#tf_ape1PersonaEmergencia_NI").val(resulBusqueda[0].primerApellido);
                    $("#tf_ape2PersonaEmergencia_NI").val(resulBusqueda[0].segundoApellido);
                    $("#tf_nombrePersonaEmergencia_NI").val(resulBusqueda[0].nombre);
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

    //Oculta Boton Buscar si es extrangero//
    $("#tf_nacionalidad").change(function() {
        var codigoPais = $("#tf_nacionalidad").val();
        if (codigoPais !== "506") {
            document.getElementById("buscarEstudiante").style.display = 'none';
        }
        else {
            document.getElementById("buscarEstudiante").style.display = 'block';
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
}); 