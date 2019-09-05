<?php
 

function dream_connect ()
{
$servername = "cs1.ucc.ie";
$username = "csu1";
$password = "iejee";
$dbname = "msccs2019_csu1";
$conn_id = mysqli_connect($servername, $username, $password, $dbname);
if ($conn_id)
{
	return ($conn_id);
}
else
{	
	return (FALSE);
}
}
?>
