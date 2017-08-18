<?php

class Solicitud extends Controllers {

    function __construct() {
        parent::__construct();
    }

    function agregarSolicitud() {
        $this->view->title = 'Agregar Solicitud';
        $this->view->render('header');
        $this->view->render('solicitud/agregarSolicitud');
        $this->view->render('footer');
    }

    function cargarSolicitud() {
        $this->view->title = 'Cargar Solicitudes';
        $this->view->render('header');
        $this->view->listaSolicitudes = $this->model->listaSolicitudes();
        $this->view->render('solicitud/cargarSolicitud');
        $this->view->render('footer');
    }

    function editarSolicitud($datos) {
        $this->view->title = 'Editar Solicitud';
        $this->view->render('header');
        $this->view->datosSolicitud = $this->model->datosSolicitud($datos);
        $this->view->render('solicitud/editarSolicitud');
        $this->view->render('footer');
    }

    function eliminarSolicitud($datos) {
        $this->view->title = 'Editar Solicitud';
        $this->model->eliminarSolicitud($datos);
        header("Location:" . URL . "factura/cargarFactura");
    }

    function guardarSolicitud() {
        $datos = array();
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $this->model->guardarSolicitud($datos);
        header("Location:" . URL . "factura/cargarFactura");
    }

    function actualizarSolicitud() {
        $datos = array();
        $datos ['txt_id'] = $_POST['txt_id'];
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $this->model->actualizarSolicitud($datos);
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