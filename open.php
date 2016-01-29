<?php
include('inc/begin.php');
?>
	
		<div id="corps">
	
			<div id="welcome">
				<h1>Frambug : Ouvrir un bug</h1> 
			</div>
			
			<div id="open" >
				<form id="formopenbug" action="inc/functions.php" method="post">
					<input type="hidden" name="function" value="openbug" />

					<table class="center">
					
					<tr><td align="right">
					<label>Sujet : </label>
					</td><td>
					<input type="text" name="bug_name" required value="" />
					</td></tr>

					<tr><td align="right">
					<label>Description : </label>
					</td><td>
					<textarea name="bug_text" rows="20" cols="70" value="" ></textarea>
					</td></tr>

					<tr><td align="right">
					<label>Catégorie : </label>
					</td><td>
					<select name="cat_id">
						<option value=""></option>
					</select>
					</td></tr>
					
					<tr><td align="right">
					<label>Assigner à : </label>
					</td><td>
					<select name="assign_to">
						<option value=""></option>
					</select>
					</td></tr>

					<tr><td align="right">
					<label>Priorité : </label>
					</td><td>
					<select name="priority">
						<?php for ( $i=1; $i<=5; $i++ ) { ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>
					</td></tr>

					<tr><td colspan="2" align="center" ><input type="submit" value="Valider le bug" /></td></tr>

					</table>

				</form>
			</div>

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
