<?php

class Matricula extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('matricula/js/default.js', 'matricula/js/jsNuevoIngreso.js');
    }

    function datosSistemaJavaScript() {
        echo json_encode($this->model->datosSistema());
    }

    function index() {
        $this->view->title = 'Matrícula';
        $this->view->datosSistema = $this->model->datosSistema();
        $this->view->render('header');
        $this->view->render('matricula/index');
        $this->view->render('footer');
    }

    function ratificar() {
        $this->view->title = 'Ratificar matrícula';
        $this->view->listaEstudiantes = $this->model->listaEstudiantes();

        $this->view->render('header');
        $this->view->render('matricula/ratificar');
        $this->view->render('footer');
    }

    function ratificarSetimo() {
        $this->view->title = 'Ratificar Sétimo';
        $this->view->listaEstuSetimo = $this->model->listaEstuSetimo();

        $this->view->render('header');
        $this->view->render('matricula/ratificarSetimo');
        $this->view->render('footer');
    }

    function ratificarEstudiante($cedulaEstudiante) {
        $this->view->title = 'Ratificar matrícula';
        $this->view->datosSistema = $this->model->datosSistema();

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaProvincias = $this->model->consultaProvincias();
        
        /* CARGAMOS TODOS LOS CANTONES */
        $this->view->consultaCantones = $this->model->consultaCantones();
        
        /* CARGAMOS TODOS LOS DISTRITOS */
        $this->view->consultaDistritos = $this->model->consultaDistritos();
        
        /* CARGAMOS TODAS LAS ESCUELAS */
        $this->view->consultaEscuelas = $this->model->consultaEscuelas();

        /* CARGAMOS LA LISTA DE ESTADO CIVIL */
        $this->view->estadoCivilList = $this->model->estadoCivilList();

        /* CARGAMOS LA LISTA DE PAISES */
        $this->view->consultaPaises = $this->model->consultaPaises();

        /* CARGAMOS LA LISTA DE ESPECIALIDADES */
        $this->view->consultaEspecialidades = $this->model->consultaEspecialidades();

        /* Cargo informacion del Estudiante */
        $this->view->infoEstudiante = $this->model->infoEstudiante($cedulaEstudiante);

        /* Cargo informacion de la especialidad del Estudiante */
        $this->view->especialidadEstudiante = $this->model->especialidadEstudiante($cedulaEstudiante);

        /* Cargo informacion del encargado Legal del Estudiante */
        $this->view->encargadoLegal = $this->model->encargadoLegal($cedulaEstudiante);

        /* Cargo informacion de la Madre del Estudiante */
        $this->view->madreEstudiante = $this->model->madreEstudiante($cedulaEstudiante);

        /* Cargo informacion del Padre del Estudiante */
        $this->view->padreEstudiante = $this->model->padreEstudiante($cedulaEstudiante);

        /* Cargo informacion de la Persona en caso de Emergencia del Estudiante */
        $this->view->personaEmergenciaEstudiante = $this->model->personaEmergenciaEstudiante($cedulaEstudiante);

        /* Cargo informacion de las enfermedades del Estudiante */
        $this->view->enfermedadEstudiante = $this->model->enfermedadEstudiante($cedulaEstudiante);

        /* Cargo informacion de la adecuacio del Estudiante */
        $this->view->adecuacionEstudiante = $this->model->adecuacionEstudiante($cedulaEstudiante);

        /* CARGAMOS LA ESCUELA DEL ESTUDIANTE */
        $this->view->escuelaEstudiante = $this->model->escuelaEstudiante($cedulaEstudiante);

        /* Cargo informacion de Becas */
        $this->view->becasEstudiante = $this->model->becasEstudiante($cedulaEstudiante);

        /* Cargo informacion de la poliza del Estudiante */
        $this->view->polizaEstudiante = $this->model->polizaEstudiante($cedulaEstudiante);

        /* Cargo informacion de la Condicion de Matricula */
        $this->view->infoCondicionMatricula = $this->model->infoCondicionMatricula($cedulaEstudiante);

        /* Cargo informacion de Adelanto/Arrastre */
        $this->view->infoAdelanta = $this->model->infoAdelanta($cedulaEstudiante);

        $this->view->render('header');
        $this->view->render('matricula/ratificarEstudiante');
        $this->view->render('footer');
    }

    function ratificarEstuSetimo($cedulaEstudiante) {
        $this->view->title = 'Ratificar matrícula';
        $this->view->datosSistema = $this->model->datosSistema();

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaProvincias = $this->model->consultaProvincias();
        
        /* CARGAMOS TODOS LOS CANTONES */
        $this->view->consultaCantones = $this->model->consultaCantones();
        
        /* CARGAMOS TODOS LOS DISTRITOS */
        $this->view->consultaDistritos = $this->model->consultaDistritos();
        
        /* CARGAMOS TODAS LAS ESCUELAS */
        $this->view->consultaEscuelas = $this->model->consultaEscuelas();

        /* CARGAMOS LA LISTA DE PAISES */
        $this->view->consultaPaises = $this->model->consultaPaises();

        /* Cargo informacion del Estudiante */
        $this->view->infoEstuPrematricula = $this->model->infoEstuPrematricula($cedulaEstudiante);

        /* Cargo informacion del Padre del Estudiante */
        $this->view->padreEstuPrematricula = $this->model->padreEstuPrematricula($cedulaEstudiante);

        /* Cargo informacion de la Madre del Estudiante */
        $this->view->madreEstuPrematricula = $this->model->madreEstuPrematricula($cedulaEstudiante);

        /* CARGAMOS LA ESCUELA DEL ESTUDIANTE */
        $this->view->escuelaEstuSetimo = $this->model->escuelaEstuSetimo($cedulaEstudiante);

        $this->view->render('header');
        $this->view->render('matricula/ratificarEstuSetimo');
        $this->view->render('footer');
    }

    function nuevoIngreso() {
        $this->view->title = 'Nuevo ingreso';

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaProvincias = $this->model->consultaProvincias();

        /* CARGAMOS LA LISTA DE PAISES */
        $this->view->consultaPaises = $this->model->consultaPaises();

        /* CARGAMOS LA LISTA DE ESPECIALIDADES */
        $this->view->consultaEspecialidades = $this->model->consultaEspecialidades();

        $this->view->render('header');
        $this->view->render('matricula/nuevoIngreso');
        $this->view->render('footer');
    }

    function prematricula() {
        $this->view->title = 'Pre-Matricula';

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaProvincias = $this->model->consultaProvincias();

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaEscuelasPrematricula = $this->model->consultaEscuelasPrematricula();

        $this->view->render('header');
        $this->view->render('matricula/prematricula');
        $this->view->render('footer');
    }

    function editarMatricula($cedulaEstudiante) {
        $this->view->title = 'Editar matrícula';
        $this->view->datosSistema = $this->model->datosSistema();

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaProvincias = $this->model->consultaProvincias();
        
        /* CARGAMOS TODOS LOS CANTONES */
        $this->view->consultaCantones = $this->model->consultaCantones();
        
        /* CARGAMOS TODOS LOS DISTRITOS */
        $this->view->consultaDistritos = $this->model->consultaDistritos();
        
        /* CARGAMOS TODAS LAS ESCUELAS */
        $this->view->consultaEscuelas = $this->model->consultaEscuelas();

        /* CARGAMOS LA LISTA DE ESTADO CIVIL */
        $this->view->estadoCivilList = $this->model->estadoCivilList();

        /* CARGAMOS LA LISTA DE PAISES */
        $this->view->consultaPaises = $this->model->consultaPaises();

        /* CARGAMOS LA LISTA DE ESPECIALIDADES */
        $this->view->consultaEspecialidades = $this->model->consultaEspecialidades();

        /* Cargo informacion del Estudiante Para Editar*/
        $this->view->infoEstudiante = $this->model->infoEstudianteEditar($cedulaEstudiante);

        /* Cargo informacion de la especialidad del Estudiante */
        $this->view->especialidadEstudiante = $this->model->especialidadEstudiante($cedulaEstudiante);

        /* CARGAMOS LA ESCUELA DEL ESTUDIANTE */
        $this->view->escuelaEstudiante = $this->model->escuelaEstudiante($cedulaEstudiante);

        /* Cargo informacion del encargado Legal del Estudiante */
        $this->view->encargadoLegal = $this->model->encargadoLegal($cedulaEstudiante);

        /* Cargo informacion de la Madre del Estudiante */
        $this->view->madreEstudiante = $this->model->madreEstudiante($cedulaEstudiante);

        /* Cargo informacion del Padre del Estudiante */
        $this->view->padreEstudiante = $this->model->padreEstudiante($cedulaEstudiante);

        /* Cargo informacion de la Persona en caso de Emergencia del Estudiante */
        $this->view->personaEmergenciaEstudiante = $this->model->personaEmergenciaEstudiante($cedulaEstudiante);

        /* Cargo informacion de las enfermedades del Estudiante */
        $this->view->enfermedadEstudiante = $this->model->enfermedadEstudianteActual($cedulaEstudiante);

        /* Cargo informacion de la poliza del Estudiante */
        $this->view->polizaEstudiante = $this->model->polizaEstudiante($cedulaEstudiante);

        /* Cargo informacion de la Condicion de Matricula */
        $this->view->infoCondicionMatricula = $this->model->infoCondicionActualMatricula($cedulaEstudiante);

        /* Cargo informacion de Adelanto/Arrastre */
        $this->view->infoAdelanta = $this->model->infoAdelanta($cedulaEstudiante);

        $this->view->render('header');
        $this->view->render('matricula/editarMatricula');
        $this->view->render('footer');
    }

    function editarPreatricula($cedulaEstudiante) {
        $this->view->title = 'Editar Pre-Matrícula';
        $this->view->datosSistema = $this->model->datosSistema();

        /* CARGAMOS TODAS LAS PROVINCIAS */
        $this->view->consultaProvincias = $this->model->consultaProvincias();
        
        /* CARGAMOS TODOS LOS CANTONES */
        $this->view->consultaCantones = $this->model->consultaCantones();
        
        /* CARGAMOS TODOS LOS DISTRITOS */
        $this->view->consultaDistritos = $this->model->consultaDistritos();
        
        /* CARGAMOS TODAS LAS ESCUELAS DE PRE-MATRICULA*/
        $this->view->consultaEscuelasPrematricula = $this->model->consultaEscuelasPrematricula();

        /* Cargo informacion del Estudiante */
        $this->view->infoEstuPrematricula = $this->model->infoEstuPrematricula($cedulaEstudiante);

        /* Cargo informacion del Padre del Estudiante */
        $this->view->padreEstuPrematricula = $this->model->padreEstuPrematricula($cedulaEstudiante);

        /* Cargo informacion de la Madre del Estudiante */
        $this->view->madreEstuPrematricula = $this->model->madreEstuPrematricula($cedulaEstudiante);

        $this->view->render('header');
        $this->view->render('matricula/editarPrematricula');
        $this->view->render('footer');
    }

    function estudiantesMatriculados() {
        //Consulto Cantidad Estudiantes Matriculados
        $this->view->estadoMatricula = $this->model->estadoMatricula();
        $this->view->datosSistema = $this->model->datosSistema();
        
        $this->view->render('header');
        $this->view->render('matricula/estudiantesMatriculados');
        $this->view->render('footer');
    }

    function listaprematricula() {
        //Consulto Cantidad Estudiantes Matriculados
        $this->view->estadoPrematricula = $this->model->estadoPrematricula();
        
        $this->view->render('header');
        $this->view->render('matricula/estudiantesPrematriculados');
        $this->view->render('footer');
    }

    function imprimirMatricula($cedulaEstudiante) {
        //Muestro documento para impresion
        $this->view->datosSistema = $this->model->datosSistema();
        $this->view->consultaDatosEstudiante = $this->model->consultaDatosEstudiante($cedulaEstudiante);

        /* Cargo informacion de las enfermedades del Estudiante */
        $this->view->enfermedadEstudiante = $this->model->enfermedadEstudianteActual($cedulaEstudiante);

        /* Cargo informacion del encargado Legal del Estudiante */
        $this->view->encargadoLegal = $this->model->encargadoLegal($cedulaEstudiante);

        /* Cargo informacion de la Madre del Estudiante */
        $this->view->madreEstudiante = $this->model->madreEstudiante($cedulaEstudiante);

        /* Cargo informacion del Padre del Estudiante */
        $this->view->padreEstudiante = $this->model->padreEstudiante($cedulaEstudiante);

        /* Cargo informacion de la Persona en caso de Emergencia del Estudiante */
        $this->view->personaEmergenciaEstudiante = $this->model->personaEmergenciaEstudiante($cedulaEstudiante);

        /* Cargo informacion de la poliza del Estudiante */
        $this->view->polizaEstudiante = $this->model->polizaEstudiante($cedulaEstudiante);

        /* Cargo informacion de la Condicion de Matricula */
        $this->view->infoCondicionMatricula = $this->model->infoCondicionActualMatricula($cedulaEstudiante);
        
        /* Cargo informacion de la especialidad del Estudiante */
        $this->view->especialidadEstudiante = $this->model->especialidadEstudiante($cedulaEstudiante);

        /* Cargo informacion de Adelanto/Arrastre */
        $this->view->infoAdelanta = $this->model->infoAdelanta($cedulaEstudiante);
        
        $this->view->render('matricula/imprimirMatricula');
    }

    function guardarRatificacion() {
        $datos = array();
        $datos['tf_nacionalidad'] = $_POST['tf_nacionalidad'];
        $datos['tf_telHabitEstudiante'] = $_POST['tf_telHabitEstudiante'];
        $datos['tf_cedulaEstudiante'] = strtoupper($_POST['tf_cedulaEstudiante']);
        $datos['tf_genero'] = $_POST['tf_genero'];
        $datos['tf_ape1'] = strtoupper($_POST['tf_ape1']);
        $datos['tf_ape2'] = strtoupper($_POST['tf_ape2']);
        $datos['tf_nombre'] = strtoupper($_POST['tf_nombre']);
        $datos['tf_fnacpersona'] = $_POST['tf_fnacpersona'];
        $datos['tf_telcelular'] = $_POST['tf_telcelular'];
        $datos['tf_email'] = $_POST['tf_email'];
        $datos['tf_domicilio'] = $_POST['tf_domicilio'];
        $datos['tf_provincias'] = $_POST['tf_provincias'];
        $datos['tf_cantones'] = $_POST['tf_cantones'];
        $datos['tf_distritos'] = $_POST['tf_distritos'];
        $datos['tf_primaria'] = $_POST['tf_primaria'];
        $datos['sel_enfermedad'] = $_POST['sel_enfermedad'];
        $datos['tf_enfermedadDescripcion'] = $_POST['tf_enfermedadDescripcion'];
        
        $datos['tf_cedulaEncargado'] = strtoupper($_POST['tf_cedulaEncargado']);
        $datos['tf_ape1Encargado'] = strtoupper($_POST['tf_ape1Encargado']);
        $datos['tf_ape2Encargado'] = strtoupper($_POST['tf_ape2Encargado']);
        $datos['tf_nombreEncargado'] = strtoupper($_POST['tf_nombreEncargado']);
        $datos['tf_telHabitEncargado'] = $_POST['tf_telHabitEncargado'];
        $datos['tf_telcelularEncargado'] = $_POST['tf_telcelularEncargado'];
        $datos['tf_ocupacionEncargado'] = $_POST['tf_ocupacionEncargado'];
        $datos['tf_emailEncargado'] = $_POST['tf_emailEncargado'];
        $datos['sel_parentesco'] = $_POST['sel_parentesco'];
        
        $datos['tf_cedulaMadre'] = strtoupper($_POST['tf_cedulaMadre']);
        $datos['tf_ape1Madre'] = strtoupper($_POST['tf_ape1Madre']);
        $datos['tf_ape2Madre'] = strtoupper($_POST['tf_ape2Madre']);
        $datos['tf_nombreMadre'] = strtoupper($_POST['tf_nombreMadre']);
        $datos['tf_telCasaMadre'] = $_POST['tf_telCasaMadre'];
        $datos['tf_telCelMadre'] = $_POST['tf_telCelMadre'];
        $datos['tf_ocupacionMadre'] = $_POST['tf_ocupacionMadre'];
        
        $datos['tf_cedulaPadre'] = strtoupper($_POST['tf_cedulaPadre']);
        $datos['tf_ape1Padre'] = strtoupper($_POST['tf_ape1Padre']);
        $datos['tf_ape2Padre'] = strtoupper($_POST['tf_ape2Padre']);
        $datos['tf_nombrePadre'] = strtoupper($_POST['tf_nombrePadre']);
        $datos['tf_telCasaPadre'] = $_POST['tf_telCasaPadre'];
        $datos['tf_telCelPadre'] = $_POST['tf_telCelPadre'];
        $datos['tf_ocupacionPadre'] = $_POST['tf_ocupacionPadre'];
        
        $datos['tf_cedulaPersonaEmergencia'] = strtoupper($_POST['tf_cedulaPersonaEmergencia']);
        $datos['tf_ape1PersonaEmergencia'] = strtoupper($_POST['tf_ape1PersonaEmergencia']);
        $datos['tf_ape2PersonaEmergencia'] = strtoupper($_POST['tf_ape2PersonaEmergencia']);
        $datos['tf_nombrePersonaEmergencia'] = strtoupper($_POST['tf_nombrePersonaEmergencia']);
        $datos['tf_telHabitPersonaEmergencia'] = $_POST['tf_telHabitPersonaEmergencia'];
        $datos['tf_telcelularPersonaEmergencia'] = $_POST['tf_telcelularPersonaEmergencia'];
        $datos['sel_parentescoCasoEmergencia'] = $_POST['sel_parentescoCasoEmergencia'];
        
        $datos['sl_nivelMatricular'] = $_POST['sl_nivelMatricular'];
        if ($_POST['sl_nivelMatricular'] > 9) {
            $datos['tf_especialidad'] = $_POST['tf_especialidad'];
        }
        $datos['sl_condicion'] = $_POST['sl_condicion'];
        $datos['sl_adelanta'] = $_POST['sl_adelanta'];
        $datos['tf_poliza'] = $_POST['tf_poliza'];
        $datos['tf_polizaVence'] = $_POST['tf_polizaVence'];
        
        $this->model->guardarRatificacion($datos);

        //Consulto Cantidad Estudiantes Matriculados
        $this->view->estadoMatricula = $this->model->estadoMatricula();
        $this->view->datosSistema = $this->model->datosSistema();
        
        $this->view->render('header');
        $this->view->render('matricula/estudiantesMatriculados');
        $this->view->render('footer');
    }

    function guardarNuevoIngreso() {
        $datos = array();
        $datos['tf_nacionalidad'] = $_POST['tf_nacionalidad'];
        $datos['tf_cedulaEstudiante'] = strtoupper($_POST['tf_cedulaEstudiante']);
        $datos['tf_ape1'] = strtoupper($_POST['tf_ape1']);
        $datos['tf_ape2'] = strtoupper($_POST['tf_ape2']);
        $datos['tf_nombre'] = strtoupper($_POST['tf_nombre']);
        $datos['tf_fnacpersona'] = $_POST['tf_fnacpersona'];
        $datos['tf_genero'] = $_POST['tf_genero'];
        $datos['tf_telHabitEstudiante'] = $_POST['tf_telHabitEstudiante'];
        $datos['tf_telcelular'] = $_POST['tf_telcelular'];
        $datos['tf_email'] = $_POST['tf_email'];
        $datos['tf_domicilio'] = $_POST['tf_domicilio'];
        $datos['tf_provincias'] = $_POST['tf_provincias_NI'];
        $datos['tf_cantones'] = $_POST['tf_cantones_NI'];
        $datos['tf_distritos'] = $_POST['tf_distritos_NI'];
        $datos['tf_primaria'] = $_POST['tf_primaria'];
        $datos['sel_enfermedad'] = $_POST['sel_enfermedad'];
        $datos['tf_enfermedadDescripcion'] = $_POST['tf_enfermedadDescripcion'];
        
        $datos['tf_cedulaEncargado'] = strtoupper($_POST['tf_cedulaEncargado_NI']);
        $datos['tf_ape1Encargado'] = strtoupper($_POST['tf_ape1Encargado_NI']);
        $datos['tf_ape2Encargado'] = strtoupper($_POST['tf_ape2Encargado_NI']);
        $datos['tf_nombreEncargado'] = strtoupper($_POST['tf_nombreEncargado_NI']);
        $datos['tf_telHabitEncargado'] = $_POST['tf_telHabitEncargado'];
        $datos['tf_telcelularEncargado'] = $_POST['tf_telcelularEncargado'];
        $datos['tf_ocupacionEncargado'] = $_POST['tf_ocupacionEncargado'];
        $datos['tf_emailEncargado'] = $_POST['tf_emailEncargado'];
        $datos['sel_parentesco'] = $_POST['sel_parentesco'];
        
        $datos['tf_cedulaMadre'] = strtoupper($_POST['tf_cedulaMadre_NI']);
        $datos['tf_ape1Madre'] = strtoupper($_POST['tf_ape1Madre_NI']);
        $datos['tf_ape2Madre'] = strtoupper($_POST['tf_ape2Madre_NI']);
        $datos['tf_nombreMadre'] = strtoupper($_POST['tf_nombreMadre_NI']);
        $datos['tf_telCasaMadre'] = $_POST['tf_telCasaMadre'];
        $datos['tf_telCelMadre'] = $_POST['tf_telCelMadre'];
        $datos['tf_ocupacionMadre'] = $_POST['tf_ocupacionMadre'];
        
        $datos['tf_cedulaPadre'] = strtoupper($_POST['tf_cedulaPadre_NI']);
        $datos['tf_ape1Padre'] = strtoupper($_POST['tf_ape1Padre_NI']);
        $datos['tf_ape2Padre'] = strtoupper($_POST['tf_ape2Padre_NI']);
        $datos['tf_nombrePadre'] = strtoupper($_POST['tf_nombrePadre_NI']);
        $datos['tf_telCasaPadre'] = $_POST['tf_telCasaPadre'];
        $datos['tf_telCelPadre'] = $_POST['tf_telCelPadre'];
        $datos['tf_ocupacionPadre'] = $_POST['tf_ocupacionPadre'];
        
        $datos['tf_cedulaPersonaEmergencia'] = strtoupper($_POST['tf_cedulaPersonaEmergencia_NI']);
        $datos['tf_ape1PersonaEmergencia'] = strtoupper($_POST['tf_ape1PersonaEmergencia_NI']);
        $datos['tf_ape2PersonaEmergencia'] = strtoupper($_POST['tf_ape2PersonaEmergencia_NI']);
        $datos['tf_nombrePersonaEmergencia'] = strtoupper($_POST['tf_nombrePersonaEmergencia_NI']);
        $datos['tf_telHabitPersonaEmergencia'] = $_POST['tf_telHabitPersonaEmergencia'];
        $datos['tf_telcelularPersonaEmergencia'] = $_POST['tf_telcelularPersonaEmergencia'];
        $datos['sel_parentescoCasoEmergencia'] = $_POST['sel_parentescoCasoEmergencia'];
        
        $datos['sl_nivelMatricular'] = $_POST['sl_nivelMatricular'];
        if ($_POST['sl_nivelMatricular'] > 9) {
            $datos['tf_especialidad'] = $_POST['tf_especialidad'];
        }
        $datos['sl_condicion'] = $_POST['sl_condicion'];
        $datos['tf_poliza'] = $_POST['tf_poliza'];
        $datos['tf_polizaVence'] = $_POST['tf_polizaVence'];
        
        $this->model->guardarNuevoIngreso($datos);

        //Consulto Cantidad Estudiantes Matriculados
        $this->view->estadoMatricula = $this->model->estadoMatricula();
        $this->view->datosSistema = $this->model->datosSistema();
        
        $this->view->render('header');
        $this->view->render('matricula/estudiantesMatriculados');
        $this->view->render('footer');
    }

    function guardarPrematricula() {
        $datos = array();
        $datos['tf_nacionalidad'] = $_POST['tf_nacionalidad'];
        $datos['tf_cedulaEstudiante'] = strtoupper($_POST['tf_cedulaEstudiante']);
        $datos['tf_ape1'] = strtoupper($_POST['tf_ape1']);
        $datos['tf_ape2'] = strtoupper($_POST['tf_ape2']);
        $datos['tf_nombre'] = strtoupper($_POST['tf_nombre']);
        $datos['tf_fnacpersona'] = $_POST['tf_fnacpersona'];
        $datos['tf_genero'] = $_POST['tf_genero'];
        $datos['tf_domicilio'] = $_POST['tf_domicilio'];
        $datos['tf_provincias'] = $_POST['tf_provincias_NI'];
        $datos['tf_cantones'] = $_POST['tf_cantones_NI'];
        $datos['tf_distritos'] = $_POST['tf_distritos_NI'];
        
        //Verifico si escogio la opción "Otra Esc"
        if($_POST['tf_primaria']==9999){
        $datos['tf_primaria'] = 0;
        }  else {
        $datos['tf_primaria'] = $_POST['tf_primaria'];   
        }
        
        $datos['tf_cedulaPadre'] = strtoupper($_POST['tf_cedulaPadre']);
        $datos['tf_ape1Padre'] = strtoupper($_POST['tf_ape1Padre']);
        $datos['tf_ape2Padre'] = strtoupper($_POST['tf_ape2Padre']);
        $datos['tf_nombrePadre'] = strtoupper($_POST['tf_nombrePadre']);
        $datos['tf_telCelPadre'] = $_POST['tf_telCelPadre'];
        $datos['tf_telCasaPadre'] = $_POST['tf_telCasaPadre'];
        $datos['tf_ocupacionPadre'] = $_POST['tf_ocupacionPadre'];
        
        $datos['tf_cedulaMadre'] = strtoupper($_POST['tf_cedulaMadre']);
        $datos['tf_ape1Madre'] = strtoupper($_POST['tf_ape1Madre']);
        $datos['tf_ape2Madre'] = strtoupper($_POST['tf_ape2Madre']);
        $datos['tf_nombreMadre'] = strtoupper($_POST['tf_nombreMadre']);
        $datos['tf_telCelMadre'] = $_POST['tf_telCelMadre'];
        $datos['tf_telCasaMadre'] = $_POST['tf_telCasaMadre'];
        $datos['tf_ocupacionMadre'] = $_POST['tf_ocupacionMadre'];
        
        $this->model->guardarPrematricula($datos);

        //Consulto Cantidad Estudiantes Matriculados
        $this->view->estadoPrematricula = $this->model->estadoPrematricula();
        
        $this->view->render('header');
        $this->view->render('matricula/estudiantesPrematriculados');
        $this->view->render('footer');
    }

    /* Metodos */
    //Carga los cantones de una Provincia en especifico
    function cargaCantones($idProvincia) {
        $this->model->cargaCantones($idProvincia);
    }

    //Carga los distritos de un Canton en especifico
    function cargaDistritos($idCanton) {
        $this->model->cargaDistritos($idCanton);
    }
    
    //Carga las escuela//
    function cargaEscuela($idDistrito)
    {
        $this->model->cargaEscuela($idDistrito);
    }

    function buscarEstudiante($ced_estudiante) {
        $this->model->buscarEstudiante($ced_estudiante);
    }

    function buscarEstuPrematricula($ced_estudiante) {
        $this->model->buscarEstuPrematricula($ced_estudiante);
    }

    function buscarEncargado($ced_encargado) {
        $this->model->buscarEncargado($ced_encargado);
    }

    function buscarMadre($ced_madre) {
        $this->model->buscarMadre($ced_madre);
    }

    function buscarPadre($ced_padre) {
        $this->model->buscarPadre($ced_padre);
    }

    function buscarPersonaEmergencia($ced_personaEmergencia) {
        $this->model->buscarPersonaEmergencia($ced_personaEmergencia);
    }

    function buscarEstuRatif($ced_estudiante) {
        $this->model->buscarEstuRatif($ced_estudiante);
    }

    function buscarEstuRatifSetimo($ced_estudiante) {
        $this->model->buscarEstuRatifSetimo($ced_estudiante);
    }

    //Metodo para buscar estudiantes matriculados, pero sin Seccion-Grupo asignada//
    function estudiantesMatriculadosSinGrupo() {
        $this->view->estudiantesMatriculadosSinGrupo = $this->model->estudiantesMatriculadosSinGrupo();
        
        $this->view->render('header');
        $this->view->render('matricula/estudiantesMatriculadosSinGrupo');
        $this->view->render('footer');
    }

    //Metodo que brinda una estadistica por nivel sobre la condion final de los estudiantes matriculados//
    function resumenCondicionEstudiantes() {
        $this->view->resumenCondicionEstudiantes = $this->model->resumenCondicionEstudiantes();
        $this->view->consultaNiveles = $this->model->consultaNiveles();
        $this->view->render('header');
        $this->view->render('matricula/resumenCondicionEstudiantes');
        $this->view->render('footer');
    }

    //Metodo que brinda la opcion de Asignar Seccion a los estudiantes matriculados//
    function asignarSeccion($ced_estudiante) {
        $this->view->datosEstudiante = $this->model->datosEstudiante($ced_estudiante);
        $this->view->consultaNiveles = $this->model->consultaNiveles();
        $this->view->render('header');
        $this->view->render('matricula/asignarSeccion');
        $this->view->render('footer');
    }
    
    /* Carga los Grupos de un nivel en especifico*/
    function cargaGrupos($idNivel) {
        $this->model->cargaGrupos($idNivel);
    }
    
    /* Carga los SubGrupos de un nivel en especifico*/
    function cargaSubGrupos() {
        $consulta = array();      
        $consulta['nivelSeleccionado'] = $_POST['nivelSeleccionado'];
        $consulta['grupoSeleccionado'] = $_POST['grupoSeleccionado'];
        $this->model->cargaSubGrupos($consulta);
    }
    
    /* Guardo la nueva seccion del estudiante*/
    function guardarAsignarSeccion() {
        $datos = array();      
        $datos['ced_estudiante'] = $_POST['ced_estudiante'];
        $datos['nivel'] = $_POST['sl_NivelesAsignarSeccion'];
        $datos['grupo'] = $_POST['sl_GruposAsignarSeccion'];
        $datos['subGrupo'] = $_POST['sl_SubGruposAsignarSeccion'];
        $this->view->msg = $this->model->guardarAsignarSeccion($datos);
        $this->view->render('header');
        $this->view->render('matricula/guardarAsignarSeccion');
        $this->view->render('footer');
    }

    //Metodo que brinda la opcion de eliminar un estudiantes de la matricula //
    function eliminarMatricula($ced_estudiante) {
        $this->view->msg = $this->model->eliminarMatricula($ced_estudiante);
        $this->view->render('header');
        $this->view->render('matricula/eliminarMatricula');
        $this->view->render('footer');
    }
}

?>
