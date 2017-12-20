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
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">

                            <div class="content">

																<h4>Chet Faker</h4>
																<span>122 Baker st. Sta Ines Tarlac City</span><br>
																<span>09123456789</span><br>
																<span>09987654321</span><br>
																<span>chetfkr@gmail.com</span>


                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-1">
                                        <h5>145<br /><small>In Stock</small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>22<br /><small>Sold Today</small></h5>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Store Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Company" value="Locuste">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" disabled value="locuste01">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="First Name" value="Chet">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" value="Faker">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" value="Melbourne, Australia">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone Number 1</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="09123456789">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
																					<div class="form-group">
																							<label>Phone Number 2</label>
																							<input type="text" class="form-control border-input" placeholder="City" value="09987654321">
																					</div>
                                        </div>

                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
