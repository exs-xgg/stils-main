<?php
$result = false;
$servername = "localhost";
$username = "root";
$password = "";
$message = "";
$conn = mysqli_connect($servername, $username, $password,'usn');

echo json_decode(file_get_contents("php://input"));;
echo "biiitch";
// 	$d = base64_decode(($_REQUEST['d']));
// 	$d = json_decode($d);
// 	$date ="";
// 	$sql = "select * from users where username='$d->username' and password='$d->password'";
// 	$result = $conn->query($sql);
// 	if ($result->num_rows > 0) {
// 		while ($row = $result->fetch_assoc()) {
// 			$date = $row['last_updated'];
// 		}
// 	}else{
// 		$message = "No such user exists";
// 	}

// echo json_encode(array("date"=>$date,"message"=>$message));

/**

accepts
{
	"username" : username,
	"password" : password,
}
returns
{
	"date" : "01/22/2020",
	"message" : message
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