$(document).ready(function(e) {
        $('#userdetail').submit(function(){
			
	 try{	
			$('.err').remove();	
			var username = $('#username').val().trim();
			var userphoneno = $('#userphoneno').val().trim();
			var useraddress = $('#useraddress').val().trim();
			var useremailid = $('#useremailid').val().trim();
			var flag=1;
			 if( username.length==0)
			 {
				$('#username').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			 }
			  if(userphoneno.length==0)
			 {
			   $('#userphoneno').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
			   flag = 0;
			 }
			if(useraddress.length==0)
			{
				$('#useraddress').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			 if(useremailid.length==0)
			{
			   $('#useremailid').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
			   flag = 0;
			}
			 if( !($.isNumeric(userphoneno)) && userphoneno!='' )
			  {
				 $(this).closest('tr').append('<td class="err" style="color:red;">* Only Number</td>');
				 flag = 0;
			 }
			 if(userphoneno.length!=10)
				 {
						$(this).closest('tr').append('<td class="err" style="color:red;">* 10 Digits only</td>');
				 		flag= 0;
				 }
			
			 
			
			if(flag)
			{
			   return true;	
			}
			else
			{
				
			 return false;	
			}
			
			}catch(err){
				  alert(err.message);
				}
			});
			
			
	////////////////////////////////////////////////////////////////////////
	  //onkeyup for numeric value
	    $('#userphoneno').keyup( function(){
			$('.errNum').remove();
			 var x= $(this).val().trim();
			 
			 if( !($.isNumeric(x)) && x!='' )
			 {
				 $(this).closest('tr').append('<td class="errNum" style="color:red;">* Only Number</td>');
			 }
			 else
			 {
			    var count=x.length	;
				 if( count > 10)
				{
					$(this).closest('tr').append('<td class="errNum" style="color:red;">* 10 Digits only</td>');
					y=x.substr(0,count-1);
					$(this).val(y);
				} 
			 }
	     })
	////////////////////////////////////////////////////////////////////////////		
		 $('#userphoneno').blur(function(e) {
            
				 $(this).closest('tr').find('.err').remove();
				 var x= $(this).val().trim();
				 var count = x.length;
				 if(count!=10)
				 {
						$(this).closest('tr').append('<td class="errNum" style="color:red;">* 10 Digits only</td>');
				 }
			
        });
    });//ready