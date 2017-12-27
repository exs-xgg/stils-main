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
                                    <div class="col-xs-10">
                                        <h3>Inventory Update</h3>
                                       
                                        <div class="input-group">

                                             <input class="form form-control" type="text" name="" id="item" placeholder="Item code here..." onkeypress="search()">
                                             

                                            <span class="input-group-addon"><i class="fa fa-search"></i> Search</span>

                                        </div>
                                        <div>
                                            <table class="table" id="itemTbl">
                                                <thead>
                                                 <tr><th>Item Code</th><th>Item Name</th><th>Quantity</th><th>Supplier</th><th></th></tr>
                                                </thead>
                                             </table>
                                        </div>
                                        Item ID: <b><span id="rs"></span></b><br>
                                        <span>Quantity </span><input class="btn" type="number" name="" id="item" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Quantity" value="1" width="100" min="1">
                                        <button class="btn btn-success" onclick="sink()">Go</button>
                                        </div>
                                    
                                </div>
                            </div>
                    </div>    
                   <script>
                    var s = 0;
                    function sink(){
                       if ($('#rs').is(':empty')){
                            $.notify({

               
                                message: "<p><h3>No Item Selected</h3></p>"

                                },{
                                    type: 'danger',
                                    timer: 3000
                               
                            });
                        }else{
                            $.notify({

               
                                message: "<p><h3>No Item Selected</h3></p>"

                                },{
                                    type: 'success',
                                    timer: 3000
                               
                            });
                        }
                    }
                       function search(){
                        $("#itemTbl tbody tr").empty();
                        // var x = document.getElementById("itemTbl").rows.length;
                        // var table = document.getElementById("itemTbl");
                        // var row = table.insertRow(x);
                        // var cell1 = row.insertCell(0);
                        // var cell2 = row.insertCell(1);
                        // var cell3 = row.insertCell(2);
                        // var cell4 = row.insertCell(3);
                        // cell1.innerHTML = "Cell " + s;
                        // cell2.innerHTML = "Cell" + s;
                        // cell3.innerHTML = "Cell" + s;
                        // cell4.innerHTML = "Cell" + s;
                        // s+=1;
                        $('#itemTbl').append('<tr><td>COL'+ s +'</td><td>COL'+ s +'</td><td>COL'+ s +'</td><td>COL2</td><td><button onclick="fsa(1'+ s +')">Select</button></tr>');
                        s+=1;
                       }
                       function fsa(e){
                        $("#rs").text(e);
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
