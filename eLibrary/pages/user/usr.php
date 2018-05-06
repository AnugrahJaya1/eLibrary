<?php
	session_start();
	$nama=$_SESSION["nama"];
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
            /* #bannerCont {
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
            } */
            /*navBar CSS*/
            /* #navBar{
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
            } */
			#navMenu{
				list-style-type: none;
				margin: 0;
				padding: 0;
				width: 25%;
				background-color: #f1f1f1;
				position: fixed;
				height: 100%;
				overflow: auto;
			}
			/* .menu,a{
				display: block;
				color: #000;
				padding: 8px 16px;
				text-decoration: none;
			} */
			/* a{
				text-decoration: none;
				display: block;
			} */
        </style>
	</head>
	<body>
		<!-- CONTENT -->
        <?php include("../temp/headerUser.php"); ?>

		<div class="navBarMenu">
			<h3>HOME</h3>
			<ul id="navMenu" >
				<li class="menu"><a href="book.php">Book List</a></li>
				<li class="menu"><a href="borrow.php">Borrow History</a></li>
				<li class="menu"><a href="">Download Journals</a></li>
			</ul>
		</div>

	</body>
</html>