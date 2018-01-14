<?php 
include 'pages/header.php';
include '../genfunctions/db_con.php';
if (isset($_REQUEST['id'])) {
    $id = strip_tags($_REQUEST['id']);
}else{
    $id = $_SESSION['id'];
}
 $sql = "select * from users where id=" . $id;
$fname = "";
$lname = "";
$store = "";
$sms1 = "";
$sms2 = "";
$email = "";
$tel = "";
$token = "";
$lock = "";
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
        $lock = $row['user_lock'];
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
								<a class="navbar-brand" href="#">Partner Info</a>
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
                                                <input type="text" class="form-control" placeholder="City" value="<?php echo $sms1; ?>">
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
                                        <button type="submit" class="btn btn-success" disabled>Update Profile</button>&nbsp;&nbsp;<a class="btn btn-info" onclick="resetPin(<?php echo $id; ?>)">Reset Pin</a><?php
                                        if (isset($_REQUEST['id'])) {
                                            ?>
                                            &nbsp;&nbsp;<a class="btn btn-warning" 
                                        <?php
                                        if($lock == "0"){
                                           echo 'onclick="lockUser(' . $_REQUEST['id'] . ')">Lock User</a>'; 
                                       }else{
                                            echo 'onclick="unlockUser(' . $_REQUEST['id'] . ')">Unlock User</a>';
                                       }
                                        
                                        ?>
                                        

                                        <?php
                                         }
                                        ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Items Currently Active</a></li>
  <li><a data-toggle="tab" href="#menu1">Pending Items</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="col-lg-12 col-md-12">
        
        <table class="table table-striped">
            <thead><tr><th>Item Code</th><th>Item Name</th><th>Quantity(Initial/Present)</th><th>Item Price</th><th>Date Last Updated</th></tr></thead>
            <tbody>
    <?php
    $sql = "select * from item where supplier=" .  $id . " and qty>0 and rcvd=1 order by date_last_update desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()) {
    echo '<tr onclick="window.location.href='. "'i.php?s=" . $row['id'] . "'" .'">';
    echo '<td>' . $row['serial_no'] . "</td>";
    echo '<td>' . $row['item_name'] . "</td>";
    echo '<td>' . $row['init_qty'] . ' / ' . $row['qty'] . "</td>";
    echo '<td>' . $row['unit_price'] . "</td>";
    echo '<td>' . $row['date_last_update'] . "</td>";
    echo '</tr>';
    }
    }
    ?>
            </tbody>
        </table>
    </div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <div class="col-lg-12 col-md-12">
       
        <table class="table table-striped">
            <thead><tr><th></th><th>Item Code</th><th>Item Name</th><th>Quantity</th><th>Item Price</th><th>Date Added</th></tr></thead>
            <tbody>
    <?php
    $sql = "select * from item where supplier=" .  $id . " and rcvd=0 order by date_last_update desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()) {
    echo '<tr id="item_' . $row['id'] . '">';
    echo '<td><button class="btn btn-success btn-fill" onclick="conf(' . $row['id'] . ')">I received this</button></td>';
    echo '<td>' . $row['serial_no'] . "</td>";
    echo '<td>' . $row['item_name'] . "</td>";
    echo '<td>' . $row['init_qty'] . "</td>";
    echo '<td>' . $row['unit_price'] . "</td>";
    echo '<td>' . $row['date_added'] . "</td>";
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


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>


    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>
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
                    $("#item_" + e).remove();


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
    function lockUser(e){
        $.ajax({
            url: "function/lockUser.php?l=1&id=" + e,
            success: function(result){
                if(result){
                    $.notify({ message: "<p><h3>User Locked</h3></p>" },{type: 'success',timer: 3000});
                }
            }
        });
    }
    function unlockUser(e){
        $.ajax({
            url: "function/lockUser.php?l=0&id=" + e,
            success: function(result){
                if(result){
                    $.notify({ message: "<p><h3>User Unlocked</h3></p>" },{type: 'success',timer: 3000});
                }
            }
        });
    }
    function resetPin(e){
        $.ajax({
            url: "function/resetPin.php?id=" + e,
            success: function(result){
                if(result){
                    $.notify({ message: "<p><h3>User Pin Reset Complete</h3></p>" },{type: 'success',timer: 3000});
                }
            }
        });
    }
</script>
</html>
