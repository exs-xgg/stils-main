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
		$q = fin($_REQUEST['to']);
		$msg = $_POST['msg'];
		$sql = "insert into msg(sw,user_id,body) values(1,$q,'$msg')";
		if ($conn->query($sql) === true) {
		   header("location: ../thread.php?id=". $q);
		} else {
		   echo "Something went wrong. Go back and try again.";
		}	
		
		
	}
}