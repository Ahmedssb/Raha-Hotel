<?php 

class Db{
    
  private $servername;  
  private $username;  
  private $password;  
  private $dbname;  
  
  protected function connect(){
     
     $this->servername="localhost";
     $this->username="sami";
     $this->password="215";
     $this->dbname="hotel";
     
     $conn = new mysqli( $this->servername,$this->username, $this->password, $this->dbname);
     
     $conn ->query("SET NAMES 'utf8'");
         $conn ->query('SET CHARACTER SET utf8');
        
        if ($conn->connect_error) {
             die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
                  }
       return $conn;
 }    
    
}


?>