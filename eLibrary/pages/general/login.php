<?php  
    include("../../connection/connection.php");
    session_start();
    $error_message="";
    $status=false;
    if(isset($_POST['logButt'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        if(empty($username) && empty($password)){
            $error_message="Please enter your username and password";
        }else if(isset($username) && isset($password) && $password!="" && $username!=""){
            $sql="SELECT username,Nama,IsAdmin FROM anggota WHERE username='$username'";
            $res=$mysqli->query($sql);
            if($res->num_rows == 0 ){
                $error_message="Username doesn't exist";
                $status=false;
            }else{
                $sql.=" AND Password='$password'";
                $res=$mysqli->query($sql);
                if($res->num_rows == 0 ){
                    $error_message="WRONG PASSWORD";
                    $status=false;
                }else{
                    $status=true;
                    $row=$res->fetch_array();
                    $_SESSION["username"]=$row['username'];
                    $_SESSION["nama"]=$row['Nama'];
                    $isAdmin=$row['IsAdmin'];
                    if($isAdmin==1){
                        header("Location: ../admin/adm.php");
                    }else{
                        header("Location: ../user/usr.php");
                    }
                }
            }
        }
    }
    // else if(isset($_POST['cancelButt'])){
    //     header("Location: ../../index.php");
    // }
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
        <link rel="stylesheet" type="text/css" href ="../../style/login.css" />
        <style>
            body{
                background-color:darkgray;
            }
            
        </style>
        <script>
            function goToIndex() {
                location.href = '../../index.php';
            }
        </script>
	</head>
	<body>
		<!-- CONTENT -->
        <!--Banner-->
        <div id="bannerCont">
            <img src="../../img/banner2.jpg" />
            <div id="centerTxt"> eLIBRARY </div>
        </div>
        <!--Login Form-->
        <div id="formCont">
            <label id="textLog">Login</label>
            <form method="post" action="" id="login">
                <input type="text" name="username" class="formIn" id="uname" placeholder="Username" required/>
                <br />
                <input type="password" name="password" class="formIn" id="pass" placeholder="Password" required/>
                <br />
                <input type="submit" name="logButt" class="formButt" value="LOGIN" />
                <!-- <input type="submit" name="cancelButt" class="formButt" id="cancel" value="CANCEL"  /> -->
                <a id="cancelButt" class="formButt" href="../../index.php">CANCEL</a>

            </form>

            <!--ERROR MESSAGE-->
            <?php
            if($status==false && $error_message!=""){
                echo "<p>".$error_message."</p>";
            }
            ?>
        </div>
        
	</body>
</html>