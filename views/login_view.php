<?php
   session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Hotel</title>  
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Raha Hotel   ">
<meta name="keywords" content="Hotel   ">
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
          
         <h4>Log In</h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start rooms section -->
<div class="container" style="padding: 50px 0px;" >
  <div class="row" >
      <div class="col-md-2">
      
      
      </div>
    
      <div class="col-md-8">
        <form action="../classes/login.php" method="post">
              
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control" name="email" value="email@example.com" required>
                </div>
              </div>
            
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="pwd" placeholder="Password"  required>
                </div>
              </div>
            
              <button type="submit" class="btn btn-primary" name="login">Log In</button>

       </form>
           <?php    
                  // dispaly error message if the user enter incorrect info 
                     if(isset($_SESSION['error'])) {
                         echo
                             '<br>
                        <div class="error">'.$_SESSION['error'].'</div>';
                            unset($_SESSION['error']);

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