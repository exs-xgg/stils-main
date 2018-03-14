<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $conn = mysqli_connect($servername, $username, $password,'stils');
 if ($conn->connect_error) {
 echo "<h1> CONNECTION ERROR</h1>";



 // $servername = "43.243.118.1:3306";
 // $username = "stilustr_root";
 // $password = "stilustratadatab@se2017";

 // $conn = mysqli_connect($servername, $username, $password,'stilustr_stils');
 // if ($conn->connect_error) {
 // echo "<h1> CONNECTION ERROR</h1>";
} 

?>