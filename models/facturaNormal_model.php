<?php

Class FacturaNormal_Model extends Models {

    public function __construct() {
        parent::__construct();
    }
    public function listaFacturas() {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaListaFacturas = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreEstudiante = '" . $_SESSION['nombre'] . "' ");
        return $consultaListaFacturas;
    }
}

?>