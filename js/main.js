

$(document).ready(function(){
     
$('#checkRoom').on('click', function(e){
     /* check for date_in and date_out if date_in is greater then display alert using sweet alert library  */
      var date_in = $('#date_in').val();
       var date_out = $('#date_out').val();
         if(date_in >= date_out){
           swal({
               text: "Date Out Must Be Greater Than Date In!",
              icon: "error",
            })
			 $('#date_in').focus();
			    return false;
 
       }
    
     });
});
// change lang 
 function changeLang(){
  document.getElementById('form_lang').submit();
 }



// this code called from singleview file to check room is available or not 
$(document).ready(function(){
     
     $('#check_btn').on('click', function(e){
    //Stop the form from submitting itself to the server.
    e.preventDefault();
     var date_in = $('#date_in').val();
     var date_out = $('#date_out').val();
     if(date_in>date_out){
           swal({
               text: "Date Out Must Be Greater Than Date In!",
              icon: "error",
            })
			 $('#date_in').focus();
			    return false;
 
       }
     var id = $('#id').val();
    $( "#not_available_pra" ).css( "display","none" );    
    $.ajax({
        type: "POST",
        url: '../classes/getRoom.php',
        data: { "date_in": date_in, "date_out": date_out, "id": id },   
       success: function(resp){
            if(resp == "true"){
                $( "#check_btn" ).css( "display","none" );
                $( "#changed_pra" ).css( "display","block" );
                $( "#changed_tr" ).css( "display","block" );
                /*$('#changed_tr').after('<tr> <td><button type="submit" id="refine_btn">Refine </button>  </td> <td><button>Book </button>  </td> </tr>');*/ 
            }else{
                  $( "#not_available_pra" ).css( "display","block" );
                  $( "#changed_pra" ).css( "display","none" );
                 $( "#changed_tr" ).css( "display","none" );
            }
                
            },error:function(){
			 alert('error');
		  }
            });
         
         
    });
     
 
     
     
});


// this code called from roomsview when user click refine 
$(document).ready(function(){
     
     $('#rooms_check').on('click', function(e){
    //Stop the form from submitting itself to the server.
    e.preventDefault();
     var check_in = $('#check_in').val();
     var check_out = $('#check_out').val();
     var type = $('#type').val();      
     // get the lang variable 
     var not_ava_pra; 
     var view_details;     
     var lang = $('#lang').val();
       // change variable content depend on the lang value   
      if(lang == "ar"){
          not_ava_pra = "<p>عفوا لا توجد غرف متاحة في هذ الفترة</p>";
         view_details = " تفاصيل أكثر";
         }else{
            not_ava_pra = "<p> Sorry there is noo room available on this period of time </p>"; 
            view_details = " View Details";
         }
         
       if(check_in>check_out){
           swal({
               text: "Date Out Must Be Greater Than Date In!",
              icon: "error",
            })
			 $('#check_in').focus();
			    return false;
 
       }

     $.ajax({
        type: "POST",
        url: '../classes/getRoom.php',
        dataType:"json",
        data: { "arrival_date": check_in, "leave_date": check_out, "type": type },   
       success: function(resp){
            var len = resp.length;
           var container_div =document.getElementById('container_div');

          // for each ajax request delete all div content and create it again
           var child = container_div.lastElementChild; 
           // delte all childs of container_div until it reach refine div stop 
            while ( container_div.childElementCount>1 ) { 
                container_div.removeChild(child); 
                child = container_div .lastElementChild; 
            }
           
         var room_div = document.createElement('div');
           if(len >0){
              
                   // check if resp empty then display message there is no available room
                     var i;
                     for( i=0; i< len ;i++){
                             room_div.className="row  room-div";
                             if(lang == "ar"){
                                 var room_type = resp[i].type_ar;
                                 var bed_type = resp[i].bed_ar;
                                 var size ="المساحة";
                                 var capacity = "السعة";
                                 var bed = "سرير النوم ";
                             }

                            // container_div.removeChild(node);
                             console.log(resp[i].type);
                              room_div.innerHTML=" <div class='col-4 offset-3'> <img src='../roomImages/"+resp[i].image+" ' class='img-fluid'  ></div><div class='col-md-4'><h5>"+room_type+"</h5><table><tr><td>"+resp[i].price+" $/day</td</tr><tr><td>"+size+"</td><td>"+capacity+"</td></tr> <tr><td>"+resp[i].size+"</td><td>"+resp[i].capacity+"</td>    </tr>  <tr><td>"+bed+"</td> </tr><tr><td>"bed_type"</td></tr>  <tr>  <td><a href='single_room_view.php?rid="+resp[i].id+" '>"+view_details+"</a></td>   </tr>   </table>    </div>";
                              console.log(room_div.className);
                                                           console.log(i);

                             container_div.append(room_div);   
                            }
                     }else{
                           room_div.innerHTML=not_ava_pra;
                           container_div.append(room_div);   

                     }
                
            },error:function(){
			 alert('error');
		  }
            });
         
         
    });
     
 
     
     
});



