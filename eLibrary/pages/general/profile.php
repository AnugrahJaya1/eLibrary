<?php

?>
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
		</style>
        <title>Profile Page</title>
	</head>
    <body>
	    <!-- CONTENT -->
	    <?php include("../temp/headerUser.php"); ?>
        <!--MID Content-->
        <div id="midItem">
            <!--SIDE NAVBAR--><?php include("../temp/sideNavUser.php");?>
            <!---->
            <div id="formCon">
                <h1>Profile</h1>
                <div id="profCon">
                    <img src="../../img/profile.jpg" />
                    <div id="buttCon">
                        <button id="modalButt" >UPDATE USER INFO</button>
                    </div>
                </div>
            </div>
        </div>
        <!--FOOTER-->
        <?php include("../temp/footer.php");?>
	</body>
</html>