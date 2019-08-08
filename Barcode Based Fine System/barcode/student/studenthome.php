<?php

	include('../config.php');
	session_start();
	
    if (   ($_SESSION['id']== NULL  &&  $_SESSION['salt']==NULL )  ||  ($_SESSION['id'] !=  $_SESSION['salt'])  )
    {
        header('Location:logout.php');
		exit();
    }
	
	mysql_connect('localhost','root','');
	mysql_select_db('cashdigi');
	$charge = "select * from student_charge where cardno =".$_SESSION['cardno']." and status = 0";
	$detail = "select * from student_detail where cardno =".$_SESSION['cardno'];
	$studentcharge = mysql_query($charge);
	$studentdetail =  mysql_query($detail);
	
?>
<script src="<?php echo JQLIB_PATH_HTML?>jquery-1.11.0.js"></script>
<script src="../jqlib/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../jsfiles/studenthomejs.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Free CSS template by ChocoTemplates.com</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>

<noscript>

	<meta http-equiv="refresh" content="0;url=..\javascripterror.php">
    
</noscript>

<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">Cash-Digi Student Panel</a></h1>
			<div id="top-navigation">
				Welcome <a href="#"><strong>Student</strong></a>
				<span>|</span>
				<a href="#">Help</a>
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <!--<li><a href="home.php" class="active"><span>Dashboard</span></a></li>
			    <li><a href="insertbarcode.php"><span>Insert Barcode</span></a></li>
			    <li><a href="insertstudentdetail.php"><span>Issue Card</span></a></li>
			    <li><a href="recharge.php"><span>Recharge Card</span></a></li>
			    <li><a href="userdetail.php"><span>Products</span></a></li>
			    <li><a href="addusertype.php"><span>Add UserType</span></a></li>
                <li><a href="insertcharge.php"><span>Insert Charge</span></a></li>-->
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<h1> STUDENT HOME </h1>
<table border="1">
<tr>
	<td align="center" colspan="7">STUDENT DETAIL</td>
</tr>
<tr>
	<td align="center">CARD NUMBER</td>
    <td>ROLL NUMBER</td>
    <td align="center">NAME</td>
    <td>YEAR OF ADMISSION</td>
    <td>BRANCH</td>
    <td>CONTACT NUMBER</td>
    <td align="center">IMAGE</td>
</tr>
<?php 
	if(mysql_num_rows($studentdetail))
	{
		
	    while($r=mysql_fetch_assoc($studentdetail))
		{
			
			
			
			?>
             <tr>
               <td><?php echo $r['cardno']?></td>
               <td><?php echo $r['rollno']?></td>
               <td><?php echo $r['sname']?></td>
               <td align="center"><?php echo $r['year']?></td>
               <td align="center"><?php echo $r['branch']?></td>
               <td><?php echo $r['phno']?></td>
               <td><img src="../admin/studentimage/<?php echo $r['studentimage']?>" style="height:100px; width:100px;"></td>
            </tr>
       	    <?php
		 } 
	}
?>
</table>
<table border="1">
<tr>
	<td colspan="5" align="center">CHARGE DETAIL<td>
</tr>
<tr>
	<td>TYPE OF CHARGE</td>
    <td>DUEDATE</td>
    <td>AFTER DUEDATE CHARGE</td>
    <td>TOTAL CHARGE</td>
    <td>PAY</td>
</tr>



<?php 
	function getpayname($id)
	{
		$q = "select types from pay_types where id = '$id' ";
		$arr=mysql_fetch_assoc(mysql_query($q));
	    return $arr['types'];
	}
	
	if(mysql_num_rows($studentcharge))
	{
	
	    while($r=mysql_fetch_assoc($studentcharge))
		{
			
			?>
             <tr>
               <td><?php echo getpayname( $r['paytype_id'])?>
                 <input type="hidden" id="payid" value="<?php echo $r['paytype_id']?>"/></td>
               <td><?php echo $r['duedate']?></td>
               <td><?php echo $r['dueamount']?></td>
               <td><?php echo $r['amount']?></td>
               <td><?php $numm=$_SESSION['number']; echo "<input type='button' class='pay' id=$numm value='Pay'"; ?> /></td>
            </tr>
       	    <?php
		 } 
	}
	
?>

</table>
<script>
$(document).ready(function(){
	$('.pay').click(function(){
		
	var id=$(this).attr('id');
	alert(id);
			$.post('sms.php',{id:id},function(data){
					alert(data);
					//window.location='studenthome.php'
					//alert("SMS Sent to "+id);
					
					
			});
	});

});
</script>
<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left"></span>
		<span class="right">
			<a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide"></a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>