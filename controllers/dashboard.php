<?php
class Dashboard extends Controllers {
    function __construct(){
        parent::__construct();
        Auth::handleLogin();
    }
    function index(){
        $this->view->title = 'Empresa';
        $this->view->render('header');
        $this->view->render('dashboard/index');
        $this->view->render('footer');
    }
    function logout(){
       
        Session::destroye();
        header('location: '.URL.'login');
        exit();
    }
}
?>
