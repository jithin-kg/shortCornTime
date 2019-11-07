<?php 
class User {
    private $db;

    public function __construct(){
       $this->db = new Database;    
    }
    //Login
    public function login($email, $password){
        //prepare
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(':email', $email);  

        $row = $this->db->single();
        $hashedPassword = $row->password;
        
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
            
        }
    }
    //Register the user
    public function register($data){
        //prepare
        $this->db->query("INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :password, :role,:status)");
        //bind
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', 0);
        $this->db->bind(':status', 1);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
    //Register form Validation
    public function findUserByEmail($email=null){
        if(!$email){
            $this->db->query("SELECT * FROM users");
            $data = $this->db->resultSet();
            return $data;

        }
        $this->db->query("SELECT * FROM users WHERE email = :email AND status=1");
         $this->db->bind(':email', $email);
        $count = $this->db->fetchAllPdo($email);
        if($count > 0 ){

            return true;
        }else{
            return false;
        }
        
    }
    public function delete($id){
        $this->db->query("UPDATE users SET status=0 WHERE id=:id");
        $this->db->bind(':id',$id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }
}