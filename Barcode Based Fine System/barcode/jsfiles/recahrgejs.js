$(document).ready(function(e) {
         $('#rechargeform').submit(function(){
				
			$('.err').remove();	
			var barcode = $('#cardno').val().trim();
			var recharge = $('#amount').val().trim();
			//var chkname=/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
			var flag=1;
			if(barcode.length==0)
			{
				$('#cardno').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			else if(!($.isNumeric(barcode)))
			{
			   $('#cardno').closest('tr').append('<td class="err" style="color:red;">* ONLY NUMERIC</td>')	;
			   flag = 0;
			}
			if(recharge.length==0)
			{
				$('#amount').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			else if(!($.isNumeric(barcode)))
			{
			   $('#amount').closest('tr').append('<td class="err" style="color:red;">* ONLY NUMERIC</td>')	;
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