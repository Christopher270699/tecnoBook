<?php

class Libro extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        Auth::securityLevel();
        $this->view->js = array('libro/js/jsLibro.js');
    }

    function buscarLibro($titulo) {
        $this->model->buscarLibro($titulo);
    }

    function agregarLibro() {
        $this->view->title = 'Agregar Libro';
        $this->view->render('header');
        $this->view->render('libro/agregarLibro');
        $this->view->render('footer');
    }

    function cargarLibros() {
        $this->view->title = 'Cargar Libros';
        $this->view->render('header');
        $this->view->listaLibros = $this->model->listaLibros();
        $this->view->render('libro/cargarLibros');
        $this->view->render('footer');
    }

    function editarLibro($codigo) {
        $this->view->title = 'Editar Libro';
        $this->view->render('header');
        $this->view->datosLibro = $this->model->datosLibro($codigo);
        $this->view->render('libro/editarLibro');
        $this->view->render('footer');
    }

    function eliminarLibro($codigo) {
        $this->view->title = 'Editar Libro';
        $this->model->eliminarLibro($codigo);
        header("Location:" . URL . "libro/cargarLibros");
    }

    function guardarLibro() {
        $datos = array();
        $datos ['txt_titulo'] = $_POST['txt_titulo'];
        $datos ['txt_autor'] = $_POST['txt_autor'];
        $datos ['txt_categoria'] = $_POST['txt_categoria'];
        $datos ['txt_codigo'] = $_POST['txt_codigo'];
        $datos ['txt_editorial'] = $_POST['txt_editorial'];
        $datos ['txt_inscripcion'] = $_POST['txt_inscripcion'];
        $datos ['txt_fechaPublicacion'] = $_POST['txt_fechaPublicacion'];
        $datos ['txt_lugarPublicacion'] = $_POST['txt_lugarPublicacion'];
        $datos ['txt_isbn'] = $_POST['txt_isbn'];
        $datos ['txt_contenido'] = $_POST['txt_contenido'];
        $this->model->guardarLibro($datos);
        header("Location:" . URL . "libro/cargarLibros");
    }

    function actualizarLibro() {
        $datos = array();
        $datos ['txt_titulo'] = $_POST['txt_titulo'];
        $datos ['txt_autor'] = $_POST['txt_autor'];
        $datos ['txt_categoria'] = $_POST['txt_categoria'];
        $datos ['txt_codigo'] = $_POST['txt_codigo'];
        $datos ['txt_editorial'] = $_POST['txt_editorial'];
        $datos ['txt_inscripcion'] = $_POST['txt_inscripcion'];
        $datos ['txt_fechaPublicacion'] = $_POST['txt_fechaPublicacion'];
        $datos ['txt_lugarPublicacion'] = $_POST['txt_lugarPublicacion'];
        $datos ['txt_isbn'] = $_POST['txt_isbn'];
        $datos ['txt_contenido'] = $_POST['txt_contenido'];
        $this->model->actualizarLibro($datos);
        header("Location:" . URL . "libro/cargarLibros");
    }

    function recuperarClave() {
        $this->view->title = 'Recuperar Password';
        $this->view->render('header');
        $this->view->render('login/recuperarClave');
        $this->view->render('footer');
    }

    function run() {
        //llama a la funcion run() de login_model
        $this->model->run();
    }

}

?>
