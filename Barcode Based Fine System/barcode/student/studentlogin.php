<?php

	session_start();
	if(isset($_POST['studentcode']))
	{
		mysql_connect('localhost','root','')or die("Connection Problem");
		mysql_select_db('cashdigi');			
		$studentcode = $_POST['studentcode'];
		$query = "select * from student_detail where cardno = '$studentcode'";
		$rs = mysql_query($query);
		
		if($rrw=mysql_fetch_array($rs))
		{
			$_SESSION['number']=$rrw['phno'];
		}
		
		if(mysql_num_rows($rs))
		{
			
			$_SESSION['salt'] = session_id().time().$_SERVER['REMOTE_ADDR'] ; //to make unique
			$_SESSION['id']=$_SESSION['salt'];
			$_SESSION['cardno'] = $studentcode;
			header("Location:studenthome.php");
			exit();	
		}
		else
		{
			$err="Invalid Student Code !!! ";
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center"> STUDENT LOGIN </h1>
 
 <?php if ( isset($err) ){  ?>   
 <div id="msg" style="background-color:#F96; color:#0CF; height:25px; width:100%;" align="center"><?php echo $err;unset($err); ?></div>
  <?php } ?> 

<form action="" method="post" id="studentlogin" style="margin-top:150px">
<table width="300px"  align="center">
	<tr>
		<td><input type="text" name="studentcode" id="studentcode" placeholder="SCAN YOUR ID" /></td>
    </tr>
</table>
</body>
</html>