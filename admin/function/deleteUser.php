<?php
if (isset($_SERVER['HTTP_REFERER'])) {
	include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$id = fin($_REQUEST['id']);
	$sql = "delete from users where id=$id ";
	// echo "$sql";
	if ($conn->query($sql) === true) {
		$sql = "delete from msg where user_id=$id";
		// echo "$sql";
		if ($conn->query($sql) === true) {
		 	header("location: ../dashboard.php?action=done");
		}else{
			header("location: ../dashboard.php?action=fail");
		}
	}else{
		header("location: ../dashboard.php?action=fail");
	}
}

?>
