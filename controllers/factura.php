<?php

class Factura extends Controllers {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
        Auth::securityLevel();
        $this->view->js = array('factura/js/jsFactura.js');
    }

    function multarFactura($id) {
        $this->view->title = 'Multar Factura';
        $this->model->multarFactura($id);
        header("Location:" . URL . "factura/cargarFactura");
    }

    function agregarFactura() {
        $this->view->title = 'Agregar Factura';
        $this->view->render('header');
        $this->view->consultaNiveles = $this->model->consultaNiveles();
        $this->view->listaLibros = $this->model->listaLibros();
        $this->view->render('factura/agregarFactura');
        $this->view->render('footer');
    }

//cb Estudiantes
    function cargaGrupos($idNivel) {
        $this->model->cargaGrupos($idNivel);
    }

    function cargaSeccion() {
        $consulta = array();
        $consulta['nivelSeleccionado'] = $_POST['nivelSeleccionado'];
        $consulta['grupoSeleccionado'] = $_POST['grupoSeleccionado'];
        $this->model->cargaSeccion($consulta);
    }//Fin cb

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

    function cargarFactura() {
        $this->view->title = 'Cargar Facturas';
        $this->view->render('header');
        $this->view->listaFacturas = $this->model->listaFacturas();
        $this->view->render('factura/cargarFactura');
        $this->view->render('footer');
    }

    function editarFactura($datos) {
        $this->view->title = 'Editar Factura';
        $this->view->render('header');
        $this->view->datosFactura = $this->model->datosFactura($datos);
        $this->view->render('factura/editarFactura');
        $this->view->render('footer');
    }

    function eliminarFactura($id) {
        $this->view->title = 'Editar Factura';
        $this->model->eliminarFactura($id);
        header("Location:" . URL . "factura/cargarFactura");
    }

    function guardarFactura() {
        $datos = array();
        $datos ['txt_nombreLibro'] = $_POST['txt_nombreLibro'];
        $datos ['txt_nombreEstudiante'] = $_POST['txt_nombreEstudiante'];
        $datos ['txt_fechaPedido'] = $_POST['txt_fechaPedido'];
        $datos ['txt_fechaEntrega'] = $_POST['txt_fechaEntrega'];
        $datos ['txt_cedula'] = $_POST['txt_cedula'];
        $fechaIngreso = new DateTime($datos['txt_fechaPedido']);
        $fechaSalida = new DateTime($datos['txt_fechaEntrega']);
        $diferenciaDias = $fechaIngreso->diff($fechaSalida);
        if ((int) $diferenciaDias->format('%R%a') < 0 || (int) $diferenciaDias->format('%R%a') > 14) {
            $this->view->title = 'ERROR';
            $this->view->render('header');
            $this->view->render('error/errorFechas');
            $this->view->render('footer');
        } else {
            $this->model->guardarFactura($datos);
            header("Location:" . URL . "factura/cargarFactura");
        }
    }

    function actualizarFactura() {
        $datos = array();
        $datos ['txt_id'] = $_POST['txt_id'];
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
            $this->view->render('error/errorFechasEditar');
            $this->view->render('footer');
        } else {
            $this->model->actualizarFactura($datos);
            header("Location:" . URL . "factura/cargarFactura");
        }
    }

    function volverFormularioEditar() {
        $this->view->title = 'Agregar Solicitud';
        $this->view->render('header');
        $this->view->listaFacturas = $this->model->listaFacturas();
        $this->view->render('factura/cargarFactura');
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
