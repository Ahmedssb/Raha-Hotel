<?php 
   session_start();
  // check if user logged or not 
  if(isset($_SESSION['logged'])){
     $logged=$_SESSION['logged'];
      $email=$_SESSION['email'];
   }

  // language 
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    // intilaize session 
     $_SESSION['lang'] = $_GET['lang'];
}else{
    // intilaize defualt session 
     $_SESSION['lang'] = "en";
}

// Include Language file
if(isset($_SESSION['lang'])){
 include "lang/lang_".$_SESSION['lang'].".php";
}else{
 include "lang/lang_en.php";
}

?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo $lang['lang_dir']; ?>">
<head>
 <title><?php echo $lang['web_title']; ?></title>  
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="Raha Hotel   ">
 <meta name="keywords" content="Hotel  rooms  ">
    
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/main.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="icon" href="img/raha.png" type="image/png" sizes="20x20">

  
</head>
<body  >

    
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
                           <a class="nav-link custom-nav-link lang" href="#home" key="home"><?php echo $lang['menu_home']; ?></a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link custom-nav-link lang" href="#about" key="about"><?php echo $lang['menu_about']; ?></a>
                        </li> 
                        <?php 
                          if(!isset($_SESSION['logged'])){
                             echo '
                                 <li class="nav-item">
                                    <a class="nav-link custom-nav-link lang" href="views/login_view.php">'.$lang['menu_login'].'</a>
                                </li> ';
                              }
                         if(!isset($_SESSION['logged'])){

                            echo '    
                                <li class="nav-item">
                                    <a class="nav-link custom-nav-link lang" href="views/register_view.php" >'.$lang['menu_register'].'</a>
                                </li>'; 
                              }
                         ?>
                        <?php
                              if(isset($_SESSION['logged'])) {
                                  
                               echo '
                              <li class="nav-item">
                                <a class="nav-link custom-nav-link translate" href="views/logout.php" >'.$lang['menu_logout'].'</a>
                              </li>
                            '; }
                        ?>
                        
                        <?php
                              if(isset($_SESSION['logged'])) {
                                  
                               echo '
                                <li class="nav-item">
                                <a class="nav-link custom-nav-link translate" href="views/user_profile_view.php" >'.$lang['menu_my_account'].'</a>
                                </li>
                            '; }
                        ?>
                             <!-- Language -->
                         <form method='get' action='#' id='form_lang' >
                              <select name='lang' onchange='changeLang();' class="nav-item nav-link custom-nav-link" >
                               <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
                               <option value='ar' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar'){ echo "selected"; } ?> >العربية</option>
                              </select>
                         </form>
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
                        <th ><?php echo $lang['check_date_in']; ?></th>  
                        <th><?php echo $lang['check_date_out']; ?></th>   
                        <th><?php echo $lang['check_room_type']; ?></th>   
                      </tr>

                  <tr >
                      <form method="post" action="classes/getRoom.php">    
                          <td > <input type="date" name="date_in" id="date_in" required></td>      
                          <td><input type="date" name="date_out" id="date_out" required></td>      
                           <td class="medium-td" > 
                             <select name="type"  required>
                               <option value="single"><?php echo $lang['single_room']; ?></option>   
                               <option value="double"><?php echo $lang['double_room']; ?></option>   
                            </select>
                          </td>      
                          <td class="medium-td" ><input type="submit" value="<?php echo $lang['check_btn']; ?>" name="checkRoom" id="checkRoom"></td>      
                      </form>    
                </tr>      
         
          </table>
          <!-- start phone-screen-table   -->
          <table class="phone-screen-table">
               <tr>
                    <th ><?php echo $lang['check_date_in']; ?></th>  
                    <th><?php echo $lang['check_date_out']; ?></th>    
                </tr>
             <form method="post" action="classes/getRoom.php">    

                <tr>
                      <td> <input type="date" name="date_in" id="date_in" required></td>      
                      <td><input type="date" name="date_out" id="date_out" required></td>         
                </tr> 
                <tr >
                    <td colspan="2" ><?php echo $lang['check_room_type']; ?></td>   
                </tr> 
                <tr>
                    <td colspan="2" > 
                         <select name="type"  required>
                           <option value="single"><?php echo $lang['single_room']; ?></option>   
                           <option value="double"><?php echo $lang['double_room']; ?></option>   
                        </select>

                     </td>   
                </tr>
                <tr>
                   <td colspan="2" class="medium-td" ><input type="submit" value="<?php echo $lang['check_btn']; ?>" name="checkRoom" id="checkRoom" ></td>
                </tr>   
              </form>    
          </table>
         
     </div> 
      <a class="btn btn-outline-light  start-btn "   href="#about"><?php echo $lang['page_caption']; ?></a>

     </div> <!-- end home section -->
    
<!-- start about section --->

<div id="about"  class="container" style="padding-top:15%;">
  <div  class="row"  >
    
      <div class="col-md-6 about-text"  style="text-align:center" >
        <h2  ><?php echo $lang['about_title']; ?></h2>
        <h6 class="about-pra"><?php echo $lang['about_pra']; ?></h6>
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
     <div class="col-md-3 services-box  " >
        <div class="card  services-box-card">
          <img class="card-img-top service-img" src="img/icon-3.png">
          <div class="card-body">
            <h4 class="card-title"><?php echo $lang['about_food']; ?></h4> 
          </div>         
        </div>
    </div>  
   <div class="col-md-3  services-box">
      <div class="card services-box-card">
          <img class="card-img-top service-img" src="img/icon-1.png">
          <div class="card-body">
            <h4 class="card-title"><?php echo $lang['about_trans']; ?></h4> 
          </div>         
        </div> 
      
   </div>    
   <div class="col-md-3 services-box " style="">
     <div class="card services-box-card">
          <img class="card-img-top service-img" src="img/icon-2.png">
          <div class="card-body">
            <h4 class="card-title" ><?php echo $lang['about_relax']; ?></h4> 
          </div>         
        </div>  
     
   </div>    
  </div>    
    
    
</div>    
  
<!-- start  image section-->    
<div class="container-fluid">
  <div class="row">
      
        <div class="col-md-4 no-padding ">
            <img src="img/5.jpg" class="img-fluid  " style="height:450px;">
            <div class="hidden-text animated-div"><h5><?php echo $lang['card_pra']; ?></h5></div>
            <div class="hidden-div"></div>
         </div>

        <div class="col-md-4 no-padding">
            <img src="img/2.jpg" class="img-fluid" style="height:450px;">
            <div class="hidden-text animated-div"><h5><?php echo $lang['card_pra']; ?></h5></div>
            <div class="hidden-div"> </div>
        </div>

        <div class="col-md-4 no-padding">
            <img src="img/25.jpg"  class="img-fluid" style="height:450px;">
            <div class="hidden-text animated-div"><h5><?php echo $lang['card_pra']; ?></h5></div>
            <div class="hidden-div"> </div>
        </div>

  </div>    
    
    
</div>   
    
<!-- start footer -->
<?php  
    include_once('views/footer_view.php');
    
    ?>    
    

<script src="js/jquery-3.4.1.js"></script>
 <script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>   
 <script src="js/main.js"></script>
 <script  src="js/sweetalert.min.js"></script> 
<script>
  // display the cuurent date in the date inputs
  document.querySelector("#date_in").valueAsDate = new Date();
  document.querySelector("#date_out").valueAsDate = new Date();
 </script>        
</body>

</html>