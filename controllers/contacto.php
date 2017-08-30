<?php

class Contacto extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    function acercaDe() {
        $this->view->title = 'Acerca De...';
        $this->view->render('header');
        $this->view->render('contacto/acercaDe');
        $this->view->render('footer');
    }

    function run() {
        //llama a la funcion run() de login_model
        $this->model->run();
    }

}

?>
