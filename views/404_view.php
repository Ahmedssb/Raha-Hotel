<?php
   session_start(); 


// Include Language file
if(isset($_SESSION['lang'])){
 include_once( "../lang/lang_".$_SESSION['lang'].".php");
}else{
 include_once ("../lang/lang_en.php");
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
 <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css">
 <link rel="icon" href="../img/raha.png" type="image/png" sizes="20x20">

  
</head>
<body>

    


    
<!-- start rooms section -->
<div class="container" style="padding: 100px 0px;" >
  <div class="row" >
      <div class="col-md-2">
      
      
      </div>
    
      <div class="col-md-8 error-div"  style="text-align:center">
          <p>
              <span>404</span>
              <?php echo $lang['404_pra']; ?>
          </p>
         <button><a href="../index.php"><?php echo $lang['404_btn']; ?></a></button>
      </div>
      
  </div>
    
    
    
</div>    

  
  

 <script src="../js/jquery-3.4.1.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>   
 <script src="../js/main.js"></script>
 
    
    
</body>

</html>