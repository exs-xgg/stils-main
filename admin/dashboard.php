<?php 
include 'pages/header.php';
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
                            <a href="#">
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
                                            <p>Total Items</p>
                                            243
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
                                            16
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
                    <div class="col-lg-3 col-sm-6" onclick="addAccount()">
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
                                            <p>Add Account</p>
                                            
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
					<div class="col-lg-3 col-sm-6">
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
                                                    <span class="icon-danger">14</span>
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
					<div class="col-md-12">
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
															<tr>

																<td>Green Lipstick</td>
																<td>12</td>
																<td><a href="#">Ivon</a></td>

															</tr>
															<tr>

																<td>Rainbow Dress</td>
																<td>8</td>
																<td>Pochi</td>

															</tr>
															<tr>

																<td>Pink Pants</td>
																<td>11</td>
																<td>Alligator</td>

															</tr>
															<tr>

																<td>Blue Blouse</td>
																<td>7</td>
																<td>RDD</td>

															</tr>

													</tbody>
											</table>

									</div>
							</div>
					</div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Best Selling Suppliers</h4>
                                <p class="category">Here are the best selling stores</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    	<th>Name</th>
                                    	<th>Total Items Sold</th>
                                    	<th>Best Seller</th>
                                    </tr></thead>
                                    <tbody>
																			<tr>
																				<td>Sage Rodriguez</td>
																				<td>56,142</td>
																				<td>Netherlands Shirt</td>
																			</tr>
                                        <tr>
                                        	<td>Dakota Rice</td>
                                        	<td>36,738</td>
                                        	<td>Niger Dress</td>
                                        </tr>
                                        <tr>
                                        	<td>Minerva Hooper</td>
                                        	<td>23,789</td>
                                        	<td>Curaçao Clips</td>
                                        </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
</div>





        </div>



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
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
               
                message: "Action Successful!"

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
