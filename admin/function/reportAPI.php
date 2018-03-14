<?php


if (isset($_SERVER['HTTP_REFERER'])) {
	doMe();
}else{
	header("location: ../dashboard.php");
}

function doMe(){
	include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$rsj = array();
	if (isset($_REQUEST['f']) && isset($_REQUEST['t'])) {
		$store = "";
		$f = $_REQUEST['f'];
		$t = $_REQUEST['t'];
		if (isset($_REQUEST['st']) && ($_REQUEST['st'] !== "")) {
			$store = "and item.supplier=" . $_REQUEST['st'];
		}
		$sql = "select item.supplier,store,serial_no,item_name,sale.qty as qty,time_sale,sale.sale_price as price,(sale.sale_price * sale.qty) as total from sale inner join item on item.id=sale.item_id inner join users on item.supplier=users.id where date('$f') < date(time_sale) <= date('$t') $store order by store asc" ;
		
	}elseif (isset($_REQUEST['today'])) {
		$sql = "select item.supplier,store,serial_no,item_name,sale.qty as qty,time_sale,sale.sale_price as price,(sale.sale_price * sale.qty) as total from sale inner join item on item.id=sale.item_id inner join users on item.supplier=users.id where date(time_sale) = curdate() $store order by store asc" ;

	}

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			array_push($rsj, $row);
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