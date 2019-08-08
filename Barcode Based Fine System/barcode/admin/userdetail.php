<?php

	include('../config.php');
	
	 if (   ($_SESSION['id']== NULL  &&  $_SESSION['salt']==NULL )  || ( $_SESSION['id'] !=  $_SESSION['salt'] )  )
    {
        header('Location:logout.php');
		exit();
    }
	
	
	///////////////////////////////////////////////////////////
	 //To create dynamic dropdown//
	/////////////////////////////////////////////////////////////
	mysql_connect('localhost','root','');
	mysql_select_db('cashdigi');
	$query1 = "select * from master_usertype";
	$rs = mysql_query($query1);
	
	if(isset($_POST['userdetailaccept']))
	{
		$usertypeid = $_POST['usertype'];
		$username = $_POST['username'];
		$userphoneno = "91".$_POST['userphoneno'];
		$useraddress = $_POST['useraddress'];
		$useremailid = $_POST['useremailid'];
		function random_password($num)
		{
			$val="asdfghjkrtyuiopqwbASDFHHGJYUOIUYUTRWQQ@%1322345456657768879765455";
			$userpassword="";
			for($i=1;$i<=$num;$i++)
			{
				$index=rand(0,strlen($val)-1);
				$userpassword=$userpassword.$val[$index];	
			}	
			
			return $userpassword;
			
		}

		$userpassword = random_password(5);
		$query = "insert into user_login values('NULL','$usertypeid','$username','$userpassword','$userphoneno','$useraddress','$useremailid');";
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
	if(isset($_POST['cancel']))
	{
		header('Location:home.php');	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Detail</title>
<script src="<?php echo JQLIB_PATH_HTML ?>/jquery-1.11.0.js"></script>
<script src="../jsfiles/userdetailjs.js"></script>
</head>

<body>
<noscript>

	<meta http-equiv="refresh" content="0;url=..\javascripterror.php">
    
</noscript>

<?php if ( isset($err) ){  ?>
<div id="msg" style="background-color:#F96; color:#0CF; height:25px; width:100%;" align="center"><?php echo $err;unset($err); ?></div>
<?php } ?>
<h1 align="center">USER DETAIL</h1>
<form action="" method="post" id="userdetail">
  <table align="center">
   	 <tr>
          <td><label>USER TYPE</label></td>
          <td><select name="usertype" id="usertype">
			  <?php 
                while($row=mysql_fetch_array($rs))
				 {
               		 echo"<option value=$row[id]>$row[usertype]</option>";
              	 }
              ?>
              </select>
          </td>
    </tr>
    <tr>
      <td><label>USER NAME</label></td>
      <td><input type="text" id="username" name="username" placeholder="NAME" /></td>
    </tr>
    <tr>
      <td><label>USER PHONE NUMBER</label></td>
      <td><input type="text" id="userphoneno" name="userphoneno" placeholder="PHONE NUMBER"/></td>
    </tr>
    <tr>
      <td><label>USER ADDRESS</label></td>
      <td><input type="text" id="useraddress" name="useraddress" placeholder="ADDRESS"/></td>
    </tr>
    <tr>
      <td><label>USER EMAIL_ID</label></td>
      <td><input type="text" id="useremailid" name="useremailid" placeholder="EMAIL_ID"/></td>
    </tr>
    <tr>
      <td><input type="submit" id="userdetailaccept" name="userdetailaccept"  /></td>
      <td><input type="button" onclick="form.reset(); window.location='home.php'" id="cancel" name="cancel" value="BACK"/></td>
    </tr>
  </table>
</form>
</body>
</html>