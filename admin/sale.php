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

                                             <input class="form form-control" type="text" name="" id="item" placeholder="Item code here..." onkeyup="search()">
                                             

                                            <span class="input-group-addon" onclick="search()"><i class="fa fa-search"></i> Search</span>

                                        </div>
                                        <div>
                                            <table class="table" id="itemTbl">
                                                <thead>
                                                 <tr><th>Item Code</th><th>Item Name</th><th>Quantity</th><th>Supplier</th><th></th></tr>
                                                </thead>
                                             </table>
                                        </div>
                                        <hr>
                                        Item ID:&nbsp;&nbsp;&nbsp;&nbsp;<b><pre id="rs" ></pre></b><br>
                                        <span>Quantity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input class="numer" type="number" name="" id="itemQty" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Quantity" value="1" width="100" min="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button id="btnsink" class="btn btn-success" onclick="sink()">Go</button>
                                        </div>
                                    
                                </div>
                            </div>
                    </div>
                    <style>
                        .numer{
                            padding: 5px;
                            max-width: 100px;
                        }
                    </style>
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
                            $("#btnsink").text("Please Wait");
                            $("#btnsink").disabled = true;
                            var i = $("#rs").html();
                            
                            var q = $("#itemQty").val();

                            $.ajax({
                                
                                url: "function/saleAPI.php?i=" + i + "&q=" + q,

                                timeout: 5000,
                                success: function(result){
                                    if(result){
                                        var rr = JSON.parse(result);
                                        if(rr.return){
                                            $.notify({ message: "<p><h3>Item Added to Sales</h3></p>" },{type: 'success',timer: 3000});
                                            $("#btnsink").text("Go");
                                            $("#btnsink").disabled = false;
                                            search();
                                        }else{
                                            $.notify({ message: "<p><h4>Request failed. The website may be experiencing errors or the internet is down.</h4></p>" },{type: 'danger',timer: 3000});
                                            $("#btnsink").text("Go");
                                            $("#btnsink").disabled = false;
                                        }
                                        
                                    }
                                },
                                error: function(xhr){
                                    $.notify({ message: "<p><h4>Request failed. The website may be experiencing errors or the internet is down.</h4></p>" },{type: 'danger',timer: 3000});
                                    $("#btnsink").text("Go");
                                    $("#btnsink").disabled = false;
                                }
                            });
                            
                        }
                    }
                       function search(){
                        $("#itemTbl tbody tr").empty();
                        var itemBox = document.getElementById("item");
                        var keyw = itemBox.value;
                         $.ajax({
                                
                                url: "function/itemAPI.php?i=" + keyw,

                                timeout: 5000,
                                success: function(result){
                                    var rss = JSON.parse(result);
                                    for(var i = 0; i < rss.length; i++) {
                                        var obj = rss[i];

                                        $('#itemTbl').append('<tr><td>'+ obj.serial_no +'</td><td>'+ obj.item_name +'</td><td>'+ obj.qty +'</td><td>' + obj.store + '</td><td><button onclick="fsa('+ obj.ids +',' + obj.qty +')">Select</button></tr>');
                                    }
                                }
                            });
                        
                       }
                       function fsa(e,g){
                        $("#rs").text(e);
                        $("#itemQty").attr({
                           "max" : g 
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
