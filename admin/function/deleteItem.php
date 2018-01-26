<?php
session_start();

$uri = ($_SERVER['HTTP_REFERER']);
include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$id = $_REQUEST['id'];
$return = false;
if (strpos($_SERVER['HTTP_REFERER'],"user.php")!==false) {
	$sql = "delete from item where id=" . $id;

}else{
	$sql = "update item set date_last_update=now(), rcvd=3 where id=" . $id;

}
if ($conn->query($sql) === true) {
  $return = true;
} else {
   $return = false;
}

	return $return;
	



?>