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
            body {
                background-color: darkgray;
            }
            /*CSS banner*/
            #bannerCont {
                margin-top: 10px;
                width: 100%;
                box-shadow: 5px 5px 5px black;
            }

            img {
                width: 100%;
            }

            #centerTxt {
                position: absolute;
                top: 9%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-size: 100px;
            }
            /*navBar CSS*/
            #navBar{
                background-color : antiquewhite;
                width : 100%;
                height : 30px;
            }
            ul{
                list-style-type : none;
                height : 100%;
            }
            li{
                float:right;
                height:100%;

            }
            .fa-envelope {
                padding-left: 10px;
                padding-top: 5px;
                font-size: 20px;
                padding-right: 10px;
            }
            .fa-home {
                padding-left: 10px;
                padding-top: 5px;
                font-size: 20px;
                padding-right: 10px;
            }
            .fa-newspaper-o {
                padding-left: 10px;
                padding-top: 5px;
                font-size: 20px;
                padding-right: 10px;
            }
            .fa-sign-out {
                padding-left: 10px;
                padding-top: 5px;
                font-size: 20px;
                padding-right: 10px;
            }
            .fa-user {
                padding-left: 10px;
                padding-top: 5px;
                font-size: 20px;
                padding-right: 10px;
            }
            #currPage {
                background-color: #c1ccdd;
            }
            li:hover{
                opacity:0.5;
            }
        </style>
	</head>
	<body>
		<!-- CONTENT -->
        <!--Banner-->
        <div id="bannerCont">
            <img src="../../img/banner2.jpg" />
            <div id="centerTxt"> eLIBRARY </div>
        </div>

        <!--Navigation Bar-->
        <div id="navBar">
            <!--"You are logged in as'...'" text here-->
            <!--icons-->
            <ul id="navIcon">
                <li> <i class="fa fa-sign-out"></i></li>
                <li><i class="fa fa-user"></i></li>
                <li><i class="fa fa-envelope"></i></li>
                <li><i class="fa fa-newspaper-o"></i></li>
                <li id="currPage"><i class="fa fa-home"></i></li>
            </ul>
        </div>

	</body>
</html>