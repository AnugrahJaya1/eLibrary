<?php
    $mysqli=new mysqli("localhost","users","","e_library");

    if($mysqli->connect_errno){
        echo "Failed to connect";
    }
?>