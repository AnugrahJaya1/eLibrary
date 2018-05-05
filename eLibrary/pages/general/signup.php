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
                            echo "<script type='text/javascript'>
$(document).ready(function(){
$('#myModal').modal('show');
});
</script>";
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

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                margin-left: 9em;
            }
            /* .modal{
                visibility: hidden;
            } */
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
                <input type="submit" name="regButt" class="formButt" value="REGISTER"/>
                <!-- <input type="submit" name="cancelButt" class="formButt" id="cancel" value="CANCEL" /> -->
                <a class="formButt" href="../../index.php">CANCEL</a>
                <!-- Nanti ini hapus aja -->
                <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" value="TEST"/>
                
            </form>
        </div>


    
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body">
                    You have registeres as <?php $name?>
                    <br>
                    Please login to continue.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a class="formButt" href="../general/login.php">LOGIN</a>
                    <a class="formButt" href="../../index.php">CANCEL</a>
                </div>

                </div>
            </div>
        </div>

        
	</body>
</html>