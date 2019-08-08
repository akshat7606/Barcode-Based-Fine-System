<?php
    include('../config.php');
	include('header.php');
	
    /*if (   ($_SESSION['id']== NULL  &&  $_SESSION['salt']==NULL )  ||  ($_SESSION['id'] !=  $_SESSION['salt'])  )
    {
        header('Location:logout.php');
		exit();
    }*/
?>
<h1 align="center"> HOME PAGE </h1>
<p align="center" style="margin-top:20px;" >

<table border="1" width="80%" style="border-collapse:collapse" align="center">
<tr><td>S.NO</td><td>Card Number</td><td>Roll No / ID</td><td>Name</td><td>Branch</td><td>Amount</td><td>Image</td></tr>
<?php
mysql_connect('localhost','root','');
mysql_select_db('cashdigi');
 $q="select student_detail.*,std_amount.amount from student_detail,std_amount where std_amount.cardno=student_detail.cardno";
$rs=mysql_query($q);
$i=0;
mysql_num_rows($rs);
	while($row=mysql_fetch_array($rs))
	{
	$i++;		echo "<tr>
					<td>$i</td>
					<td>$row[cardno]</td>
					<td>$row[rollno]</td>
					<td>$row[sname]</td>
					<td>$row[branch]</td>
					<td>$row[amount]</td>
					<td><img src='studentimage/$row[studentimage]' height='100px' width='100px'/></td>
					
					</tr>";
			
	}

?>


</p>




<?php include('footer.php');?>
<!--<a href="logout.php">logout</a>&nbsp;&nbsp;
<a href="insertbarcode.php">insertbarcode</a>&nbsp;&nbsp;
<a href="insertstudentdetail.php">insertstudentdetail</a>&nbsp;&nbsp;
<a href="recharge.php">recharge</a>&nbsp;&nbsp;
<a href="userdetail.php">userdetail</a>&nbsp;&nbsp;
<a href="addusertype.php">add user Type</a>&nbsp;&nbsp;
<br /><br /><br /><br /><a href="addpaytype.php">add pay Type</a>&nbsp;&nbsp;
<a href="insertcharge.php">add charge detail</a>&nbsp;&nbsp;-->