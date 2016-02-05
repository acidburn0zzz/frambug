<!DOCTYPE html>
<?php
session_start();
header( 'content-type: text/html; charset=utf-8' );
include('sql_open.php');
include('functions.php');
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="icon" href="favicon.svg" type="image/x-icon"  />
		<script src="js/jquery-1.11.3.min.js"></script>	
		<script src="js/ajax-form.js"></script>			
		<link rel="stylesheet" href="css/style.css" type="text/css" />
	
		<!-- Code pour TinyMCE -->
		<script src="plugins/tinymce/tinymce.min.js"></script>
		<script>
		tinymce.init({
			mode : "textareas",
			//height: 500,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table contextmenu paste code'
			],
			toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			language : "fr_FR",
			menubar: false,
			statusbar: false,
		});	
		</script>

		<!-- Fin code TinyMCE -->

	</head>
	
	<body>
		<div id="menu">
			<ul id="navigation">
				<li><a href="index.php" title="Accueil">Accueil</a></li>
				<li><a href="open.php" title="Ouvrir un bug">Ouvrir un bug</a></li>
				<li><a href="list.php" title="Liste des bugs">Liste des bugs</a></li>
				
				<?php if ($isadmin) { ?>
				<li><a href="admin.php">Admin</a></li>
				<li><a href="admin_category.php" title="Liste des catégories">Liste des catégories</a></li>
				<?php } ?>
				
				<?php if ( isset($_SESSION['user_id']) ) { ?>
				<li><a href="user.php" title="Mon profil">Mon profil</a></li>
				<?php } ?>

			</ul>
		</div>
