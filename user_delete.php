<?php
    include_once 'dbinfo.php';
    $id = $_GET['id'];

    $sql = sprintf("UPDATE Users SET use_yn = 'N' WHERE id = %u", $id);
    $conn->query($sql);
    $conn->close();
    header('Location: user_list.php');
?>