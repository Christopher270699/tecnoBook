<?php

Class LibroNormal_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    public function buscarLibRatif($txt_nombreLibro) {
        $resultado = $this->db->select("SELECT e.cedula,e.nombre,e.apellido1,e.apellido2,g.nivel,g.grupo,g.sub_grupo "
                . "FROM sipce_estudiante as e, sipce_grupos as g "
                . "WHERE e.cedula NOT IN (select ced_estudiante from sipce_matricularatificacion WHERE anio = " . $this->datosSistema[0]['annio_lectivo'] . ") "
                . "AND e.cedula = g.ced_estudiante "
                . "AND e.cedula = '" . $ced_estudiante . "'"
                . "AND g.annio = " . ($this->datosSistema[0]['annio_lectivo'] - 1) . " ");

        echo json_encode($resultado);
    }

    public function listaLibros() {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaListaLibros = $this->db->select("SELECT * FROM libro ");
        return $consultaListaLibros;
    }

    public function datosLibro($codigo) {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaLibro = $this->db->select("SELECT * FROM libro "
                . "WHERE codigo = '" . $codigo . "' ");

        if ($consultaExistenciaLibro != null) {
            return $consultaExistenciaLibro;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Ni madres...';
            die;
        }
    }

}

?>