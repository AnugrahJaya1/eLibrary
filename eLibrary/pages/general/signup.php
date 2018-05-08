<?php  
    include("../../connection/connection.php");
    $error_message="";
    $status=false;
    if(isset($_POST['regButt'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $passwordConf=md5($_POST['passwordConf']);
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phoneNum=$_POST['phoneNum'];
        if(isset($username) && $username!=""){
            $sql="SELECT username FROM anggota WHERE username='$username'";
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
                        $status=false;
                    }else{
                        if(isset($name) && isset($phoneNum) && isset($address) && $name!="" && $phoneNum!="" && $address!=""){
                            $sql="INSERT INTO anggota (username,Password,Nama,Alamat,Phone,IsAdmin) VALUES
                            ('$username','$password','$name','$address','$phoneNum',0)";
                            $mysqli->query($sql);
                            $status=true;
                            $display="block";
                        }
                    }
                }
            }
        }
        // echo $status;
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
        <link rel="stylesheet" type="text/css" href="../../style/signup.css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            body {
                background-color: darkgray;
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
        <!--Login Form-->
        <div id="formCont">
            <label id="textLog">Create New Account</label>
            
            <?php 
                if($status==false && $error_message!=""){
                    echo "<p>".$error_message."</p>";
                }
            ?>

            <form method="post" action="signup.php" id="login" name="signup">
                <input type="text" name="username" class="formIn" id="uname" placeholder="Username" required />
                <br />
                <input type="password" name="password" class="formIn" id="pass" placeholder="Password" required/>
                <br />
                <input type="password" name="passwordConf" class="formIn" id="passCon" placeholder="Confirm Password"required />
                <br />
                <input type="text" name="name" class="formIn" id="name" placeholder="Name" required/>
                <br />
                <input type="text" name="phoneNum" pattern="^[ ]*[+]?[0-9]{4,}[ ]*$" class="formIn" id="phone" placeholder="Phone" required/>
                <br />
                <input type="text" name="address" class="formIn" id="address" placeholder="Address" required/>
                <br />
                <input type="submit" name="regButt" class="formButt" value="REGISTER" />
                <!-- <input type="submit" name="cancelButt" class="formButt" id="cancel" value="CANCEL" /> -->
                <a id="cancelButt" class="formButt" href="../../index.php">CANCEL</a>
            </form>
        </div>


        <!--Modal-->
        <div class="modal" id="myModal" style="display:<?php echo $display;?>">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal body -->
                    <div  class="modal-body">
                        <br />
                        You have registered as <?php echo  $name?>
                        <br>
                        <br />
                        Please login to continue.
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a class="formButt" id="modButt1" href="../general/login.php" style="float:left;height: 30px;">LOGIN</a>
                        <a class="formButt" id="modButt2" href="../../index.php" style="float:left;height: 30px;">CANCEL</a>
                    </div>

                </div>
            </div>
        </div>
        
	</body>
</html>