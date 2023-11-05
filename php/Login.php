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

    $get = $mysqli->prepare("SELECT * FROM chatter WHERE username=?");
    $get->bind_param("s", $_POST["username"]);
    $get->execute();
    $result = $get->get_result();
    if($result->num_rows < 1)
    {
        $row = $result->fetch_assoc();
        $insert = $mysqli->prepare("INSERT INTO chatter (username, color) VALUES (?, ?)");
        $insert->bind_param("ss", htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["color"]));
        $insert->execute();
    }

    $_SESSION["username"] = $_POST["username"];
?>