$(document).ready(function(){
 $('#refine_btn').on('click', function(){
      $( "#changed_tr" ).css( "display","none" );
    $( "#check_btn" ).css( "display","block" );
  

  });

    
}); 




$(document).ready(function(){
    
	   //validate personal info form

         $('#update_personal_info').validate({
          
		 rules:{
			
             
             fname:{
                 required: true,
                 minlength:2

                },
             lname:{
                 required: true,
                 minlength:2
                },
			email:{
                 required: true,
                 email: true
               }
		 },
		 
		 messages:{
             
            fname:
			    'please enter the first name'
             ,
            lname:
			       'please enter the last name  '
 		 ,
 		  
         email:{
			 required:'please enter the email address',
              email:'please enter a valid email'

 		   }
	   }
		 
		 
	 })
    
    
    
	   //validate password update form
     $('#password_reset').validate({
          
		 rules:{
			  current_pwd:{
				 required:true,
			 },
			 new_pwd:{
				 required:true,
				 minlength:6,
 				 
			 },
             email:{
                 required: true,
                 email: true
               },
             fname:{
                 required: true,
                 minlength:2

                },
             lname:{
                 required: true,
                 minlength:2
                },
			 confirm_pwd:{
				 required:true,
				 minlength:6,
				equalTo:"#new_pwd"
 				 
			 }
		 },
		 
		 messages:{
             
            fname:
			    'please enter the first name'
             ,
            lname:
			       'please enter the last name  '
 		 ,
 		  current_pwd:{
			 required:'please enter the current password',
 		 },
           
 		 
         
         email:{
			 required:'please enter the email address',
              email:'please enter a valid email'

 		 },
             
		 new_pwd:{
			 required:'please enter new passowrd',
			 minlength:'password must be at least 6 char'
 		 },
		 confirm_pwd:{
			 required:'please enter new passowrd',
			 minlength:'password must be at least 6 char',
			 equalTo:'password doesnot match'
 		 }
	 }
		 
		 
	 })
	 
	 
	
	 
});

 
// check if the password correct after user finish typing t then display message
$(document).ready(function(){

// Init a timeout variable to be used below
var timeout = null;

// Listen for keystroke events
  $('#current_pwd').on('keyup', function (e) {
    // Clear the timeout if it has already been set.
    // This will prevent the previous task from executing
    // if it has been less than <MILLISECONDS>
    clearTimeout(timeout);
     // Make a new timeout set to go off in 1000ms (1 second)
    timeout = setTimeout(checkPassword, 900);
});

function checkPassword(){
      // get the password abd email values 
     var password =$('#current_pwd').val();
      var email =$('#email').val();
      $.ajax({
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        type: "POST",
        url: '../views/user_profile_view.php',
        dataType:"text",
        data: { email: email, password: password },   
        success: function(resp){
            
          if(resp == 'true'){
				$("#current_pwd_msg").html("Current password is correct").css("color", "green");
          }else{
				$("#current_pwd_msg").html(" Current password is incorrect").css("color", "red");
          }
            
         },error:function(){
             
			 alert('error');
		  }
         
        });
}
 });
    


    


 