<?php
include('inc/begin.php');
?>

<?php 
$nb = 0;
if ( isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])) { 
	$cat_id=$_GET['cat_id']; 
	$cats = $conn->query("SELECT cat_id, cat_name FROM categories c WHERE cat_id=".$cat_id.";"); 
	$nb = $cats->num_rows; 
	if ( $nb > 0 ) 
	{
		$cat = mysqli_fetch_array($cats); 
	} // Fin du if ( $nb > 0 )
} // Fin du if ( isset($_GET['cat_id']) ) { 

$action = "nothing";
if ( isset($_GET['action']) ) {
	$action = $_GET['action'];
} // Fin du ( isset($_GET['action'])
?>



		<div id="corps">
	
			<div id="welcome">
				<?php if ( $nb ==1  ) { ?>
				<h1>Catégorie #<?php echo $cat['cat_id']; ?> : <?php echo $cat['cat_name']; ?></h1> 
				<script>document.title = "Catégorie #<?php echo $cat['cat_id']; ?> : <?php echo $cat['cat_name']; ?>";</script>
				<?php } else { // du if ( $exist==0 ) { ?>
				<h1>Frambug : Liste des categories</h1>
				<script>document.title = "Frambug : Liste des categories";</script>
				<?php }  // Fin  if ( $exist==0 ) { ?>
			</div>

			<div id="message">
					
			</div>
			
			<?php if ( $nb == 1 ) { ?>

			tableau listant la catégorie

			<?php } else { // du if ( $nb == 1 ) ?>

				<?php switch ($action) { // Ne pas fermer 
					case "add": ?>
					on ajoute une catégorie
					<?php break; ?>
					
					<?php case "modify": ?>
					on modifie une catégorie
					<?php break; ?>

					<?php default : ?>
			<div id="list" >

				<table class="center">
				
				<tr>
					<th><a href="?sort=cat_id">#</a></th>
					<th>Nom</th>
				</tr>
			
				<?php $cats = $conn->query("SELECT * FROM categories ORDER BY cat_name;"); ?>
				<?php while ( $cat = mysqli_fetch_array($cats) ) { ?>
				<tr>
					<td><a href="admin_category.php?cat_id=<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_id']; ?></a></td>
					<td><a href="admin_category.php?cat_id=<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></a></td>
				</tr>
				<?php } // Fin While $cats ?>


				</table>

			</div>
				<?php } // Fin case ?>

			<?php } //fin du if ( $nb == 1 ) ?>

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
