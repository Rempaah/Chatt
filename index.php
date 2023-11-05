<?php
    session_start();
    

    switch($_SERVER['REQUEST_URI'])
    {
        case '/':
            if(isset($_SESSION["username"]))
            {
                header("location: chat");
            }
            $file = fopen("src/Login.html", "r");
            $login = fread($file, filesize("src/Login.html"));
            echo $login;
            break;
        case '/chat':
            if(!isset($_SESSION["username"]))
            {
                header("location: /chat");
            }
            $file = fopen("src/Chat.html", "r");
            $chat = fread($file, filesize("src/Chat.html"));
            echo $chat;
            break;
        default:
            echo 'Error 404: Page not found';
    }
?>