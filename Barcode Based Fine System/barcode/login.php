<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

<!--
hallux, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
</head>
<body>
<div id="container">

    <header> 
	<div class="width">
    		<h1><a href="#">COLLEGE</a></h1>

		<nav>
	
    			<ul class="sf-menu dropdown">
                
                
               




			</ul>

			
			<div class="clear"></div>
    		</nav>
       	</div>

	<div class="clear"></div>

       
    </header>


   <div id="body" class="width">

	<section id="content" class="one-column">





<br><h3>Login...</h3><br><br><br>
<form action="login.php" method="post">
<table align="center">
<tr>
<td><input type="text" name="uname" placeholder="User Name" /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Password" /></td>
</tr>
<tr>
<td><input type="submit" name="b" value="Login"/></td>
</tr>
</table>
</form><br><br>

<?php

if(isset($_POST['b'])){

if(($_POST['uname']=='admin')&&$_POST['password']=='admin'){
	echo "<script>window.location='admin.php'</script>";
}
else{
	echo "Invalid";
	}
}
include_once('footer.php');
?>