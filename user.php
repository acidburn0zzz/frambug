<?php
include('inc/begin.php');
?>
	
		<div id="corps">
			
			<div id="login">
				<h1>Connexion</h1>
				<form action="inc/ajax-form.php" method="post" id="formlogin" name="formlogin" >
					<input type="hidden" name="function" value="login" />
					<table class="center" >
						<tr>
							<td><label class="right">Nom d'utilisateur :</label></td>
							<td><input type="text" name="username" required /></td>
						</tr>
						<tr>
							<td><label class="right">Mot de passe :</label></td>
							<td><input type="password" name="password" required /></td>
						</tr>
						<tr>
							<td colspan="2"><input class="center" type="submit" value="Connexion" /></td>
						</tr>
					</table>
				</form>
			</div>



                        <div id="logo">
                                <img class="inline" style="height: 16px;" src="favicon.svg" />
                                Frambug <?php echo date("Y"); ?>
                                <img class="inline" style="height: 16px;" src="favicon.svg" />
                        </div>

		</div>
	
<?php
include('inc/end.php');
?>
