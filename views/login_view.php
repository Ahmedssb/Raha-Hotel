<?php
   session_start(); 
  // language 
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    // intilaize session 
     $_SESSION['lang'] = $_GET['lang'];
}

// Include Language file
if(isset($_SESSION['lang'])){
 include_once( "../lang/lang_".$_SESSION['lang'].".php");
}else{
 include_once ("../lang/lang_en.php");
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
          
         <h4><?php echo $lang['menu_login']; ?></h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start rooms section -->
<div class="container" style="padding: 50px 0px;" >
  <div class="row" >
      <div class="col-md-3">
      
      
      </div>
    
      <div class="col-md-6"  >
        <form action="../classes/login.php" method="post">
              
              <div class="form-group row" >
                <label for="staticEmail" class="col-sm-2 col-form-label" ><?php echo $lang['email']; ?></label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control" name="email" value="email@example.com"  style="text-align:center"  required>
                </div>
              </div>
            
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo $lang['password']; ?></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="pwd" placeholder="Password" style="text-align:center" required>
                </div>
              </div>
            
              <button type="submit" class="btn btn-primary" name="login"><?php echo $lang['menu_login']; ?></button>

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
    
<?php  
    include_once('../views/footer_view.php');
    
    ?>    

 <script src="../js/jquery-3.4.1.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>   
 <script src="../js/main.js"></script>
</body>

</html>