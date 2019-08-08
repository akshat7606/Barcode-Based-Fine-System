$(document).ready(function(e) {
    
		$('#pay').click(function(e) {
            
				$('.getcharge').each(function(index, element) {
                    
						if($(this).is(':checked'))
						{
								var id = $(this).attr('data-id').trim();
								var pid = $(this).closest('tr').find('td:nth-child(1)').find('input').val();
								$.post('../ajaxphp/paycharge.php',{cid:id,pid:pid},function(data)	
																	 {
																		 console.log(data);
																		var obj = jQuery.parseJSON(data); 
																		if(obj.errno  == 0 )
																		{
																		  alert(obj.errormsg);	
																		}
																		if(obj.errno == 1)
																		{
																		  //alert(obj.errormsg);
																		  window.location = "transactiondetail.php";
																		}
																		 
																	 })
								
								
						}
						else
						{
							
						}
					
                }); // end of #getcharge
				
			
        }); // end of #pay
	
});// end of ready