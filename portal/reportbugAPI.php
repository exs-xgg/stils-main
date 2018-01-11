<?php

if (isset($_SERVER['HTTP_REFERER'])) {
	include '../genfunctions/db_con.php';
	$storename = $_POST['storename'];
	$timendate = $_POST['timendate'];
	$event = $_POST['event'];
	$link = $_POST['link'];
	$screencap = $_POST['screencap'];
	$sql = "insert into bugreport(store_name,link,timendate,event,screencaps) values('$storename','$link','$timendate','$event','$screencap');";
	if ($conn->query($sql)===true) {
		echo "<h1>Thank your for reporting a bug!</h1>";
		echo "<p>The developers will be working on it soon</p>"
	}
}else{
	echo "???";
}

?>