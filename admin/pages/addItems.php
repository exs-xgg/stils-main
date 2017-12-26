<!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'> -->
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <div class="card" >
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                Add Item <span class="spp" onclick="help()">Help? Click me.</span>
            </div>
           
<br>
            <div class="content">
                <div class="col-lg-6">
                    <p id="help" class="sppp" onclick="$(this).hide(500)">Input the details of the next item you want to add to your store. Request will be approved once the store manager recieves and confirms the item delivery. Item status can be viewed here: <a href="items.php" class="btn btn-warning btn-fill">Inventory Status</a></p>
                </div>

                <form id="items" action="function/addItemAPI.php" method="post" class="col-lg-12" autocomplete="off">
                    <label>Item Name</label><br>
                    <input class="ft" type="text" name="item_name"><br>
                    <label>Item Price</label><br>
                    <input class="ft" type="text" name="item_price" id="item_price"><br>
                    <label>Item Quantity</label><br>
                    <input class="ft" type="text" name="item_qty" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onfocus="showWarn()"><span id="warn" class="stpp">Numbers only</span><br>
                    <label>Item Serial Number</label><br>
                    <input class="ft" type="text" name="serial" id="item_price"><br>
                   
                <input id="subb" type="submit" class="btn btn-info" name="submit" value="Submit">
                </form>
            </div>
            
            
   

            
        
        </div>
        
        <div class="footer">
            <hr />
            <div class="stats col-lg-6">
            </div>
        </div>
    </div>
</div>


                        <script type="text/javascript">
                            function showWarn(){
                                $("#warn").show(500);
                            }
                            $(document).ready(function(){
                                
                                    $("#help").hide();
                                    $("#warn").hide();
                                    
                               
                            });
                            function help(){
                                $("#help").show(500);
                            }
                            $("input[id*='item_price']").keydown(function (event) {


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
                        <style type="text/css">
                        .stpp{
                            background-color: #3498db;
                            color: white;
                            font-weight: bold;
                            padding: 5px;
                            border-radius: 2px;
                        }
                        .spp{
                            background-color: #e74c3c;
                            color: white;
                            font-weight: bold;
                            padding: 5px;
                            border-radius: 2px;
                        }
                        .sppp{
                            background-color: #2ecc71;
                            color: white;
                            font-weight: bold;
                            padding: 8px;
                            border-radius: 5px;
                        }
                           .form .form-control{
                                border-bottom-color: black;
                                border-width: 10px
                                font-weight: bold;
                            }
                            .ft{
                                width: 50%;
                                border-width: 2px;
                                border-color: #3498db;
                                margin: 5px;
                                padding: 5px;
                                border-radius: 5px;
                            }
                        </style>