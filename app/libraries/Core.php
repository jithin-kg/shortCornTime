<?php
//app core class 
//create url loads core controller
//url format //controller/methods/params 
class Core {

    public $currentController = "Pages";
   
    protected $currentMethod = 'index';
    protected $params = [];
    
    public function __construct(){
       
        $url = $this->getUrl();
        // print_r(gettype($url[0]));
        
        

        if(file_exists('../app/controller/'.ucwords($url[0]).'.php')){
            if(!is_null($url[0]) && $url[0] != ""){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
            }
            //unset 0 index
            // print($this->$currentController);
            
        }
        
        //require the controller
        require_once '../app/controller/'.$this->currentController.'.php';
        //instantiate the controller class
         $this->currentController = new $this->currentController;  

         //check for second part of url

         if(isset($url[1])){
             //check to see if method exists in controller
             if(method_exists($this->currentController, $url[1])){
                 $this->currentMethod = $url[1]; 

                 //unset 1 index
                 unset($url[1]);
                 unset($url[0]);

             }
         }

         //echo '  ' .$this->currentMethod;
         //get params
         $this->params = $url ? array_values($url) : [];

         //call a callback with array of params
         call_user_func_array([$this->currentController,$this->currentMethod], $this->params);
    }
    public function getUrl(){
       
        // print($this->currentController);
       if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/',$url);
        return $url;
       }
    }
}