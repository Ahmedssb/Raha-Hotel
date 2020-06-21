<?php 
include '../includes/room_inc.php';

 if(isset($_GET['rid'])){
  $id = $_GET['rid'];
 $room_obj = new Room();
 $room=$room_obj->getRoomInfo($id);
         
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
             <a class="navbar-brand" href="#"><img src="img/raha.png"></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"> 
                 <span class="navbar-toggler-icon" style="color: red;"></span>
             </button>
             <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav  ml-auto" >
                        <li class="nav-item">
                           <a class="nav-link custom-nav-link lang" href="#home" key="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="#services" key="services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="#about" key="about">About</a>
                        </li>     
                         <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="#why" key="why">Why Us</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="#contact" key="contact">Contact</a>
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

    
<!-- start room section -->
<div class="container" style="padding: 30px 0px;" >
  <div class="row" style="padding: 5px 0px;" >
     
      <div class="col-md-6" style="margin-bottom: 10px">
       <img src="img/2.jpg" class="img-fluid"  >
      
      </div>
      
      <div class="col-md-4">
        <table class="single-room-table">
          <tr>
            <td>check in</td>  
            <td>check in</td>  
          </tr>
          <tr>
           <td><input type="date"></td>  
            <td><input type="date"></td>  
          </tr> 
            
          <tr>
            <td colspan="2"><input type="submit" value="check avalability"></td>
            
          </tr>    
            
          
        </table>
      
      </div>
    
   </div>
    
   <div class="row" style="padding-top: 15px;">
    
    <div clsss="col-md-6">
    <?php    
    foreach($room as $r){
       echo '
           <table class="room-service-table">
             <tr>             
              <th>price</th>  
              <th>size</th>  
              <th>capacity</th>  
              <th>bed</th>   
             </tr>

            <tr>
              <td>'.$r['price'].'$</td>  
               <td>'.$r['size'].'</td>
               <td>'.$r['capacity'].'</td>
                <td>'.$r['bed'].'</td>
            </tr>   

           </table>' ;
      }
         ?>
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