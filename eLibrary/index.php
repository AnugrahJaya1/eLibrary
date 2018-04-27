<?php
	if(isset($_POST['flog'])){
		header("Location: pages/general/login.php");
	}

	if(isset($_POST['fsign'])){
		header("Location: pages/general/signup.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>eLibrary</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- OPTIONAL -->
		<link rel="stylesheet" href="lib/w3.css">
		<link rel="stylesheet" href="lib/w3-theme-riverside.css">
		<link rel="stylesheet" href="style/style.css">
		<!--styling-->
		<style>
		/*Banner CSS */
			#bannerCont{
				height : 60%;
				width: 100%;
				position : relative;
			}
			img{
				width:100%; 
				height:100%;
			}
			#centerTxt{
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				color: white;
				font-size: 100px;
			}
			/* Form CSS */
			#buttCont{
				height:400px;
				width: 100%;
				background-color:darkgrey;
			}
			#butt{
				padding-top : 10%;
				margin-left: 45%;
			}
			.fbutt{
				height: 60px;
				width: 100px;
				background-color: #333;
				color: white;
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<!-- CONTENT -->
		<div id="bannerCont">
			<img src="img/banner.jpg" >
			<div id="centerTxt"> eLIBRARY </div>
		</div>
			
		<div id="buttCont">
			<form id="butt" method="post">
				<input type="submit" class="fbutt" name="flog" value="LOGIN"/>
				<input type="submit" class="fbutt" name="fsign" value="SIGN UP"/>
			</form>
		</div>
	</body>
</html>