
$(document).ready(function(){
     
     $('#check_btn').on('click', function(e){
    //Stop the form from submitting itself to the server.
    e.preventDefault();
     var date_in = $('#date_in').val();
     var date_out = $('#date_out').val();
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
                 alert(resp);
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





$(document).ready(function(){
 $('#refine_btn').on('click', function(){
    //$( "#cahnged_pra" ).replaceWith( <input type="submit" value="check avalability"   id="check_btn">);
    $( "#changed_tr" ).css( "display","none" );
    $( "#check_btn" ).css( "display","block" );
  

  });

    
}); 