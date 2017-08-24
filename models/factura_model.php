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
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE id = '" . $datos['txt_id'] . "' ");
        if ($consultaExistenciaFactura != null) {
            $posData = array(
                'id' => $datos['txt_id'],
                'nombreLibro' => $datos['txt_nombreLibro'],
                'nombreEstudiante' => $datos['txt_nombreEstudiante'],
                'fechaPedido' => $datos['txt_fechaPedido'],
                'fechaEntrega' => $datos['txt_fechaEntrega']);
            $this->db->update('factura', $posData, "`id` = '{$datos['txt_id']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo $datos['txt_id'];
            echo 'Error... no existe';
            die;
        }
    }

    public function eliminarFactura($id) {
        //Guardo los datos en factura, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE id = '" . $id . "' ");

        if ($consultaExistenciaFactura != null) {
            $this->db->delete('factura', "`id` = '{$id}'");
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
                . "WHERE id = '" . $datos . "' ");

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