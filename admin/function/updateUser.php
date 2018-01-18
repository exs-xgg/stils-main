<?php

	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$store = $_POST['store_name'];
	$token = $_POST['login_token'];
	$email = $_POST['email'];
	$sms1 = $_POST['num1'];
	$sms2 = $_POST['num2'];
	$tel = $_POST['tel'];
	$pin = $_POST['pin'];
	$tag = $_POST['tag'];
	$sql = "update users set lname='$lname', store='$store', fname='$fname', email='$email', sms1='$sms1', sms2='$sms2', tel='$tel', pin='$pin', tag='$tag' where login_token='$token'";
	echo "$sql";
	if ($conn->query($sql) === true) {
		  header("location: " . $_SERVER['HTTP_REFERER'] );
	} else {
		echo "Failed query";
	}

?>