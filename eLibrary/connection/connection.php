<?php
    $mysqli=new mysqli("localhost","root","","e_library");

    if($mysqli->connect_errno){
        echo "Failed to connect";
    }
?>