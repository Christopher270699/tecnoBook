<?php
Class Login_Model extends Models{
    
    public function __construct() 
    {
        parent::__construct();
    }
    public function run(){
        
        $sth = $this->db->prepare("SELECT * FROM usuario WHERE 
            nombreUsuario = :tf_usuario AND password = :tf_clave");
        
        $sth->execute(
                array(  ':tf_usuario'   => $_POST['tf_usuario'],
                        ':tf_clave'     =>Hash::create('md5', $_POST['tf_clave'],HASH_PASSWORD_KEY)
                    ));
        $data = $sth->fetch();
        $count = $sth->rowCount(); 
        if($count > 0){
            Session::init();
            Session::set('tipoUsuario',$data['tipoUsuario']);
            Session::set('nombre',$data['nombre']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        }else{
                header('location: ../login');
            }
    } 
}

?>
