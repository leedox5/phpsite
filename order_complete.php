<?php
    include_once 'dbinfo.php';
    $id = $_GET['id'];
    $total = $_GET['total'];

    // 10(주문대기)에서 20(주문완료) 상태로 변경
    $sql  =         " UPDATE Orders              " ;
    $sql .=         "    SET stat        = '20'  " ;
    $sql .= sprintf("       ,total_price = %u    ", $total );
    $sql .= sprintf("  WHERE id          = %u    ", $id);
    $conn->query($sql);
    $conn->close();
    header('Location: order_list.php');
?>