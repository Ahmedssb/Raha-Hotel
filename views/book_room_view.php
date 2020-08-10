<?php 
 include_once '../classes/getRoom.php';
 include_once  '../includes/user_inc.php';
// if user logged or redirect it to the login page 
if(isset($_SESSION['logged'])){
     $logged=$_SESSION['logged'];  
     $email=$_SESSION['email'];
    
    $user_obj = new User();
    // get the user informaion
   $user_data = $user_obj->getUserData($email);
     
  }else{
    header("Location: login_view.php");
    exit();
}  

 
 if(isset($_GET['rid'])){
     $id=$_GET['rid'];
     
 }

if(isset($_SESSION['date_in']) and isset($_SESSION['date_out'])){
    $date_in=$_SESSION['date_in'];
    $date_out=$_SESSION['date_out'];

 }
  // language 
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    // intilaize session 
     $_SESSION['lang'] = $_GET['lang'];
}else{
         $_SESSION['lang'] ="en";
}
// Include Language file
if(isset($_SESSION['lang'])){
 include "../lang/lang_".$_SESSION['lang'].".php";
}else{
 include "../lang/lang_en.php";
}
  
?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo $lang['lang_dir']; ?>">
<head>
 <title><?php echo $lang['web_title']; ?></title>  
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Raha Hotel   ">
<meta name="keywords" content="Hotel   ">
    
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="../css/bootstrap.min.css">
 <link rel="stylesheet" href="../css/rooms.css">
 <link rel="icon" href="../img/raha.png" type="image/png" sizes="20x20">
  
</head>
<body>

    
   <!-- start home section -->
<div id="home">
       <!-- start nav -->
     <nav class="navbar  navbar-light   navbar-expand-md custom-nav">
             <?php 
          include_once('header_view.php');
           ?>
     </nav> <!-- end nav-->

    <!-- start landing page -->
     <div class="landing">
        <div class="home-wrap">
          <div class="home-inner">

          </div> 
        </div>

     </div> <!-- end landing page -->

    <!-- start landing page caption -->
     <div class="caption center-block text-center">
          
         <h4><?php echo $lang['book_room_title']; ?></h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start room section -->
<div class="container" style="padding: 30px 0px;" >

 
   <div class="row" style="padding: 5px 0px;" >
       <div class="col-md-3">
       
       </div>
      <div class="col-md-6 table-responsive">
          <div  style="text-align: center">  
                <h5><?php echo $lang['personal_info']; ?></h5> 
         </div>  
          <table class="table table-striped table-hover">
            <tr>
               <td><?php echo $lang['first_name']; ?></td> 
               <td><?php  echo $user_data["firstName"]?></td>
            </tr>
            <tr>
               <td><?php echo $lang['last_name']; ?></td> 
               <td><?php  echo $user_data["lastName"]?></td>
            </tr>
            <tr>
               <td><?php echo $lang['email']; ?></td> 
               <td><?php  echo $user_data["email"]?></td>
            </tr>
            </table>
        <div  style="text-align: center">  
        <h5><?php echo $lang['room_info']; ?></h5> 
       </div>  
          
     <table class="table table-striped table-hover">
            <?php
            $room = new GetRoom();
            $room_info= $room->roomInfo($id);
           
             echo'
                    <tr>
                       <td>'.$lang['check_room_type'].'</td> 
                       <td>'.$room_info["type_".$_SESSION['lang']].'</td>
                    </tr>
                    <tr>
                       <td>'.$lang['room_size'].'</td> 
                       <td>'.$room_info["size"].' ft</td>
                    </tr>
                    <tr>
                       <td> '.$lang['room_capacity'].'</td> 
                       <td>'.$room_info["capacity"].' '.$lang['person'].' </td>
                    </tr>
                    <tr>
                       <td> '.$lang['room_price'].'</td> 
                       <td>'.$room_info["price"].' $</td>
                    </tr>';
             
          ?>
          </table>
          
         <div  style="text-align: center">  
        <h5><?php echo $lang['bill_info'] ;?></h5> 
       </div>        
     <table class="table table-striped table-hover">

            <tr>
               <td><?php echo $lang['check_date_in']; ?></td> 
               <td><?php echo $date_in; ?></td>
            </tr>
            <tr>
               <td><?php echo $lang['check_date_out'] ;?></td> 
               <td><?php echo $date_out ; ?></td>
            </tr>
            <tr>
               <td> <?php echo $lang['total_price']; ?></td> 
               <td>
                   <?php 
                   // calculate the diferent between two dates after converting them from string to date 
                       $diff = (strtotime($date_out)- strtotime($date_in));
                       /* 1 day = 24h  
                          24 * 60 * 60 = 86400 seconds
                       */

                       $num_days = abs(round($diff/86400));
                        // in case date_in and date_out are the same
                         if($diff == 0){
                          $num_days=1; 
                         }
                       $total = $num_days*$room_info["price"];
                       echo $total;
                   ?>
                </td>
            </tr>
        
          </table>
         <?php 
          
          $_SESSION['rid']=$room_info['id'];
          $_SESSION['bill']=$total;
          $_SESSION['uid']=$user_data['id'];
          
          ?>
         <div class="book-div" >
             <a href="thanks_view.php"> <button type="button"><?php echo $lang['book_btn']; ?></button>  </a>
        </div>
      </div>
    
   </div>
    
    
   
    
</div>    

  
<!-- start footer -->
    
<?php  
    include_once('../views/footer_view.php');
    
    ?>   

 <script src="js/jquery-3.4.1.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>   
 <script src="js/main.js"></script>
</body>

</html>