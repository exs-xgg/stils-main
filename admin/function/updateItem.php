<?php
session_start();
$serial = "";
$name = "";
$price = "";
$return = false;
$item_id = "";
if ((isset($_SESSION['id']))) {
	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$serial = $_REQUEST['item_serial'];
	$name = $_REQUEST['item_name'];
	$price = $_REQUEST['unit_price'];
	$return = false;
	$item_id = $_REQUEST['item_id'];
	if ($price > '100000') {
		$return = false;
	}else {
		$sql = "update item set serial_no='" . $serial . "', item_name='" . $name . "', unit_price = " . $price . " where id=" . $item_id;
		if ($conn->query($sql) === true) {
			   $return = true;
			} else {
			   $return = false;
			}
	}
	return (json_encode(array('return' =>  $return)));

}
return $_SESSION['id'];

?>