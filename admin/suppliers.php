<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';

$suppliers = "";
$sum = "0";
$pending = "0";
$sql = "select (select Count(*) from users where priv=0 and user_lock = 0) as suppliers, (select sum(qty) from item where rcvd=1 and qty > 0) as sum, (select Count(*) from item where rcvd=0) as pending";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $suppliers = $row['suppliers'];
        $sum = $row['sum'];
        $pending = $row['pending'];
    }
}
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
                    <a class="navbar-brand" href="#">Suppliers</a>
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
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-primary text-center">
                                            <i class="ti-truck"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Suppliers</p>
                                            <?php
                                            echo $suppliers;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
																		<div class="stats">
                                        <i class="ti-reload"></i> Updated <span> date here </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					

                </div>


            </div>
					
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Partners</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Name</th>
                                        <th>Status</th>
                                    </tr></thead>
                                    <tbody>
										
<?php
$sql = "select * from  users where priv=0 order by user_lock,store";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
         echo '<tr onclick="window.location.href='. "'user.php?id=" . $row['id'] . "'" .'">';
         echo '<td>' . $row['store'] . '</td>';
         echo '<td>';
         if ($row['user_lock']=="0") {
             echo 'Active';
         }else{
            echo 'Locked';
         }
         echo '</td>';
         echo '</tr>';
    }
}
?> 


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>






        </div>


<footer class="footer">
    <div class="container-fluid">
        
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, developed with <i class="fa fa-heart heart"></i> by <a href="http://www.exs-innovations.co.nf" target="blank">Existence IT Research and Development</a>
        </div>
    </div>
</footer>
        

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

	<!-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });
						$.notify({
	            	message: "Waddup nigga."

	            },{
	                type: 'danger',
	                timer: 4000
	            });

    	});
	</script> -->

</html>
