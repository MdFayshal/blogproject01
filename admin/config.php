<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "blogproject00";
    
    $conn = mysqli_connect( $dbhost, $dbuser, '', $dbname);

    if(!$conn){
        die('Database Connection error !');
    }


?>