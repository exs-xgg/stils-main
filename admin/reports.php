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
                                <h4>View Sales Report</h4>
From: <input type="date" name="" id="datefrom"> To: <input type="date" name="" id="dateto"> <button class="btn btn-primary btn-simple" onclick="getReport()">Submit</button><button class="btn btn-primary btn-simple" onclick="getToday()">View Sales Today</button>
                                    <table class="tbl" id="itemTbl">
                                        <thead>
                                            <tr><th>Item Code</th><th>Item Name</th><th>Store</th><th>Quantity</th><th>Unit Price</th><th>Total Price</th><th>Date & Time</th></tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>

                                    
                            </div>
                        </div>
                        <div class=" col-lg-6 col-sm-12">
                            <table class="table ">
                                <tr><th>Total Sales</th><td id="salesContainer">0</td></tr>
                                <tr><th>Deduction (3%)</th><td id="deductContainer">0</td></tr>
                                <tr><th>Net Income</th><td id="netContainer">0</td></tr>
                            </table>
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
                //console.log(result);
                var rss = JSON.parse(result);
                var sum = 0;
                var ded = 0;
                for(var i = 0; i < rss.length; i++) {
                    var obj = rss[i];

                    $('#itemTbl').append('<tr><td>'+ obj.serial_no +'</td><td>'+ obj.item_name +'</td><td>'+ obj.store +'</td><td>'+ obj.qty+'</td><td>' + obj.price+'</td><td>' + obj.total +'</td><td>' + obj.time_sale + '</td></tr>');
                  
                }
                for(var i = 0; i < rss.length; i++) {
                    var obj = rss[i];
                    
                    sum = sum + parseFloat(obj.total);
                }
                $("#salesContainer").text(sum);
                $("#deductContainer").text((sum * 0.03));
                $("#netContainer").text((sum - (sum * 0.03)));
            }
        });

    }

    function getToday(){
       
        $("#itemTbl tbody tr").empty();
        $.ajax({
                                
            url: "function/reportAPI.php?today=0",

            timeout: 5000,
            success: function(result){
                //console.log(result);
                var rss = JSON.parse(result);
                var sum = 0;
                var ded = 0;
                for(var i = 0; i < rss.length; i++) {
                    var obj = rss[i];

                    $('#itemTbl').append('<tr><td>'+ obj.serial_no +'</td><td>'+ obj.item_name +'</td><td>'+ obj.store +'</td><td>'+ obj.qty+'</td><td>' + obj.price+'</td><td>' + obj.total +'</td><td>' + obj.time_sale + '</td></tr>');
                  
                }
                for(var i = 0; i < rss.length; i++) {
                    var obj = rss[i];
                    
                    sum = sum + parseFloat(obj.total);
                }
                $("#salesContainer").text(sum);
                $("#deductContainer").text((sum * 0.03));
                $("#netContainer").text((sum - (sum * 0.03)));
            }
        });

    }

</script>
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

<style>
table{
    width: 100%
}
    td, th{
        padding: 5px;
        border-width: 1px;
        border-color: black solid
    }
</style>
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
