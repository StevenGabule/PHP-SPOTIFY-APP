<?php 
    ob_start();
    session_start();
    date_default_timezone_set('Asia/Manila');
    $con = mysqli_connect("localhost", "root", "johnpaul", "spotify");

?>