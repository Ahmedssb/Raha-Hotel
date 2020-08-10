<?php 
   session_start(); 
// if user logged or redirect it to the login page 
if(isset($_SESSION['logged'])){
     $logged=$_SESSION['logged'];  
   $email=$_SESSION['email'];
  }else{
    header("Location: login_view.php");
    exit();
}
  include_once "../includes/room_inc.php";
 if(isset($_SESSION['date_in']) and isset($_SESSION['date_out']) and isset($_SESSION['rid']) and isset($_SESSION['bill'])){
   
     
     // make reservation 
     $room_obj = new Room();
     
     $reservation_id =$room_obj->makeResevation($_SESSION['rid'], $_SESSION['uid'],$_SESSION['date_in'],$_SESSION['date_out'],$_SESSION['bill']);
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
          
         <h4><?php echo $lang['thanks_title'] ?></h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start room section -->
<div class="container" style="padding: 30px 0px;" >

 
   <div class="row" style="padding: 5px 0px;" >
             
       <div class="col-md-5  thanks-div">
          <p class="thanks-pra"><?php echo $lang['thanks_pra']; ?></p>
           <span> <?php echo $lang['reservation_num']; ?><strong><?php echo " ".$reservation_id;?> </strong> <?php echo $lang['total_coast']; ?> <strong><?php  echo $_SESSION['bill'];?>$</strong>  </span>   
       </div>
       
    
   </div>
    
    
   
    
</div>    

  
<!-- start footer -->
    
<?php  
    include_once('../views/footer_view.php');
    
    ?>   

 <script src=".../js/jquery-3.4.1.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>   
 <script src="../js/main.js"></script>
<!-- disable browser prev button -->    
 <script>
   window.history.forward();
 </script>     
</body>

</html>