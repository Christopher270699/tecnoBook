<?php

class LibroNormal extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('libroNormal/js/jsLibroNormal.js');
    }

     function buscarEstuRatif($ced_estudiante) {
        $this->model->buscarEstuRatif($ced_estudiante);
    }   

    function cargarLibros() {
        $this->view->title = 'Cargar Libros';
        $this->view->render('header');
        $this->view->listaLibros = $this->model->listaLibros();
        $this->view->render('libroNormal/cargarLibros');
        $this->view->render('footer');
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
