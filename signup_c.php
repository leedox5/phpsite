<?php
    session_start();
    $method = $_SERVER["REQUEST_METHOD"];
    include_once 'dbinfo.php';
    $message = "";
    $id = "";
    $userid = "";
    $email = "";
    if($method === "POST") {
        // POST로 전송된 경우 각 form의 값으로 저장
        $userid = $_POST["userid"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $email = $_POST["email"];
        if($password1 != $password2) {
            $message = "암호가 일치하지 않습니다.";
            include("signup_form.php");
        } else {
            $userpw = password_hash($password1, PASSWORD_DEFAULT);
            $sql = sprintf(" INSERT INTO Users(user_id, pwd, email) VALUES ('%s', '%s', '%s')", $userid, $userpw, $email);

            if ($conn->query($sql) === TRUE) {
                header('Location: main.php');        
            } else {
                $message = "시스템 오류입니다. 관리자에게 문의하세요" . $conn->error;
                include("signup_form.php");
            }
            $conn->close();
        }
    } else {
        // id값이 GET으로 전달될경우 수정모드
        if(!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM Users WHERE id = $id ";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            $conn->close();
            $userid = $user["user_id"];
            $email = $user["email"];
        }
        include("signup_form.php");
    }
?>