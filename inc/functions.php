<?php

$isadmin=false;
$isteam=false;

if (isset($_SESSION['level']) && is_numeric($_SESSION['level']))
{
	if ( $_SESSION['level'] > 1 )
		$isteam=true;
	if ( $_SESSION['level'] > 2 )
		$isadmin=true;
}

function fundatetime($time) {

	setlocale(LC_TIME, 'fr_FR.UTF8');
	$fundate =  strftime('%d/%m/%Y  %H:%M', $time);
	return $fundate;

}

function fundate($time) {

        setlocale(LC_TIME, 'fr_FR.UTF8');
        $fundate =  strftime('%d/%m/%Y', $time);
        return $fundate;

}

function funtime($time) {

        setlocale(LC_TIME, 'fr_FR.UTF8');
        $fundate =  strftime('%H:%M', $time);
        return $fundate;

}



?>
