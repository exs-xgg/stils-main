<?php

if (isset($_SERVER['HTTP_REFERER']) && isset($_POST['submit'])) {
	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	
	$sql = "update user set";
	$return = false;
	if ($conn->query($sql) === true) {
	  $return = true;
	} else {
	   $return = false;
	}
	echo $return;
}
?>