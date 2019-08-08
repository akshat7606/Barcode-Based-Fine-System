<?php
	include('../config.php');
	
	///////////////////////////////////////////////////////////
	 //To create dynamic dropdown//
	/////////////////////////////////////////////////////////////
	mysql_connect('localhost','root','');
	mysql_select_db('cashdigi');
	$query1 = "select * from pay_types";
	$paytype = mysql_query($query1);
	if(isset($_POST['chargeaccept']))
	{
		$paytypeid = $_POST['paytype'];
		$rollno = $_POST['rollno'];
		$query2="select * from student_detail where rollno = '$rollno'";
		$rs1 = mysql_query($query2);
		if(mysql_num_rows($rs1))
		{
			$rs2 = mysql_fetch_row($rs1);
			$cardno = $rs2[0];
			$amount = $_POST['amount'];
			$duedate = $_POST['duedate'];
			$dueamount = $_POST['dueamount'];
		    $query = "insert into student_charge values('NULL','$paytypeid','$cardno','$amount','$duedate','$dueamount','0');";
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
		else
		{
			$err="<span style='color:red;'>ROLLNUMBER DOESNOT EXIST!!!!</span>";
		}
	}
?>
<script src="<?php echo JQLIB_PATH_HTML ?>/jquery-1.11.0.js"></script>
<script src="../jsfiles/insertchargejs.js"></script>
<?php include ('header.php');?>
<?php if ( isset($err) ){  ?>
<div id="msg" style="background-color:#F96; color:#0CF; height:25px; width:100%;" align="center"><?php echo $err;unset($err); ?></div>
<?php } ?>
<h1 align="center">INSERT CHARGE DETAIL</h1>

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
            <form action="" method="post" id="chargedetailform">
              <table align="center">
                <tr>
                  <td><label>PAY TYPE</label></td>
                  <td><select name="paytype" id="paytype">
                      <?php 
                while($row=mysql_fetch_array($paytype))
				 {
               		 echo"<option value=$row[id]>$row[types]</option>";
              	 }
              ?>
                    </select></td>
                </tr>
                <tr>
                  <td><label>STUDENT ROLL NUMBER / FACULTY ID</label></td>
                  <td><input type="text" id="rollno" name="rollno" placeholder="ROLLNUMBER" /></td>
                </tr>
                <tr>
                  <td><label>AMOUNT</label></td>
                  <td><input type="text" id="amount" name="amount" placeholder="AMOUNT"/></td>
                </tr>
                <tr>
                  <td><label>DUE DATE</label></td>
                  <td><input type="date" id="duedate" name="duedate" placeholder="DUE DATE"/></td>
                </tr>
                <tr>
                  <td><label>AFTER DUE DATE AMOUNT</label></td>
                  <td><input type="text" id="dueamount" name="dueamount" placeholder="DUE AMOUNT"/></td>
                </tr>
                <tr>
                  <td><input type="submit" id="chargeaccept" name="chargeaccept"  /></td>
                  <td><input type="button" onclick="form.reset(); window.location='home.php'" id="cancel" name="cancel" value="BACK"/></td>
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
<div id="studetail"></div>
<?php include ('footer.php');?>