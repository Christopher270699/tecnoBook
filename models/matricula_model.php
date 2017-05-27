<?php

class Matricula_Model extends Models {

    public function __construct() {
        parent::__construct();
        $this->datosSistema = $this->db->select('SELECT * FROM sipce_configuracion WHERE id=1');
    }

    /* Carga datos del sistema */

    public function datosSistema() {
        return $this->datosSistema;
    }

    /* Carga todas las provincias */

    public function consultaProvincias() {
        return $this->db->select("SELECT * FROM sipce_provincias ORDER BY nombreProvincia", array());
    }

    /* Carga todas las Cantones */

    public function consultaCantones() {
        return $this->db->select("SELECT * FROM sipce_cantones ORDER BY Canton", array());
    }

    /* Carga todas los Distritos */

    public function consultaDistritos() {
        return $this->db->select("SELECT * FROM sipce_distritos ORDER BY Distrito", array());
    }

    /* Carga los cantones de una Provincia en especifico */

    public function cargaCantones($idProvincia) {

        $resultado = $this->db->select("SELECT * FROM sipce_cantones WHERE IdProvincia = :idProvincia ORDER BY Canton", array('idProvincia' => $idProvincia));
        echo json_encode($resultado);
    }

    /* Carga todas las Escuelas */

    public function consultaEscuelas() {
        return $this->db->select("SELECT * FROM sipce_escuelas", array());
    }

    /* Carga todas las Escuelas para Pre-Matricula (Array quemado) */

    public function consultaEscuelasPrematricula() {
        $escuelasPrematricula = array();
        $escuelasPrematricula[0]['id'] = "51";
        $escuelasPrematricula[0]['nombre'] = "ALFREDO GONZÁLEZ FLORES";
        $escuelasPrematricula[1]['id'] = "53";
        $escuelasPrematricula[1]['nombre'] = "ALFREDO VOLIO JIMÉNEZ";
        $escuelasPrematricula[2]['id'] = "105";
        $escuelasPrematricula[2]['nombre'] = "ANICETO ESQUIVEL SÁENZ";
        $escuelasPrematricula[3]['id'] = "145";
        $escuelasPrematricula[3]['nombre'] = "ASCENSION ESQUIVEL IBARRA";
        $escuelasPrematricula[4]['id'] = "269";
        $escuelasPrematricula[4]['nombre'] = "BELLO HORIZONTE";
        $escuelasPrematricula[5]['id'] = "394";
        $escuelasPrematricula[5]['nombre'] = "CALLE QUIRÓS";
        $escuelasPrematricula[6]['id'] = "449";
        $escuelasPrematricula[6]['nombre'] = "CARBONAL";
        $escuelasPrematricula[25]['id'] = "568";
        $escuelasPrematricula[25]['nombre'] = "CINCO ESQUINAS";
        $escuelasPrematricula[7]['id'] = "1003";
        $escuelasPrematricula[7]['nombre'] = "EL ROBLE";
        $escuelasPrematricula[8]['id'] = "1059";
        $escuelasPrematricula[8]['nombre'] = "ELISA SOTO JIMÉNEZ";
        $escuelasPrematricula[9]['id'] = "1237";
        $escuelasPrematricula[9]['nombre'] = "GENERAL JOSE DE SAN MARTIN";
        $escuelasPrematricula[10]['id'] = "1323";
        $escuelasPrematricula[10]['nombre'] = "HOLANDA";
        $escuelasPrematricula[11]['id'] = "1540";
        $escuelasPrematricula[11]['nombre'] = "JOAQUÍN CAMACHO ULATE";
        $escuelasPrematricula[12]['id'] = "1569";
        $escuelasPrematricula[12]['nombre'] = "JOSE MANUEL HERRERA SALAS";
        $escuelasPrematricula[13]['id'] = "1617";
        $escuelasPrematricula[13]['nombre'] = "JUAN RAFAEL MEOÑO HIDALGO";
        $escuelasPrematricula[14]['id'] = "1638";
        $escuelasPrematricula[14]['nombre'] = "JULIA FERNANDEZ RODRIGUEZ";
        $escuelasPrematricula[15]['id'] = "2023";
        $escuelasPrematricula[15]['nombre'] = "LAGOS DEL COYOL";
        $escuelasPrematricula[26]['id'] = "2152";
        $escuelasPrematricula[26]['nombre'] = "LEON CORTES CASTRO";
        $escuelasPrematricula[28]['id'] = "2273";
        $escuelasPrematricula[28]['nombre'] = "LOS CARTAGOS";
        $escuelasPrematricula[16]['id'] = "2371";
        $escuelasPrematricula[16]['nombre'] = "MANUEL FRANCISCO CARRILLO SABORIO";
        $escuelasPrematricula[17]['id'] = "2381";
        $escuelasPrematricula[17]['nombre'] = "MANUELA SANTAMARIA";
        $escuelasPrematricula[18]['id'] = "2621";
        $escuelasPrematricula[18]['nombre'] = "PACTO DEL JOCOTE";
        $escuelasPrematricula[19]['id'] = "2694";
        $escuelasPrematricula[19]['nombre'] = "PEDRO MURILLO PÉREZ";
        $escuelasPrematricula[20]['id'] = "2908";
        $escuelasPrematricula[20]['nombre'] = "REPUBLICA DE GUATEMALA";
        $escuelasPrematricula[21]['id'] = "3083";
        $escuelasPrematricula[21]['nombre'] = "SAN BOSCO";
        $escuelasPrematricula[22]['id'] = "3475";
        $escuelasPrematricula[22]['nombre'] = "SANTA ISABEL";
        $escuelasPrematricula[23]['id'] = "3514";
        $escuelasPrematricula[23]['nombre'] = "SANTA RITA";
        $escuelasPrematricula[24]['id'] = "3661";
        $escuelasPrematricula[24]['nombre'] = "TIMOLEON MORERA SOTO";
        $escuelasPrematricula[27]['id'] = "1265";
        $escuelasPrematricula[27]['nombre'] = "GUADALUPE";
        return $escuelasPrematricula;
    }

    /* Carga los distritos de un Canton en especifico */

    public function cargaDistritos($idCanton) {

        $resultado = $this->db->select("SELECT * FROM sipce_distritos WHERE IdCanton = :idCanton ORDER BY Distrito", array('idCanton' => $idCanton));
        echo json_encode($resultado);
    }

    //Carga las escuela//
    function cargaEscuela($idDistrito) {
        $resultado = $this->db->select("SELECT * FROM sipce_escuelas WHERE IdDistrito = :idDistrito ORDER BY nombre", array('idDistrito' => $idDistrito));
        echo json_encode($resultado);
    }

    /* Retorna la lista de estado civil */

    public function estadoCivilList() {
        return $this->db->select("SELECT * FROM sipce_estadocivil", array());
    }

    /* Retorna la lista de paises */

    public function consultaPaises() {
        return $this->db->select("SELECT * FROM sipce_paises ORDER BY nombrePais", array());
    }

