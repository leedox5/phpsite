<?php
    include_once 'dbinfo.php';
    $qty = $_POST['qty'];
    $product_id = $_POST['product_id'];

    $sql = "SELECT * FROM Orders WHERE user_id = 1 AND stat = '10' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO Orders(user_id, total_price, stat) VALUES (1, 0, '10')";
        if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo $conn->error;
        }
        $sql = "SELECT * FROM Orders WHERE user_id = 1 AND stat = '10' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } else {
        $row = $result->fetch_assoc();
    }
    $sql = sprintf("INSERT INTO Orders_Detail(order_id, product_id, order_quantity) VALUES (%u, %s, %s)", $row['id'], $product_id, $qty);
    $conn->query($sql);

    $conn->close();
    header('Location: main.php');
?>