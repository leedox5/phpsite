<?php
    $method = $_SERVER["REQUEST_METHOD"];
    include_once 'dbinfo.php';
    $message = "";
    $name = "";
    $price = "";
    $chk_yn = "Y";
    if($method === "POST") {
        $message = "";

        if(empty($_POST["name"])) {
            $message .= "상품명은 필수입력입니다.";
            $chk_yn = "N";    
        }
        if(empty($_POST["price"])) {
            if(!empty($message)) {
                $message .= "<br>";
            }
            $message .= "가격은 필수입력입니다.";
            $chk_yn = "N";
        }

        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];

        if(!preg_match("/[1-9]/", $price)) {
            $message = "가격은 숫자만 가능합니다.";
            $chk_yn = "N";
        }

        if($chk_yn == "N") {
            include("product_form.php");
        } else {
            if(empty($id)) {
                $sql = sprintf(" INSERT INTO Products(name, price) VALUES ('%s', '%s')", $name, $price);
            } else {
                $sql = " UPDATE Products SET name = '$name', price = $price WHERE id = $id ";
            }
    
            if ($conn->query($sql) === TRUE) {
                header('Location: product_list.php');        
            } else {
                $message  = "시스템 오류입니다. 관리자에게 문의하세요";
                $message .= "<br>" . $conn->error;
                include("product_form.php");
            }
            $conn->close();
        }
    } else {

        $id = $_GET['id'];

        $sql = sprintf("SELECT * FROM Products WHERE id = %u", $id);
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
    
        $conn->close();

        $id    = $product["id"];
        $name  = $product["name"];
        $price = $product["price"];

        include("product_form.php");
    }
?>