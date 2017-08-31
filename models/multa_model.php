<?php

Class Multa_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* BUSCADOR */

    public function buscarEstuRatif($datos) {
        $resultado = $this->db->select("SELECT * "
                . "FROM multa "
                . "WHERE " . $datos ['campoTabla'] . "  LIKE '%" . $datos ['txt_datosBuscar'] . "%'");
        echo json_encode($resultado);
    }

    public function listaLibros() {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaListaLibros = $this->db->select("SELECT * FROM libro "
                . "ORDER BY titulo");
        return $consultaListaLibros;
    }

    public function eliminarMulta($id) {
        //Guardo los datos en multa, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaMulta = $this->db->select("SELECT * FROM multa "
                . "WHERE id = '" . $id . "' ");

        if ($consultaExistenciaMulta != null) {
            $this->db->delete('multa', "`id` = '{$id}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function listaMultas() {
        //Guardo los datos en multa, luego hay que ratificar para que consolide la matricula
        $consultaListaMultas = $this->db->select("SELECT * FROM multa ");
        return $consultaListaMultas;
    }

    public function datosMulta($datos) {
        //Guardo los datos en multa, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaMulta = $this->db->select("SELECT * FROM multa "
                . "WHERE id = '" . $datos . "' ");

        if ($consultaExistenciaMulta != null) {
            return $consultaExistenciaMulta;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Ni madres...';
            die;
        }
    }

}

?>