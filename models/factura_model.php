<?php

Class Factura_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* cb Estudiantes */
    public function consultaNiveles() {
        return $this->db->select("SELECT DISTINCT nivel "
                        . "FROM sipce_grupos "
                        . "WHERE annio = " . 2017 . " "
                        . "ORDER BY nivel");
    }

    public function cargaGrupos($idNivel) {
        $resultado = $this->db->select("SELECT DISTINCT grupo FROM sipce_grupos "
                . "WHERE nivel = :nivel "
                . "AND annio = " . 2017 . " "
                . "AND grupo <> 0 "
                . "ORDER BY grupo", array('nivel' => $idNivel));
        echo json_encode($resultado);
    }

    public function cargaSeccion($consulta) {
        $resultado2 = $this->db->select("SELECT e.cedula,e.nombre,e.apellido1,e.apellido2,g.sub_grupo,r.condicion "
                . "FROM sipce_estudiante as e, sipce_grupos as g, sipce_matricularatificacion as r "
                . "WHERE e.cedula = g.ced_estudiante "
                . "AND e.cedula = r.ced_estudiante "
                . "AND g.nivel = " . $consulta['nivelSeleccionado'] . " "
                . "AND g.grupo = " . $consulta['grupoSeleccionado'] . " "
                . "AND g.annio = " . 2017 . " "
                . "AND r.anio = " . 2017 . " "
                . "ORDER BY g.sub_grupo,e.apellido1,e.apellido2,e.nombre");
        echo json_encode($resultado2);
    }/* Fin cb */

    /* BUSCADOR */

    public function buscarEstuRatif($datos) {
        $resultado = $this->db->select("SELECT * "
                . "FROM factura "
                . "WHERE " . $datos ['campoTabla'] . "  LIKE '%" . $datos ['txt_datosBuscar'] . "%'");
        echo json_encode($resultado);
    }

    public function aceptarFactura($id) {
        //Guardo los datos en solicitud, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE id = " . $id . " ");
        if ($consultaExistenciaFactura == null) {
            echo 'Error... ya existe';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('multa', array(
                'nombreLibro' => $consultaExistenciaFactura[0]['nombreLibro'],
                'nombreEstudiante' => $consultaExistenciaFactura[0]['nombreEstudiante'],
                'fechaPedido' => $consultaExistenciaFactura[0]['fechaPedido'],
                'fechaEntrega' => $consultaExistenciaFactura[0]['fechaEntrega']));
        }

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

    public function listaLibros() {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaListaLibros = $this->db->select("SELECT * FROM libro "
                . "ORDER BY titulo");
        return $consultaListaLibros;
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
                'fechaEntrega' => $datos['txt_fechaEntrega'],
                'cedula' => $datos['txt_cedula']));
        }
    }

    public function actualizarFactura($datos) {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaFactura = $this->db->select("SELECT * FROM factura "
                . "WHERE cedula = '" . $datos['txt_cedula'] . "' ");
        if ($consultaExistenciaFactura != null) {
            $posData = array(
                'cedula' => $datos['txt_cedula'],
                'nombreLibro' => $datos['txt_nombreLibro'],
                'nombreEstudiante' => $datos['txt_nombreEstudiante'],
                'fechaPedido' => $datos['txt_fechaPedido'],
                'fechaEntrega' => $datos['txt_fechaEntrega']);
            $this->db->update('factura', $posData, "`cedula` = '{$datos['txt_cedula']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo $datos['txt_cedula'];
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
                . "WHERE cedula = '" . $datos . "' ");

        if ($consultaExistenciaFactura != null) {
            return $consultaExistenciaFactura;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error 1...';
            die;
        }
    }

}

?>