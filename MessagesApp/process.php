<?php
    include 'db.php';

    if(!empty($_POST['text']) && !empty($_POST['user'])){
        $text = mysqli_real_escape_string($conn, $_POST['text']);
        $user = mysqli_real_escape_string($conn, $_POST['user']);

        //INSERT Data into database
        $query = "INSERT INTO messages (Text, User) VALUES ('$text', '$user')";

        if(!mysqli_query($conn, $query)){
            die(mysqli_error($conn));
        }else{
            header("Location: index.php?success=Message%20Added");
        }
    }else{
        header("Location: index.php?error=Please%20Fill%20In%20All%20Feilds");
    }
?>