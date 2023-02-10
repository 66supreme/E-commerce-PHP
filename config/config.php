<?php
    //host
    $host = "localhost";

    //name of database
    $dbname = "bookstore";

    //user
    $user = "fofana";

    //password
    $pwd = "4875";

    //connection to database
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
