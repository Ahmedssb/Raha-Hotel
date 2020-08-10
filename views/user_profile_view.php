<?php 
include_once '../includes/user_inc.php';
   session_start(); 
// if user logged or redirect it to the login page 
if(isset($_SESSION['logged'])){
     $logged=$_SESSION['logged'];  
   $email=$_SESSION['email'];
  }else{
    header("Location: login_view.php");
    exit();
}

// language 
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    // intilaize session 
     $_SESSION['lang'] = $_GET['lang'];
}
// Include Language file
if(isset($_SESSION['lang'])){
 include "../lang/lang_".$_SESSION['lang'].".php";
}else{
 include "../lang/lang_en.php";
}

 $user = new User();
 $user_data = $user->getUserData($email);
 // get all user reservations by his id 
 $user_reservations =$user->getUserReservations($user_data['id']);

/*this code called by ajax request when user finish writing his current password ,
if so it will check if the password user had writen is correct or not */
if(isset($_POST['password']) && isset($_POST['email'])){
 $result =$user->isPasswordCorrect($_POST['email'],$_POST['password']);
  
        echo $result;
        die;
    
} 
   // intilaize varaiable rest_password that return true if password has been changed 
   $rest_password=null;
if(isset($_POST['password_reset'])){
    
     $rest_password= $user->restPassword($_POST['confirm_pwd'],$_POST['id']);
 } 

// intilaize varaiable $update_personal_info that return true if user info has been changed 
$update_personal_info=null;
if(isset($_POST['update_personal_info'])){
    
   $update_personal_info= $user->updateUserInfo($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['id']);
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
 <link rel="stylesheet" href="../css/datatables.min.css">
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
          
         <h4>  <?php echo $lang['account_page_title']; ?></h4>  
         
     </div> 
 
</div> <!-- end home section -->

    
<!-- start profile section -->
<div class="container" style="padding: 30px 0px;" >

     <!--start tabs row --->   
    <div class="tab  row">
          <div class="col-md-3 ">
          </div>
          <div class="col-md-2 profile-tab"  >
              <button class="tablinks" onclick="openTab(event, 'personal_info')" id="defaultOpen"><?php echo $lang['account_personal_info'] ?></button>
          </div>
            <div class="col-md-2 profile-tab">
                <button class="tablinks" onclick="openTab(event, 'change_pwd')"><?php echo $lang['account_change_password'] ?></button>
               </div>
          <div class="col-md-2 profile-tab">
              <button class="tablinks" onclick="openTab(event, 'booking')"><?php echo $lang['account_reservatins'] ?></button>
           </div>
    </div>
<!--end tabs row --->
     
 <!--personal info content --->   
    <div id="personal_info" class="row tabcontent" > 
         <div class="col-md-4 " >
           <?php 
           if($update_personal_info){
               echo '
                    <div class="alert alert-success">  
                       <button type="button" class="close" data-dismiss="alert"> &times; </button>
                         <strong> Personal Info  Has Been Updated</strong> 
                     </div> ';
                            }  
                      ?>
              <form   method="post" action="user_profile_view.php"  id="update_personal_info">
                  <div class="form-group"  style="text-align:center;">
                    <label ><?php echo $lang['first_name'] ?></label>
                    <input type="text" class="form-control" name="fname" id="fname"  value="<?php echo $user_data['firstName'] ?>"    required>
                   </div>

                   <div class="form-group" style="text-align:center;">
                    <label ><?php echo $lang['last_name'] ?></label>
                    <input type="text" class="form-control"  name="lname" id="lname" value="<?php echo $user_data['lastName'] ?>"   required>
                   </div> 

                  <div class="form-group" style="text-align:center;">
                    <label ><?php echo $lang['email'] ?></label>
                    <input type="email" class="form-control" name="email" id="email"  value="<?php echo $user_data['email'] ?>"  required>
                   </div>
                 <input type="hidden"  value="<?php echo $user_data['id']  ?>"  name="id">
                 <button type="submit" class="btn btn-primary"  name="update_personal_info" style="text-align:center;"><?php echo $lang['update_btn'] ?></button>

              </form>

          </div>
 
     </div>
     
    <!--password content --->   
    <div class="row tabcontent" id="change_pwd"   > 
       <div class="col-md-4 "   >
              <?php 
               if($rest_password){
                  echo '
                       <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert"> &times; </button>
                          <strong> Password Has Been Updated</strong>
                       </div>';
                     }
                   ?>
              <form  method="post" action="user_profile_view.php" id="password_reset">
                   <div class="form-group" >
                    <label ><?php echo $lang['account_current_pass'] ?> </label>
                    <input type="password" class="form-control"  name="current_pwd"  id="current_pwd"    required>
                       <!-- display is password correct or not after user finish typing -->
                       <span id="current_pwd_msg"></span>
                   </div>

                   <div class="form-group">
                    <label ><?php echo $lang['account_new_pass'] ?></label>
                    <input type="password" class="form-control" name="new_pwd" id="new_pwd"   required>
                   </div> 

                  <div class="form-group">
                    <label><?php echo $lang['account_confirm_pass'] ?></label>
                    <input type="password" class="form-control"  name="confirm_pwd" id="confirm_pwd"   required>
                   </div>
                  <input type="hidden"  value="<?php echo $user_data['id']  ?>"  name="id">
                 <input type="hidden"  value="<?php echo $user_data['email']  ?>"  name="email">
                 <button type="submit" class="btn btn-primary"  name="password_reset"><?php echo $lang['update_btn'] ?></button>

              </form>

          </div>
 
    </div>
     
  <!--booking info content --->      
    <div id="booking" class="row tabcontent">
       <div class="col-md-6 "  >
          <table id="table_id" class="display  table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?php echo $lang['booking_num'] ?></th>
                        <th><?php echo $lang['check_date_in'] ?> </th>
                       <th><?php echo $lang['check_date_out'] ?> </th>
                       <th><?php echo $lang['bill'] ?></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      // display all user resevations
                      foreach($user_reservations as $reservation){
                        echo '  
                            <tr>
                                <td>'.$reservation['id'].'</td>
                                <td>'.$reservation['date_in'].'</td>
                                <td>'.$reservation['date_out'].'</td>
                                <td>'.$reservation['bill'].'</td>

                            </tr> ';
                      }
                    ?>
                </tbody>
            </table>
      </div>
     
        
    </div>
    
   
    
</div>    

  
<!-- start footer -->
    
<?php  
    include_once('../views/footer_view.php');
    
    ?>    
 <script src="../js/jquery-3.4.1.js"></script>
 <script src="../js/jquery.validate.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>   
 <script src="../js/main.js"></script>
  <script src="../js/datatables.min.js"></script>

<script>
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
 
<script>
   $(document).ready( function () {
    $('#table_id').DataTable();
} ); 
</script>    
    
 </body>

</html>
              
              