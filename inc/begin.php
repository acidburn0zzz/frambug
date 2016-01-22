<!DOCTYPE html>
<?php
session_start();
header( 'content-type: text/html; charset=utf-8' );
include('sql_open.php');
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="icon" href="favicon.svg" type="image/x-icon"  />
		<script src="js/jquery-1.11.3.min.js"></script>	
		<script src="js/ajax-form.js"></script>			
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		

	</head>
	
	<body>
		<div id="menu">
			<ul id="navigation">
				<li><a href="index.php" title="Accueil">Accueil</a></li>
				<li><a href="open.php" title="Ouvrir un bug">Ouvrir un bug</a></li>
				
				
				<li><a href="admin.php"> Admin</a></li>
			</ul>
		</div>
