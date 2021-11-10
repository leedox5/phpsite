<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'leedox';
    $dbpass = 'a#flehrtm5';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, 'leedox');

    if($conn->connect_error) {
        die('Could not connect: ' . $conn->connect_error);
    }
?>
