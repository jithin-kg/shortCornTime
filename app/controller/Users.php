<?php 

class Users extends Controller{

    function  __construct (){
        $this->userModel  = $this->model('User'); //calls the model method in Controller
       
    }
    function register(){

        if($_SERVER['REQUEST_METHOD'] =='POST'){   
            //sanitise input data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name'=> trim($_POST['name']),
                'email'=> trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword'=> trim($_POST['password2']),
                'nameErr'=> '',           
                'emailErr'=> '',
                'passwordErr'=>''
            ];


            //validate email
            if(empty($data['name'])){
                $data['nameErr'] = 'Please enter a name';
            }
            if(empty($data['email'])){
                $data['emailErr'] = 'Please enter a valid email';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                $data['emailErr'] = 'Email already exists';
                // }else {
                //         die("Succesfully signed up");
                // }
            }
            if(empty($data['password']) || strlen($data['password']) < 6){
                $data['passwordErr'] = "Use atleast lenght 7 characters";
            }
            if(empty($data['confirmPassword'])){
                $data['passwordErr'] = "Use atleast lenght 7 characters";
            }else if($data['confirmPassword'] != $data['password']){
                $data['passwordErr'] = "password does not match";
            }
            //make sure errors are empty
            if(empty($data['emailErr']) && empty($data['passwordErr'])){
                //validated
                
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register User
                if($this->userModel->register($data)){
                    flash('register_success', 'You have successfully registered and now  login');
                    redirect('users/login');// calls the redirect helper fun
                }else{
                    die("something went wrong");
                }
            }else{
                //load view with errors
                 $this->view('pages/register', $data);
            }
        }
        
    }else {
        //init data
       $data = [
           'name'=> '',
           'email'=> '',
           'password' => '',
           'confirmPassword'=> '',  
           'nameErr'=> '',          
           'emailErr'=> '',
           'passwordErr'=>''
       ];
       $this->view('pages/register',$data);
    }
}

//User login

    function login(){
        if($_SERVER['REQUEST_METHOD'] =='POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email'=> trim($_POST['email']),
                'password' => trim($_POST['password']),         
                'emailErr'=> '',
                'passwordErr'=>''
            ];
            
            if(empty($data['email'])){
                $data['emailErr'] = 'Please enter a valid email';
            }
            if(empty($data['password'])){
                $data['passwordErr'] = "Please Enter a password";
            }
           
            if($this->userModel->findUserByEmail($data['email'])){
                if(empty($data['emailErr'] && empty( $data['passwordErr']))){
                    //validated 
                    //check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
    
                    if($loggedInUser){
                        //set session
                        $this->createUserSession($loggedInUser);
                    }else{
                        $data['passwordErr'] = "Password incorrect";
                        $this->view('pages/login', $data);
                    }
                } 
            }  else{
                $data['emailErr'] = "The email is not  registered";
                $this->view('pages/login', $data);
            }  
            
               
                
            }else{
        $data = [
            
            'email'=> '',
            'password' => '',
            'emailErr'=> '',
            'passwordErr'=>''
        ];
        $this->view('pages/login', $data);
        }

    }
    //Create user session helper
    function createUserSession($user){
        $_SESSION['userId'] = $user->id;
        $_SESSION['userName'] = $user->name;
        $_SESSION['userEmail'] = $user->email;
        $_SESSION['role']  = $user->role;
        if($user->role != 1){
        redirect('pages');
        }else{
            // $data = $this->userModel->findUserByEmail();
            // $this->view('pages/adminHome',$data);
            redirect('users/adminHome');
        }


    }

    public function adminHome(){
        $data = $this->userModel->findUserByEmail();
        $this->view('pages/adminHome',$data);
    }

    //logout 
    public function logout(){
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);
        session_destroy();
        redirect('users/login');
    }

    public function delete(){
        
        if($this->userModel->delete($_GET['userId'])){

            redirect('adminHome');
        }
    }

   
}