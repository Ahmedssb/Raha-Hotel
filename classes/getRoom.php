<?php 
   session_start(); 
include '../includes/room_inc.php';

class GetRoom extends Room{


public function checkroom($date_in,$date_out,$type,$offset){
    
   $avilable_rooms= $this->getRoomsByDateAndType($date_in,$date_out,$type,$offset);
    
   
     return $avilable_rooms;
}
    
 public function isRoomAva($id,$date_in,$date_out){
     
     $ava = $this->isRoomAvailable($id,$date_in,$date_out);     
     
     return $ava;
}
    
public function roomInfo($id){
    $room_info =$this->getRoomInfo($id);
    
    return $room_info;
}
    
}

// if is set  call the fun  from the  class above 
      if(isset($_POST['id'])){
          
        $id = $_POST['id'];
        $date_in = $_POST['date_in'];
        $date_out = $_POST['date_out'];
          
        $_SESSION['date_in']=$date_in;
        $_SESSION['date_out']= $date_out;
          
        $room = new GetRoom();
       $ava=$room->isRoomAva($id,$date_in,$date_out);
         if($ava){
        echo "true";
            die; 
         }else{
             echo "false";
            die; 
         }
          
        }

  // offset for pagenation  
        if(isset($_GET['offset'])){
            $offset = $_GET['offset'];
        }else{
            $offset=0;
        }
// if is set  call the fun  from the  class above 
      if(isset($_POST['checkRoom'])){
          
        // get the data from the form 
        $date_in = $_POST['date_in'];
        $date_out = $_POST['date_out'];
        $type = $_POST['type'];
       
           
          $room = new GetRoom();
          // call fun checkroom
         $availableRooms=$room->checkroom($date_in,$date_out,$type,$offset);
          $_SESSION['date_in']=$date_in;
          $_SESSION['date_out']=$date_out;
          $_SESSION['type']=$type;
         $_SESSION['rooms'] = $availableRooms;
          
          header("Location: ../views/rooms_view.php");
          exit();
   
        }
    

// if is set check in coming from ajax request   call the fun  from the  class above 
      if(isset($_POST['check_in'])){
          
        // get the data from the form 
        $date_in = $_POST['check_in'];
        $date_out = $_POST['check_out'];
        $type = $_POST['type'];
           
          
         $room = new GetRoom();
          // call fun checkroom
         $availableRooms=$room->checkroom($date_in,$date_out,$type,$offset);
         
         $availableRooms=json_encode($availableRooms);
          echo $availableRooms;
            die;
           
           
   
        }




?>