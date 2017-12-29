<?php


// if (isset($_SERVER['HTTP_REFERER'])) {
// 	doMe();
// }else{
// 	header("location: ../dashboard.php");
// }

doMe();
function doMe(){
	include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
	if (isset($_REQUEST['i'])) {
		$rsj = array();
		$i = str_replace("'", "", $_REQUEST['i']);
		$sql = "select item.id as ids, serial_no, item_name, qty, store from item inner join users on users.id=item.supplier where rcvd=1 and qty > 0 and serial_no like '%". $i . "%' limit 20" ;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($rsj, $row);
			}
		}
	}

	die(json_encode($rsj));	
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