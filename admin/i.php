<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';
if (isset($_REQUEST['s'])) {
    $s = strip_tags($_REQUEST['s']);
   $sql = "select *, users.id as dd from item  inner join users on item.supplier = users.id where item.id=" . $s;
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

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {?>
<form method="post" action="function/updateItem.php?id=<?php echo $_REQUEST['s']; ?>" autocomplete="off">
<table class="table">
    <tr><th>Item Name</th><td><input type="text" name="item_name" value="<?php echo $row['item_name']; ?>"></td></tr>
    <tr><th>Item Price</th><td><input type="text" name="unit_price" value="<?php echo $row['unit_price']; ?>"></td></tr>
    <tr><th>Initial Quantity</th><td><input type="text" name="init_qty" value="<?php echo $row['init_qty']; ?>"></td></tr>
    <tr><th>Current Quantity</th><td><input type="text" name="qty" value="<?php echo $row['qty']; ?>"></td></tr>
    <tr><th>Supplier</th><td><?php echo '<a href ="supplier.php?id='. $row['dd'] . '">' . $row['store']; ?></a></td></tr>
    <tr><th>Status</th><td><?php 
    if($row['rcvd']=="0"){
        echo "Not Yet Received";
    }else{
        echo("Received");
    }
    ?></td></tr>
    <tr><th>Date Last Updated</th><td><?php echo $row['date_last_update']; ?></td></tr>
    <tr><th></th><td><input type="submit" name="submit" value="Update"></td></tr>
</form>
</table>
<h4>Actions</h4>
<table class="table">
    <tr><th>Received?</th><td><button>Yes</button></td><td><button>No</button></td></tr>
    <tr><th>Delete Item</th><td><button>Delete</button></td><td></td></tr>     


    <?php
    }
}
?>
                                     
                                    </div>
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

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	

</html>
