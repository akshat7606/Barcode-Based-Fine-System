$(document).ready(function(e) {
         $('#chargedetailform').submit(function(){
				
			$('.err').remove();	
			var cardno = $('#cardno').val().trim();
			var amount = $('#amount').val().trim();
			var duedate = $('#duedate').val().trim();
			var dueamount = $('#dueamount').val().trim();
			//var chkname=/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
			var flag=1;
			if(cardno.length==0)
			{
				$('#cardno').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			else if(!($.isNumeric(cardno)))
			{
			   $('#cardno').closest('tr').append('<td class="err" style="color:red;">* ONLY NUMERIC</td>')	;
			   flag = 0;
			}
			if(amount.length==0)
			{
				$('#amount').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			else if(!($.isNumeric(amount)))
			{
			   $('#amount').closest('tr').append('<td class="err" style="color:red;">* ONLY NUMERIC</td>')	;
			   flag = 0;
			}
			if(duedate.length==0)
			{
				$('#duedate').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			if(dueamount.length==0)
			{
				$('#dueamount').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			else if(!($.isNumeric(dueamount)))
			{
			   $('#dueamount').closest('tr').append('<td class="err" style="color:red;">* ONLY NUMERIC</td>')	;
			   flag = 0;
			}
			
			if(flag)
			{
				//alert('true block');
				//alert(x);
			   return true;	
			   
			}
			else
			{
				return false;	
			}
			
			
			});
			$(':input').keypress(function(e) {
                
					if(e.which==10 || e.which==13)
					{
						e.preventDefault();
						e.stopPropagation();
						return false;	
					}
				
            });
			
		$('#cardno').keyup(function(e) {
            
				var x =  $(this).val().trim();
				$.post('../ajaxphp/getStudentDetail.php',{id:x},function( data ){
					$('#studetail').html(data);
						
						
					});
			
        });			
 });