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

		<!-- Buat Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!--styling-->
		<style>
            body{
                background-color : darkgrey;
            }
		/*Banner CSS */
			#bannerCont{
				height : 70%;
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
            #buttCont {
                height: 400px;
                width: 100%;
                padding-top: 10%;
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
        <script>
            function goToLogin() {
                    location.href = 'pages/general/login.php';
            }

            function goToSignUp() {
                location.href = "pages/general/signup.php";
            }
        </script>
	</head>
	<body>
		


		<!-- CONTENT -->
		<div id="bannerCont">
			<img src="img/banner.jpg" >
			<div id="centerTxt"> eLIBRARY </div>
		</div>
			
        <div id="buttCont">
            <!--<button type="button" class="fbutt" data-toggle="modal" data-target="#modalSignUp">SIGN UP</button>
    <button type="button" class="fbutt" data-toggle="modal" data-target="#modalLogin">LOGIN</button>


    <div class="modal fade" id="modalLogin" role="dialog">

        <form method="post">
            <h4>Login</h4>
            <input type=text name="username" placeholder="Username" required/>
            <input type=text name="password" placeholder="Password" required/>
            <input type="submit" name="iLogin" value="LOGIN"/>
            <button type="button">CANCEL</button>
        </form>

    </div>

    <div class="modal fade" id="modalSignUp" role="dialog">

        <form method="post">
            <h4>Login</h4>
            <input type=text name="username" placeholder="Username" required/>
            <input type=text name="password" placeholder="Password" required/>
            <input type=text name="ConfirmPassword" placeholder="Confirm Password" required/>
            <input type=text name="nama" placeholder="Nama" required/>
            <input type=text name="phone" placeholder="Phone" required/>
            <input type=text name="alamat" placeholder="Alamat" required/>
            <input type="submit" name="iRegister" value="REGISTER"/>
            <button type="button">CANCEL</button>
        </form>


    </div>
    -->
         <button class="fbutt" id="flog" onclick="goToLogin()" >LOGIN</button>
         <button class="fbutt" id="fsign" onclick="goToSignUp()">SIGN UP</button> 
     </div>
	</body>
</html>