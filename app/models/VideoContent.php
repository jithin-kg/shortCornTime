<?php
class VideoContent{
 
    private $db;
    private $row;

    public function __construct(){
        $this->db = new Database;
    }
    public function uploadVideo($videoPath){

        $this->db->query("INSERT INTO uploadedVIdeos (videoName) values(:videoPath)");
        $this->db->bind(':videoPath', $videoPath);

        if($this->db->execute()){
            $this->db->query("SELECT max(videoId) as videoId from uploadedVIdeos");
            $this->row = $this->db->single(); 
            $this->row = $this->row->videoId;  

            return true;
        }else{
            return false;
        }

    }
    public function uploadImage($imagePath, $data){
        
        ($data['ageRestriction'] === '1') ? $data['ageRestriction'] =1: $data['ageRestriction'] =0;

        $this->db->query("INSERT INTO videoDescription (description,directors, supportingActors,ageRestriction, imagePath, videoTitle) values(:description, :directors, :supportingActors, :ageRestriction, :imagePath, :videoTitle, :videoPath)");
        $this->db->bind(':imagePath', $imagePath);
        $this->db->bind(':directors', $data['directors']);       
        $this->db->bind(':supportingActors', $data['supportingActors']);
        $this->db->bind(':ageRestriction', $data['ageRestriction']);
        $this->db->bind('row', $this->row);
        $this->db->bind('videoTitle',$data['videoTitle']);
        $this->db->bind(':description', $data['description']);


        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function listVideos($id){
        $this->db->query("SELECT * FROM uploadedVIdeos");
        $data = $this->db->resultSet();
            return $data;
    }

    //list thubmnails
    public function listThumbnail($id=null){
        if($id){
            $this->db->query("SELECT * FROM videoAndDescription WHERE uploaderId=:id");
            $this->db->bind(':id', $id);
            $data = $this->db->resultSet();
            return $data;
        }
        $this->db->query("SELECT * FROM videoAndDescription");
        $data = $this->db->resultSet();
            return $data;
    }
    public function uploadVideoAndDescription($videoPath, $data, $imagePath){
          
        ($data['ageRestriction'] === '1') ? $data['ageRestriction'] =1: $data['ageRestriction'] =0;

        $this->db->query("INSERT INTO videoAndDescription (description,directors, uploaderId,ageRestriction, imagePath, videoTitle, videoName) values(:description, :directors, :uploaderId, :ageRestriction, :imagePath, :videoTitle, :videoPath)");
       
        $this->db->bind(':imagePath', $imagePath);
        $this->db->bind(':directors', $data['director']);       
        $this->db->bind(':uploaderId',$_SESSION['userId']);
        $this->db->bind(':ageRestriction', $data['ageRestriction']);
        $this->db->bind('videoTitle',$data['videoTitle']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':videoPath', $videoPath);
        $this->db->bind(':imagePath', $imagePath);



        $videoId = $this->db->executeVideoNdes();
        $status = true;

        if($videoId){
        // $lastId = $this->db->lastInserted();
            $arrSupportingActors = explode(",",$data['supportingActors']);
            foreach ($arrSupportingActors as $val){
            $this->db->query('INSERT INTO supportingActors (videoId, supportingActors) values(:videoId, :supportingActors)');
            $this->db->bind(':videoId', $videoId);
            $this->db->bind(':supportingActors', $val);
            if(!($this->db->execute())){
                $status  = false;
            }        

            }
            // if($this->db->execute()){
            //     return true;
            // }
        }
        return $status;
        // else{
            // return false;
        // }
    }
    public function getAVideo($id){
        $this->db->query("SELECT * FROM videoAndDescription WHERE videoId = :id");
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet();
            return $data;

    }
}