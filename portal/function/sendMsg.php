<?php
session_start();
if (isset($_SERVER['HTTP_REFERER'])) {
	doMe();
}else{
	//header("location: ../dashboard.php");
}
function doMe(){
		include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	
		$q = $_SESSION['id'];
		$msg = $_POST['msg'];
		$sql = "insert into msg(sw,user_id,body,_time) values(0,$q,'$msg',CONVERT_TZ(current_timestamp(),'+04:00','+8:00'))";
		if ($conn->query($sql) === true) {
		   header("location: ". $_SERVER['HTTP_REFERER']);
		} else {
		   echo "Something went wrong. Go back and try again.";
		}	
		
		
	
}