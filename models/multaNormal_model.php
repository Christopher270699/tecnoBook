<?php

Class MultaNormal_Model extends Models {

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

    public function eliminarMultaNormal($id) {
        //Guardo los datos en multaNormal, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaMultaNormal = $this->db->select("SELECT * FROM multa "
                . "WHERE id = '" . $id . "' ");

        if ($consultaExistenciaMultaNormal != null) {
            $this->db->delete('multa', "`id` = '{$id}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function listaMultaNormal() {
        //Guardo los datos en multaNormal, luego hay que ratificar para que consolide la matricula
        $consultaListaMultaNormal = $this->db->select("SELECT * FROM multa "
                . "WHERE nombreEstudiante = '" . $_SESSION['nombre'] . "' ");
        return $consultaListaMultaNormal;
    }

}

?>