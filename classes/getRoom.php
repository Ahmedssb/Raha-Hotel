<?php 
   session_start(); 

include '../includes/room_inc.php';

class GetRoom extends Room{


public function checkroom($date_in,$date_out,$type){
    
   $avilable_rooms= $this->getRoomsByDateAndType($date_in,$date_out,$type);
    
    /* foreach($avilable_rooms as $room){
         
         print_r ($room);
         echo "<br>";
     }*/
     return $avilable_rooms;
}    
    
}


// if is set  call the fun  from the  class above 
      if(isset($_POST['checkRoom'])){
          
        // get the data from the form 
        $date_in = $_POST['date_in'];
        $date_out = $_POST['date_out'];
        $type = $_POST['type'];
           
          
        $room = new GetRoom();
          // call fun checkroom
         $availableRooms=$room->checkroom($date_in,$date_out,$type);
         $_SESSION['rooms'] = $availableRooms;
          
          header("Location: ../views/rooms_view.php");
          exit();
   
        }
      else{
        header("Location: ../index.php");
        exit();
       }
    


?>