    /* Retorna la lista de Especialidades */

    public function consultaEspecialidades() {
        return $this->db->select("SELECT * FROM sipce_especialidad", array());
    }

    /* Retorna la lista de todo los Estudiantes por Ratificar */

    public function listaEstudiantes() {
        return $this->db->select("SELECT cedula,nombre,apellido1,apellido2,nivel,grupo,sub_grupo "
                        . "FROM sipce_estudiante, sipce_grupos "
                        . "WHERE cedula NOT IN (select ced_estudiante from sipce_matricularatificacion WHERE anio = " . $this->datosSistema[0]['annio_lectivo'] . ") "
                        . "AND cedula = ced_estudiante "
                        . "AND tipoUsuario = 4 "
                        . "AND annio = " . ($this->datosSistema[0]['annio_lectivo'] - 1 ) . " "
                        . "ORDER BY apellido1,apellido2");
    }

    /* Retorna la lista de todo los Estudiantes por Ratificar */

    public function listaEstuSetimo() {
        return $this->db->select("SELECT cedula,nombre,apellido1,apellido2 "
                        . "FROM sipce_prematricula "
                        . "WHERE cedula NOT IN (select ced_estudiante from sipce_matricularatificacion WHERE anio = " . $this->datosSistema[0]['annio_lectivo'] . ") "
                        . "ORDER BY apellido1,apellido2");
    }

    /* Retorna Datos de Estudiante por Ratificar */

    public function buscarEstuRatif($ced_estudiante) {
        $resultado = $this->db->select("SELECT e.cedula,e.nombre,e.apellido1,e.apellido2,g.nivel,g.grupo,g.sub_grupo "
                . "FROM sipce_estudiante as e, sipce_grupos as g "
                . "WHERE e.cedula NOT IN (select ced_estudiante from sipce_matricularatificacion WHERE anio = " . $this->datosSistema[0]['annio_lectivo'] . ") "
                . "AND e.cedula = g.ced_estudiante "
                . "AND e.cedula = '" . $ced_estudiante . "'"
                . "AND g.annio = " . ($this->datosSistema[0]['annio_lectivo'] - 1) . " ");

        echo json_encode($resultado);
    }

    /* Retorna Datos de Estudiante por Ratificar */

    public function buscarEstuRatifSetimo($ced_estudiante) {
        $resultado = $this->db->select("SELECT cedula,nombre,apellido1,apellido2 "
                . "FROM sipce_prematricula "
                . "WHERE cedula NOT IN (select ced_estudiante from sipce_matricularatificacion) "
                . "AND cedula = '" . $ced_estudiante . "'");

        echo json_encode($resultado);
    }

    /* Retorna la informacion del Estudiante para Matricular */

    public function infoEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,"
                        . "p.telefonoCasa,p.telefonoCelular,p.email,p.domicilio,p.telefonoCasa,p.IdProvincia,"
                        . "p.IdCanton,p.IdDistrito,p.nacionalidad,g.nivel "
                        . "FROM sipce_estudiante as p,sipce_grupos as g "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND g.annio = '" . ($this->datosSistema[0]['annio_lectivo'] - 1) . "' "
                        . "AND p.cedula = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion del Estudiante para Editar Matricula */

    public function infoEstudianteEditar($cedulaEstudiante) {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,"
                        . "p.telefonoCasa,p.telefonoCelular,p.email,p.domicilio,p.telefonoCasa,p.IdProvincia,"
                        . "p.IdCanton,p.IdDistrito,p.nacionalidad,g.nivel "
                        . "FROM sipce_estudiante as p,sipce_grupos as g "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND g.annio = '" . $this->datosSistema[0]['annio_lectivo'] . "' "
                        . "AND p.cedula = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion del Estudiante Prematriculado */

    public function infoEstuPrematricula($cedulaEstudiante) {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,"
                        . "p.domicilio,p.IdProvincia,p.IdCanton,p.IdDistrito,p.nacionalidad,p.escuela_procedencia "
                        . "FROM sipce_prematricula as p "
                        . "WHERE p.cedula = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion de la especialidad del Estudiante */

    public function especialidadEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT cod_especialidad, nombreEspecialidad "
                        . "FROM sipce_especialidad_estudiante, sipce_especialidad  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' "
                        . "AND codigoEspecialidad = cod_especialidad");
    }

    /* Retorna la informacion de la especialidad del Estudiante */

