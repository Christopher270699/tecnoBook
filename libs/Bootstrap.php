<?php

class Bootstrap{
    private $_url = null;
    private $_controller = null;
    
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';
    /*
     * Usar init para bootstrap
     */
    public function init(){
        /* Set protegido url */
        $this->_getUrl();
        /* Load defaul controller si la url es set */
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }
        /* Si existe el archivo controller */
        $this->_loadExistingController();
        $this->_callControllerMethod();
    }
    public function setControllerPath($path){
        
        $this->_controllerPath = trim($path, '/') . '/';
    }
    //estaba sin el Path
    public function setModelPath($path){
        
        $this->_modelPath = trim($path, '/') . '/';
    }
    public function setErrorFile($path){
        
        $this->_errorFile = trim($path, '/');
    }
    public function setDefaultFile($path){
        
        $this->_defaultFile = trim($path, '/');
    }
    private function _getUrl(){
        
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
        
    }
    private function _loadDefaultController(){
        require $this->_controllerPath . $this->_defaultFile;    
        $this->_controller = new Index();
        $this->_controller->index();    
    }
    private function _loadExistingController(){
        $file = $this->_controllerPath . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->LoadModel($this->_url[0],$this->_modelPath);
        } else {
            $this->_error();
            return false;
        }
    }
    private function _callControllerMethod(){
        /*llamada a los metodos*/
        
        //
        //url[0] controller
        //url[1] metodo
        //url[2] parametro
        //url[3] parametro
        //url[4] parametro
        
        $length = count($this->_url);
        /*
             * seguridad de que el metodo fue llamado y que existe
             */
        if($length > 1){
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_controller->{$this->_url[1]}();
                $this->_error();
            }
        }
        /*
         * determina que load
         */
        switch($length){
            
            case 5:
                /*Controller parametro 1,2,3*/
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]); 
            break;
        
            case 4:
                /*Controller parametro 1,2*/
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]); 
            break;
        
            case 3:
                /*Controller parametro 1,2*/
                $this->_controller->{$this->_url[1]}($this->_url[2]); 
            break;
        
            case 2:
                /*Controller parametro 1,2*/
                
                $this->_controller->{$this->_url[1]}(); 
                
            break;
        
            default:
                $this->_controller->index(); 
            break;
        }
    }
    /*
     * despliega un error en la pagina si esta no existe
     */
    private function _error(){
        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }
    
}
?>
