<?php
include('inc/begin.php');
?>
	
		<div id="corps">
	
			<div id="welcome">
				<h1>Frambug : Liste des categories</h1> 
			</div>

			<div id="message">
					
			</div>
			
			<div id="list" >

				<table class="center">
				
				<tr>
					<th><a href="?sort=bug_id">#</a></th>
					<th>Nom</th>
				</tr>
			
				<?php $cats = $conn->query("SELECT * FROM categories ORDER BY cat_name;"); ?>
				<?php while ( $cat = mysqli_fetch_array($cats) ) { ?>
				<tr>
					<td><a href="category.php?cat_id=<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_id']; ?></a></td>
					<td><a href="category.php?cat_id=<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></a></td>
				</tr>
				<?php } // Fin While $bugs ?>


				</table>

			</div>

			<div id="logo">
				<img class="inline" style="height: 16px;" src="favicon.svg" />
				Frambug <?php echo date("Y"); ?>
				<img class="inline" style="height: 16px;" src="favicon.svg" />
			</div>
			
		</div>
	
	<script>document.title = "Frambug";</script>
<?php
include('inc/end.php');
?>
