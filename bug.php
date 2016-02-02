<?php
include('inc/begin.php');
?>


<?php 
$nb = 0;
if ( isset($_GET['bug_id']) && is_numeric($_GET['bug_id'])) { 
	$bugid=$_GET['bug_id']; 
	$bugs = $conn->query("SELECT bug_id, bug_name, u2.realname as submitted_by, submitted_date, cat_name, priority, u1.realname as assign_to, state, bug_text FROM bugs b LEFT JOIN categories c ON b.cat_id=c.cat_id LEFT JOIN users u1 ON b.assign_to=u1.user_id LEFT JOIN users u2 ON b.submitted_by=u2.user_id WHERE bug_id=".$bugid.";"); 
	$nb = $bugs->num_rows; 
	if ( $nb > 0 ) 
	{
		$bug = mysqli_fetch_array($bugs); 
	} // Fin du if ( $nb > 0 )
} // Fin du if ( isset($_GET['bug_id']) ) { 
?>

		<div id="corps">
	
			<div id="welcome">
					<?php if ( $nb ==1  ) { ?>
					<h1>Bug #<?php echo $bug['bug_id']; ?> : <?php echo $bug['bug_name']; ?></h1> 
					<script>document.title = "Bug #<?php echo $bug['bug_id']; ?> : <?php echo $bug['bug_name']; ?>";</script>
					<?php } else { // du if ( $exist==0 ) { ?>
					<h1>Erreur : Le bug n'existe pas</h1>
					<script>document.title = "Erreur : Le bug n'existe pas";</script>
					<?php }  // Fin  if ( $exist==0 ) { ?>
			</div>
			
			<?php if ( $nb == 1 ) { ?>
			<div id="edit" >

				<table class="center">
					
					<tr>
						<td class="bold" colspan="4"> <?php echo $bug['bug_name']; ?></td>
					</tr>
					<tr>
						<td class="bold">Ajouté par :</td><td><?php echo $bug['submitted_by']; ?></td>
						<td class="bold">Ouvert le :</td><td><?php echo $bug['submitted_date']; ?></td>
					</tr>
					<tr>
						<td class="bold">Catégorie :</td><td><?php echo $bug['cat_name']; ?></td>
						<td class="bold">Priorité :</td><td><?php echo $bug['priority']; ?></td>
					</tr>
					<tr>					
						<td class="bold">Assigné à :</td><td><?php echo $bug['assign_to']; ?></td>
						<td class="bold">Avancement :</td><td><?php echo $bug['state']; ?>%</td>
					</tr>
					<tr>
						<td class="bold" colspan="4">Description</td>
					</tr>
					<tr>
						<td colspan="4"><?php echo $bug['bug_text']; ?></td>
					</tr>
				</table>

			</div>
			
			<div id="comments">
				<div id="newcomment">
					<form>
						<textarea></textarea>
					</form>
				</div>

				<?php $comments = $conn->query("SELECT * FROM comments WHERE bug_id=$bugid ORDER BY comm_date DESC;"); ?>
				<?php while ( $comment = mysqli_fetch_array($comments) ) { ?>
				<div class="comment">
					<?php echo $comment['comm_text']; ?>
				</div>
				<?php } // Fin while ( $comment = mysqli_fetch_array($comments) ) { ?>

			</div>
			
			
			<?php } //fin du if ( $nb == 1 ) ?>

			<div id="logo">
				<img class="inline" style="height: 16px;" src="favicon.svg" />
				Frambug <?php echo date("Y"); ?>
				<img class="inline" style="height: 16px;" src="favicon.svg" />
			</div>
			
		</div>

		<script src="js/formulaires-ajax.js"></script> 	
<?php
include('inc/end.php');
?>
