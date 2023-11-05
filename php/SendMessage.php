<?php
    session_start();

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "chatt";

    $mysqli = new mysqli($host, $username, $password, $database);
    if($mysqli->connect_error)
    {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $insert = $mysqli->prepare("INSERT INTO message (chatter_id, message) VALUES (?, ?)");
    $insert->bind_param("ss", $_SESSION("username"), $_POST("message"));
?>