<?php

if (isset($_SERVER['HTTP_REFERER'])) {
	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$t = $_REQUEST['t'];
	$c = $_REQUEST['c'];
	$t = $conn->real_escape_string(strip_tags($t));
	$c = $conn->real_escape_string(strip_tags($c));
	$sql = "insert into bulletin (bul_title,bul_body) values('$t','$c')";
	$return = false;
	if ($conn->query($sql) === true) {
	  $return = true;
	} else {
	   $return = false;
	}
	echo $return;
}
?>