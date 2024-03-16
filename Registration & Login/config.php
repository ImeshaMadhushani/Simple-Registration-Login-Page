<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_system";

    $conn = new mysqli("localhost" , "root" , "" ,"login_system");


    if(!$conn){
        die("Connection error".mysqli_connect_error());
    }
    else{
        echo "Success"."<br>";
    }


?>