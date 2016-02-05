<?php
include('inc/begin.php');
?>


<?php 
$nb = 0;
if ( isset($_GET['bug_id']) && is_numeric($_GET['bug_id'])) { 
	$bugid=$_GET['bug_id']; 
	$bugs = $conn->query("SELECT bug_id, bug_name, u2.realname as submitted_by, submitted_date, cat_name, priority, u1.realname as assign_to, u1.user_id as assign_id, state, bug_text, c.cat_id as cat_id FROM bugs b LEFT JOIN categories c ON b.cat_id=c.cat_id LEFT JOIN users u1 ON b.assign_to=u1.user_id LEFT JOIN users u2 ON b.submitted_by=u2.user_id WHERE bug_id=".$bugid.";"); 
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

				<table class="center w100">
					
					<tr>
						<td class="bold" colspan="4"> <?php echo $bug['bug_name']; ?></td>
					</tr>
					<tr>
						<td class="bold">Ajouté par :</td>
						<td><?php echo $bug['submitted_by']; ?></td>
						<td class="bold">Ouvert le :</td>
						<td><?php echo fundate($bug['submitted_date']); ?></td>
					</tr>
					<tr>
						<td class="bold">Catégorie :</td>
						<td><?php echo $bug['cat_name']; ?></td>
						<td class="bold">Priorité :</td>
						<td><?php echo $bug['priority']; ?></td>
					</tr>
					<tr>					
						<td class="bold">Assigné à :</td>
						<td><?php echo $bug['assign_to']; ?></td>
						<td class="bold">Avancement :</td>
						<td>
						<?php //echo $bug['state']."%"; ?>
							<form class="inline">
		                                        	<input type="hidden" name="function" value="updatestate" />
	                		                        <input type="hidden" name="bug_id" value="<?php echo $bug['bug_id']; ?>" />
        	                                		<select name="state" >
			                                        <?php for ( $i=0; $i<=100; $i=$i+10) { ?>
                			                                <option value="<?php echo $i; ?>" <?php if ($i == $bug['state']) echo "selected" ?> ><?php echo $i." %"; ?></option>
                                		                <?php } ?>
                                        			</select>
								<input type="image" src="img/ok.svg" height=20px width=20px class="top" />
			                                </form>
						</td>
					</tr>
					<tr>
						<td class="bold" colspan="4">Description</td>
					</tr>
					<tr>
						<td colspan="4"><?php echo $bug['bug_text']; ?></td>
					</tr>
				</table>

			</div>

			<div id="team">
				<div id="teaminfo">
				<form class="inline">
					<input type="hidden" name="function" value="updatestate" />
					<input type="hidden" name="bug_id" value="<?php echo $bug['bug_id']; ?>" />
					<label>Changer l'avancement :</label>
					<select name="state">
						<?php for ( $i=0; $i<=100; $i=$i+10) { ?>
						<option value="<?php echo $i; ?>" <?php if ($i == $bug['state']) echo "selected" ?> ><?php echo $i; ?></option>
						<?php } ?>
					</select>
					%
				</form>
				&nbsp;&bull;&nbsp;
				<form class="inline">
					<input type="hidden" name="function" value="updateassignto" />
					<input type="hidden" name="bug_id" value="<?php echo $bug['bug_id']; ?>" />
					<label>Affecter à :</label>
					<select name="assign_to">
						<option value="0"></option>
						<?php $users = $conn->query("SELECT * FROM users WHERE level > 1 ORDER BY realname;"); ?>
						<?php while ( $user = mysqli_fetch_array($users) ) { ?>
						<option value="<?php echo $user['user_id']; ?>" <?php if ($user['user_id'] == $bug['assign_id']) echo "selected" ?> ><?php echo $user['realname']; ?></option>
						<?php } // Fin  while ( $user = mysqli_fetch_array($users) ) ?>
					</select>
				</form>
				&nbsp;&bull;&nbsp;
				<form class="inline">
					<input type="hidden" name="function" value="updatepriority" />
					<input type="hidden" name="bug_id" value="<?php echo $bug['bug_id']; ?>" />
					<label>Priorité</label>
					<select name="priority">
						<?php for ( $i=1; $i<=5; $i++) { ?>
						<option value="<?php echo $i; ?>" <?php if ($i == $bug['priority']) echo "selected" ?> ><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</form>
				&nbsp;&bull;&nbsp;
				<form class="inline">
					<input type="hidden" name="function" value="updatecategory" />
					<input type="hidden" name="bug_id" value="<?php echo $bug['bug_id']; ?>" />
					<label>Catégorie</label>
					<select name="cat_id">
						<option value="0"></option>
						<?php $cats = $conn->query("SELECT * FROM categories ORDER BY cat_name;"); ?>
						<?php while ( $cat = mysqli_fetch_array($cats) ) { ?>
						<option value="<?php echo $cat['cat_id']; ?>" <?php if ($cat['cat_id'] == $bug['cat_id']) echo "selected" ?> ><?php echo $cat['cat_name']; ?></option>
						<?php } // Fin  while ( $cat = mysqli_fetch_array($cats) ) { ?>
					</select>
				</form>
				</div>
			</div>
			
			<div id="comments">
				<div id="newcomment">
					<form id="formaddcomment" action="inc/ajax-form.php" method="post">
						<input type="hidden" name="function" value="addcomm" />
						<input type="hidden" name="bug_id" value="<?php echo $bug['bug_id']; ?>" />
						<textarea name="comm_text" rows="15" cols="70" value="" ></textarea>
						<input type="submit" value="Ajouter le commentaire" />
					</form>
				</div>

				<?php $comments = $conn->query("SELECT * FROM comments c LEFT JOIN users u ON c.user_id=u.user_id WHERE bug_id=$bugid ORDER BY comm_date DESC;"); ?>
				<?php while ( $comment = mysqli_fetch_array($comments) ) { ?>
				<div class="comment">
					<div class="comm_info">
					<span class="left">Posté par <?php echo $comment['realname']; ?>, le <?php echo fundatetime($comment['comm_date']); ?></span><span class="right">#<?php echo $comment['comm_id']; ?></span>
					</div>
					<div class="comm_text">
						<?php echo $comment['comm_text']; ?>
					</div>
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

<?php
include('inc/end.php');
?>
