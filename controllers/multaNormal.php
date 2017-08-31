<?php

class MultaNormal extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('multaNormal/js/jsMultaNormal.js');
    }

    function cargarMultaNormal() {
        $this->view->title = 'Cargar Multas';
        $this->view->render('header');
        $this->view->listaMultaNormal = $this->model->listaMultaNormal();
        $this->view->render('multaNormal/cargarMultaNormal');
        $this->view->render('footer');
    }

    function run() {
        //llama a la funcion run() de login_model
        $this->model->run();
    }
}

?>
