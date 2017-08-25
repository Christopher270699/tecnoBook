<?php

Class Usuario_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* Inserta estudiante Nuevo Usuario en la BD */

    public function guardarUsuario($datos) {
        //Guardo los datos en usuario, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaUsuario = $this->db->select("SELECT * FROM usuario "
                . "WHERE nombreUsuario = '" . $datos['txt_nombreUsuario'] . "' ");

        if ($consultaExistenciaUsuario != null) {
            echo 'Error... ya existe';
            die;
        } else {
            $pass = Hash::create('md5', $datos['txt_password'], HASH_PASSWORD_KEY);
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('usuario', array(
                'nombreUsuario' => $datos['txt_nombreUsuario'],
                'password' => $pass,
                'cedula' => $datos['txt_cedula'],
                'correo' => $datos['txt_correo'],
                'telefono' => $datos['txt_telefono'],
                'seccion' => $datos['txt_seccion'],
                'tipoUsuario' => 1));
        }
    }

    public function actualizarUsuario($datos) {
        //Guardo los datos en usuario, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaUsuario = $this->db->select("SELECT * FROM usuario "
                . "WHERE nombreUsuario = '" . $datos['txt_nombreUsuario'] . "' ");
        if ($consultaExistenciaUsuario != null) {
            $pass = Hash::create('md5', $datos['txt_password'], HASH_PASSWORD_KEY);
            $posData = array(
                'nombreUsuario' => $datos['txt_nombreUsuario'],
                'password' => $pass,
                'cedula' => $datos['txt_cedula'],
                'correo' => $datos['txt_correo'],
                'telefono' => $datos['txt_telefono'],
                'seccion' => $datos['txt_seccion']);
            $this->db->update('usuario', $posData, "`nombreUsuario` = '{$datos['txt_nombreUsuario']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function eliminarUsuario($datos) {
        //Guardo los datos en usuario, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaUsuario = $this->db->select("SELECT * FROM usuario "
                . "WHERE nombreUsuario = '" . $datos . "' ");

        if ($consultaExistenciaUsuario != null) {
            $this->db->delete('usuario', "`nombreUsuario` = '{$datos}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function listaUsuarios() {
        //Guardo los datos en usuario, luego hay que ratificar para que consolide la matricula
        $consultaListaUsuarios = $this->db->select("SELECT * FROM usuario ");
        return $consultaListaUsuarios;
    }

    public function datosUsuario($datos) {
        //Guardo los datos en usuario, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaUsuario = $this->db->select("SELECT * FROM usuario "
                . "WHERE nombreUsuario = '" . $datos . "' ");

        if ($consultaExistenciaUsuario != null) {
            return $consultaExistenciaUsuario;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Ni madres...';
            die;
        }
    }

}

?>