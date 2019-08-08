


<?php include ('header.php');?>
<h1 align="center"> RECHARGE FORM</h1>
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
            <h2 class="left">Recharge Card</h2>
          </div>
          <!-- End Box Head --> 
          
          <!-- Table -->
          <div class="table">
            <form action="" method="post" id="rechargeform">
              <table align="center">
                <tr>
                  <td><label>CARDNO.</label></td>
                  <td><input type="text" id="cardno" name="cardno" placeholder="CARDNO"/></td>
                </tr>
                <tr>
                  <td><label>AMOUNT</label></td>
                  <td><input type="text" id="amount" name="amount" placeholder="AMOUNT"/></td>
                </tr>
                <tr>
                  <td><input type="submit" value="Recharge" id="amountaccept" name="amountaccept"  /></td>
                  <td><input type="button" onclick="form.reset(); window.location='home.php'" id="cancel" name="cancel" value="BACK"/></td>
                </tr>
              </table>
            </form>
            <!-- Pagging --> 
            <div id="studetail"></div>
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
<?php
       include('../config.php');
	 
    
	
	if(isset($_POST['amountaccept']))
	{
		mysql_connect('localhost','root','');
		mysql_select_db('cashdigi');
		$cardno = $_POST['cardno'];
		$amount = $_POST['amount'];	
		
		
			$q = "select * from std_amount where cardno = $cardno";
			$q2 = "select phno from student_detail where cardno = $cardno";
			$rs = mysql_query($q);
			$rs2 = mysql_query($q2);
			$date = date('d-M-y');
			if(mysql_num_rows($rs))
			{
				$row1= mysql_fetch_row($rs);
				$currentamount = $row1[1];
				$amount1 = $currentamount+$amount;
				$query = "update std_amount set amount='$amount1' where cardno='$cardno'";
				$rs = mysql_query($query);
				if($rs==1)
				{
					echo "<script> alert('Recharge Sucessfull'); window.location='recharge.php' </script>";
					$row2 = mysql_fetch_row($rs2);
					$mobno = $row2[0];
					$query2 = "insert into transaction_detail values(null,'$cardno','$amount','$date','recharge'); ";
					$rs3 = mysql_query($query2);
				}
					
					
			else
			{
				$err=" INVALID CARD NUMBER !!!!!!!!!!!!!";
			}
		}
	}
?>
<?php include ('footer.php');?>