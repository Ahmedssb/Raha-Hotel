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
          
         <h4>Book Your Room</h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start room section -->
<div class="container" style="padding: 30px 0px;" >

 
   <div class="row" style="padding: 5px 0px;" >
       <div class="col-md-3">
       
       </div>
      <div class="col-md-6 table-responsive">
          <div  style="text-align: center">  
                <h5>Personal Info</h5> 
         </div>  
          <table class="table table-striped table-hover">
            <tr>
               <td>First Name</td> 
               <td><?php  echo $user_data["firstName"]?></td>
            </tr>
            <tr>
               <td>Last Name</td> 
               <td><?php  echo $user_data["lastName"]?></td>
            </tr>
            <tr>
               <td>Email</td> 
               <td><?php  echo $user_data["email"]?></td>
            </tr>
            </table>
        <div  style="text-align: center">  
        <h5>Room Info</h5> 
       </div>  
          
     <table class="table table-striped table-hover">
            <?php
            $room = new GetRoom();
            $room_info= $room->roomInfo($id);
           
             echo'
                    <tr>
                       <td>Type</td> 
                       <td>'.$room_info["type"].'</td>
                    </tr>
                    <tr>
                       <td>Size</td> 
                       <td>'.$room_info["size"].' ft</td>
                    </tr>
                    <tr>
                       <td> Capacity</td> 
                       <td>'.$room_info["capacity"].' person</td>
                    </tr>
                    <tr>
                       <td>price per day</td> 
                       <td>'.$room_info["price"].' $</td>
                    </tr>';
             
          ?>
          </table>
          
         <div  style="text-align: center">  
        <h5>Bill Info</h5> 
       </div>        
     <table class="table table-striped table-hover">

            <tr>
               <td>Date In</td> 
               <td><?php echo $date_in; ?></td>
            </tr>
            <tr>
               <td>Date Out</td> 
               <td><?php echo $date_out ; ?></td>
            </tr>
            <tr>
               <td> Total Price</td> 
               <td><?php 
                   // calculate the diferent between to dates after converting them from string to date 
                   $diff = (strtotime($date_out)- strtotime($date_in));
                   /* 1 day = 24h  
                      24 * 60 * 60 = 86400 seconds
                   */
                   $num_days = abs(round($diff/86400));
                   $total = $num_days*$room_info["price"];
                   echo $total;
                   ?></td>
            </tr>
        
          </table>
         <?php 
          
          $_SESSION['rid']=$room_info['id'];
          $_SESSION['bill']=$total;
          $_SESSION['uid']=$user_data['id'];
          
          ?>
         <div class="book-div" style="text-align: center">
             <a href="thanks_view.php"> <button type="button">Book</button>  </a>
        </div>
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