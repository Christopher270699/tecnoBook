<?php

class FacturaNormal extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('factura/js/jsFactura.js');
    }
    
    function cargarFacturaNormal() {
        $this->view->title = 'Cargar Facturas';
        $this->view->render('header');
        $this->view->listaFacturas = $this->model->listaFacturas();
        $this->view->render('facturaNormal/cargarFacturaNormal');
        $this->view->render('footer');
    }
    
    function run() {
        //llama a la funcion run() de login_model
        $this->model->run();
    }

}

?>
