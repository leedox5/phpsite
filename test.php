<?php
    session_start();
    echo(__DIR__);
    echo($_SESSION['userid']);
    //$_SESSION['AAA'] = 'AAA';
    echo(isset($_SESSION['userid']));
    var_dump($_SESSION);
?>