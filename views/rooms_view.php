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
if(isset($_SESSION['rooms'])){
          
        $rooms = $_SESSION['rooms'];
          
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
 <link rel="icon" href="/../img/raha.png" type="image/png" sizes="20x20">


  
</head>
<body>

    
   <!-- start home section -->
<div id="home">
       <!-- start nav -->
     <nav class="navbar  navbar-light   navbar-expand-md custom-nav">
         <div class="container-fluid">
             <a class="navbar-brand" href="#"><img src="img/raha.png"></a>
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
          
         <h4>Our Rooms</h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start rooms section -->
<div class="container" style="padding: 30px 0px;" >
    <div class="row">
        <div class="col-md-4">

            <table  class="filter-table">
            <form method="post" action="classes/getRoom.php">    
              <caption style="caption-side: top;text-align: center">Refine</caption>    
              <tr>
                <td>Check in</td>
                <td>check out</td>
              </tr>
              <tr>
                <td><input type="date" id="check_in"></td>
                 <td><input type="date" id="check_out"></td>

              </tr>
              <tr>
                <td colspan="2">Type</td>  
              </tr>    
              <tr>
                <td colspan="2">
                    <select name="type"  id="type"  required>
                   <option value="single">Single Room</option>   
                   <option value="double">Double Room</option>   
                   
                </select>
                  </td>  
              </tr>    
              <tr>
               <td  colspan="2"  ><input type="submit" value="check" id="rooms_check"></td>  

              </tr> 
            </form>    
            </table>

      </div>  
    
    </div>
    
 <?php  
    
    if(!empty($rooms)){
        foreach($rooms as $room){
         echo '

              <div class="row" style="padding: 5px 0px;" >
                <div class="col-md-4">
                      <img src="../roomImages/'.$room['image'].' " class="img-fluid"  >

                </div>

                <div class="col-md-4">
                  <h5>'.$room['type'].'</h5>
                  <table>
                    <tr>
                      <td>'.$room['price'].'$/day</td>
                    </tr>
                    <tr>
                      <td>size</td>
                      <td>capacity</td>
                    </tr> 
                    <tr>
                      <td>'.$room['size'].'</td>
                      <td>'.$room['capacity'].'</td>    
                    </tr>  
                    <tr>
                      <td>bed</td> 
                    </tr>
                    <tr>
                      <td>'.$room['bed'].'</td>      
                    </tr>  
                    <tr>
                      <td><a href="single_room_view.php?rid='.$room['id'].' ">View Details</a></td>
                    </tr>  
                  </table>    

                </div>  
             </div>';
        }
        
    }else{
        echo'
        <div class="row" style="padding: 5px 0px;" >
         <div class="col-md-4">
           
        </div>
         
         <div class="col-md-4">
            <p> Sorry No Room Available  </p>
        </div>
        
        </div>
        
        
        '
            
            ;
    }
    ?>
  
      
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