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
            /* #currPage {
                background-color: #c1ccdd;
            } user */
            li:hover{
                opacity:0.5;
            }
            #navMenu{
                float:left;
                list-style-type: none;
                margin: 0;
                padding: 0;
                width: 25%;
            }
            .menu a{
                display: block;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
            }
            /* a{
                text-decoration: none;
            } */
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
				You are logged is as <?php echo $nama?>
                <li id="logout"> <a href="../general/logout.php"><i class="fa fa-sign-out"></i></a></li>
                <li id="profile"> <a href="../general/profile.php"><i class="fa fa-user"></i></a></li>
                <li id=""> <a href=""><i class="fa fa-envelope"></i></a></li>
                <li id="news"> <a href="../general/news.php"><i class="fa fa-newspaper-o"></i></a></li>
                <li id="user"><a href="../user/usr.php"><i class="fa fa-home"></i></a></li>
            </ul>
        </div>

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