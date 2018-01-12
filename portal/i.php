<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';
if (isset($_REQUEST['s'])) {
    $s = strip_tags($_REQUEST['s']);
   $sql = "select *, users.id as dd,item.id as did from item  inner join users on item.supplier = users.id where item.id=" . $s;
}else{
    header("location: items.php");
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
                    <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <h3>Item Information</h3>
                                     
<?php 

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
    <form id="form"  action="function/updateItem.php" method="post">
<table class="table">
    <tr><th>Item ID</th><td><input class="form form-control" type="text" name="item_id" id="serial" readonly value="<?php echo $row['did']; ?>"></td></tr>
    <tr><th>Item Serial No.</th><td><input class="form form-control" type="text" name="item_serial" id="serial" value="<?php echo $row['serial_no']; ?>"></td></tr>
    <tr><th>Item Name</th><td><input class="form form-control" type="text" name="item_name" id="item_name" value="<?php echo $row['item_name']; ?>"></td></tr>
    <tr><th>Item Price</th><td><input class="form form-control" type="text" name="unit_price" id="price" value="<?php echo $row['unit_price']; ?>"></td></tr>
    <tr><th>Initial Quantity</th><td><input class="form form-control" readonly type="text" name="init_qty" value="<?php echo $row['init_qty']; ?>"></td></tr>
    <tr><th>Current Quantity</th><td><input class="form form-control" readonly type="text" name="qty" value="<?php echo $row['qty']; ?>"></td></tr>
    <tr><th>Status</th><td><?php 
    if($row['rcvd']=="0"){
        echo "Not Yet Received";
    }else{
        echo("Received");
    }
    ?></td></tr>
    <tr><th>Date Last Updated</th><td><?php echo $row['date_last_update']; ?></td></tr>
    <tr><th></th><td><input type="submit" class="btn btn-primary" value="Update"></td></tr>
</form>
</table>
<h4>Actions</h4>
<table class="table">
    
    <tr><th>Delete Item (Dont Click this for "Testing Purposes". <br>This Action cant be undone YET.)</th><td><a href="function/deleteItem.php?id=<?php echo $_REQUEST['s']; ?>" class="btn btn-warning">Delete</a></td><td></td></tr>     


    <?php
    }
}else{
    echo "No such item is found.";
}
?></table>
                                     
                                    </div>
                                </div>
                                
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
    <script>
<?php

if (isset($_REQUEST['done'])) {
    if (($_REQUEST['done']) == 'true') {
        ?>
$.notify({ message: "<p><h3>Item Updated</h3></p>" },{type: 'success',timer: 3000});
        <?php
    }else{
        ?>
$.notify({ message: "<p><h4>Request failed. The website may be experiencing errors or the internet is down.</h4></p>" },{type: 'danger',timer: 3000});
        <?php
    }
}

?>
        $("input[id*='unit_price']").keydown(function (event) {


                                if (event.shiftKey == true) {
                                    event.preventDefault();
                                }

                                if ((event.keyCode >= 48 && event.keyCode <= 57) || 
                                    (event.keyCode >= 96 && event.keyCode <= 105) || 
                                    event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
                                    event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

                                } else {
                                    event.preventDefault();
                                }

                                if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                                    event.preventDefault(); 
                                //if a decimal has been added, disable the "."-button

                            });
    </script>
	

</html>
