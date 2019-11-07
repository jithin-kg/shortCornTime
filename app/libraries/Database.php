<?php
/* Pdo database class
 * Connect to database
 * Create prepared values
 * Bind values
 * Return rows and results
 */

 class Database{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmnt;
    private $error;
    
    function __construct(){
        $dsn = 'mysql:host='.$this->host . ';dbname=' . $this->dbname;
        $option = array(
            PDO:: ATTR_PERSISTENT => true,
            PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
        );

        //create pdo instance 
        try {
            $this->dbh =  new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $this->error;
        }
    }
    //prepare statement query
    public function query($sql){
        $this->stmnt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
               case is_bool($value):
                    $type = PDO :: PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO :: PARAM_NULL;
                    break;
                case is_int($value):
                    $type = PDO :: PARAM_INT;
                    break;
                default:
                    $type = PDO :: PARAM_STR;
                  
            }   
        }
        $this->stmnt->bindParam($param, $value, $type);
    }

    //execute the prepared statement
    public function execute(){
        // return $this->stmnt->execute();
        return $this->stmnt->execute();
        // return $lastId;
        

    }
    //get result set as  array of objects
    public function resultSet(){
        $this->execute();
        return $this->stmnt->fetchAll(PDO :: FETCH_OBJ);
    }

    //get single record as object
    public function single(){
        $this->execute();
        return $this->stmnt->fetch(PDO :: FETCH_OBJ);
    }

    //GET ROW COUNT
    public function rowCount(){
        
        $count = $this->stmnt->rowCount();
        // $arr = array('result')
        return $count;

    }
    // $this->stmnt = $this->dbh->prepare($sql);

    //my function 
    public function fetchAllPdo($email){
        $this->stmnt->execute(['email' =>$email]);
        // $this->stmnt->fetchAll(PDO::FETCH_OBJ);
        $result = $this->stmnt->fetchAll(PDO :: FETCH_OBJ);
       return $this->rowCount();
    }
    //insert video and description
    public function executeVideoNdes(){
        $this->execute();
        $lastId =  $this->dbh->lastInsertId();
        return $lastId;
        // $this->query(" SELECT videoId from  videoAndDescription WHERE  ") 
        // $this->stmnt->fetchAll(PDO :: FETCH_OBJ);

    }

    // public function lastInserted(){
    //     // return $this->dbh->lastInserted();
    // }
 }
 