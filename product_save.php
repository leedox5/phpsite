<?php
    $method = $_SERVER["REQUEST_METHOD"];
    include_once 'dbinfo.php';
    $message = "";
    if($method === "POST") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];

        $sql = " UPDATE Products SET name = '$name', price = $price WHERE id = $id ";

        if ($conn->query($sql) === TRUE) {
            header('Location: product_list.php');        
        } else {
            $message = "시스템 오류입니다. 관리자에게 문의하세요" . $conn->error;
            include("product_list.php");
        }
        $conn->close();
    } else {
        include("product_list.php");
    }
?>