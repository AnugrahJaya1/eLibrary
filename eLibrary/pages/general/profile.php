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
		<style>
			#profile{
                background-color: #c1ccdd;
            }
            #profile:hover{
                opacity:1;
            }
            /*Content CSS*/
            #midItem {
                height: 100%;
                width: 100%;
                display: flex;
            }
            /*Mid Item CSS*/
            .notif{
                background-color:red;
                color:white;
                font-size : 18px;
                width: 40%;
            }
            .alert{
                font-size: 40px;
            }
            #formCon{
                margin-left: 6px;
                width:80%;
                height:100%;
            }
            h1 {
                background-color: dimgrey;
                color: white;
                padding-left: 5px;
                margin-bottom: 0px;
            }
            #profCon{
                margin-top:13px;
                margin-left:35%;
                width:20%;
                height:10%;
            }
            #modalButt {
                height: 60px;
                width: 100%;
                background-color: #333;
                color: white;
                font-size: 16px;
            }
            /*CSS Modal*/
            .modal {
                display: none;/*<?=$display?>;*/
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: grey; /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }
            /* Modal Body */
            .modal-body {
                padding: 2px 16px;
                height: 70%;
            }
            /* Modal Footer */
            .modal-footer {
                height:20%;
                padding: 2px 16px;
                background-color: grey;
                color: white;
                text-align:left;
            }
            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: grey;
                margin: auto;
                border: 1px solid #888;
                height: 90%;
                width: 70%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                animation-name: animatetop;
                animation-duration: 0.4s
            }
            .modal-dialog {
                width: 600px;
                height: 60%;
                margin: 30px auto;
            }

            #upBott {
                height: 30px;
                width: 100px;
                background-color: #333;
                color: white;
                font-size: 14px;
            }
            .modalForm {
                width: 100%;
                margin-bottom: 10px;
            }
            .close{
                margin-left:95%;
            }
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