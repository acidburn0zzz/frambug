<?php
include('inc/begin.php');
?>
	
		<div id="corps">
	
			<div id="welcome">
				<h1>Frambug : Liste des bugs</h1> 
			</div>

			<div id="message">
					
			</div>
			
			<div id="list" >

				<table class="center">
				
				<tr>
					<th><a href="?sort=bug_id">#</a></th>
					<th>Nom</th>
					<th>Assigné à</th>
					<th><a href="?sort=last_date">Mise à jour</a></th>
				</tr>
			
				<?php $bugs = $conn->query("SELECT * FROM bugs WHERE state != 100;"); ?>
				<?php while ( $bug = mysqli_fetch_array($bugs) ) { ?>
				<tr>
					<td><a href="bug.php?bug_id=<?php echo $bug['bug_id']; ?>"><?php echo $bug['bug_id']; ?></a></td>
					<td><a href="bug.php?bug_id=<?php echo $bug['bug_id']; ?>"><?php echo $bug['bug_name']; ?></a></td>
					<td><?php echo $bug['assign_to']; ?></td>
					<td><?php echo $bug['last_date']; ?></td>
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
