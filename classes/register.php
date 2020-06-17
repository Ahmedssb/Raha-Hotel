<?php 
   session_start(); 

 include '../includes/user_inc.php';

class Register extends User{

  
// get the data validate it and then call function register from the user class    
    
public  function prepareReisterData( $fname, $lname, $email,$password,$conpwd){
         // PHP_EOL to avoid new line 
         $url="../views/register_view.php";
          $url=str_replace(PHP_EOL,'',$url);
    
        // check for empty fields
        if(empty($fname) || empty($lname) || empty($email) || empty( $password) ){
             $_SESSION['error'] = "Fill The Required Fields";  
            header("Location: $url");
            exit();
            
        }else{
            // check if input char is valid  
            
            if(!preg_match("/^[a-zA-Z]*$/",$fname) ||!preg_match("/^[a-zA-Z]*$/",$lname) ){
                        
                        $_SESSION['error'] = "Invalid Inputs";  
                        header("Location: $url");
                        exit();
             }else{
                // check if email is valid 
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        $_SESSION['error'] = "Invalid Email";  
                        header("Location: $url");
                         exit();
                }else{
                     //check for password lenght
                    if(strlen($password) != 6 ){
                        $_SESSION['error'] = "Password Must Be At Least 6 char";  
                        header("Location: $url");
                         exit();
                    }else{

                        if($password != $conpwd) {
                           $_SESSION['error'] = "password doesn't match";  
                            header("Location: $url");
                             exit();
                        }
                        else{
                             // check if the user already has an account using is user exist from user class 
                             $userExist =$this->isUserExist($email);
                            if($userExist){
                                 $_SESSION['error'] = "The user Alredy Has An Account";  
                                header("Location: $url");
                                 exit();
                            }else{

                                    $newUser=$this->register($fname, $lname, $email,  $password);

                                    if( $newUser){
                                        $url="../views/login_view.php";
                                        $url=str_replace(PHP_EOL,'',$url);
                                       header("location: $url");
                                       exit() ;
                                    }else{
                                            $_SESSION['error'] = "Registeration Error";  
                                            header("Location: $url");
                                             exit();
                                    }
                              }
                        }
                    }
                }
            }
    
    
       }
    
}
    
}

  // if is set  call the fun  from the  class above 
      if(isset($_POST['register'])){
          
        // get the data from the form 
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email =  $_POST['email'];
        $password =$_POST['pwd'];
        $conpwd =$_POST['c-pwd'] ;
        $reg = new Register();
          // call fun getRegisterData
         $reg->prepareReisterData($fname,$lname,$email, $password ,$conpwd);
   
        }
      else{
        header("Location: ../");
        exit();
       }
    

?>