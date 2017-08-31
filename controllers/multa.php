<?php

class Multa extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        Auth::securityLevel();
        $this->view->js = array('multa/js/jsMulta.js');
    }

    function buscarEstuRatif() {
        $datos = array();
        $datos ['txt_datosBuscar'] = $_POST['txt_datosBuscar'];
        $campoTabla;
        switch ($_POST['txt_descripcionConsulta']) {
            case 0 :
                break;
            case 1 :
                $datos ['campoTabla'] = 'nombreLibro';
                break;
            case 2 :
                $datos ['campoTabla'] = 'nombreEstudiante';
                break;
        }
        $this->model->buscarEstuRatif($datos);
    }

    function cargarMulta() {
        $this->view->title = 'Cargar Multas';
        $this->view->render('header');
        $this->view->listaMultas = $this->model->listaMultas();
        $this->view->render('multa/cargarMulta');
        $this->view->render('footer');
    }

    function eliminarMulta($id) {
        $this->view->title = 'Editar Factura';
        $this->model->eliminarMulta($id);
        header("Location:" . URL . "multa/cargarMulta");
    }

    function run() {
        //llama a la funcion run() de login_model
        $this->model->run();
    }

}

?>
