-<?php

include "connect.php";

$flag = "fail";
$result_arr = array();
$path_str="";
// Create connection
$conn = dream_connect();


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT original_image_path,screenshot_path,period_map_path,height_map_path,wind_map_path FROM image_info where image_name='" . $_GET["name"] . "'" ;
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
	
if($row = mysqli_fetch_row($result)) {
	
	$path_str.=$row[0];
	$path_str.="#";
	$path_str.=$row[1];
	$path_str.="#";
	$path_str.=$row[2];
	$path_str.="#";
	$path_str.=$row[3];
	$path_str.="#";
	$path_str.=$row[4];
	$path_str.="#";
	

	}
}


echo $path_str;
mysqli_close($conn);
?>