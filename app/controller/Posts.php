<?php
class Posts extends Controller{
    private $ImagePath;

    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->postModel = $this->model('VideoContent');
    }
    public function index(){
        $data = [];
         $data = $this->postModel->listThumbnail($_SESSION['userId']);
        
        $this->view('posts/index', $data);

    }
    public function adminHome(){
        $data = [];
        $this->view('pages/adminHome',$data);
    }
    
    public function upload(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
            $targetDirectory = dirname(APPROOT).'/public/uploadedVideos/';
            
        
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'description'=> trim($_POST['description']),
                'uploader'=> $_SESSION['userId'],
                'director'=>trim($_POST['directors']),
                'starring'=> trim($_POST['starring']),
                'supportingActors'=> trim($_POST['supportingActors']),
                'videoTitle'=> trim($_POST['videoTitle']),
                 'ageRestriction'=> trim((isset($_POST['ageRestriction']))? 1 : 0),
            ];
    


            //video file uploading
            $targetFile = $targetDirectory.basename($_FILES["fileToUpload"]["name"]);

            $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
            if($fileType!= "mp4" && $fileType != "avi" && $fileType != "mov" && $fileType != "3gp" && $fileType != "mpeg"){
                echo "File type not supported";
            }else{
                
                $videoPath=$_FILES['fileToUpload']['name'];

            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$targetFile)){
                // if($this->postModel->uploadVideo($videoPath)){
                    
                    if($this->imageUpload($data)){
                        if($this->postModel->uploadVideoAndDescription($videoPath, $data, $this->ImagePath)){
                           redirect('posts');
                            // die(" File uploaded succesfully");  
                        }
                            
                    }else{
                            die("Something went wrong while uploading fiels");
                    }
                // }
               


            }


            }
            //prepare 
        }
        $this->view('posts/upload');
    }
    public function imageUpload($data){

            //thubnail image uploading
            $thumbanilTargetDir =  dirname(APPROOT).'/public/uploadedThumbnails/';
            $targethumbImg = $thumbanilTargetDir.basename($_FILES['thumbanilImg']['name']);
            $thumbnailType = pathinfo($targethumbImg, PATHINFO_EXTENSION);
            if($thumbnailType!= "jpeg" && $thumbnailType != "jpg" && $thumbnailType != "png" && $thumbnailType != "gif"){
                echo "File type not supported";
            }else{
                $this->ImagePath=$_FILES['thumbanilImg']['name'];

                if(move_uploaded_file($_FILES['thumbanilImg']['tmp_name'],$targethumbImg)){
                    // $this->postModel->uploadImage($ImagePath,$data);
    
                   return true;    
    
                }else{
                    return false;
                }

            }
    }
    public function getSingleVideo(){

        $id = $_GET['videoLink'];
        $data = $this->postModel->getAVideo($id);
       $this->view('posts/movieView', $data); 

    }
    public function searchVideos(){
        echo "Video search";
    }
}