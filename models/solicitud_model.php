<?php

Class Solicitud_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* Inserta estudiante Nuevo Solicitud en la BD */

    public function guardarSolicitud($datos) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos['txt_nombreLibro'] . "' ");

        if ($consultaExistenciaSolicitud != null) {
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

    public function actualizarSolicitud($datos) {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM factura "
                . "WHERE id = '" . $datos['txt_id'] . "' ");
        if ($consultaExistenciaSolicitud != null) {
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

    public function eliminarSolicitud($datos) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos . "' ");

        if ($consultaExistenciaSolicitud != null) {
            $this->db->delete('factura', "`nombreLibro` = '{$datos}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function listaSolicitudes() {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaListaSolicitudes = $this->db->select("SELECT * FROM factura ");
        return $consultaListaSolicitudes;
    }

    public function datosSolicitud($datos) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM factura "
                . "WHERE nombreLibro = '" . $datos . "' ");

        if ($consultaExistenciaSolicitud != null) {
            return $consultaExistenciaSolicitud;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Ni madres...';
            die;
        }
    }

}

?>