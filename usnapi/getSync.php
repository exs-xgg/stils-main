<?php
$result = false;
$servername = "43.243.118.1:3306";
$username = "stilustr_root";
$password = "stilustratadatab@se2017";

$conn = mysqli_connect($servername, $username, $password,'stilustr_usn');

	$d = base64_decode(($_REQUEST['d']));
	$d = json_decode($d);
	$date ="";
	$js_string = "";
	$js_calc = "";
	$sql = "select * from users inner join saved_items on users.id=saved_items.user where username='$d->username' and password='$d->password'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$js_string = $row['js_string'];
			$js_calc = $row['js_calc'];
		}
	}

echo json_encode(array("save_string"=>$js_string,"save_calc"=>$js_calc));

/**


accepts
{
	"username" : username,
	"password" : password,
}
returns
{
	"save_string" : json of saved strings,
	"save_calc" : json of saved calc
}
*/


// $servername = "43.243.118.1:3306";
// $username = "stilustr_root";
// $password = "stilustratadatab@se2017";

// $conn = mysqli_connect($servername, $username, $password,'stilustr_stils');
// if ($conn->connect_error) {
// echo "<h1> CONNECTION ERROR</h1>";
// } 

?>