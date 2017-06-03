<?php
class Libro extends Controllers {
    function __construct(){
        parent::__construct();
    }
    function agregarLibro(){
        $this->view->title = 'Agregar Libro'; 
        $this->view->render('header');
        $this->view->render('libro/agregarLibro');
        $this->view->render('footer');
    }
    function guardarLibro(){
        echo 'Guardando Libro...';
        echo '<br>Titulo: '.$_POST['txt_Titulo'].'<br>Autor: '.$_POST['txt_Autor'].'<br>Categoria: '.$_POST['txt_Categoria'].'<br>Codigo: '.$_POST['txt_Codigo'];
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
