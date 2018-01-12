<?php

include 'pages/header.php';
include '../genfunctions/db_con.php';


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
                    <a class="navbar-brand" href="#">New Message</a>
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
                    
                   <div class="col-lg-12 col-sm-12">
                        <form action="" method="post">
                            <div class="content"> 
                                <h5> Create new Message </h5>
                                <p>Send to:</p>
                                <select class="form form-control" id="receiver" onchange="sendMsg()">
                                    <option>--</option>
<?php
include '../genfunctions/db_con.php';
$sql = "select * from users where user_lock = 0 and priv = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option id="' . $row['id'] . '">';
        echo $row['store'] . ' - ' . $row['lname'];
        echo '</option>';
    }
}
?>
                                </select>
                                <span>Message Body</span><br>                                
                                <textarea class="form form-control" maxlength="200" id="msgbody" name="msg"></textarea><br>
                                <button class="btn btn-success btn-fill"><i class="ti ti-check"></i> Send</button>
                            </div>
                        </form>
                    </div>
					

                </div>

            </div>
            

        </div>



<script type="text/javascript">
    function sendMsg(){
        var id = $("#receiver").children(":selected").attr("id");
        $('form').attr('action', 'function/sendMsg.php?to=' + id);
    }
</script>

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
