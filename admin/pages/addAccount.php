<div class="card" >
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                Add Item <span class="spp" onclick="help()">Help? Click me.</span>
            </div>
           
<br>
            <div class="content">
                   
            <script type="text/javascript">
            	function getUsername(){
            		var sl = $("#store").val().toLowerCase().split(" ");
            		
            		$("#token").val($("#lname").val().toLowerCase().replace(/[ `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\w\s],/gi, '') + "_" + sl[0].replace(/[ `~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/\w\s]/gi, '') );
            	}
            </script>
   

                <form id="items" action="function/addAccount.php" method="post" class="col-lg-12" autocomplete="off">
                    <label>First Name</label><br>
                    <input class="ft" type="text" name="fname"><br>
                    <label>Last Name</label><br>
                    <input id="lname" class="ft" type="text" name="lname"><br>
                    <label>Store Name</label><br>
                    <input id="store" class="ft" type="text" name="store"><br>
                    <label>Email Address</label><br>
                    <input class="ft" type="text" name="email"><br>
                    <label>Cel No. 1</label><br>
                    <input class="ft" type="text" name="sms1"><br>
                    <label>Cel No. 2</label><br>
                    <input class="ft" type="text" name="sms2"><br>
                    <label>Tel No</label><br>
                    <input class="ft" type="text" name="tel"><br>
                    <label>Login Token</label><br>
                    <input id="token" class="ft" type="text" name="token"> &nbsp; <span class="btn btn-info" onclick="getUsername()">Generate Login Token</span><br>
                    <label>Unique Tag</label><br>
                    <input class="ft" type="text" name="tag"><br>
                    <label>Pin</label><br>
                    <input class="ft" type="text" name="pin" value="000000"><br><br>

                   
                <input id="subb" type="submit" class="btn btn-success btn-fill col-lg-6" name="submit" value="Submit">
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