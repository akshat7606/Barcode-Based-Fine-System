<?php

	include('../config.php');
	
	 if (   ($_SESSION['id']== NULL  &&  $_SESSION['salt']==NULL )  || ( $_SESSION['id'] !=  $_SESSION['salt'] )  )
    {
        header('Location:logout.php');
		exit();
    }
	
	  if(isset($_POST['addusertype']))
	{
		mysql_connect('localhost','root','');
		mysql_select_db('cashdigi');
		$usertype = strtoupper(trim($_POST['usertype']));
		$usertype = $usertype==''?NULL:$usertype;
		if( trim($usertype) == NULL)
		{
			$err=" USERTYPE REQUIRED !!!";
			
		}
		elseif(is_numeric($usertype))
		{
				$err="ONLY ALPHABET!!!!!!";
		}
		else
		{
			$query = "insert into master_usertype values(NULL,'$usertype')";
			$rs = mysql_query($query);
			if($rs==1)
			{
				$err="<span style='color:green;'>SUCCESSFULLY INSERTED!!!!</span>";
			}
			else
			{
					$err="<span style='color:red;'>Already Created!!!!</span>";
			}
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

<h1 align="center">ADD USER TYPE</h1>

 <?php if ( isset($err) ){  ?>   
 <div id="msg" style="background-color:#F96; color:#0CF; height:25px; width:100%;" align="center"><?php echo $err;unset($err); ?></div>
  <?php } ?> 
 <form id="usertype" method="post" action="">
<table align="center">
<tr>
	<td><label>USER TYPE</label></td>
    <td><input type="text" id="usertype" name="usertype" /></td>
</tr>
<tr>
	<td><input type="submit" id="addusertype" name="addusertype" /></td>
    <td><input type="button" id="back" onclick="form.reset(); window.location='home.php'" value="BACK" /></td>
</tr>

</form>
</body>
</html>