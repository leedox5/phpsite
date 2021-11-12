<?php
    include_once 'dbinfo.php';
    $id = $_GET['id'];
    $total = $_GET['total'];

    $sql  =         " UPDATE Orders              " ;
    $sql .=         "    SET stat        = '20'  " ;
    $sql .= sprintf("       ,total_price = %u    ", $total );
    $sql .= sprintf("  WHERE id          = %u    ", $id);
    $conn->query($sql);
    $conn->close();
    header('Location: order_list.php');
?>