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
     
     
     
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Hotel</title>  
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
                                   <a class="nav-link custom-nav-link lang" href="../index.php" key="home">Home</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link custom-nav-link translate" href="views/logout.php" >Logout</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link custom-nav-link translate" href="#" id="en">English</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link custom-nav-link translate" href="#" id="ar">العربية</a>
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
          
         <h4>Thanks</h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start room section -->
<div class="container" style="padding: 30px 0px;" >

 
   <div class="row" style="padding: 5px 0px;" >
              <div class="col-md-4">
               </div>
       <div class="col-md-5 thanks-div">
          <p class="thanks-pra">Thanks Your Reservation Has Been Placed</p>
           <span> Your Reservation Num Is<strong><?php echo $reservation_id;?> </strong> and total cost is <strong><?php  echo $_SESSION['bill'];?>$</strong>  </span>   
       </div>
       
    
   </div>
    
    
   
    
</div>    

  
<!-- start footer -->
    
<footer>
 <div class="container">
    <div class="row"> 
    <div class="col-md-4">
        <h6>Raha Hotel</h6>
        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
     </div>
     
     <div class="col-md-4">
        <h6>Contact Information</h6>  
         <p>291 South 21th Street,
          ALKhobar
         </p>
         <p>+ 966 5041598658  </p>
         <p>info@raha.com</p>
 
     </div>
    
      <div class="col-md-4">
        <h6>Message</h6>  
          <form>
           <textarea rows="4" cols="40"></textarea>
           <input type="submit"  value="Submit">     
          </form>
     </div>
        
    </div>
  </div> 
    

    
    
</footer>    

 <script src="js/jquery-3.4.1.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>   
 <script src="js/main.js"></script>
</body>

</html>