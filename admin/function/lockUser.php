<?php
session_start();

include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$id = $_REQUEST['id'];
$lock = $_REQUEST['l'];
$return = false;
$sql = "update users set user_lock=" . $lock . " where id=" . $id;
if ($conn->query($sql) === true) {
  $return = true;
} else {
   $return = false;
}
echo $return;
	



?>