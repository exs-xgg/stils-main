<?php
$result = false;
$servername = "43.243.118.1:3306";
$username = "stilustr_root";
$password = "stilustratadatab@se2017";

$conn = mysqli_connect($servername, $username, $password,'stilustr_usn');

	//echo json_decode(file_get_contents("php://input"));;
	$d = base64_decode(($_REQUEST['d']));
	$d = json_decode($d);
	$sql = "insert into users(username,email,password,fname,lname,last_updated) values";
	$sql .= "('$d->username','$d->email','$d->password','$d->fname','$d->lname', now())";
	if ($conn->query($sql)===true) {
		$result = true;
		$message = "Registration Succesful!";
	}else{
		$message = "Something is wrong with the server.";
	}

echo json_encode(array("result"=>$result,"message"=>$message));

/**

accepts
{
	"username" : username,
	"email" : email,
	"password" : password,
	"fname" : fname,
	"lname" : lname
}
returns
{
	"result" : true/false,
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