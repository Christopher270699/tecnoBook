<?php
class Libro extends Controllers {
    function __construct(){
        parent::__construct();
    }
    function agregarLibro(){
        $this->view->title = 'Agregar Libro'; 
        $this->view->render('header');
        $this->view->render('libro/agregarLibro');
        $this->view->render('footer');
    }
    function guardarLibro(){
        $datos = array();
        $datos ['txt_titulo'] = $_POST['txt_titulo'];
        $datos ['txt_autor'] = $_POST['txt_autor'];
        $datos ['txt_categoria'] = $_POST['txt_categoria'];
        $datos ['txt_codigo'] = $_POST['txt_codigo'];
        $this->model->guardarLibro($datos);
    }
    function recuperarClave(){
        $this->view->title = 'Recuperar Password'; 
        $this->view->render('header');
        $this->view->render('login/recuperarClave');
        $this->view->render('footer');
    }
    function run(){
        //llama a la funcion run() de login_model
        $this->model->run();
    }
}
?>
