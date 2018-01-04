<?php
session_start();

$uri = ($_SERVER['HTTP_REFERER']);
include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$id = $_REQUEST['id'];
$return = false;
$sql = "delete from item where id=" . $id;
if ($conn->query($sql) === true) {
  $return = true;
} else {
   $return = false;
}
if ($return) {
	header("location: ../dashboard.php?action=done");
}else{

	header("location: ../dashboard.php?action=fail");
}
	



?>