<?php

Class Factura_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* Inserta estudiante Nuevo Factura en la BD */

    public function guardarFactura($datos) {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos['txt_nombreLibro'] . "' ");

        if ($consultaExistenciaFactura != null) {
            echo 'Error... ya existe';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('factura', array(
                'nombreLibro' => $datos['txt_nombreLibro'],
                'nombreEstudiante' => $datos['txt_nombreEstudiante'],
                'fechaPedido' => $datos['txt_fechaPedido'],
                'fechaEntrega' => $datos['txt_fechaEntrega']));
        }
    }

    public function actualizarFactura($datos) {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos['txt_nombreLibro'] . "' ");
        if ($consultaExistenciaFactura != null) {
            $posData = array(
                'nombreLibro' => $datos['txt_nombreLibro'],
                'nombreEstudiante' => $datos['txt_nombreEstudiante'],
                'fechaPedido' => $datos['txt_fechaPedido'],
                'fechaEntrega' => $datos['txt_fechaEntrega']);
            $this->db->update('factura', $posData, "`nombreLibro` = '{$datos['txt_nombreLibro']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function eliminarFactura($datos) {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos . "' ");

        if ($consultaExistenciaFactura != null) {
            $this->db->delete('factura', "`nombreLibro` = '{$datos}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function listaFacturas() {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaListaFacturas = $this->db->select("SELECT * FROM factura ");
        return $consultaListaFacturas;
    }

    public function datosFactura($datos) {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos . "' ");

        if ($consultaExistenciaFactura != null) {
            return $consultaExistenciaFactura;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Ni madres...';
            die;
        }
    }

}

?>