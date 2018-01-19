<?php

if (isset($_SERVER['HTTP_REFERER']) && isset($_REQUEST['id'])) {
	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$id = $_REQUEST['id'];
	$sql = "update item set allow_edit=allow_edit*-1 where id=$id";
	if ($conn->query($sql) === true) {
	  header("location: " . $_SERVER['HTTP_REFERER']);
	} else {
	   echo("Bad request.");
	}
}
?>