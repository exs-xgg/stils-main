<?php

if (isset($_SERVER['HTTP_REFERER'])) {
	doMe();
}else{
	//header("location: ../dashboard.php");
}
function doMe(){
		include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	if (isset($_REQUEST['to'])) {
		$q = ($_REQUEST['to']);
		$q = $conn->real_escape_string($q);
		$msg = $_POST['msg'];
		$sql = "insert into msg(sw,user_id,body,_time) values(1,$q,'$msg',CONVERT_TZ(current_timestamp(),'+0:00','+08:00'))";
		if ($conn->query($sql) === true) {
		   header("location: ../thread.php?id=". $q);
		} else {
		   echo "Something went wrong. Go back and try again.";
		}	
		
		
	}
}