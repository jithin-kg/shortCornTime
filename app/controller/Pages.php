<?php

class Pages extends Controller {

    public function __construct(){
        // print( 'Pages insantiated'); 
         $this->videosModel = $this->model('VideoContent');

    }

    public function index(){
        // $posts =  $this->postModel->getPosts();
        

        // $data  = $this->videosModel->listVideos();
        $data = $this->videosModel->listThumbnail();
        
        $this->view('pages/index', $data);  

    }
    public function about(){ //optional $id parameter can be passed to get /about/id
       
        $data = ['title'=>'About'];
        $this->view('pages/about',$data);
       
    }
}