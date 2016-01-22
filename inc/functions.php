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

			if(($bug_name != '') && ($bug_name != '') )
			{
				$reponse=$conn->query('INSERT INTO bugs(bug_name, bug_text, submitted_by, submitted_date, last_date, priority, state) VALUES("'.$bug_name.'", "'.$bug_text.'", "'.$submitted_by.'", NOW(), NOW(), '.$priority.', 0);');
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
	} // Fin  if ($_POST['function']) == "ajouterlien")


} // Fin if isset $_POST['function'])


include('sql_close.php');
?>
