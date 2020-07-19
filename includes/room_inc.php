<?php
include '../includes/db_inc.php';

class Room extends Db{
    
    
    
protected function getAllRooms(){
    
}   
    
protected function getRoomsByDateAndType($date_in,$date_out,$type){
    
     // get connection from Db class
         $db = $this->connect();
         $sql="SELECT * FROM rooms WHERE type = '$type' ";
    
        $result= $db->query($sql);
        $numRows=$result->num_rows;
          // create rooms array
         $rooms = array() ;
            if($numRows > 0 ){

                while($row= $result->fetch_array()){
                    $rooms[]=$row;
                }
                   
            }

             // get the available rooms only 
             $avilable_rooms= array();
            foreach($rooms as $room){
               $isAvailable= $this->isRoomAvailable($room['id'],$date_in,$date_out);
                if($isAvailable){
                 $avilable_rooms[] = $room; 
                }
            }
    
    return $avilable_rooms;
}
    
protected function isRoomAvailable($id,$date_in,$date_out){
    
     $db = $this->connect();
    
      // first check room by id if it exists in the reservation table if it is not exists then it is available all the time
     $sql1="SELECT * FROM reservations WHERE room_id= '$id' ";
     $result= $db->query($sql1);
      $numRows1=$result->num_rows;
        
        if($numRows1>0){
            
               // if room exists in the reservations table then check the period
                 /*
                 3-4
                8-10
                6-11                      reserved period
                ------------------ in 5 ------------------ out 7-------------------
                 the room will be availbel if 
                user reservation:  exists reservation  
                date in > date out 
                date out < date in
                */
                // the below query check for available periods
                     $sql2="SELECT * FROM reservations WHERE room_id= '$id'  And (  date_in>'$date_out' or date_out< '$date_in')";
                    $result= $db->query($sql2);
                    $numRows2=$result->num_rows;
                     if($numRows2>0){
                            
                            return true;
                        }else{
                          return false;
                        }
                 
                } else{
             return true;
            
               }
    
    
}
    
protected function getRoomInfo($id){
    // get connection from Db class
         $db = $this->connect();
         $sql="SELECT * FROM rooms WHERE id = '$id' ";
    
        $result= $db->query($sql);
        $numRows=$result->num_rows;
          
            if($numRows > 0 ){

                while($row= $result->fetch_array()){
                    $room[]=$row;
                }
                $room=$this->array_flatten($room);
                return $room;
                   
            }   
}
    
public function makeResevation($rid,$uid,$date_in,$date_out,$bill){
    
     // get connection from Db class
         $db = $this->connect();
       // escap unwanted char 
       
   
        $rid = mysqli_real_escape_string($db,$rid);
        $uid =  mysqli_real_escape_string($db,$uid);
        $date_in =  mysqli_real_escape_string($db,$date_in);
        $date_out =  mysqli_real_escape_string($db,$date_out);
        $bill =  mysqli_real_escape_string($db,$bill);

       
         $sql=" INSERT INTO reservations (room_id,user_id,date_in,date_out,bill) VALUES ('$rid','$uid','$date_in','$date_out',$bill)";
         
           if($db->query($sql)){
                   $last_id=mysqli_insert_id($db);
                   // return the resevation id
                   return $last_id;
                }      
} 
    
public function getReservationData($id){
    // get connection from Db class
         $db = $this->connect();
         $sql="SELECT * FROM reservations WHERE id = '$id' ";
    
        $result= $db->query($sql);
        $numRows=$result->num_rows;
          
            if($numRows > 0 ){

                while($row= $result->fetch_array()){
                    $room[]=$row;
                }
                $room=$this->array_flatten($room);
                return $room;
                   
            }
    
}



//this function convert multudimensiol array into single array 
function array_flatten($array) { 
              if (!is_array($array)) { 
                return FALSE; 
              } 
              $result = array(); 
              foreach ($array as $key => $value) { 
                if (is_array($value)) { 
                  $result = array_merge($result, $this->array_flatten($value)); 
                } 
                else { 
                  $result[$key] = $value; 
                } 
              } 
              return $result; 
        }
    


}


?>