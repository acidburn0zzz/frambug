<?php
include('inc/begin.php');
?>


<?php 
$nb = 0;
if ( isset($_GET['bug_id']) && is_numeric($_GET['bug_id'])) { 
	$bugid=$_GET['bug_id']; 
	$bugs = $conn->query("SELECT * FROM bugs WHERE bug_id=".$bugid.";"); 
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
						<td class="bold">Ajouté par </td><td>***<?php echo $bug['submitted_by']; ?>***</td>
						<td class="bold">Ouvert le :</td><td><?php echo $bug['submitted_date']; ?></td>
					</tr>
					<tr>
						<td class="bold">Catégorie :</td><td>***<?php echo $bug['cat_id']; ?>***</td>
						<td class="bold">Priorité :</td><td><?php echo $bug['priority']; ?></td>
					</tr>
					<tr>					
						<td class="bold">Assigné à :</td><td>***<?php echo $bug['assign_to']; ?>***</td>
						<td class="bold">Avancement :</td><td><?php echo $bug['state']; ?>%</td>
					</tr>
					<tr>
						<td class="bold" colspan="4">Description</td>
					</tr>
					<tr>
						<td colspan="4"><?php echo $bug['bug_text']; ?></td>
					</tr>
				</table>

				</form>
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
