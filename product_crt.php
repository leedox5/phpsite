<?php
    $method = $_SERVER["REQUEST_METHOD"];
    include_once 'dbinfo.php';
    $message = "";
    $name = "";
    $price = "";
    if($method === "POST") {
        $name = $_POST["name"];
        $price = $_POST["price"];

        $sql = sprintf(" INSERT INTO Products(name, price) VALUES ('%s', '%s')", $name, $price);

        if ($conn->query($sql) === TRUE) {
            header('Location: main.php');        
        } else {
            $message = "시스템 오류입니다. 관리자에게 문의하세요" . $conn->error;
            include("product_form.php");
        }
        $conn->close();
    } else {
        include("product_form.php");
    }
?>