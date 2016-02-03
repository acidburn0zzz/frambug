<?php
include('inc/begin.php');
?>
	
		<div id="corps">
			<?php $index=1; ?>
			
			<?php if ( isset($_GET['action'] ) && $_GET['action']=="ajouterxxx" ) { ?>
				<form id="formajouterxxx" action="inc/ajax-form.php" method="post">
					<input type="hidden" name="function" value="ajouterxxx" />
					<table class="center">
						<tr><th colspan="2"></th></tr>
						<tr>
							<td></td>
							<td colspan="2"><input type="submit" value="Créer" /></td>
						</tr>
					</table>
				</form>
			<?php $index=0; ?>
			<?php } // Fin get action ajouterxxxx?>

			<?php if ( isset($_GET['action']) && $_GET['action']=="modifierxxx" ) { ?>
				<?php if ( isset($_GET['id']) && is_numeric($_GET['id']) ) { ?>
					<?php  $id = $_GET['id']; ?>
					<?php $res = $conn->query("SELECT * FROM table WHERE id=".$id.";") ; ?>
					<?php $nb = $res->num_rows ; ?>
					<?php if ( $nb == 1 ) { ?>
					<?php $data = mysqli_fetch_array($res); ?>
					<form id="formmodifierxxx" action="inc/ajax-form.php" method="post">
						<input type="hidden" name="function" value="modifierxxx" />
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
						<table class="center">
                        	                        <tr><th colspan="2"></th></tr>
                	                                <tr>
        	                                                <td></td>
								<td></td>
                                        	        </tr>
							<tr>
                	                                        <td colspan="2"><input type="submit" value="Modifier" /></td>
        	                                        </tr>
	                                        </table>
					</form>
					<?php } // Fin if numrows ?>
				<?php } // Fin get id ?>
			<?php $index=0; ?>
			<?php } // Fin get action modifierxxx ?>


			<?php if ( $index==1 ) { ?>
			<div id="welcome">
				<h1>Administration</h1> 
			</div>

				<h2>Gestion des XXXX</h2>

			<table class="center">
				<tr><th>XXX</th><th>XXXX</th><th>Actions</th></tr>
				<?php $res = $conn->query("SELECT * FROM table ORDER BY xxx;"); ?>
				<?php while ( $data = mysqli_fetch_array($res) ) { ?>
				<tr>
					<td><?php echo $data['xxx']; ?></td>
					<td><?php echo $data['yyy']; ?></td>
					<td>
						<a href="?action=modifierxxx&id=<?php echo $data['id']; ?>">Modifier</a> -
						<form style="display: inline;" class="asupprimerxxx" method="post" action="inc/ajax-form.php">
							<input type="hidden" name="function" value="supprimerxxx" />
							<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
							<a href="#" onclick="return(confirm('Etes-vous sûr de vouloir supprimer xxxx?'));" >Supprimer</a>
						</form>
					</td>
				</tr>
				<?php }// Fin While ?>
				<tr><td colspan="3"><a href="?action=ajouterxxx" >Ajouter</a></td></tr>
			</table>


			<?php } // Fin if index ?>		
		
                        <div id="logo">
                                <img class="inline" style="height: 16px;" src="favicon.svg" />
                                Frambug <?php echo date("Y"); ?>
                                <img class="inline" style="height: 16px;" src="favicon.svg" />
                        </div>

		</div>
	
<?php
include('inc/end.php');
?>
