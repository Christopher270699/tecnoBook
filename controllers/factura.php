<?php

class Factura extends Controllers {

    function __construct() {
        parent::__construct();
    }

    function agregarFactura() {
        $this->view->title = 'Agregar Factura';
        $this->view->render('header');
        $this->view->render('factura/agregarFactura');
        $this->view->render('footer');
    }

    function cargarFactura() {
        $this->view->title = 'Cargar Facturas';
        $this->view->render('header');
        $this->view->listaFacturas = $this->model->listaFacturas();
        $this->view->render('factura/cargarFactura');
        $this->view->render('footer');
    }

    function editarFactura($datos) {
        $this->view->title = 'Editar Libro';
        $this->view->render('header');
        $this->view->datosFactura = $this->model->datosFactura($datos);
        $this->view->render('factura/editarFactura');
        $this->view->render('footer');
    }

    function eliminarFactura($datos) {
        $this->view->title = 'Editar Factura';
        $this->model->eliminarFactura($datos);
        header("Location:" . URL . "factura/cargarFactura");
    }

    function guardarFactura() {
        $datos = array();
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $this->model->guardarFactura($datos);
        header("Location:" . URL . "factura/cargarFactura");
    }

    function actualizarFactura() {
        $datos = array();
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $this->model->actualizarFactura($datos);
        header("Location:" . URL . "factura/cargarFactura");
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
