<?php
include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$uri = strtok($_SERVER['HTTP_REFERER'],'?');
session_start();
$supplier_id = $_SESSION['id'];
if (isset($_POST['submit'])) {
	if (isset($_POST['item_name'])) {
		$item_name =fin($_POST['item_name']);

		$item_price = $_POST['item_price'];
		$item_qty = $_POST['item_qty'];
		$serial = fin($_POST['serial']);
		$sql = "insert into item (supplier, serial_no, item_name, unit_price, init_qty, qty,date_added,date_last_update) values($supplier_id,'$serial','$item_name',$item_price,$item_qty,$item_qty,CONVERT_TZ(current_timestamp(),'+04:00','+8:00'),CONVERT_TZ(current_timestamp(),'+04:00','+8:00'))";
		if ($conn->query($sql) === true) {
		 header("location:". $uri . "?action=done");
			}else{
						header("location:". $uri . "?action=fail");

			}
}else{
	header("location: ../dashboard.php");
}

}
//CONTINUE FORM SUBMIT COMPLETOIN
/*
create table item(
id int primary key not null auto_increment,
supplier int not null,
serial_no varchar(50),
category int,
item_name varchar(100),
unit_price decimal(19,4),
init_qty int default 0,
qty int default 0,
date_added datetime default now(),
date_last_update timestamp default current_timestamp()
);


*/
?>


