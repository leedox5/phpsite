<?php
    include_once 'dbinfo.php';
    $id = $_GET['id'];

    $sql = sprintf("DELETE FROM Products WHERE id = %u", $id);
    $conn->query($sql);
    $conn->close();
    header('Location: product_list.php');
?>