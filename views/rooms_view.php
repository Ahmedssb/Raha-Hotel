<?php 
include_once('../classes/getRoom.php');

 // if user logged otherwise  redirect it to the login page 
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

//***************************************************************
// start of pagenation code 

/*Get the Current Page Number
To get the current page number, we will use the $_GET .*/
/*SET Total Records Per Page Value
*/
$total_records_per_page = 3;
 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
       $page_no = $_GET['page_no'];
    
       $offset = ($page_no-1) * $total_records_per_page;

       if($page_no>1){
               $getRoom_object = new getRoom();
               if(isset($_SESSION['date_in'])and isset($_SESSION['date_out'] )and isset($_SESSION['type'])){

                        $rooms=$getRoom_object->checkroom($_SESSION['date_in'],$_SESSION['date_out'],$_SESSION['type'],3);                                                       }
            }
 
     }else {
        $page_no = 1;
        }

//Calculate  other Variables
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

//Get the Total Number of Pages for Pagination
$room = new Room();
$total_records= $room->getTotalNumOfRooms();
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

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
 <link rel="icon" href="/../img/raha.png" type="image/png" sizes="20x20">


  
</head>
<body>

    
   <!-- start home section -->
<div id="home">
       <!-- start nav -->
     <nav class="navbar  navbar-light   navbar-expand-md custom-nav">
        <?php 
          include_once('header_view.php');
         ?>
     </nav> 
    <!-- end nav-->

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
<div class="container" style="padding: 30px 0px;"  id="container_div" >
    <div class="row"  id="refine_div">
        <div class="col-md-4">

            <table  class="filter-table">
            <form method="post" action="">    
              <caption style="caption-side: top;text-align: center">Refine</caption>    
              <tr>
                <td>Check in</td>
                <td>check out</td>
              </tr>
              <tr>
                <td><input type="date" id="check_in" name="check_in"></td>
                 <td><input type="date" id="check_out" name="check_out"></td>

              </tr>
              <tr>
                <td colspan="2">Type</td>  
              </tr>    
              <tr>
                <td colspan="2">
                    <select name="type"  id="type"  name="type"  required>
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

              <div class="row room-div "    style="padding: 5px 0px; " id="room_div">
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

<div class="container">
 <div class="row">
<div class="col-md-6 offset-4  pagenation-div">   
<?php    
       // Showing Current Page Number Out of Total
echo "
<div class='page-div'>
  <p>Page <strong>$page_no</strong> of $total_no_of_pages</p>
</div>" ;
    ?>
 <ul class="pagination">
 

<!-- Now we are checking that if total number of pages are equal or less than 10 
then we simply display all 10 pages. It will be something like below  -->  
<?php 
  if ($total_no_of_pages <= 10){   
 for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
 if ($counter == $page_no) {
 echo "<li class='active'><a>$counter</a></li>"; 
         }else{
        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
}elseif ($total_no_of_pages > 10){
  //But if total number of pages are greater than 10 then we are using other method. We are checking it using the following 

   // first we will check that if current page number is equal or less than 4 then do the following
    if($page_no <= 4) { 
         for ($counter = 1; $counter < 8; $counter++){ 
         if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>"; 
         }else{
                   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) { 
        //Now we will check that if current page number is greater than 4 and less than (total number of pages -4) then do the following

        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for (
             $counter = $page_no - $adjacents;
             $counter <= $page_no + $adjacents;
             $counter++
             ) { 
             if ($counter == $page_no) {
         echo "<li class='active'><a>$counter</a></li>"; 
         }else{
                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }                  
               }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
      }else {
        //Now we will check that if current page number is greater than 4 but not less than (total number of pages -4) then do the following
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for (
             $counter = $total_no_of_pages - 6;
             $counter <= $total_no_of_pages;
             $counter++
             ) {
             if ($counter == $page_no) {
         echo "<li class='active'><a>$counter</a></li>"; 
         }else{
                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
         }                   
             }
}
      
      
      
} 
?>  
    </ul>
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
 <script  src="../js/sweetalert.min.js"></script> 

</body>

</html>