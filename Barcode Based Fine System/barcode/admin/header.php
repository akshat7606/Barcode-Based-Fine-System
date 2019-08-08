<?php
include('../config.php');


     if( $_SESSION['id'] != session_id().$_SESSION['salt'] )
	 {
		header('Location:home.php');
		exit();

	 }
	
?>
<script src="<?php echo JQLIB_PATH_HTML?>jquery-1.11.0.js"></script>
<!DOCTYPE html>
<html>
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
			<h1><a href="#">Cash-Digi Admin</a></h1>
			<div id="top-navigation">
				Welcome <strong>Administrator</strong>
				
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="home.php" class="active"><span>Dashboard</span></a></li>
			    <li><a href="insertbarcode.php"><span>Insert Barcode</span></a></li>
			    <li><a href="insertstudentdetail.php"><span>Issue Card</span></a></li>
			    <li><a href="recharge.php"><span>Recharge Card</span></a></li>
			    <!--<li><a href="userdetail.php"><span>Products</span></a></li>
			    <li><a href="addusertype.php"><span>Add UserType</span></a></li>-->
                <li><a href="insertcharge.php"><span>Insert Charge</span></a></li>
	            <li><a href="addpaytype.php" target="new"><span>Add New Pay Type</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->
