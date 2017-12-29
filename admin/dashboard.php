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
                    <a class="navbar-brand" href="#">Dashboard</a>
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
<script>
    function addItem(){
        $('#body_content').load('pages/addItems.php');
    }
    function addAccount(){
        $('#body_content').load('pages/addAccount.php');
    }
</script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    
                                    <div class="col-xs-12">
                                        
                                            <h3>A very nice announcement</h3><span>12-29-2017 12:08</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card" onclick="addItem()">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Add Items</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        Add Items
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6" onclick="addAccount()">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-truck"></i>
                                        </div>

                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Add Account</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        Add Account
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6" onclick="window.location.href = 'items.php';">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-dropbox-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Items on Hand</p>
                                            <?php
                                            echo $sum;
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
                    <div class="col-lg-3 col-sm-6" onclick="window.location.href = 'suppliers.php';">
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
                    
					<div class="col-lg-3 col-sm-6" onclick="window.location.href = 'pending.php'">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-5">
											<div class="icon-big icon-danger text-center">
													<i class="ti-timer"></i>
											</div>
									</div>
									<div class="col-xs-7">
											<div class="numbers">
													<p>Pending Items</p>
                                                    <span class="icon-danger"> <?php
                                            echo $pending;
                                            ?></span>
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
            
<div id="body_content">
															
<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$sql = "select * from items  inner join users on items.supplier = users.id where ((qty <= (init_qty*0.10)) or (qty=5) and rcvd=1)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>




                    <div class="col-lg-12 col-md-12">
                            <div class="card card-plain">
                                    <div class="header">
                                            <h4 class="title">Items that are <span class="icon-danger">Below</span> Average Stock Levels</h4>
                                            <p class="category">Here is a subtitle for this table</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                            <table class="table table-hover">
                                                    <thead>

                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Store Name</th>

                                                    </tr></thead>
                                                    <tbody>




    <?php



    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['item_name'] . '</tr>';
        echo '<td>' . $row['qty'] . '</tr>';
        echo '<td>' . $row['store'] . '</tr>';
    }

     ?>

</tbody>
                                            </table>

                                    </div>
                            </div>
                  
    <?php
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

     <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

<?php
if (!(isset($_SESSION['first']))) {
    ?>

   
            $.notify({
                icon: 'ti-truck ',
                message: "Welcome to <b>Stilustrata Dashboard</b> - your e-portal to e-commerce."

            },{
                type: 'success',
                timer: 4000
            });
            $.notify({
                icon: 'ti-tablet ',
                message: "<p>This portal is optimized for tablets or iPads</p>"

            },{
                type: 'success',
                timer: 2000
            });
            $.notify({
                icon: 'ti-settings ',
                message: "This site is still under beta testing. If you encounter any bugs or misfunctionalities, kindly report to the admin or to the bug report page we provided."

                },{
                    type: 'warning',
                    timer: 3000
                });

       
    
    <?php

}

$_SESSION['first'] = 'done';
if (isset($_REQUEST['action'])) {
  if ($_REQUEST['action'] == "done") {
      ?>
            $.notify({
               
                message: "<p><h4>Action Successful!</h4></p>"

                },{
                    type: 'success',
                    timer: 3000
                });
      <?php
  }elseif ($_REQUEST['action'] == "fail") {
      ?>
            $.notify({
               
                message: "Action Failed! Something went wrong"

                },{
                    type: 'danger',
                    timer: 3000
                });
      <?php
  }
}
?>
         });
	 </script> 

</html>
