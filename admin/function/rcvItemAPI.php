<?php

if (isset($_SERVER['HTTP_REFERER'])) {
	doMe();
}else{
	//header("location: ../dashboard.php");
}
function doMe(){
		include '../../genfunctions/db_con.php';
	include '../../genfunctions/crypto.php';
	$return = false;
	if (isset($_REQUEST['id'])) {
		$q = fin($_REQUEST['id']);
		
		$sql = "update item set date_last_update = now(), rcvd=1 where id=" . $q;
		if ($conn->query($sql) === true) {
		   $return = true;
		} else {
		   $return = false;
		}	
		
		
	}
	die(json_encode(array('return' => $return)));	
}
/**
create table cont(
	id int primary key auto_increment,
	item_id int,
	qty int,
	date_added timestamp default current_timestamp,
	ack int default 0,
	user_id int
);
*/

?>