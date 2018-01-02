


<?php
session_start();

$uri = ($_SERVER['HTTP_REFERER']);
include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$id = $_REQUEST['id'];
$return = false;
$sql = "update users set pin='000000' where id= $id";
if ($conn->query($sql) === true) {
  $return = true;
} else {
   $return = false;
}
echo json_encode(array("result" => $return));
	



?>