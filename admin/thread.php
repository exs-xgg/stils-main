<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';
if (isset($_REQUEST['id'])) {
	$id = strip_tags($_REQUEST['id']);
	$sql = "select * from msg inner join users on msg.user_id = users.id where user_id=".$id . " limit 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($r = $result->fetch_assoc()) {
			?>

	<div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Messages</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="../genfunctions/logout.php">
								<i class="ti-close"></i>
								<p>Log Out</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                	<div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="content s"> 
                                <h5><?php echo $r['fname'] . " " . $r['lname'] . " (" . $r['store'] . ")";	?></h5>
                               
                                <div class="footer">
                                    <hr />
                                    <div class="stats">

			<?php
		}
	}
}

?>
    
                                      <!--   START MESSAGE CARDS HERE -->

<?php
$sql = "select * from msg inner join users on msg.user_id = users.id where user_id=".$id." order by _time asc limit 20";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			
		if($row['sw']=='0'){


?>
                                      <!--   START USER MESSAGE CARDS HERE -->

                                         <div class="col-lg-12 col-sm-12">
                                            <div class="card sender">

                                                <div class="content" >
                                                    <div class="footer">
                                                        <div class="statsi">
                                                             <span> <?php echo $row['fname'] . " " . $row['lname'] . " (" . $row['store'] . ")";	?> </span> 
                                                        </div>
                                                    </div>
                                                    <h5><?php echo $row['body'];	?></h5>
                                                   
                                                    <div class="footer">
                                                        <hr />
                                                        <div class="stats">
                                                             <span> <?php echo $row['_time'];	?> </span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <!--   END USER MESSAGE CARDS HERE -->
<?php 
		}else{


?>

                                      <!--   START ADMIN MESSAGE CARDS HERE -->

                                        <div class="col-lg-12 col-sm-12">
                                            <div class="card sender">

                                                <div class="content" >
                                                    <div class="footer">
                                                        <div class="statsi">
                                                             <span> You </span> 
                                                        </div>
                                                    </div>
                                                    <h5><?php echo $row['body'];	?></h5>
                                                   
                                                    <div class="footer u">
                                                        <hr />
                                                        <div class="stats">
                                                            <span> <?php echo $row['_time'];	?> </span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <!--   END ADMIN MESSAGE CARDS HERE -->
<?php
}
}
	}
	?>
                                      <!--   END MESSAGE CARDS HERE -->
                                      
                                                    
                                                             <span> Reply </span> 
                                                        
                                                    </div>
                                                        <input class="form form-control" type="text" value="Hello, we have no vacancies right now" style="background-color: beige">
                                                        <input class="btn btn-primary" type="submit" name="">
                                                   
                                                    
                                                
                                                </div>
                                          
                                    

                                </div>

                            </div>
                           
                        </div>
                         
                    </div>
                </div>

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

	

</html>
