<?php
include('sql_open.php');
if (isset ($_POST['function']))
{
	if ($_POST['function'] == "openbug")
	{
		if(isset($_POST['bug_name']) && isset($_POST['bug_text']) )
		{
			$bug_name = $_POST['bug_name'];
			$bug_text = $_POST['bug_text'];
			$submitted_by = "-1";
			$priority = $_POST['priority'];
			$cat_id = $_POST['cat_id'];
			$assign_to = $_POST['assign_to'];
			$now = time();

			if(($bug_name != '') && ($bug_text != '') )
			{
				$reponse=$conn->query('INSERT INTO bugs(bug_name, bug_text, submitted_by, submitted_date, last_date, priority, state, cat_id, assign_to) VALUES("'.$bug_name.'", "'.$bug_text.'", "'.$submitted_by.'", '.$now.', '.$now.', '.$priority.', 0, '.$cat_id.', '.$assign_to.');');
				$reponse = 'ok';
			}
			else
			{
				$reponse = 'Les champs sont vides';
			}
		} 
		else
		{
			$reponse = 'Tous les champs ne sont pas parvenus';
		}
		echo json_encode(['reponse' => $reponse]);
	} // Fin  if ($_POST['function'] == "ajouterlien")

	
	if ($_POST['function'] == "addcomm")
	{
		if(isset($_POST['comm_text']) && isset($_POST['bug_id']) && is_numeric($_POST['bug_id']))
		{
			$bug_id=$_POST['bug_id'];
			$comm_text=$_POST['comm_text'];
			$now = time();
			$user_id="0";

			if ($comm_text != '')
			{
				$reponse=$conn->query('INSERT INTO comments(bug_id, user_id, comm_date, comm_text) VALUES('.$bug_id.','.$user_id.', '.$now.', "'.$comm_text.'");');
				$reponse='ok';
			}
			else
			{
				$reponse = 'Les champs sont vides';
			}
		}
		else
		{
			$reponse = 'Tous les champs ne sont pas parvenus';
		}
		echo json_encode(['reponse' => $reponse]);
	} // Fin ($POST['function'] == "addcomm")


} // Fin if isset $_POST['function'])


include('sql_close.php');
?>