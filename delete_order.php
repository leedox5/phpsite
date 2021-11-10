<?php
    include_once 'dbinfo.php';
    $id = $_GET['id'];

    $sql = sprintf("DELETE FROM Orders_Detail WHERE id = %u", $id);
    $conn->query($sql);
    $conn->close();
    header('Location: main.php');
?>