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
$tag ="";
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
        $tag = $row['tag'];
    }
}
$sold_today = "";
$instock = "";
$qry = "select (select sum(sale.qty) from sale inner join item on item.id = sale.item_id where item.supplier = $id and date(time_sale) = date(current_timestamp)) as sold_today, (select sum(qty)from item where supplier = $id and rcvd=1) as instock ";
$res = $conn->query($qry);
if ($res->num_rows > 0) {
    while ($r = $res->fetch_assoc()) {
        if ($r['sold_today']===NULL) {
            $sold_today = "none";
        }else{
                    $sold_today = $r['sold_today'];

        }
        if ($r['instock']===NULL) {
            $instock = "none";
        }else{
        $instock = $r['instock'];
    }
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
                                        <h5><?php echo $instock ?><br /><small>In Stock</small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5><?php echo $sold_today ?><br /><small>Sold Today</small></h5>
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
                                <form action="function/updateUser.php" method="post">
                                    

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control border-input" name="fname" placeholder="First Name" value="<?php echo $fname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control border-input" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                    <label>Landline</label>
                                                    <input type="text" class="form-control border-input" name="tel" placeholder="City" value="<?php echo $tel; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" name="email" placeholder="Email" value="<?php echo $email; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Phone Number 1</label>
                                                <input type="text" class="form-control border-input" name="num1" placeholder="City" value="<?php echo $sms1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
											<div class="form-group">
													<label>Phone Number 2</label>
													<input type="text" class="form-control border-input" name="num2" placeholder="City" value="<?php echo $sms2; ?>">
											</div>
                                        </div>
                                        

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Store Name</label>
                                                <input type="text" class="form-control border-input" name="store_name" placeholder="Company" value="<?php echo $store; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" name="logintoken" placeholder="Username" value="<?php echo $token; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Unique Tag</label>
                                                <input type="text" class="form-control border-input" name="tag" placeholder="Tag" value="<?php echo $tag; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Pin</label>
                                                <input type="password" class="form-control border-input" name="pin" placeholder="Tag" value="<?php echo '000000'; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"  name="submit" class="btn btn-success">Update Profile</button>&nbsp;&nbsp;<a class="btn btn-info" onclick="resetPin(<?php echo $id; ?>)">Reset Pin</a><?php
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
                                        &nbsp;&nbsp;<a class="btn btn-danger" onclick="delUser(<?php echo $_REQUEST['id'];?>)">Delete User</a>

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
    echo '<td><button class="btn btn-success btn-fill" onclick="conf(' . $row['id'] . ')">I received this</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-fill" onclick="del(' . $row['id'] . ')"> X </button></td>';
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
    function delUser(e){
        if(confirm("Do you want to delete this user? THIS ACTION IS PERMANENT AND CAN'T BE UNDONE!")){
          window.location.href = "function/deleteUser.php?id=" + e;
        }
    }
    function del(e){
        $.ajax({
            url: "function/deleteItem.php?id=" + e,
            success: function(){
 $.notify({
                        message:"<p><h4>Item Deleted!</h4></p>" 

                    },{
                        type: 'success',
                        timer: 2000
                    });
                    $("#item_" + e).remove();
            }

        });
    }
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
    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action']=="done") {
        ?>

 $.notify({
               
                message: "<p><h4>Update Successful!</h4></p>"

                },{
                    type: 'success',
                    timer: 3000
                });

        <?php
    }
    ?>
</script>
</html>
