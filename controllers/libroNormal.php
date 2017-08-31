<?php

class LibroNormal extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('libroNormal/js/jsLibroNormal.js');
    }

    function buscarEstuRatif() {
        $datos = array();
        $datos ['txt_datosBuscar'] = $_POST['txt_datosBuscar'];
        $campoTabla;
        switch ($_POST['txt_descripcionConsulta']) {
            case 0 :
                break;
            case 1 :
                $datos ['campoTabla'] = 'titulo';
                break;
            case 2 :
                $datos ['campoTabla'] = 'autor';
                break;
            case 3 :
                $datos ['campoTabla'] = 'categoria';
                break;
        }
        $this->model->buscarEstuRatif($datos);
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
