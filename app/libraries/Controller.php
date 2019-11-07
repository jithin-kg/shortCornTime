<?php
/*
  *Base controller
  *Loads the models and views
  */
  
class controller{
    public function __construct(){
        // $this->postModel = $this->model('Post');
    }

    function model($model){
        //require model file
         require_once '../app/models/'.$model.'.php';

        //instantiate new model
        return new $model();

    }

    //Load view 
    public function view($view, $data = []){
        if(file_exists('../app/views/' .$view.'.php')){
            require_once '../app/views/'.$view.'.php';
        }else {
            die('View does not exists');
        }
    }
}