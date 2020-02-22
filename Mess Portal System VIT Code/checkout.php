<?php
include("includes/db.php");
include("functions/functions.php");
session_start()
 
?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Myshop</title>
<link rel="stylesheet" href="styles/styles.css" media="all" />
</head>

<body>

	<div id="right content">


		











<?php

if(!isset($_SESSION['customer_email']))
{

include("customer/customer_login.php");





}




?>







	
</body>
</html>