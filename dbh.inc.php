<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "minsidedb";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception){
        echo "Error: 001 <br>Could not Connect <br>";
    }
    
    if($conn){
        echo "You are Connected! <br>";
    }
?>