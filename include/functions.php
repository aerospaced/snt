<?php
function dbConnect()
{
	$mysqli = new mysqli(HOST,USER, PASSWORD, DB);
	return $mysqli;
}

function RunSQL($sqlQuery, $mysqli) {
	if ($result = $mysqli->query($sqlQuery)) {
	return $result;
	} 
	else {
		echo "SQL error";
		return;
	}
}
function LogError($strError){
	$date = new DateTime();
	$strError = $date->format('U = Y-m-d H:i:s') . $strError;
	file_put_contents('logs.txt', $strError . PHP_EOL , FILE_APPEND);
}
?>