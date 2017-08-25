<?php

Class Solicitud_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    public function listaLibros() {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaListaLibros = $this->db->select("SELECT * FROM libro "
                . "ORDER BY titulo");
        return $consultaListaLibros;
    }

    public function guardarSolicitud($datos) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM solicitud "
                . "WHERE nombreLibro = '" . $datos['txt_nombreLibro'] . "' ");

        if ($consultaExistenciaSolicitud != null) {
            echo 'Error... ya existe';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('solicitud', array(
                'nombreLibro' => $datos['txt_nombreLibro'],
                'nombreEstudiante' => $datos['txt_nombreEstudiante'],
                'fechaPedido' => $datos['txt_fechaPedido'],
                'fechaEntrega' => $datos['txt_fechaEntrega']));
        }
    }

    public function aceptarSolicitud($id) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM solicitud "
                . "WHERE id = " . $id . " ");
        if ($consultaExistenciaSolicitud == null) {
            echo 'Error... ya existe';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('factura', array(
                'nombreLibro' => $consultaExistenciaSolicitud[0]['nombreLibro'],
                'nombreEstudiante' => $consultaExistenciaSolicitud[0]['nombreEstudiante'],
                'fechaPedido' => $consultaExistenciaSolicitud[0]['fechaPedido'],
                'fechaEntrega' => $consultaExistenciaSolicitud[0]['fechaEntrega']));
        }

        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM solicitud "
                . "WHERE id = '" . $id . "' ");
        if ($consultaExistenciaSolicitud != null) {
            $this->db->delete('solicitud', "`id` = '{$id}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function actualizarSolicitud($datos) {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM solicitud "
                . "WHERE id = '" . $datos['txt_id'] . "' ");
        if ($consultaExistenciaSolicitud != null) {
            $posData = array(
                'id' => $datos['txt_id'],
                'nombreLibro' => $datos['txt_nombreLibro'],
                'nombreEstudiante' => $datos['txt_nombreEstudiante'],
                'fechaPedido' => $datos['txt_fechaPedido'],
                'fechaEntrega' => $datos['txt_fechaEntrega']);
            $this->db->update('solicitud', $posData, "`id` = '{$datos['txt_id']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo $datos['txt_id'];
            echo 'Error... no existe';
            die;
        }
    }

    public function eliminarSolicitud($id) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM solicitud "
                . "WHERE id = '" . $id . "' ");

        if ($consultaExistenciaSolicitud != null) {
            $this->db->delete('solicitud', "`id` = '{$id}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function listaSolicitudes() {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaListaSolicitudes = $this->db->select("SELECT * FROM solicitud ");
        return $consultaListaSolicitudes;
    }

    public function datosSolicitud($datos) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaSolicitud = $this->db->select("SELECT * FROM solicitud "
                . "WHERE id = '" . $datos . "' ");

        if ($consultaExistenciaSolicitud != null) {
            return $consultaExistenciaSolicitud;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo $datos['txt_id'];
            echo 'Ni madres...';
            die;
        }
    }

}

?>