    public function escuelaEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT ec.id, ec.IdProvincia, ec.IdCanton, ec.IdDistrito "
                        . "FROM sipce_escuelas as ec, sipce_estudiante as es "
                        . "WHERE es.cedula = '" . $cedulaEstudiante . "' "
                        . "AND es.escuela_procedencia = ec.id");
    }

    public function escuelaEstuSetimo($cedulaEstudiante) {
        return $this->db->select("SELECT ec.id, ec.IdProvincia, ec.IdCanton, ec.IdDistrito "
                        . "FROM sipce_escuelas as ec, sipce_prematricula as p "
                        . "WHERE p.cedula = '" . $cedulaEstudiante . "' "
                        . "AND p.escuela_procedencia = ec.id");
    }

    /* Retorna la informacion del encargado Legal Estudiante vigente */

    public function encargadoLegal($cedulaEstudiante) {
        return $this->db->select("SELECT ced_encargado,parentesco,nombre_encargado,apellido1_encargado,apellido2_encargado,"
                        . "telefonoCasaEncargado,telefonoCelularEncargado,emailEncargado,ocupacionEncargado "
                        . "FROM sipce_encargado  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion de la Madre Estudiante */

    public function madreEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT ced_madre,nombre_madre,apellido1_madre,apellido2_madre,"
                        . "telefonoCasaMadre,telefonoCelMadre,ocupacionMadre "
                        . "FROM sipce_madre  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion de la Madre Estudiante */

    public function madreEstuPrematricula($cedulaEstudiante) {
        return $this->db->select("SELECT ced_madre,nombre_madre,apellido1_madre,apellido2_madre,"
                        . "telefonoCelMadre,telefonoCasaMadre,ocupacionMadre "
                        . "FROM sipce_madre_prematricula  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion de la Padre Estudiante */

    public function padreEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT ced_padre,nombre_padre,apellido1_padre,apellido2_padre,"
                        . "telefonoCasaPadre,telefonoCelPadre,ocupacionPadre "
                        . "FROM sipce_padre  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion de la Padre Estudiante */

    public function padreEstuPrematricula($cedulaEstudiante) {
        return $this->db->select("SELECT ced_padre,nombre_padre,apellido1_padre,apellido2_padre,"
                        . "telefonoCelPadre,telefonoCasaPadre,ocupacionPadre "
                        . "FROM sipce_padre_prematricula "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna la informacion de la Padre Estudiante */

    public function personaEmergenciaEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT ced_personaEmergencia,parentesco,nombre_personaEmergencia,apellido1_personaEmergencia,"
                        . "apellido2_personaEmergencia,telefonoCasaPersonaEmergencia,telefonoCelularPersonaEmergencia "
                        . "FROM sipce_personaemergencia  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna enfermedades del Estudiante curso vigente*/

    public function enfermedadEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT descripcion "
                        . "FROM sipce_enfermedades  "
                        . "WHERE cedula = '" . $cedulaEstudiante . "' "
                        . "AND anio = " . ($this->datosSistema[0]['annio_lectivo'] -1 ). " ");
    }

    /* Retorna enfermedades del Estudiante curso nuevo*/

    public function enfermedadEstudianteActual($cedulaEstudiante) {
        return $this->db->select("SELECT descripcion "
                        . "FROM sipce_enfermedades  "
                        . "WHERE cedula = '" . $cedulaEstudiante . "' "
                        . "AND anio = " . $this->datosSistema[0]['annio_lectivo'] . " ");
    }

    /* Retorna adecuacio del Estudiante */

    public function adecuacionEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT adecuacion "
                        . "FROM sipce_adecuacion  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna adecuacio del Estudiante */

//Ojo año quemado, buscar solucion
    public function becasEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT * "
                        . "FROM sipce_beca  "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' "
                        . "AND anio = '" . $this->datosSistema[0]['annio_lectivo'] . "'");
    }

    /* Retorna informacion de la poliza del del Estudiante */

    public function polizaEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT numero_poliza,fecha_vence "
                        . "FROM sipce_poliza "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Carga la condicion del estudiante  */

    public function infoCondicionMatricula($cedulaEstudiante) {
        return $this->db->select("SELECT condicion "
                        . "FROM sipce_matricularatificacion "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' "
                        . "AND anio = '" . ($this->datosSistema[0]['annio_lectivo'] -1 ). "'");
    }

    /* Carga la condicion del estudiante Actual, para editar */

    public function infoCondicionActualMatricula($cedulaEstudiante) {
        return $this->db->select("SELECT condicion "
                        . "FROM sipce_matricularatificacion "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' "
                        . "AND anio = '" . $this->datosSistema[0]['annio_lectivo'] . "'");
    }

    /* Carga todos los estudiantes matriculados */

    public function infoAdelanta($cedulaEstudiante) {
        return $this->db->select("SELECT * "
                        . "FROM sipce_adelanta "
                        . "WHERE ced_estudiante = '" . $cedulaEstudiante . "' ");
    }

    /* Retorna datos del Estudiante */

    public function buscarEstudiante($ced_estudiante) {
        $resultado = $this->db->select("SELECT * "
                . "FROM tpersonapadron "
                . "WHERE cedula = '" . $ced_estudiante . "' ");
        echo json_encode($resultado);
    }

    /* Retorna datos del Estudiante */

    public function buscarEstuPrematricula($ced_estudiante) {
        $resultado = $this->db->select("SELECT * "
                . "FROM sipce_prematricula "
                . "WHERE cedula = '" . $ced_estudiante . "' ");
        echo json_encode($resultado);
    }

    /* Retorna datos del Encargado */

    public function buscarEncargado($ced_encargado) {
        $resultado = $this->db->select("SELECT nombre,primerApellido,segundoApellido "
                . "FROM tpersonapadron "
                . "WHERE cedula = '" . $ced_encargado . "' ");
        echo json_encode($resultado);
    }

    /* Retorna datos de la Madre */

    public function buscarMadre($ced_madre) {
        $resultado = $this->db->select("SELECT nombre,primerApellido,segundoApellido "
                . "FROM tpersonapadron "
                . "WHERE cedula = '" . $ced_madre . "' ");
        echo json_encode($resultado);
    }

    /* Retorna datos de la Madre */

    public function buscarPadre($ced_padre) {
        $resultado = $this->db->select("SELECT nombre,primerApellido,segundoApellido "
                . "FROM tpersonapadron "
                . "WHERE cedula = '" . $ced_padre . "' ");
        echo json_encode($resultado);
    }

    /* Retorna datos de la Persona encargada en caso de Emergencia */

    public function buscarPersonaEmergencia($ced_personaEmergencia) {
        $resultado = $this->db->select("SELECT nombre,primerApellido,segundoApellido "
                . "FROM tpersonapadron "
                . "WHERE cedula = '" . $ced_personaEmergencia . "' ");
        echo json_encode($resultado);
    }

    /* Ratifica(Update) estudiante en la BD */

    public function guardarRatificacion($datos) {
        //'estado' 1 = Matricula Ratificada
        //'estado' 2 = Matricula Ratificada Editada
        //'estado' 3 = Matricula Nuevo Ingreso
        //Consulto si ya existe la matricula
        $consultaExistenciaMatricula = $this->db->select("SELECT * FROM sipce_matricularatificacion "
                . "WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' "
                . "AND anio = " . $this->datosSistema[0]['annio_lectivo']);

        if ($consultaExistenciaMatricula != null) {
            //Actualizo datos y 'estado' Matricula Ratificada Editada
            $posData = array(
                'nivel' => $datos['sl_nivelMatricular'],
                'condicion' => $datos['sl_condicion'],
                'estado' => 2);
            $this->db->update('sipce_matricularatificacion', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Sino Inserto datos y 'estado' Matricula Ratificada
            $this->db->insert('sipce_matricularatificacion', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'anio' => $this->datosSistema[0]['annio_lectivo'],
                'nivel' => $datos['sl_nivelMatricular'],
                'condicion' => $datos['sl_condicion'],
                'estado' => 1));
        }

        //Consulto si ya existe la Enfermedad
        $consultaExistenciaEnfermedad = $this->db->select("SELECT * FROM sipce_enfermedades "
                . "WHERE cedula = '" . $datos['tf_cedulaEstudiante'] . "' "
                . "AND anio = " . $this->datosSistema[0]['annio_lectivo']);

        if ($datos['sel_enfermedad'] == 1) {
            if ($consultaExistenciaEnfermedad != null) {
                //Actualizo datos
                $posData = array(
                    'descripcion' => $datos['tf_enfermedadDescripcion']);
                $this->db->update('sipce_enfermedades', $posData, "`cedula` = '{$datos['tf_cedulaEstudiante']}'");
            } else {
                //Sino Inserto datos
                $this->db->insert('sipce_enfermedades', array(
                    'cedula' => $datos['tf_cedulaEstudiante'],
                    'anio' => $this->datosSistema[0]['annio_lectivo'],
                    'descripcion' => $datos['tf_enfermedadDescripcion']));
            }
        } else {
            if ($consultaExistenciaEnfermedad != null) {
                //Borro datos
                $sth = $this->db->prepare("DELETE FROM sipce_enfermedades WHERE cedula ='" . $datos['tf_cedulaEstudiante'] . "' AND anio = " . $this->datosSistema[0]['annio_lectivo']);
                $sth->execute();
            }
        }

        //Consulto si el estudiante esta asignado a un Nivel, Grupo, Subgrupo
        $consultaExistenciaNivel = $this->db->select("SELECT * FROM sipce_grupos "
                . "WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' "
                . "AND annio = " . $this->datosSistema[0]['annio_lectivo']);

        if ($consultaExistenciaNivel != null) {
            //Actualizo nivel del Estudiante
            $datosNivel = array(
                'nivel' => $datos['sl_nivelMatricular']);

            $this->db->update('sipce_grupos', $datosNivel, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Sino Inserto datos en sipce_grupos
            $this->db->insert('sipce_grupos', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'nivel' => $datos['sl_nivelMatricular'],
                'annio' => $this->datosSistema[0]['annio_lectivo']));
        }



        //Consulto si ya existe datos en el expediente (para editarla)
        $consultaExistenciaEstudiante = $this->db->select("SELECT * FROM sipce_estudiante "
                . "WHERE cedula = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaEstudiante != null) {
            //No se puede hacer nuevo ingreso xq ya existe  ---Verificar logica---
            //echo '<h1>ya existe estudiante en sipce_estudiante';
            //die;
            //
            //Actualizo datos del expediente Estudiante
            $posData = array(
                'nacionalidad' => $datos['tf_nacionalidad'],
                'cedula' => $datos['tf_cedulaEstudiante'],
                'apellido1' => $datos['tf_ape1'],
                'apellido2' => $datos['tf_ape2'],
                'nombre' => $datos['tf_nombre'],
                'sexo' => $datos['tf_genero'],
                'fechaNacimiento' => $datos['tf_fnacpersona'],
                'telefonoCasa' => $datos['tf_telHabitEstudiante'],
                'telefonoCelular' => $datos['tf_telcelular'],
                'escuela_procedencia' => $datos['tf_primaria'],
                'email' => $datos['tf_email'],
                'domicilio' => $datos['tf_domicilio'],
                'idProvincia' => $datos['tf_provincias'],
                'IdCanton' => $datos['tf_cantones'],
                'IdDistrito' => $datos['tf_distritos']);

            $this->db->update('sipce_estudiante', $posData, "`cedula` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Sino Inserto datos del expediente Estudiante
            $this->db->insert('sipce_estudiante', array(
                'nacionalidad' => $datos['tf_nacionalidad'],
                'cedula' => $datos['tf_cedulaEstudiante'],
                'apellido1' => $datos['tf_ape1'],
                'apellido2' => $datos['tf_ape2'],
                'nombre' => $datos['tf_nombre'],
                'sexo' => $datos['tf_genero'],
                'fechaNacimiento' => $datos['tf_fnacpersona'],
                'telefonoCasa' => $datos['tf_telHabitEstudiante'],
                'telefonoCelular' => $datos['tf_telcelular'],
                'escuela_procedencia' => $datos['tf_primaria'],
                'email' => $datos['tf_email'],
                'domicilio' => $datos['tf_domicilio'],
                'idProvincia' => $datos['tf_provincias'],
                'IdCanton' => $datos['tf_cantones'],
                'IdDistrito' => $datos['tf_distritos']));
        }
        /* Falta
          'estadoCivil'=>$datos['estadocivilP'],
          'telefonoCasa'=>$datos['telcasaP'], */


        //Consulto si el nivel es superio a Noveno
        if ($datos['sl_nivelMatricular'] > 9) {
            //Consulto si ya tiene asignado una especialidad
            $consultaExistenciaEspecialidad = $this->db->select("SELECT * FROM sipce_especialidad_estudiante "
                    . "WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

            if ($consultaExistenciaEspecialidad != null) {
                //Actualizo datos de la especialidad
                $posData = array(
                    'cod_especialidad' => $datos['tf_especialidad']);
                $this->db->update('sipce_especialidad_estudiante', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
            } else {
                //Sino Inserto especialidad matriculada
                $this->db->insert('sipce_especialidad_estudiante', array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'cod_especialidad' => $datos['tf_especialidad']));
            }
        }

        //Consulto si ya existe Encargado Legal
        $consultaExistenciaEncargado = $this->db->select("SELECT * FROM sipce_encargado WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaEncargado != null) {
            //Si ya existe el encargado lo actualizo
            $posData = array(
                'ced_encargado' => $datos['tf_cedulaEncargado'],
                'parentesco' => $datos['sel_parentesco'],
                'anio' => $this->datosSistema[0]['annio_lectivo'],
                'nombre_encargado' => $datos['tf_nombreEncargado'],
                'apellido1_encargado' => $datos['tf_ape1Encargado'],
                'apellido2_encargado' => $datos['tf_ape2Encargado'],
                'telefonoCasaEncargado' => $datos['tf_telHabitEncargado'],
                'telefonoCelularEncargado' => $datos['tf_telcelularEncargado'],
                'ocupacionEncargado' => $datos['tf_ocupacionEncargado'],
                'emailEncargado' => $datos['tf_emailEncargado']);
            $this->db->update('sipce_encargado', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Si no, inserto los datos del Encargado Legal
            $this->db->insert('sipce_encargado', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_encargado' => $datos['tf_cedulaEncargado'],
                'parentesco' => $datos['sel_parentesco'],
                'anio' => $this->datosSistema[0]['annio_lectivo'],
                'nombre_encargado' => $datos['tf_nombreEncargado'],
                'apellido1_encargado' => $datos['tf_ape1Encargado'],
                'apellido2_encargado' => $datos['tf_ape2Encargado'],
                'telefonoCasaEncargado' => $datos['tf_telHabitEncargado'],
                'telefonoCelularEncargado' => $datos['tf_telcelularEncargado'],
                'ocupacionEncargado' => $datos['tf_ocupacionEncargado'],
                'emailEncargado' => $datos['tf_emailEncargado']));
        }

        //Consulto si ya existe Padre
        $consultaExistenciaPadre = $this->db->select("SELECT * FROM sipce_padre WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPadre != null) {
            //Si ya existe el Padre lo actualizo
            $posData = array(
                'ced_padre' => $datos['tf_cedulaPadre'],
                'nombre_padre' => $datos['tf_nombrePadre'],
                'apellido1_padre' => $datos['tf_ape1Padre'],
                'apellido2_padre' => $datos['tf_ape2Padre'],
                'telefonoCelPadre' => $datos['tf_telCelPadre'],
                'telefonoCasaPadre' => $datos['tf_telCasaPadre'],
                'ocupacionPadre' => $datos['tf_ocupacionPadre']);
            $this->db->update('sipce_padre', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Si no, inserto los datos del Padre
            $this->db->insert('sipce_padre', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_padre' => $datos['tf_cedulaPadre'],
                'nombre_padre' => $datos['tf_nombrePadre'],
                'apellido1_padre' => $datos['tf_ape1Padre'],
                'apellido2_padre' => $datos['tf_ape2Padre'],
                'telefonoCelPadre' => $datos['tf_telCelPadre'],
                'telefonoCasaPadre' => $datos['tf_telCasaPadre'],
                'ocupacionPadre' => $datos['tf_ocupacionPadre']));
        }

        //Consulto si ya existe Madre
        $consultaExistenciaMadre = $this->db->select("SELECT * FROM sipce_madre WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaMadre != null) {
            //Si ya existe la Madre la actualizo
            $posData = array(
                'ced_madre' => $datos['tf_cedulaMadre'],
                'nombre_madre' => $datos['tf_nombreMadre'],
                'apellido1_madre' => $datos['tf_ape1Madre'],
                'apellido2_madre' => $datos['tf_ape2Madre'],
                'telefonoCelMadre' => $datos['tf_telCelMadre'],
                'telefonoCasaMadre' => $datos['tf_telCasaMadre'],
                'ocupacionMadre' => $datos['tf_ocupacionMadre']);
            $this->db->update('sipce_madre', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Si no, inserto los datos de la Madre
            $this->db->insert('sipce_madre', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_madre' => $datos['tf_cedulaMadre'],
                'nombre_madre' => $datos['tf_nombreMadre'],
                'apellido1_madre' => $datos['tf_ape1Madre'],
                'apellido2_madre' => $datos['tf_ape2Madre'],
                'telefonoCelMadre' => $datos['tf_telCelMadre'],
                'telefonoCasaMadre' => $datos['tf_telCasaMadre'],
                'ocupacionMadre' => $datos['tf_ocupacionMadre']));
        }

        //Consulto si ya existe Persona Emergencia
        $consultaExistenciaPersonaEmergencia = $this->db->select("SELECT * FROM sipce_personaemergencia WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPersonaEmergencia != null) {
            //Si ya existe la Persona Emergencia la actualizo
            $posData = array(
                'ced_personaEmergencia' => $datos['tf_cedulaPersonaEmergencia'],
                'parentesco' => $datos['sel_parentescoCasoEmergencia'],
                'nombre_personaEmergencia' => $datos['tf_nombrePersonaEmergencia'],
                'apellido1_personaEmergencia' => $datos['tf_ape1PersonaEmergencia'],
                'apellido2_personaEmergencia' => $datos['tf_ape2PersonaEmergencia'],
                'telefonoCasaPersonaEmergencia' => $datos['tf_telHabitPersonaEmergencia'],
                'telefonoCelularPersonaEmergencia' => $datos['tf_telcelularPersonaEmergencia']);
            $this->db->update('sipce_personaemergencia', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Si no, inserto los datos de la Persona Emergencia
            $this->db->insert('sipce_personaemergencia', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_personaEmergencia' => $datos['tf_cedulaPersonaEmergencia'],
                'parentesco' => $datos['sel_parentescoCasoEmergencia'],
                'nombre_personaEmergencia' => $datos['tf_nombrePersonaEmergencia'],
                'apellido1_personaEmergencia' => $datos['tf_ape1PersonaEmergencia'],
                'apellido2_personaEmergencia' => $datos['tf_ape2PersonaEmergencia'],
                'telefonoCasaPersonaEmergencia' => $datos['tf_telHabitPersonaEmergencia'],
                'telefonoCelularPersonaEmergencia' => $datos['tf_telcelularPersonaEmergencia']));
        }

        //Consulto si ya existe Poliza
        $consultaExistenciaPoliza = $this->db->select("SELECT * FROM sipce_poliza WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPoliza != null) {
            //Si ya existe la Poliza, la actualizo
            $posData = array(
                'numero_poliza' => $datos['tf_poliza'],
                'fecha_vence' => $datos['tf_polizaVence']);
            $this->db->update('sipce_poliza', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Si no, inserto los datos de la Poliza
            $this->db->insert('sipce_poliza', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'numero_poliza' => $datos['tf_poliza'],
                'fecha_vence' => $datos['tf_polizaVence']));
        }

        //Consulto si ya existe Adelanto/Arraste
        $consultaExistenciaAdelanta = $this->db->select("SELECT * FROM sipce_adelanta WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($datos['sl_adelanta'] == "si" && $datos['sl_condicion'] == "Repite") {
            if ($consultaExistenciaAdelanta != null) {
                //Si ya existe  Adelanto/Arraste, actualizo
                $posData = array(
                    'anio' => $this->datosSistema[0]['annio_lectivo'],
                    'nivel' => $datos['sl_nivelMatricular'],
                    'nivel_adelanta' => $datos['sl_nivelMatricular'] + 1);
                $this->db->update('sipce_adelanta', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
            } else {
                //Si no, inserto los datos de la Poliza
                $this->db->insert('sipce_adelanta', array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'anio' => $this->datosSistema[0]['annio_lectivo'],
                    'nivel' => $datos['sl_nivelMatricular'],
                    'nivel_adelanta' => $datos['sl_nivelMatricular'] + 1));
            }
        } else {
            if ($consultaExistenciaAdelanta != null) {
                //Borro datos
                $sth = $this->db->prepare("DELETE FROM sipce_adelanta WHERE ced_estudiante ='" . $datos['tf_cedulaEstudiante'] . "' AND anio = " . $this->datosSistema[0]['annio_lectivo']);
                $sth->execute();
            }
        }
    }

    /* Inserta estudiante Nuevo Ingreso en la BD */

    public function guardarNuevoIngreso($datos) {
        //'estado' 1 = Matricula Ratificada
        //'estado' 2 = Matricula Ratificada Editada
        //'estado' 3 = Matricula Nuevo Ingreso
        //Consulto si ya existe la matricula
        $consultaExistenciaMatricula = $this->db->select("SELECT * FROM sipce_matricularatificacion "
                . "WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' "
                . "AND anio = " . $this->datosSistema[0]['annio_lectivo']);

        if ($consultaExistenciaMatricula != null) {
            //No se puede hacer nuevo ingreso xq ya existe
            echo '<h1>ya existe estudiante en sipce_matricularatificacion';
            die;
        } else {
            //Sino Inserto datos y 'estado' Matricula Nuevo Ingreso
            $this->db->insert('sipce_matricularatificacion', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'anio' => $this->datosSistema[0]['annio_lectivo'],
                'nivel' => $datos['sl_nivelMatricular'],
                'condicion' => $datos['sl_condicion'],
                'estado' => 3));
        }

        //Consulto si ya existe la Enfermedad
        $consultaExistenciaEnfermedad = $this->db->select("SELECT * FROM sipce_enfermedades "
                . "WHERE cedula = '" . $datos['tf_cedulaEstudiante'] . "' "
                . "AND anio = " . $this->datosSistema[0]['annio_lectivo']);

        if ($datos['sel_enfermedad'] == 1) {
            if ($consultaExistenciaEnfermedad != null) {
                //No se puede hacer nuevo ingreso xq ya existe
                echo '<h1>ya existe estudiante en sipce_enfermedades';
                die;
            } else {
                //Sino Inserto datos
                $this->db->insert('sipce_enfermedades', array(
                    'cedula' => $datos['tf_cedulaEstudiante'],
                    'anio' => $this->datosSistema[0]['annio_lectivo'],
                    'descripcion' => $datos['tf_enfermedadDescripcion']));
            }
        }
        //Consulto si el estudiante esta asignado a un Nivel, Grupo, Subgrupo
        $consultaExistenciaNivel = $this->db->select("SELECT * FROM sipce_grupos "
                . "WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaNivel != null) {
            //No deberia estar asignado a ningun grupoya que es Nuevo Ingreso
            echo '<h1>ya existe estudiante en sipce_grupos';
            die;
        } else {
            //Sino Inserto datos en sipce_grupos
            $this->db->insert('sipce_grupos', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'nivel' => $datos['sl_nivelMatricular'],
                'annio' => $this->datosSistema[0]['annio_lectivo']));
        }

        //Consulto si ya existe datos en el expediente (para editarla)
        $consultaExistenciaEstudiante = $this->db->select("SELECT * FROM sipce_estudiante "
                . "WHERE cedula = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaEstudiante != null) {
            //No se puede hacer nuevo ingreso xq ya existe
            echo '<h1>ya existe estudiante en sipce_estudiante';
            die;
        } else {
            //Sino Inserto datos del expediente Estudiante
            $this->db->insert('sipce_estudiante', array(
                'nacionalidad' => $datos['tf_nacionalidad'],
                'cedula' => $datos['tf_cedulaEstudiante'],
                'apellido1' => $datos['tf_ape1'],
                'apellido2' => $datos['tf_ape2'],
                'nombre' => $datos['tf_nombre'],
                'sexo' => $datos['tf_genero'],
                'fechaNacimiento' => $datos['tf_fnacpersona'],
                'telefonoCasa' => $datos['tf_telHabitEstudiante'],
                'telefonoCelular' => $datos['tf_telcelular'],
                'escuela_procedencia' => $datos['tf_primaria'],
                'email' => $datos['tf_email'],
                'domicilio' => $datos['tf_domicilio'],
                'idProvincia' => $datos['tf_provincias'],
                'IdCanton' => $datos['tf_cantones'],
                'IdDistrito' => $datos['tf_distritos']));
        }


        //Consulto si el nivel es superio a Noveno
        if ($datos['sl_nivelMatricular'] > 9) {
            //Consulto si ya tiene asignado una especialidad
            $consultaExistenciaEspecialidad = $this->db->select("SELECT * FROM sipce_especialidad_estudiante "
                    . "WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

            if ($consultaExistenciaEspecialidad != null) {
                //Actualizo datos de la especialidad
                $posData = array(
                    'cod_especialidad' => $datos['tf_especialidad']);
                $this->db->update('sipce_especialidad_estudiante', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
            } else {
                //Sino Inserto especialidad matriculada
                $this->db->insert('sipce_especialidad_estudiante', array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'cod_especialidad' => $datos['tf_especialidad']));
            }
        }

        //Consulto si ya existe Encargado Legal
        $consultaExistenciaEncargado = $this->db->select("SELECT * FROM sipce_encargado WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaEncargado != null) {
            //No puede existir xq es Nuevo Ingreso
            echo '<h1>ya existe estudiante en sipce_encargado';
            die;
        } else {
            //Si no, inserto los datos del Encargado Legal
            $this->db->insert('sipce_encargado', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_encargado' => $datos['tf_cedulaEncargado'],
                'parentesco' => $datos['sel_parentesco'],
                'anio' => $this->datosSistema[0]['annio_lectivo'],
                'nombre_encargado' => $datos['tf_nombreEncargado'],
                'apellido1_encargado' => $datos['tf_ape1Encargado'],
                'apellido2_encargado' => $datos['tf_ape2Encargado'],
                'telefonoCasaEncargado' => $datos['tf_telHabitEncargado'],
                'telefonoCelularEncargado' => $datos['tf_telcelularEncargado'],
                'ocupacionEncargado' => $datos['tf_ocupacionEncargado'],
                'emailEncargado' => $datos['tf_emailEncargado']));
        }

        //Consulto si ya existe Padre
        $consultaExistenciaPadre = $this->db->select("SELECT * FROM sipce_padre WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPadre != null) {
            //No puede existir xq es Nuevo Ingreso
            echo '<h1>ya existe estudiante en sipce_padre';
            die;
        } else {
            //Si no, inserto los datos del Padre
            $this->db->insert('sipce_padre', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_padre' => $datos['tf_cedulaPadre'],
                'nombre_padre' => $datos['tf_nombrePadre'],
                'apellido1_padre' => $datos['tf_ape1Padre'],
                'apellido2_padre' => $datos['tf_ape2Padre'],
                'telefonoCasaPadre' => $datos['tf_telCasaPadre'],
                'telefonoCelPadre' => $datos['tf_telCelPadre'],
                'ocupacionPadre' => $datos['tf_ocupacionPadre']));
        }

        //Consulto si ya existe Madre
        $consultaExistenciaMadre = $this->db->select("SELECT * FROM sipce_madre WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaMadre != null) {
            //No puede existir xq es Nuevo Ingreso
            echo '<h1>ya existe estudiante en sipce_madre';
            die;
        } else {
            //Si no, inserto los datos de la Madre
            $this->db->insert('sipce_madre', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_madre' => $datos['tf_cedulaMadre'],
                'nombre_madre' => $datos['tf_nombreMadre'],
                'apellido1_madre' => $datos['tf_ape1Madre'],
                'apellido2_madre' => $datos['tf_ape2Madre'],
                'telefonoCasaMadre' => $datos['tf_telCasaMadre'],
                'telefonoCelMadre' => $datos['tf_telCelMadre'],
                'ocupacionMadre' => $datos['tf_ocupacionMadre']));
        }

        //Consulto si ya existe Persona Emergencia
        $consultaExistenciaPersonaEmergencia = $this->db->select("SELECT * FROM sipce_personaemergencia WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPersonaEmergencia != null) {
            //No puede existir xq es Nuevo Ingreso
            echo '<h1>ya existe estudiante en sipce_personaemergencia';
            die;
        } else {
            //Si no, inserto los datos de la Persona Emergencia
            $this->db->insert('sipce_personaemergencia', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'ced_personaEmergencia' => $datos['tf_cedulaPersonaEmergencia'],
                'parentesco' => $datos['sel_parentescoCasoEmergencia'],
                'nombre_personaEmergencia' => $datos['tf_nombrePersonaEmergencia'],
                'apellido1_personaEmergencia' => $datos['tf_ape1PersonaEmergencia'],
                'apellido2_personaEmergencia' => $datos['tf_ape2PersonaEmergencia'],
                'telefonoCasaPersonaEmergencia' => $datos['tf_telHabitPersonaEmergencia'],
                'telefonoCelularPersonaEmergencia' => $datos['tf_telcelularPersonaEmergencia']));
        }

        //Consulto si ya existe Poliza
        $consultaExistenciaPoliza = $this->db->select("SELECT * FROM sipce_poliza WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPoliza != null) {
            //No puede existir xq es Nuevo Ingreso
            echo '<h1>ya existe estudiante en sipce_poliza';
            die;
        } else {
            //Si no, inserto los datos de la Poliza
            $this->db->insert('sipce_poliza', array(
                'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                'numero_poliza' => $datos['tf_poliza'],
                'fecha_vence' => $datos['tf_polizaVence']));
        }
    }

    /* Inserta estudiante Nuevo Ingreso en la BD */

    public function guardarPrematricula($datos) {
        //Guardo los datos en Pre-Matricula, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaPreMatricula = $this->db->select("SELECT * FROM sipce_prematricula "
                . "WHERE cedula = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPreMatricula != null) {
            //Si ya existe, realizare un update
            $posData = array(
                'nacionalidad' => $datos['tf_nacionalidad'],
                'cedula' => $datos['tf_cedulaEstudiante'],
                'apellido1' => $datos['tf_ape1'],
                'apellido2' => $datos['tf_ape2'],
                'nombre' => $datos['tf_nombre'],
                'sexo' => $datos['tf_genero'],
                'fechaNacimiento' => $datos['tf_fnacpersona'],
                'escuela_procedencia' => $datos['tf_primaria'],
                'domicilio' => $datos['tf_domicilio'],
                'idProvincia' => $datos['tf_provincias'],
                'IdCanton' => $datos['tf_cantones'],
                'IdDistrito' => $datos['tf_distritos']);

            $this->db->update('sipce_prematricula', $posData, "`cedula` = '{$datos['tf_cedulaEstudiante']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('sipce_prematricula', array(
                'nacionalidad' => $datos['tf_nacionalidad'],
                'cedula' => $datos['tf_cedulaEstudiante'],
                'apellido1' => $datos['tf_ape1'],
                'apellido2' => $datos['tf_ape2'],
                'nombre' => $datos['tf_nombre'],
                'sexo' => $datos['tf_genero'],
                'fechaNacimiento' => $datos['tf_fnacpersona'],
                'escuela_procedencia' => $datos['tf_primaria'],
                'domicilio' => $datos['tf_domicilio'],
                'idProvincia' => $datos['tf_provincias'],
                'IdCanton' => $datos['tf_cantones'],
                'IdDistrito' => $datos['tf_distritos']));
        }

        //Consulto si ya existe Padre
        $consultaExistenciaPadre = $this->db->select("SELECT * FROM sipce_padre_prematricula WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");

        if ($consultaExistenciaPadre != null) {
            //Si ya existe, realizare un update o un delete
            if (empty($datos['tf_cedulaPadre'])) {
                //Aqui iria un delete
            } else {
                $posData = array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'ced_padre' => $datos['tf_cedulaPadre'],
                    'nombre_padre' => $datos['tf_nombrePadre'],
                    'apellido1_padre' => $datos['tf_ape1Padre'],
                    'apellido2_padre' => $datos['tf_ape2Padre'],
                    'telefonoCelPadre' => $datos['tf_telCelPadre'],
                    'telefonoCasaPadre' => $datos['tf_telCasaPadre'],
                    'ocupacionPadre' => $datos['tf_ocupacionPadre']);

                $this->db->update('sipce_padre_prematricula', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
            }
        } else {
            //Si no, verifico los datos y si no estan vacios inserto los datos del Padre
            if (empty($datos['tf_cedulaPadre'])) {
                //El if esta al verris
            } else {
                $this->db->insert('sipce_padre_prematricula', array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'ced_padre' => $datos['tf_cedulaPadre'],
                    'nombre_padre' => $datos['tf_nombrePadre'],
                    'apellido1_padre' => $datos['tf_ape1Padre'],
                    'apellido2_padre' => $datos['tf_ape2Padre'],
                    'telefonoCelPadre' => $datos['tf_telCelPadre'],
                    'telefonoCasaPadre' => $datos['tf_telCasaPadre'],
                    'ocupacionPadre' => $datos['tf_ocupacionPadre']));
            }
        }

        //Consulto si ya existe Madre
        $consultaExistenciaMadre = $this->db->select("SELECT * FROM sipce_madre_prematricula WHERE ced_estudiante = '" . $datos['tf_cedulaEstudiante'] . "' ");
        if ($consultaExistenciaMadre != null) {
            //Si ya existe, realizare un update o un delete
            if (empty($datos['tf_cedulaMadre'])) {
                //Aqui iria un delete
            } else {
                $posData = array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'ced_madre' => $datos['tf_cedulaMadre'],
                    'nombre_madre' => $datos['tf_nombreMadre'],
                    'apellido1_madre' => $datos['tf_ape1Madre'],
                    'apellido2_madre' => $datos['tf_ape2Madre'],
                    'telefonoCelMadre' => $datos['tf_telCelMadre'],
                    'telefonoCasaMadre' => $datos['tf_telCasaMadre'],
                    'ocupacionMadre' => $datos['tf_ocupacionMadre']);

                $this->db->update('sipce_madre_prematricula', $posData, "`ced_estudiante` = '{$datos['tf_cedulaEstudiante']}'");
            }
        } else {
            //Si no, verifico los datos y si no estan vacios inserto los datos del Padre
            if (empty($datos['tf_cedulaMadre'])) {
                //El if esta al verris
            } else {
                $this->db->insert('sipce_madre_prematricula', array(
                    'ced_estudiante' => $datos['tf_cedulaEstudiante'],
                    'ced_madre' => $datos['tf_cedulaMadre'],
                    'nombre_madre' => $datos['tf_nombreMadre'],
                    'apellido1_madre' => $datos['tf_ape1Madre'],
                    'apellido2_madre' => $datos['tf_ape2Madre'],
                    'telefonoCelMadre' => $datos['tf_telCelMadre'],
                    'telefonoCasaMadre' => $datos['tf_telCasaPadre'],
                    'ocupacionMadre' => $datos['tf_ocupacionMadre']));
            }
        }
    }

    /* Carga todos los estudiantes matriculados */

    public function estadoMatricula() {
        return $this->db->select("SELECT cedula,nombre,apellido1,apellido2,nivel,condicion "
                        . "FROM sipce_estudiante,sipce_matricularatificacion "
                        . "WHERE cedula = ced_estudiante "
                        . "AND anio = " . $this->datosSistema[0]['annio_lectivo'] . " "
                        . "ORDER BY apellido1,apellido2,nombre");
    }

    /* Carga todos los estudiantes matriculados */

    public function estadoPrematricula() {
        return $this->db->select("SELECT cedula,nombre,apellido1,apellido2 "
                        . "FROM sipce_prematricula "
                        . "WHERE cedula NOT IN (select ced_estudiante from sipce_matricularatificacion WHERE anio = " . $this->datosSistema[0]['annio_lectivo'] . ") ");
    }

    //Metodos extras para impresion de certificado de matricula
    public function consultaDatosEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,"
                        . "p.telefonoCasa,p.telefonoCelular,p.email,p.domicilio,e.nombre as escuela_procedencia,p.telefonoCasa,j.nombreProvincia,"
                        . "c.Canton,d.Distrito,p.nacionalidad,g.nivel "
                        . "FROM sipce_estudiante as p,sipce_escuelas as e,sipce_grupos as g,sipce_provincias as j,sipce_cantones as c,sipce_distritos as d "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND p.cedula = '" . $cedulaEstudiante . "' "
                        . "AND g.annio = '" . $this->datosSistema[0]['annio_lectivo'] . "' "
                        . "AND p.escuela_procedencia = e.id "
                        . "AND p.IdProvincia = j.IdProvincia "
                        . "AND p.IdCanton = c.IdCanton "
                        . "AND p.IdDistrito = d.IdDistrito");
    }

    //Metodo para buscar estudiantes matriculados, pero sin Seccion-Grupo asignada//
    public function estudiantesMatriculadosSinGrupo() {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,"
                        . "p.telefonoCasa,p.telefonoCelular,g.nivel, m.condicion "
                        . "FROM sipce_estudiante as p,sipce_grupos as g,sipce_matricularatificacion as m "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND p.cedula = m.ced_estudiante "
                        . "AND g.annio = " . $this->datosSistema[0]['annio_lectivo'] . " "
                        . "AND g.grupo = 0 "
                        . "ORDER BY g.nivel");
    }

    /* Retorna la informacion del Estudiante para Asignar Seccion */

    public function datosEstudiante($cedulaEstudiante) {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,p.domicilio,g.nivel "
                        . "FROM sipce_estudiante as p,sipce_grupos as g "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND g.annio = '" . $this->datosSistema[0]['annio_lectivo'] . "' "
                        . "AND p.cedula = '" . $cedulaEstudiante . "' ");
    }

    /* Carga todas los Niveles */

    public function consultaNiveles() {
        return $this->db->select("SELECT DISTINCT nivel "
                        . "FROM sipce_grupos "
                        . "WHERE annio = " . $this->datosSistema[0]['annio_lectivo'] . " "
                        . "ORDER BY nivel");
    }

    /* Carga todos los Grupos de un Nivel */

    public function cargaGrupos($idNivel) {
        $resultado = $this->db->select("SELECT DISTINCT grupo FROM sipce_grupos "
                . "WHERE nivel = :nivel "
                . "AND annio = " . $this->datosSistema[0]['annio_lectivo'] . " "
                . "AND grupo <> 0 "
                . "ORDER BY grupo", array('nivel' => $idNivel));
        echo json_encode($resultado);
    }

    /* Carga todos los SubGrupos de una Sección */

    public function cargaSubGrupos($consulta) {
        $resultado = $this->db->select("SELECT DISTINCT sub_grupo FROM sipce_grupos "
                . "WHERE nivel = :nivel "
                . "AND grupo = :grupo "
                . "AND annio = " . $this->datosSistema[0]['annio_lectivo'] . " "
                . "ORDER BY sub_grupo", array('nivel' => $consulta['nivelSeleccionado'],
            'grupo' => $consulta['grupoSeleccionado']));
        echo json_encode($resultado);
    }

    /* Guardo la nueva seccion del estudiante */

    public function guardarAsignarSeccion($datos) {
        //Consulto si el estudiante esta asignado a un Nivel, Grupo, Subgrupo
        $consultaExistenciaNivel = $this->db->select("SELECT * FROM `sipce_grupos` "
                . "WHERE `ced_estudiante` = '" . $datos['ced_estudiante'] . "' "
                . "AND `annio` = " . $this->datosSistema[0]['annio_lectivo']);

        if ($consultaExistenciaNivel != null) {
            //Actualizo nivel del Estudiante
            $datosNivel = array(
                'nivel' => $datos['nivel'],
                'grupo' => $datos['grupo'],
                'sub_grupo' => $datos['subGrupo']);

            $this->db->update('sipce_grupos', $datosNivel, "`ced_estudiante` = '{$datos['ced_estudiante']}' AND `annio` = " . $this->datosSistema[0]['annio_lectivo']);
            $msj = "Sección de Estudiante actualizada correctamente";
        } else {
            //Sino Inserto datos en sipce_grupos
            $this->db->insert('sipce_grupos', array(
                'ced_estudiante' => $datos['ced_estudiante'],
                'nivel' => $datos['nivel'],
                'grupo' => $datos['grupo'],
                'subGrupo' => $datos['subGrupo'],
                'annio' => $this->datosSistema[0]['annio_lectivo']));
            $msj = "Se agrego nueva Sección del Estudiante";
        }
        return $msj;
    }

    /* Elimino la Matricula del estudiante */

    public function eliminarMatricula($ced_estudiante) {
        //Consulto si el estudiante 
        $consultaExistenciaNivel = $this->db->select("SELECT * FROM `sipce_grupos` "
                . "WHERE `ced_estudiante` = '" . $ced_estudiante . "' "
                . "AND `annio` = " . $this->datosSistema[0]['annio_lectivo']);

        if ($consultaExistenciaNivel != null) {
            //Elimino la matricula del Estudiante
            $sth = $this->db->prepare("DELETE FROM sipce_grupos "
                    . "WHERE ced_estudiante ='" . $ced_estudiante . "' "
                    . "AND annio = " . $this->datosSistema[0]['annio_lectivo']);
            $sth->execute();

            $sth2 = $this->db->prepare("DELETE FROM sipce_matricularatificacion "
                    . "WHERE ced_estudiante ='" . $ced_estudiante . "' "
                    . "AND anio = " . $this->datosSistema[0]['annio_lectivo']);
            $sth2->execute();

            $msj = "Estudiante eliminado correctamente";
        } else {
            //Sino Imprimo error
            $msj = "Error, Estudiante no encontrado";
        }
        return $msj;
    }

    //Metodo que brinda una estadistica por nivel sobre la condion final de los estudiantes matriculados//
    public function resumenCondicionEstudiantes() {
        return $this->db->select("SELECT p.cedula,p.sexo,m.condicion "
                        . "FROM sipce_estudiante as p,sipce_grupos as g,sipce_matricularatificacion as m "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND p.cedula = m.ced_estudiante "
                        . "AND g.annio = " . $this->datosSistema[0]['annio_lectivo'] . " "
                        . "AND g.grupo = 0 "
                        . "ORDER BY g.nivel");
    }

    /* Ejemplo clasico de join entre tablas */

    public function ejemploJoin($cedulaEstudiante) {
        return $this->db->select("SELECT p.cedula,p.nombre,p.apellido1,p.apellido2,p.sexo,p.fechaNacimiento,"
                        . "p.telefonoCelular,p.email,p.domicilio,p.escuela_procedencia,p.telefonoCasa,p.IdProvincia,"
                        . "p.IdCanton,p.IdDistrito,p.nacionalidad,g.nivel,j.nombreProvincia,c.Canton,d.Distrito "
                        . "FROM sipce_estudiante as p,sipce_grupos as g,sipce_provincias as j,sipce_cantones as c,sipce_distritos as d "
                        . "WHERE p.cedula = g.ced_estudiante "
                        . "AND p.cedula = '" . $cedulaEstudiante . "' "
                        . "AND p.IdProvincia = j.IdProvincia "
                        . "AND p.IdCanton = c.IdCanton "
                        . "AND p.IdDistrito = d.IdDistrito");
    }

}

?>