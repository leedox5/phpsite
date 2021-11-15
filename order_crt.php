<?php
    include_once 'dbinfo.php';
    $qty = $_POST['qty'];
    $product_id = $_POST['product_id'];
    $message = "";
    session_start();

    //echo isset($_SESSION['userid']);
    //exit();

    if( !isset($_SESSION['id'])) {
        $message = "로그인이 필요합니다.";
        include("error.php");
        exit();
    }

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM Orders WHERE user_id = $id AND stat = '10' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        // 주문대기중인 건이 없다면 주문 생성
        $sql = "INSERT INTO Orders(user_id, total_price, stat, order_date) VALUES ($id, 0, '10', now())";
        if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo $conn->error;
        }
        $sql = "SELECT * FROM Orders WHERE user_id = $id AND stat = '10' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } else {
        $sql = "UPDATE Orders SET order_date = now() WHERE user_id = $id AND stat = '10' ";
        $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    // 상세 테이블에 데이터 넣기
    $sql = sprintf("INSERT INTO Orders_Detail(order_id, product_id, order_quantity) VALUES (%u, %s, %s)", $row['id'], $product_id, $qty);
    $conn->query($sql);

    $conn->close();
    header('Location: main.php');
?>