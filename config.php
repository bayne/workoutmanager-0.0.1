<?php 
define('DBSERVER','localhost');
define('DBNAME','workoutmanager');
define('USERNAME','workout');
define('PASSWORD','u5MuSAuHR4DQB67r');

function debug($string)
{
	static $debug;
	$debug.= "<div>$string</div>";
	return $debug;
}

?>