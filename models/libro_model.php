<?php
Class Libro_Model extends Models{
    
    public function __construct() 
    {
        parent::__construct();
    }
    /* Inserta estudiante Nuevo Libro en la BD */
    public function guardarLibro($datos){
        //Guardo los datos en libro, luego hay que ratificar para que consolide la matricula
        $consultaExistenciaLibro = $this->db->select("SELECT * FROM libro "
                . "WHERE codigo = '" . $datos['txt_codigo'] . "' ");

        if ($consultaExistenciaLibro != null) {
            echo 'Error... ya existe';
            die;
        } else {
            //Sino Inserto datos de Pre-Matricula del Estudiante
            $this->db->insert('libro', array(
                'titulo' => $datos['txt_titulo'],
                'autor' => $datos['txt_autor'],
                'categoria' => $datos['txt_categoria'],
                'codigo' => $datos['txt_codigo']));
            echo 'libro agregado';
            die;
        }
    } 
}
?>