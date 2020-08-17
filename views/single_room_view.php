<?php 
 include '../classes/getRoom.php';

// if user logged or redirect it to the login page 
if(isset($_SESSION['logged'])){
     $logged=$_SESSION['logged'];  
   $email=$_SESSION['email'];
  }else{
    header("Location: login_view.php");
    exit();
}


 if(isset($_GET['rid'])){
  $id = $_GET['rid'];
 $room_obj = new getRoom();
 $room=$room_obj->roomInfo($id);

// if user try to modify the url with id that is not exist show 404 page     
 if(empty($room)) {
    header("Location: 404_view.php");
 }    
         
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
        <div class="container-fluid">
             <a class="navbar-brand" href="../index.php"><img src="../img/raha.png"></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"> 
                 <span class="navbar-toggler-icon" style="color: red;"></span>
             </button>
             <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav  ml-auto" >
                        <li class="nav-item">
                           <a class="nav-link custom-nav-link lang" href="../index.php" ><?php echo $lang['menu_home']; ?></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link custom-nav-link translate" href="logout.php" ><?php echo $lang['menu_logout']; ?></a>
                        </li>
                    </ul>
             </div>      
         </div>
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
          
         <h4> <?php echo $lang['room_details'];  ?></h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start room section -->
<div class="container" style="padding: 30px 0px;" >
  <div class="row" style="padding: 5px 0px;" >
     <?php    
    
      echo '
      <div class="col-md-6 col-sm-4" style="margin-bottom: 10px">
       <img src="../roomImages/'.$room['image'].'" class="img-fluid"  >
   
      </div> ';
    
      ?>
      
      <div class="col-md-4 col-sm-2">
          <form   method="post" id="check"  > 
                <table class="single-room-table">
                <caption style="caption-side: top;text-align: center"><?php echo $lang['refine_title']; ?></caption>    

                      <tr>
                        <td><?php echo $lang['check_date_in']; ?></td>  
                        <td><?php echo $lang['check_date_out']; ?></td>  
                      </tr>
                      <tr>
                       <td><input type="date" name="date_in" id="date_in"></td>  
                        <td><input type="date" name="date_out" id="date_out"></td>  
                      </tr> 
                     <input type="hidden"  name="id"  id="id" value="<?php echo $id; ?> " >
                      <tr >
                        <td colspan="2"><input type="submit" value="<?php echo $lang['check_btn']; ?>"   id="check_btn"></td>

                      </tr> 
                    <tr style="display:none"  id="not_available_pra">
                       <td><p><?php echo $lang['room_is_not_ava']; ?></p></td>
                    </tr>
                     <tr style="display:none"  id="changed_pra">
                       <td><p><?php echo $lang['room_is_ava']; ?></p></td>
                    </tr>
                     <tr style="display:none" id="changed_tr">
                      <?php echo '<td><a href="single_room_view.php?rid='.$id.'  "><button type="button" id="book_btn">'.$lang['refine_title'].' </button> </a> </td>'; ?>                       
                     <?php echo '<td><a href="book_room_view.php?rid='.$id.'  "><button type="button" id="book_btn">'.$lang['book_btn'].' </button> </a> </td>'; ?>
                     </tr> 

                </table>
          </form>
        
      </div>
    
   </div>
    
   <div class="row" style="padding-top: 15px;">
    
    <div clsss="col-4">
    <?php    
       echo '
           <table class="room-service-table table-responsive">
             <tr>
              <th> '.$lang['room_type'].'</th>  
               <th> '.$lang['room_price'].'</th>  
              <th>'.$lang['room_size'].'</th>  
              <th>'.$lang['room_capacity'].'</th>  
              <th>'.$lang['room_bed'].'</th>   
             </tr>

            <tr>
              <td>'.$room['type_'.$_SESSION['lang']].'</td>  
              <td>'.$room['price'].'$</td>  
               <td>'.$room['size'].'</td>
               <td>'.$room['capacity'].'</td>
                <td>'.$room['bed_'.$_SESSION['lang']].'</td>
            </tr>   

           </table>' ;
      
         ?>
    </div>
    
   </div>
 
   
    
   
    
</div>    

  
<!-- start footer -->
    
<?php  
    include_once('../views/footer_view.php');
    
    ?>   

 <script src="../js/jquery-3.4.1.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>   
 <script src="../js/main.js"></script>
 <script  src="../js/sweetalert.min.js"></script> 
<!-- disable browser prev button -->    
 <script>
   window.history.forward();
    // display the cuurent date in the date inputs
  document.querySelector("#date_in").valueAsDate = new Date();
  document.querySelector("#date_out").valueAsDate = new Date();
 </script>    

</body>

</html>