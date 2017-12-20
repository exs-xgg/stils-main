<?php
include 'db_con.php';
include 'crypto.php';

function dropPayload($sql){
	$result = $conn->query($sql);
	if (!(is_null($result))) {
		return true;
	}else{
		return false;
	}
}

function head_count($sql){
	$result = $conn-
}

?>