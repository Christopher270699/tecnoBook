<?php

class SolicitudNormal extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('solicitudNormal/js/jsSolicitud.js');
    }

    function agregarSolicitud() {
        $this->view->title = 'Agregar Solicitud';
        $this->view->render('header');
        $this->view->listaLibros = $this->model->listaLibros();
        $this->view->render('solicitudNormal/agregarSolicitud');
        $this->view->render('footer');
    }

    function aceptarSolicitud($id) {
        $this->view->title = 'Aceptar Solicitud';
        $this->model->aceptarSolicitud($id);
        header("Location:" . URL . "solicitudNormal/cargarSolicitud");
    }

    function cargarSolicitud() {
        $this->view->title = 'Cargar Solicitudes';
        $this->view->render('header');
        $this->view->listaSolicitudes = $this->model->listaSolicitudes();
        $this->view->render('solicitudNormal/cargarSolicitud');
        $this->view->render('footer');
    }

    function editarSolicitud($datos) {
        $this->view->title = 'Editar Solicitud';
        $this->view->render('header');
        $this->view->datosSolicitud = $this->model->datosSolicitud($datos);
        $this->view->render('solicitudNormal/editarSolicitud');
        $this->view->render('footer');
    }

    function eliminarSolicitud($id) {
        $this->view->title = 'Editar Solicitud';
        $this->model->eliminarSolicitud($id);
        header("Location:" . URL . "solicitudNormal/cargarSolicitud");
    }

    function volverFormulario() {
        $this->view->title = 'Agregar Solicitud';
        $this->view->render('header');
        $this->view->render('solicitudNormal/agregarSolicitud');
        $this->view->render('footer');
    }

    function guardarSolicitud() {
        $datos = array();
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $fechaIngreso = new DateTime($datos['txt_fechaPedido']);
        $fechaSalida = new DateTime($datos['txt_fechaEntrega']);
        $diferenciaDias = $fechaIngreso->diff($fechaSalida);
        if ((int) $diferenciaDias->format('%R%a') < 0 || (int) $diferenciaDias->format('%R%a') > 14) {
            $this->view->title = 'ERROR';
            $this->view->render('header');
            $this->view->render('error/errorFechas');
            $this->view->render('footer');
        } else {
            $this->model->guardarSolicitud($datos);
            header("Location:" . URL . "solicitudNormal/cargarSolicitud");
        }
    }

    function actualizarSolicitud() {
        $datos = array();
        $datos ['txt_id'] = $_POST['txt_id'];
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $this->model->actualizarSolicitud($datos);
        header("Location:" . URL . "solicitudNormal/cargarSolicitud");
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
