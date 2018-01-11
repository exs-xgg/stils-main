<?php
include '../../genfunctions/db_con.php';
$uri = strtok($_SERVER['HTTP_REFERER'],'?');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$store = $_POST['store'];
$email = $_POST['email'];
$sms1 = $_POST['sms1'];
$sms2 = $_POST['sms2'];
$tel = $_POST['tel'];
$token = $_POST['token'];
$pin = $_POST['pin'];
$sql = "insert into users(lname,fname,store,email,sms1,sms2,tel,login_token,pin) values('$lname','$fname','$store','$email','$sms1','$sms2','$tel','$token','$pin')";
$result = $conn->query($sql);

   
header("location: " . $uri. "?action=done");

?>