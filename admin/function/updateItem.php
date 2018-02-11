<?php
session_start();
$serial = "";
$name = "";
$price = "";
$item_id = "";

$uri = ($_SERVER['HTTP_REFERER']);
	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$serial = $_REQUEST['item_serial'];
	$name = $_REQUEST['item_name'];
	$price = $_REQUEST['unit_price'];
	$item_id = $_REQUEST['item_id'];
	if ($price > '100000') {
		 header("location: ". $uri . "&done=false");
	}else {
		$sql = "update item set date_last_update = CONVERT_TZ(current_timestamp(),'+04:00','+8:00'), serial_no='" . $serial . "', item_name='" . $name . "', unit_price = " . $price . " where id=" . $item_id;
		if ($conn->query($sql) === true) {
			   header("location: ". $uri . "&done=true");
			} else {
			   header("location: ". $uri . "&done=false");
			}
	}
	



?>