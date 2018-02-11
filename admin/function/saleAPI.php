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
	if (isset($_REQUEST['i']) && isset($_REQUEST['q'])) {
		$i = $_REQUEST['i'];
		$q = $_REQUEST['q'];
		if ($i <= 0) {
			$return = false;
		}else{
			$sql = "update item set date_last_update = CONVERT_TZ(current_timestamp(),'+0:00','+08:00'), qty=qty-$q where id=$i";
			if ($conn->query($sql) === true) {
			   $ssql = "insert into sale(item_id,qty,time_sale) values($i, $q,CONVERT_TZ(current_timestamp(),'+04:00','+8:00'))";
			   if ($conn->query($ssql) === true) {
			   		$return = true;
			   }
			} else {
			   $return = false;
			}	
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
insert into sale(item_id,qty) values($i, $q)

update item set date_last_update = now(), qty=qty-2 where id=7; insert into sale(item_id,qty) values(7, 2)
*/

?>