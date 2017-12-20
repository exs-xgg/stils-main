<?php

include 'pages/header.php'; ?>
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

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
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
                    <div class="col-lg-6 col-sm-6" onclick="viewPending()">
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
			<div class="col-md-12">
                
					<div class="card card-plain">
							<div class="header">
									<h4 class="title">Items on Inventory</h4>
                                    <ul class="pagination">
                                      <li><a href="#">A-C</a></li>
                                      <li><a href="#">D-F</a></li>
                                      <li><a href="#">G-I</a></li>
                                      <li><a href="#">J-L</a></li>
                                      <li><a href="#">M-O</a></li>
                                      <li><a href="#">P-S</a></li>
                                      <li><a href="#">T-V</a></li>
                                      <li><a href="#">W-Z</a></li>
                                      <li><a href="#">#</a></li>
                                      <li><a href="#">%</a></li>
                                      
                                    </ul>
							</div>
							<div class="content table-responsive table-full-width">
									<table class="table table-hover">
											<thead>

												<th>Name</th>
												<th>Quantity</th>
												<th>Store Name</th>
                                                <th>Last Updated</th>

											</tr></thead>
											<tbody>
												<tr>
													<td>Green Lipstick</td>
													<td>12</td>
													<td><a href="#">Ivon</a></td>
                                                    <td>12/11/2018 09:87 PM</td>
												</tr>
												<tr>
													<td>Rainbow Dress</td>
													<td>8</td>
													<td>Pochi</td>
                                                    <td>12/11/2018 09:87 PM</td>
												</tr>
												<tr>
													<td>Pink Pants</td>
													<td>11</td>
													<td>Alligator</td>
                                                    <td>12/11/2018 09:87 PM</td>
												</tr>
												<tr>
													<td>Blue Blouse</td>
													<td>7</td>
													<td>RDD</td>
                                                    <td>12/11/2018 09:87 PM</td>
												</tr>
                                                <tr>
                                                    <td>Green Lipstick</td>
                                                    <td>12</td>
                                                    <td><a href="#">Ivon</a></td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Rainbow Dress</td>
                                                    <td>8</td>
                                                    <td>Pochi</td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Pink Pants</td>
                                                    <td>11</td>
                                                    <td>Alligator</td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Blue Blouse</td>
                                                    <td>7</td>
                                                    <td>RDD</td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Green Lipstick</td>
                                                    <td>12</td>
                                                    <td><a href="#">Ivon</a></td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Rainbow Dress</td>
                                                    <td>8</td>
                                                    <td>Pochi</td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Pink Pants</td>
                                                    <td>11</td>
                                                    <td>Alligator</td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>
                                                <tr>
                                                    <td>Blue Blouse</td>
                                                    <td>7</td>
                                                    <td>RDD</td>
                                                    <td>12/11/2018 09:87 PM</td>
                                                </tr>

											</tbody>
									</table>

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
