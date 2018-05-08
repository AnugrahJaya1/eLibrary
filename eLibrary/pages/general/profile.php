<!DOCTYPE html>
<html>
	<head>
		<title>eLibrary</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- OPTIONAL -->
		<link rel="stylesheet" href="../../lib/w3.css">
		<link rel="stylesheet" href="../../lib/w3-theme-riverside.css">
		<link rel="stylesheet" href="../../style/style.css">
		<link rel="stylesheet" href="../../lib/font-awesome.min.css">
		<link rel="stylesheet" href="../../lib/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../../style/profile.css" />
		<style>
			
		</style>
        <title>Profile Page</title>
	</head>
    <body>
	    <!-- CONTENT -->
	    <?php include("../temp/headerUser.php"); ?>
        <!--MID Content-->
        <div id="midItem">
            <!--SIDE NAVBAR--><?php include("../temp/sideNavUser.php");?>
            
            <div id="formCon">
                <h1>Profile</h1>
                <!-- MESSAGE -->
                <?php 
                    if(isset($_SESSION["message"]) && $_SESSION["message"]!=""){
                        echo  $_SESSION["message"] ;
                        $_SESSION["message"]="";
                    }
                ?>
                <div id="profCon">
                    <img src="../../img/profile.jpg" />
                    <div id="buttCon">
                        <button id="modalButt">UPDATE USER INFO</button>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- MODAL -->
        <div class="modal" id="myModal" style="display:<?php echo $display;?>">
            <div class="modal-dialog">
                <div class="modal-content">
                <button class="close">&times;</button>
                <!-- Modal body -->
                    <div  class="modal-body">
                        <h3>Update User Info</h3>
                        <p style="font-size: 18px;">Nama : <?php echo $nama?></p>
                        <form method="post" action="../../controller/update.php">
                            <input class="modalForm" type ="password" name="password" placeholder="Password" />
                            <br>
                            <input class="modalForm" type="password" name="conPassword" placeholder="Confirm Password"  />
                            <br>
                            <input class="modalForm" type="text" name="phoneNum" pattern="^[ ]*[+]?[0-9]{4,}[ ]*$"  id="phone" placeholder="Phone" />
                            <br>
                            <input class="modalForm" type="text" name="address" placeholder="Address"  />
                            <br>
                            <input class="modalForm" type="submit" id="upBott" name="update" value="UPDATE"  />
                        </form>

                    </div>

                </div>
            </div>
        </div>
        
        <!-- SCRIPT MODAL HANDLE -->
        <script>
            var modal=document.getElementById('myModal');
            var btn=document.getElementById('modalButt');
            var close=document.getElementsByClassName("close")[0];
            btn.onclick=function(){
                modal.style.display="block";
            }
            close.onclick = function() {
                modal.style.display = "none";
            }
        </script>
        <!--FOOTER-->
        <?php include("../temp/footer.php");?>
	</body>
</html>