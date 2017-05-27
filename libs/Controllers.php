<?php
class Controllers{
    function __construct() {
        $this->view = new View();
    }
    public function loadModel($name, $modelPath = 'models/'){
        
        $path = $modelPath . $name . '_model.php';
        if(file_exists($path)){
            require $modelPath . $name . '_model.php';
            $modelName = $name .'_Model';
            $this->model = new $modelName();
        }
    }
}
?>
