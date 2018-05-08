<?php
    include("../connection/connection.php");
    $_SESSION["message"]="";
    $_SESSION["status"]=false;;
    session_start();
    $nama=$_SESSION["nama"];
    if(isset($_POST['update'])){
        if(!empty($_POST['password'])){
            if(!empty($_POST['conPassword'])){
                $pass=md5($_POST['password']);
                $conPass=md5($_POST['conPassword']);
                if($pass==$conPass){
                    $sql="UPDATE anggota SET Password='$pass' WHERE Nama='$nama'";
                    $mysqli->query($sql);
                    $status=true;
                }else{
                    $status=false;
                    
                }
            }
        }else if(!empty($_POST['phoneNum']) ){
            $phone=$_POST['phoneNum'];
            $sql="UPDATE anggota SET Phone='$phone' WHERE Nama='$nama'";
            $mysqli->query($sql);
            $status=true;
        }else if(!empty($_POST['address'])){
            $address=$_POST['address'];
            $sql="UPDATE anggota SET Address='$address' WHERE Nama='$nama'";
            $mysqli->query($sql);
            $status=true;
        }
    }
    if($status==true){
        $message="Profile Update";
    }else{
        $message="Password Confirmation doesn't match";
    }
    $_SESSION["status"]=$status;
    $_SESSION["message"]=$message;
    header("Location: ../pages/general/profile.php");
?>