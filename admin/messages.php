<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';


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

<?php
$sql = "select distinct(user_id) from msg";
$rs = $conn->query($sql);
if ($rs->num_rows > 0) {
    while ($row = $rs->fetch_assoc()) {
        $sql2 = "select * from msg inner join users on msg.user_id=users.id where user_id =" .$row['user_id'] . " order by _time desc limit 1 ";
        $res = $conn->query($sql2);
        while ($rw = $res->fetch_assoc()) {
            ?>

                    <div class="col-lg-12 col-sm-12">
                        <div class="card" onclick="window.location.href = 'thread.php?id=<?php  echo $row['user_id'];  ?>'">
                            <div class="content"> 
                                <h5><?php echo $rw['store'] . "" ;?> </h5>
                               
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                         <span><b>[<?php echo $rw['_time'] . "" ;?>]</b></span>&nbsp;&nbsp;&nbsp;<?php echo $rw['body'] . "" ;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   <?php
        }
   
    }
}

?>
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
