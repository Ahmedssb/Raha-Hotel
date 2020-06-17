<?php 

include '../includes/db_inc.php';

class User extends Db{
    
 protected function register($fname,$lname,$email,$password){
          
         // get connection from Db class
         $db = $this->connect();
       // escap unwanted char 
       
   
       $fname = mysqli_real_escape_string($db,$_POST['fname']);
        $lname =  mysqli_real_escape_string($db,$_POST['lname']);
        $email =  mysqli_real_escape_string($db,$_POST['email']);
        $password =  mysqli_real_escape_string($db,$_POST['pwd']);
         // hash the password 
        $hashPwd = password_hash($password,PASSWORD_DEFAULT);
     
       
         $sql=" INSERT INTO users (firstName,lastName,email,password) VALUES ('$fname','$lname','$email','$hashPwd')";
         
           if($db->query($sql)){
                    return true;
                }else{
                     
                    return false;
                }         
   } 
    
    // check if the user alredy has an account 
 protected function isUserExist($email){
        $db = $this->connect();
        $sql="SELECT email FROM users  WHERE email= '$email' "; 
        $result= $db->query($sql);
        $numRows=$result->num_rows;
        
        if($numRows>0){
            return true;
        }else{
        
            return false;
        }
        
    }
    
    
 protected function login($email,$password){
        $db = $this->connect();
        $sql=" SELECT * FROM users  WHERE email= '$email' "; 
        $result= $db->query($sql);
        $numRows=$result->num_rows;
        
        if($numRows==1){
            
            $userdata = $this->getUserData($email);  
                 // check if the pass user write match the one stored on the data base using verify pass method 
               if(password_verify($password,$userdata['password'])) { 
                     return TRUE; 
                }
        }else{
        
            return false;
        }
    
  }
    
 function getUserData($email) {
        $db = $this->connect();
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $query = $db->query($sql);
        $result = $query->fetch_assoc();
        return $result; 
   
}

}

?>