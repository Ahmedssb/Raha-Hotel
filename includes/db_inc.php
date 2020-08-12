<?php 

class Db{
    
  private $servername;  
  private $username;  
  private $password;  
  private $dbname;  
  
  protected function connect(){
     
     $this->servername="mwgmw3rs78pvwk4e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
     $this->username="e4piizvb48ksp8at";
     $this->password="ac26spjq5jfrfcvp";
     $this->dbname="dlt5u28962rug948";
     
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
