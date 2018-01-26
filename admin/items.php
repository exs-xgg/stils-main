<?php

include 'pages/header.php';include '../genfunctions/db_con.php';

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

                        <<li>
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
                                            <p>Total Items on Hand</p>
                                           <?php
                                            echo $sum;
                                            ?>
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
                    <script type="text/javascript"></script>
                    <div class="col-lg-6 col-sm-6" onclick="window.location.href = 'pending.php'">
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
			<div class="col-md-12">
                
					<div class="card card-plain">
							<div class="header">
									<h4 class="title">Items on Inventory</h4>
                                    <ul class="pagination">
                                      <li><a href="?cat=ac">A-C</a></li>
                                      <li><a href="?cat=df">D-F</a></li>
                                      <li><a href="?cat=gi">G-I</a></li>
                                      <li><a href="?cat=jl">J-L</a></li>
                                      <li><a href="?cat=mo">M-O</a></li>
                                      <li><a href="?cat=ps">P-S</a></li>
                                      <li><a href="?cat=tv">T-V</a></li>
                                      <li><a href="?cat=wz">W-Z</a></li>
                                      <li><a href="?cat=num">#</a></li>
                                      
                                    </ul>
							</div>
							<div class="content table-responsive table-full-width">
									<table class="table table-striped">
											<thead>

												<th>Name</th>
                                                <th>Item Code</th>
												<th>Quantity</th>
												<th>Partner</th>
                                                <th>Last Updated</th>

											</tr></thead>
											<tbody>
												
<?php

if (!(isset($_REQUEST['cat']))) {
    $sql = "select *, item.id as itid from item  inner join users on item.supplier = users.id where qty > 0 and rcvd=1 order by date_last_update desc limit 20";
}else{
    $cat = $_REQUEST['cat'];
    $sql1= "select *, item.id as itid  from item inner join users on item.supplier = users.id where qty > 0 and rcvd=1 and ";
    switch ($cat) {
        case 'ac':
            $sql2 = " ( (item_name like 'a%') or (item_name like 'b%') or (item_name like 'c%'))";
            break;
        case 'df':
            $sql2 = " ( (item_name like 'd%') or (item_name like 'e%') or (item_name like 'f%'))";
            break;
        case 'gi':
            $sql2 = " ( (item_name like 'g%') or (item_name like 'h%') or (item_name like 'i%'))";
            break;
        case 'jl':
            $sql2 = " ( (item_name like 'j%') or (item_name like 'k%') or (item_name like 'l%'))";
            break;
        case 'mo':
            $sql2 = " ( (item_name like 'm%') or (item_name like 'n%') or (item_name like 'o%'))";
            break;
        case 'ps':
            $sql2 = " ( (item_name like 'p%') or (item_name like 'q%') or (item_name like 'r%') or (item_name like 's%'))";
            break;
        case 'tv':
            $sql2 = " ( (item_name like 't%') or (item_name like 'u%') or (item_name like 'v%'))";
            break;
        case 'wz':
            $sql2 = " ( (item_name like 'w%') or (item_name like 'x%') or (item_name like 'y%') or (item_name like 'z%'))";
            break;
        case 'num':
            $sql2 = " ( (item_name like '0%') or (item_name like '1%') or (item_name like '2%') or (item_name like '3%') or (item_name like '4%')) or (item_name like '5%') or (item_name like '6%') or (item_name like '7%') or (item_name like '8%') or (item_name like '9%'))";
            break;
        default:
            $sql2 = "1=1";
            break;
    }
    $sql = $sql1.$sql2." order by date_last_update desc";


}
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr onclick="window.location.href='. "'i.php?s=" . $row['itid'] . "'" .'">';
        echo '<td>' . $row['item_name'] . '</td>';
        echo '<td>' . $row['serial_no'] . '</td>';
        echo '<td>' . $row['qty'] . '</td>';
        echo '<td>' . $row['store'] . '</td>';
        echo '<td>' . $row['date_last_update'] . '</td>';
        echo "</tr>";
    }
}
?>
                                               

											</tbody>
									</table>

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

	

</html>
