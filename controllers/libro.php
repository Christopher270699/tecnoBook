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
    function cargarLibros(){
        $this->view->title = 'Cargar Libros'; 
        $this->view->render('header');
        $this->view->listaLibros = $this->model->listaLibros();
        $this->view->render('libro/cargarLibros');
        $this->view->render('footer');
    }
    function editarLibro($codigo){
        $this->view->title = 'Editar Libro'; 
        $this->view->render('header');
        $this->view->datosLibro = $this->model->datosLibro($codigo);
        $this->view->render('libro/editarLibro');
        $this->view->render('footer');
    }
    function eliminarLibro($codigo){
        $this->view->title = 'Editar Libro';
        $this->model->eliminarLibro($codigo);
        header("Location:" . URL . "libro/cargarLibros");
    }
    function guardarLibro(){
        $datos = array();
        $datos ['txt_titulo'] = $_POST['txt_titulo'];
        $datos ['txt_autor'] = $_POST['txt_autor'];
        $datos ['txt_categoria'] = $_POST['txt_categoria'];
        $datos ['txt_codigo'] = $_POST['txt_codigo'];
        $this->model->guardarLibro($datos);
        header("Location:" . URL . "libro/cargarLibros");
    }
    function actualizarLibro(){
        $datos = array();
        $datos ['txt_titulo'] = $_POST['txt_titulo'];
        $datos ['txt_autor'] = $_POST['txt_autor'];
        $datos ['txt_categoria'] = $_POST['txt_categoria'];
        $datos ['txt_codigo'] = $_POST['txt_codigo'];
        $this->model->actualizarLibro($datos);
        header("Location:" . URL . "libro/cargarLibros");
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
