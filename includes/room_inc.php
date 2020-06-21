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
    // this query will eturn if the room available 
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
    $sql="SELECT * FROM reservation WHERE room_id= '$id'  And (  date_in>'$date_out' or date_out< '$date_in')";
    $result= $db->query($sql);
    $numRows=$result->num_rows;
        
        if($numRows>0){
            return true;
        }else{
        
            return false;
        }
    
}
    
public function getRoomInfo($id){
    // get connection from Db class
         $db = $this->connect();
         $sql="SELECT * FROM rooms WHERE id = '$id' ";
    
        $result= $db->query($sql);
        $numRows=$result->num_rows;
          
            if($numRows > 0 ){

                while($row= $result->fetch_array()){
                    $room[]=$row;
                }
                
                return $room;
                   
            }
    
}
    
    


    }


?>