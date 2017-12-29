<?php 
include 'pages/header.php';
include '../genfunctions/db_con.php';
if (isset($_REQUEST['id'])) {
    $id = strip_tags($_REQUEST['id']);
   $sql = "select * from users where id=" . $id;
}else{
    $sql = "select * from users where id=" . $_SESSION['id'];
}
$fname = "";
$lname = "";
$store = "";
$sms1 = "";
$sms2 = "";
$email = "";
$tel = "";
$token = "";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $store = $row['store'];
        $sms1 = $row['sms1'];
        $sms2 = $row['sms2'];
        $tel = $row['tel'];
        $email = $row['email'];
        $token = $row['login_token'];
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
								<a class="navbar-brand" href="#">Supplier Info</a>
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
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">

                            <div class="content">

																<h4><?php echo $fname . " " . $lname; ?></h4>
																<span><?php echo $store; ?></span><br>
																<span><?php echo $sms1; ?></span><br>
																<span><?php echo $sms2; ?></span><br>
																<span><?php echo $email; ?></span>


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
                                                <input type="text" class="form-control border-input" placeholder="Company" value="<?php echo $store; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" disabled value="<?php echo $token; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" value="<?php echo $email; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" placeholder="First Name" value="<?php echo $fname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Last Name" value="<?php echo $lname; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone Number 1</label>
                                                <input type="text" class="form-control border-input" placeholder="City" value="<?php echo $sms1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
																					<div class="form-group">
																							<label>Phone Number 2</label>
																							<input type="text" class="form-control border-input" placeholder="City" value="<?php echo $sms2; ?>">
																					</div>
                                        </div>

                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Update Profile</button>&nbsp;&nbsp;<button type="submit" class="btn btn-info">Reset Pin</button>&nbsp;&nbsp;<button type="submit" class="btn btn-warning">Lock User</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>