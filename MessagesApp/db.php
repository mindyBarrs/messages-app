<?php
    //Used to connect to mySQL
    $conn = mysqli_connect('<Database IP Address>', '<UserName>', '<User Password>', 'Database Name');

    //Test Connection
    if(mysqli_connect_errno()){
        echo 'DB Connection failed: '.mysqli_connect_error();
    }
?>