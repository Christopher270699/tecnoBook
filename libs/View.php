<?php

class View {
    
    function __construct() {
        //echo 'Esto es la vista...';
    }
    public function render($name, $noInclude = false){
        
        require 'views/' . $name . '.php';
    }
}
?>
