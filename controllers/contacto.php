<?php

class Contacto extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    function acercaDeNosotros() {
        $this->view->title = 'Acerca De Nosotros...';
        $this->view->render('header');
        $this->view->render('contacto/acercaDeNosotros');
        $this->view->render('footer');
    }
    
    function acercaDeBiblioCRA() {
        $this->view->title = 'Acerca De BiblioCRA...';
        $this->view->render('header');
        $this->view->render('contacto/acercaDeBiblioCRA');
        $this->view->render('footer');
    }

    function run() {
        //llama a la funcion run() de login_model
        $this->model->run();
    }

}

?>
