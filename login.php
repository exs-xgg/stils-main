<?php
session_start();
if (isset($_SESSION['user_priv'])) {
    if ($_SESSION['user_priv']==1) {
        header("location: admin/dashboard.php");
    }else{
         header("location: portal/dashboard.php");
    }
}


include 'genfunctions/db_con.php';

if (isset($_POST['submit'])) {
    $usn = $_POST['usn'];
    $pw = $_POST['pw'];
    $sql = "select * from users where login_token='$usn' and pin='$pw' limit 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
        $_SESSION['user_name'] = $row['login_token'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_priv'] = $row['priv'];
        
        if ($row['priv']=="1") {
            header("location: admin/dashboard.php");
        }else{
             header("location: portal/dashboard.php");
        }
        
        }
    }else{
        header("location: login.php?grant=false");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Stilustrata</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'> -->
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
              <b>  Stilustrata Online Inventory Management Portal </b>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="ti-panel"></i>
                        <p>Log In</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        
    <div class="content">
        <div class="col-lg-5"> 
        <div class="logo">
          <b>  Stilustrata Online Inventory Management Portal </b>
        </div><br><br>
            <form action="login.php" method="post" autocomplete="off">
                <p><span>Username</span></p>
                    <input class="form form-control" type="text" name="usn" placeholder="Username"><br>
            <p><span>Password</span></p>
                    <input class="form form-control" type="password" name="pw" placeholder="Password"><br>
                    <input class="form form-control btn btn-primary btn-fill" type="submit" name="submit" value="Log In">
            </form>
                    
        </div>
    </div>

       


        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        



        	
    	});
	</script>
<style type="text/css">
    .w{
        color: white
    }
</style>
</html>



