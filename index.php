<?php
    switch($_SERVER['REQUEST_URI'])
    {
        case '/':
            $file = fopen("src/Login.html", "r");
            $login = fread($file, filesize("src/Login.html"));
            echo $login;
            break;
        case '/chat':
            $file = fopen("src/Chat.html", "r");
            $chat = fread($file, filesize("src/Chat.html"));
            echo $chat;
            break;
        default:
            echo 'Error 404: Page not found';
    }
?>