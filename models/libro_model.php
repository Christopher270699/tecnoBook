<?php

Class Libro_Model extends Models {

    public function __construct() {
        parent::__construct();
    }

    /* BUSCADOR */
    /* Retorna Datos de Estudiante por Ratificar */

    public function buscarLibro($titulo) {
        $resultado = $this->db->select("SELECT * "
                . "FROM libro "
                . "WHERE titulo = '" . $titulo . "'");

        echo json_encode($resultado);
    }

    /* Inserta estudiante Nuevo Libro en la BD */

    public function guardarLibro($datos) {
        //Guardo los datos en libro
        $consultaExistenciaLibro = $this->db->select("SELECT * FROM libro "
                . "WHERE codigo = '" . $datos['txt_codigo'] . "' ");

        if ($consultaExistenciaLibro != null) {
            echo 'Error... ya existe';
            die;
        } else {
            //Sino Inserto datos
            $this->db->insert('libro', array(
                'titulo' => $datos['txt_titulo'],
                'autor' => $datos['txt_autor'],
                'categoria' => $datos['txt_categoria'],
                'codigo' => $datos['txt_codigo'],
                'editorial' => $datos['txt_editorial'],
                'inscripcion' => $datos['txt_inscripcion'],
                'fechaPublicacion' => $datos['txt_fechaPublicacion'],
                'lugarPublicacion' => $datos['txt_lugarPublicacion'],
                'isbn' => $datos['txt_isbn'],
                'contenido' => $datos['txt_contenido']));
        }
    }

    public function actualizarLibro($datos) {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaLibro = $this->db->select("SELECT * FROM libro "
                . "WHERE codigo = '" . $datos['txt_codigo'] . "' ");

        if ($consultaExistenciaLibro != null) {
            $posData = array(
                'titulo' => $datos['txt_titulo'],
                'autor' => $datos['txt_autor'],
                'categoria' => $datos['txt_categoria'],
                'codigo' => $datos['txt_codigo'],
                'editorial' => $datos['txt_editorial'],
                'inscripcion' => $datos['txt_inscripcion'],
                'fechaPublicacion' => $datos['txt_fechaPublicacion'],
                'lugarPublicacion' => $datos['txt_lugarPublicacion'],
                'isbn' => $datos['txt_isbn'],
                'contenido' => $datos['txt_contenido']);

            $this->db->update('libro', $posData, "`codigo` = '{$datos['txt_codigo']}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
    }

    public function eliminarLibro($codigo) {
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaLibro = $this->db->select("SELECT * FROM libro "
                . "WHERE codigo = '" . $codigo . "' ");

        if ($consultaExistenciaLibro != null) {
            $this->db->delete('libro', "`codigo` = '{$codigo}'");
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            echo 'Error... no existe';
            die;
        }
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