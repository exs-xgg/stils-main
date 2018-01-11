<?php


if (isset($_SERVER['HTTP_REFERER'])) {
	doMe();
}else{
	header("location: ../dashboard.php");
}

doMe();
function doMe(){
	include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
	if (isset($_REQUEST['f']) && isset($_REQUEST['t'])) {
		$rsj = array();
		$f = $_REQUEST['f'];
		$t = $_REQUEST['t'];
		$sql = "select serial_no,item_name,sale.qty as qty,time_sale from sale inner join item on item.id=sale.item_id where date('$f') <= date(time_sale) <= date('$t')" ;
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