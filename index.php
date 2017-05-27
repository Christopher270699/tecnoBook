<?php
require 'config.php';
require 'util/Auth.php';


//usar un autoloader
function __autoload($class){
    require LIBS . $class . ".php";
}
$bootstrap = new Bootstrap();
$bootstrap->init();
?>
