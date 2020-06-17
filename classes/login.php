<?php 
   session_start(); 

 include '../includes/user_inc.php';

class Login extends User{
    
 public function prepareLoginData($email, $password){
     
      // check for empty fields
        if( empty($email) || empty( $password) ){
            $_SESSION['error'] = "Fill The Required Fields";  
          // PHP_EOL to avoid new line 
            $url="../views/login_view.php";
            $url=str_replace(PHP_EOL,'',$url);
            header("Location: $url");
            exit();
            
        }else{
             // check if email is valid 
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                       // PHP_EOL to avoid new line 
                        $_SESSION['error'] = "Invalid Email";  
                        $url="../views/login_view.php";
                        $url=str_replace(PHP_EOL,'',$url);
                        header("Location: $url");
                        exit();
                }else{
                        
                    // call login funxtion from the user class
                    $user=$this->login($email,$password);
                    
                    if($user){
                          // active the logged session 
                         $_SESSION['logged'] = true;  
                         header("location:..\index.php");
                         exit();
                    }else{
                        
                         // PHP_EOL to avoid new line 
                        $_SESSION['error'] = "Invalid Email Or Password";  
                        $url="../views/login_view.php";
                        $url=str_replace(PHP_EOL,'',$url);
                         header("location: $url");
                         exit();
                    }

                }     
        }
     
 } 
    
}


 // if is set  call the fun  from the  class above 
      if(isset($_POST['login'])){
          
        // get the data from the form 
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $log = new Login();
          // call fun getLoginData
         $log->prepareLoginData($email, $password);
   
        }
      else{
        header("Location: ../");
        exit();
       }
    
