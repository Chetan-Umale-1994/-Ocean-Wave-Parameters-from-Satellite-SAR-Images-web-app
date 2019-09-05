-<?php

include "connect.php";

$flag = "fail";
$result_arr = array();

// Create connection
$conn = dream_connect();


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT image_name FROM image_info where image_date='" . $_GET["date"] . "'" ;
$result = mysqli_query($conn, $sql);
$strdd="";

if (mysqli_num_rows($result) > 0) {
	
while($row = mysqli_fetch_row($result)) {
	
	foreach($row as $row_value)
	{
		$strdd .= "<li class='dropdown-name'>" ;
		$strdd .= $row_value ;
		$strdd .= "</li>";
		array_push($result_arr,$row_value);
	}
	

	}
}


echo $strdd;
mysqli_close($conn);
?>