<?php
include 'db_con.php';
include 'crypto.php';
$supplier_id = 1;
if (isset($_POST['submit'])) {
	if (isset($_POST['item_name'])) {
		$item_name = $_POST['item_name'];
		$item_price = $_POST['item_price'];
		$item_qty = $_POST['item_qty'];
		$rds = generateRandomString();
		$sql = "insert into item (supplier, serial_no, item_name, unit_price, init_qty, qty) values($supplier_id,'$rds',$item_price,$item_qty,$item_qty)";
		$result = $conn->query($sql);
		
	}
}else{
	header("location: ../dashboard.php")
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


