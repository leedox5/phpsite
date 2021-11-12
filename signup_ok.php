<?php
    include_once 'dbinfo.php';
    $method = $_SERVER["REQUEST_METHOD"];
    echo($method);
    if($method === "POST") {
        $userid = $_POST["userid"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        if($password1 != $password2) {
            echo("암호가 일치하지 않습니다.");
        }
        header('Location: main.php');        
    }
?>