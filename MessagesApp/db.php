<?php
    //Used to connect to mySQL
    $conn = mysqli_connect('50.62.209.109:3306', 'MinBarrs', 'MB1985k13', 'MinBarrs_Messages');

    //Test Connection
    if(mysqli_connect_errno()){
        echo 'DB Connection failed: '.mysqli_connect_error();
    }
?>