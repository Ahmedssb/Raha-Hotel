<?php 
   session_start();
  if(isset($_SESSION['logged'])){
     $logged=$_SESSION['logged'];
      $email=$_SESSION['email'];
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
 <link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="/img/raha.png" type="image/png" sizes="20x20">

  
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
                            <a class="nav-link custom-nav-link lang" href="#about" key="about">About</a>
                        </li>     
                         <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="views/login_view.php" key="why">Login</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="views/register_view.php" key="contact">Register</a>
                        </li>  
                        <?php
                              if(isset($_SESSION['logged'])) {
                                  
                               echo '
                              <li class="nav-item">
                                <a class="nav-link custom-nav-link translate" href="views/logout.php" >Logout</a>
                              </li>
                            '; }
                        ?>
                        
                        <?php
                              if(isset($_SESSION['logged'])) {
                                  
                               echo '
                                <li class="nav-item">
                                <a class="nav-link custom-nav-link translate" href="views/user_profile_view.php" >MyAccount</a>
                                </li>
                            '; }
                        ?>
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
          
          <table class="large-screen-table">
           <tr>
                <th >Check in</th>  
                <th>check out</th>   
                <th>Room</th>   
                <th>Check Availabilatiy</th>   
             </tr>
              
        <tr>
          <form method="post" action="classes/getRoom.php">    
              <td> <input type="date" name="date_in" required></td>      
              <td><input type="date" name="date_out" required></td>      
               <td class="medium-td" > 
                 <select name="type"  required>
                   <option value="single">Single Room</option>   
                   <option value="double">Double Room</option>   
                   
                </select>
              
              </td>      
              <td class="medium-td" ><input type="submit" value="check" name="checkRoom"></td>      
          </form>    
        </tr>      
         
          </table>
         
          <table class="phone-screen-table">
           <tr>
                <th >Check in</th>  
                <th>check out</th>    
            </tr>
              
        <tr>
          <td> <input type="date"></td>      
          <td><input type="date"></td>         
              
        </tr> 
        <tr>
          <td>Room</td>   
           <td>type</td>   
        </tr>      
         <tr>
          <td ><input type="number"></td>      
          <td ><input type="text"  ></td>      
         </tr>
        <tr>
        <td colspan="2">check ava</td>

        </tr> 
        <tr>
                  <td colspan="2" class="medium-td" ><input type="button" value="check" ></td>
     
        </tr>      
          </table>
         
     </div> 
      <a class="btn btn-outline-light  start-btn lang" key="start"  href="#about">Get Started</a>

</div> <!-- end home section -->
    
<!-- start section --->

<div id=""  class="container" style="padding-top:15%;">
  <div  class="row"  >
    
      <div class="col-md-6" >
        <h2>Welcome to Raha hotel</h2>
        <h6 class="about-pra">With over 340 hotels worldwide, NH Hotel Group offers a wide variety of hotels catering for a perfect stay no matter where your destination.</h6>
      </div>
      
      <div class="col-md-6">
         <table class="img-table" >
              <tr>
                <td><div><img src="img/room-4.jpg" class="img-fluid "  ></div></td>
                <td rowspan="2"><div><img src="img/20.jpg" class="img-fluid" style="height:35%;border-radius: 20px;"  ></div></td>   
              </tr> 
              <tr>
                 <td style="margin: 15px;"><div><img src="img/21.jpg" class="img-fluid"   ></div></td>   
              </tr>     
         </table>
      
      </div>
      
  </div>  
 
 <div class="row">
    <div class="col-md-1     " ></div>  
    <div class="col-md-3 services-box  " >
        <div class="card  services-box-card">
          <img class="card-img-top service-img" src="img/icon-3.png">
          <div class="card-body">
            <h4 class="card-title">Food</h4> 
          </div>         
        </div>
    </div>  
   <div class="col-md-3  services-box">
      <div class="card services-box-card">
          <img class="card-img-top service-img" src="img/icon-1.png">
          <div class="card-body">
            <h4 class="card-title">Transportion</h4> 
          </div>         
        </div> 
      
   </div>    
   <div class="col-md-3 services-box " style="">
     <div class="card services-box-card">
          <img class="card-img-top service-img" src="img/icon-2.png">
          <div class="card-body">
            <h4 class="card-title" >Relax</h4> 
          </div>         
        </div>  
     
   </div>    
  
 </div>    
    
    
</div>    
  
<!-- start -->    
<div class="container-fluid">
  <div class="row">
      
        <div class="col-md-4 no-padding ">
            <img src="img/5.jpg" class="img-fluid  " style="height:450px;">
            <div class="hidden-text animated-div"><h5>Relax</h5></div>
            <div class="hidden-div"></div>
         </div>

        <div class="col-md-4 no-padding">
            <img src="img/2.jpg" class="img-fluid" style="height:450px;">
            <div class="hidden-text animated-div"><h5>Relax</h5></div>
            <div class="hidden-div"> </div>
        </div>

        <div class="col-md-4 no-padding">
            <img src="img/25.jpg"  class="img-fluid" style="height:450px;">
            <div class="hidden-text animated-div"><h5>Relax</h5></div>
            <div class="hidden-div"> </div>
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