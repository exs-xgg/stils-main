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
                    <a class="navbar-brand" href="#">Reports</a>
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
                    
                   <div class="col-lg-12" ">
                        <div class="card">
                            <div class="content">
                                <h4>View Inventory Report</h4>
From: <input type="date" name="" id="datefrom"> To: <input type="date" name="" id="dateto"> <button class="btn btn-primary" onclick="getReport()">Submit</button>
                                    <table class="table" id="itemTbl">
                                        <thead>
                                            <tr><th>Item Serial #</th><th>Item Name</th><th>Quantity</th><th>Date & Time</th></tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
					
<script>
    function getReport(){
        var from = $("#datefrom").val();
        var to = $("#dateto").val();
        $("#itemTbl tbody tr").empty();
        $.ajax({
                                
            url: "function/reportAPI.php?f=" + from + '&t=' + to,

            timeout: 5000,
            success: function(result){
                var rss = JSON.parse(result);
                for(var i = 0; i < rss.length; i++) {
                    var obj = rss[i];

                    $('#itemTbl').append('<tr><td>'+ obj.serial_no +'</td><td>'+ obj.item_name +'</td><td>'+ obj.qty +'</td><td>' + obj.time_sale + '</td></tr>');
                }
            }
        });

    }
</script>
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
