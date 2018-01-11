<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';

$suppliers = "";
$sum = "0";
$pending = "0";
$sql = "select (select Count(*) from users where priv=0) as suppliers, (select sum(qty) from item where rcvd=1 and qty > 0) as sum, (select Count(*) from item where rcvd=0) as pending";
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
                    <a class="navbar-brand" href="#">Inventory</a>
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
                    
                    <div class="col-lg-5 col-sm-5" >
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-timer"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                            <div class="numbers">
                                                    <p>Pending Items</p>
                                                    <span class="icon-danger"><?php
                                            echo $pending;
                                            ?></span>
                                            </div>
                                    </div>
                                </div>
                                <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="ti-reload"></i> Updated <span> <?php
                                            echo date("m-d-Y H:i:s");
                                            ?> </span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
					

                </div>

            </div>
            <h3>Sorted by Last Entry</h3>
			<div class="col-md-12">
                
					<div class="card card-plain">
							
							<div class="content table-responsive table-full-width">
									<table class="table table-striped">
											<thead>

												<th>Name</th>
												<th>Quantity</th>
												<th>Store Name</th>
                                                <th>Last Updated</th>
                                                <th></th>
											</tr></thead>
											<tbody>
<?php
$sql = "select *, item.id as idd, users.id as dd from item inner join users on item.supplier=users.id where rcvd = 0 order by date_last_update desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr id="itemRow' . $row['idd'] . '">';
        echo '<td>' . $row['item_name'] . '</td>';
        echo '<td>' . $row['init_qty'] . '</td>';
        echo '<td><a href ="user.php?id='. $row['dd'] . '">' . $row['store'] . '</a></td>';
        echo '<td>' . $row['date_last_update'] . '</td>';
        echo '<td><button onclick="conf('. $row['idd'] .')">Received</button></td>';
        echo '</tr>';
    }
}
?>
                                               

											</tbody>
									</table>

							</div>
					</div>
			</div>
                   


<script>
    function conf(e){
        $.ajax({
            url: "function/rcvItemAPI.php?id=" + e,
            timeout: 5000,
            success: function(result){
                var r = JSON.parse(result);
                if(r.return){
                    $.notify({
                        message:"<p><h4>Item Received!</h4></p>" 

                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $("#itemRow" + e).remove();


                }
            },
            error: function(xhr){
                $.notify({
                message:"<p><h4>Request failed. The website may be experiencing errors or the internet is down.</h4></p>" 

            },{
                type: 'danger',
                timer: 2000
            });
            }
        });
    }
</script>


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
