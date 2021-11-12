<?php
    $dbhost = 'localhost';
    $dbuser = 's201414784';
    $dbpass = 's201414784';
    $dbname = 's201414784';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if($conn->connect_error) {
        die('Could not connect: ' . $conn->connect_error);
    }
?>
