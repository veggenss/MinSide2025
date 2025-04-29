<?php

    session_start();
    
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "minsidedb";
    $conn = "";

    $error001 = false;
    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception){
        $error001 = true;
    }

?>