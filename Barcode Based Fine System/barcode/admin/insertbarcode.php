<?php 
	
	include('../config.php');
	
	
	if(isset($_POST['barcode']))
	{
		mysql_connect('localhost','root','');
		mysql_select_db('cashdigi');
		$barcode = $_POST['barcode'];
		
		if( trim($barcode) == '')
		{
			$err=" BARCODE REQUIRED !!!";
			
		}
		elseif(!is_numeric($barcode))
		{
				$err="ONLY NUMBER!!!!!!";
		}
		else
		{
			$query = "insert into master_cardno values('$barcode')";
			$rs = mysql_query($query);
			if($rs==1)
			{
				$err="<span style='color:green;'>SUCCESSFULLY INSERTED!!!!</span>";
			}
			else
			{
					$err="<span style='color:red;'>NOT SAVED!!!!</span>";
			}
		}
	}
      
?>
<?php include ('header.php');?>
<script src="<?php echo JQLIB_PATH_HTML ?>/jquery-1.11.0.js"></script> 
<script type="text/javascript">
$(document).ready(function(e) {
        $('#insertbarcodeform').submit(function(){
				
				
			$('.err').remove();	
			var barcode = $('#barcode').val().trim();
			//var chkname=/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
			var flag=1;
			
			if(barcode.length==0)
			{
				$('#barcode').closest('tr').append('<td class="err" style="color:red;">* REQUIRED</td>')	;
				flag = 0;
			}
			else if(!($.isNumeric(barcode)))
			{
			   $('#barcode').closest('tr').append('<td class="err" style="color:red;">* ONLY NUMERIC</td>')	;
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
			
				
 });

</script>
<h1 align="center">INSERT BARCODE</h1>
<?php if ( isset($err) ){  ?>
<div id="msg" style="background-color:#F96; color:#0CF; height:25px; width:100%;" align="center"><?php echo $err;unset($err); ?></div>
<?php } ?>
<!-- Container -->
<div id="container">
  <div class="shell"> 
    
    <!-- Small Nav --> 
    <!--<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			Current Articles
		</div>--> 
    <!-- End Small Nav --> 
    
    <!-- Message OK --> 
    <!--<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>--> 
    <!-- End Message OK --> 
    
    <!-- Message Error --> 
    <!--<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>--> 
    <!-- End Message Error --> 
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      
      <!-- Content -->
      <div id="content"> 
        
        <!-- Box -->
        <div class="box"> 
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Insert Barcode</h2>
          </div>
          <!-- End Box Head --> 
          
          <!-- Table -->
          <div class="table">
          <form id="insertbarcodeform" method="post">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2"><input name="barcode" type="text" placeholder="barcode" id="barcode"/></td>
              </tr>
              <tr>
                <td><input type = "submit" value = "submit" name = "baraccept" id="baraccept"/></td>
                <td><input type = "button" onclick="form.reset();window.location='home.php'" value = "BACK" id="backhome"/></td>
              </tr>
            </table>
            </form>
            <!-- Pagging -->
            
            <!-- End Pagging --> 
            
          </div>
          <!-- Table --> 
          
        </div>
        
      </div>
      <!-- End Content --> 
      
      
      <div class="cl">&nbsp;</div>
    </div>
    <!-- Main --> 
  </div>
</div>
<!-- End Container -->
<?php include('footer.php')?>