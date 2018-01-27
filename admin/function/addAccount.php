<?php
include '../../genfunctions/db_con.php';
include '../../genfunctions/crypto.php';
$uri = strtok($_SERVER['HTTP_REFERER'],'?');
$fname = fin($_POST['fname']);
$lname = fin($_POST['lname']);
$store = fin($_POST['store']);
$email = fin($_POST['email']);
$sms1 = fin($_POST['sms1']);
$sms2 = fin($_POST['sms2']);
$tel = fin($_POST['tel']);
$token = fin($_POST['token']);
$pin = fin($_POST['pin']);
$tag = fin($_POST['tag']);
$sql = "insert into users(lname,fname,store,email,sms1,sms2,tel,login_token,pin,tag) values('$lname','$fname','$store','$email','$sms1','$sms2','$tel','$token','$pin','$tag')";
$result = $conn->query($sql);

   
header("location: " . $uri. "?action=done");

?>