<?php

Class LibroNormal_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* BUSCADOR */

    public function buscarEstuRatif($datos) {
        $resultado = $this->db->select("SELECT * "
                . "FROM libro "
                . "WHERE " . $datos ['campoTabla'] . "  LIKE '%" . $datos ['txt_datosBuscar'] . "%'");
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