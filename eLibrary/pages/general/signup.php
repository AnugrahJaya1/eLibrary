<?php  
    include("../../connection/connectionUsers.php");
    $error_message="";
    $status="";

    if(isset($_POST['regButt'])){
        $usename=$_POST['username'];
        $password=md5($_POST['password']);
        $passwordConf=md5($_POST['passwordConf']);
        $name=$_POST['name'];
        $phoneNum=$_POST['phoneNum'];
        $address=$_POST['address'];

        if(isset($usename) && $usename!=""){
            $sql="SELECT username FROM anggota WHERE username='$usename'";
            $res=$mysqli->query($sql);

            if($res->num_rows > 0){
                $error_message="Sorry username already taken";
                $status=false;
                //echo $error_message;
                //$error_message="";
            }else{
                if(isset($password) && isset($passwordConf) && $password!="" && $passwordConf!=""){
                    if($password!=$passwordConf){
                        $error_message="Password not same";
                    }else{
                        if(isset($name) && isset($phoneNum) && isset($address)
                        && $name!="" && $phoneNum!="" && $address!=""){
                            $sql="INSERT INTO anggota (username,Password,Nama,Alamat,Phone,IsAdmin) VALUES
                            ('$usename','$password','$name','$address','$phoneNum','0')";
                            $mysqli->query($sql);
                            $status=true;
                            
                            // // Modal
                            // echo "<div id='myModal' class='modal fade' role='dialog'>";
                            //     echo "div class='modal-dialog'";
                            //         echo "";
                                   
                            //     echo "</div>";
                            // echo "</div>";
                        }
                        
                    }
                }
            }
        }
        //echo $error_message;


    }else if(isset($_POST['cancelButt'])){
        header("Location: ../../index.php");
    }

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
            /*CSS Form*/
            #textLog {
                margin-left: 10px;
                font-size: 40px;
                font-style: normal;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }

            #formCont {
                margin-top: 20px;
                margin-left: 36%;
                height: 100%;
                width: 30%;
                background-color: lightgray;
                box-shadow: 2px 2px 5px black;
            }

            .formIn {
                margin-top: 18px;
                margin-left: 10px;
                padding-left: 5px;
                height: 40px;
                width: 90%;
            }

            .formButt {
                margin-top: 10px;
                margin-bottom: 30px;
                margin-left: 10px;
                color: white;
                background-color: black;
                width: 80px;
                height: 40px
            }
            p{
                margin-left: 100px;
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
            <label id="textLog">Create New Account</label>
            <form method="post" action="" id="login">
                <input type="text" name="username" class="formIn" id="uname" placeholder="Username" />
                <br />
                <?php 
                    if($status==false){
                        echo "<p>".$error_message."</p>";
                    }
                ?>
                <input type="password" name="password" class="formIn" id="pass" placeholder="Password" />
                <br />
                <br />
                <input type="password" name="passwordConf" class="formIn" id="passCon" placeholder="Confirm Password" />
                <br />
                <?php 
                    if($status==false){
                        echo "<p>".$error_message."</p>";
                    }
                ?>
                <input type="text" name="name" class="formIn" id="name" placeholder="Name" />
                <br />
                <br />
                <input type="text" name="phoneNum" class="formIn" id="phone" placeholder="Phone" />
                <br />
                <br />
                <input type="text" name="address" class="formIn" id="address" placeholder="Address" />
                <br />
                <input type="submit" name="regButt" class="formButt" value="REGISTER" data-toggle="modal" target="#myModal"/>
                <input type="submit" name="cancelButt" class="formButt" id="cancel" value="CANCEL" />

            </form>
        </div>
	</body>
</html>