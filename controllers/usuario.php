<?php
class Usuario extends Controllers {
    function __construct(){
        parent::__construct();
    }
    function agregarUsuario(){
        $this->view->title = 'Agregar Usuario'; 
        $this->view->render('header');
        $this->view->render('usuario/agregarUsuario');
        $this->view->render('footer');
    }
    function cargarUsuario(){
        $this->view->title = 'Cargar Usuarios'; 
        $this->view->render('header');
        $this->view->listaUsuarios = $this->model->listaUsuarios();
        $this->view->render('usuario/cargarUsuario');
        $this->view->render('footer');
    }
    function editarUsuario($datos){
        $this->view->title = 'Editar Usuario'; 
        $this->view->render('header');
        $this->view->datosUsuario = $this->model->datosUsuario($datos);
        $this->view->render('usuario/editarUsuario');
        $this->view->render('footer');
    }
    function eliminarUsuario($datos){
        $this->view->title = 'Editar Usuario';
        $this->model->eliminarUsuario($datos);
        header("Location:" . URL . "usuario/cargarUsuario");
    }
    function guardarUsuario(){
        $datos = array();
        $datos ['txt_nombreUsuario'] = $_POST['txt_nombreUsuario'];
        $datos ['txt_password'] = $_POST['txt_password'];
        $datos ['txt_cedula'] = $_POST['txt_cedula'];
        $datos ['txt_correo'] = $_POST['txt_correo'];
        $datos ['txt_telefono'] = $_POST['txt_telefono'];
        $datos ['txt_seccion'] = $_POST['txt_seccion'];
        $this->model->guardarUsuario($datos);
        header("Location:" . URL . "usuario/cargarUsuario");
    }
    function actualizarUsuario(){
        $datos = array();
        $datos ['txt_nombreUsuario'] = $_POST['txt_nombreUsuario'];
        $datos ['txt_password'] = $_POST['txt_password'];
        $datos ['txt_cedula'] = $_POST['txt_cedula'];
        $datos ['txt_correo'] = $_POST['txt_correo'];
        $datos ['txt_telefono'] = $_POST['txt_telefono'];
        $datos ['txt_seccion'] = $_POST['txt_seccion'];
        $this->model->actualizarUsuario($datos);
        header("Location:" . URL . "usuario/cargarUsuario");
    }
    function recuperarClave(){
        $this->view->title = 'Recuperar Password'; 
        $this->view->render('header');
        $this->view->render('login/recuperarClave');
        $this->view->render('footer');
    }
    function run(){
        //llama a la funcion run() de login_model
        $this->model->run();
    }
}
?>
