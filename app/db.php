<?php 

/**
 * Database connection
 */ 

    $host  =   'localhost';
    $user  =   'root'; 
    $pass  =   '';
    $db    =   'ajax_crud';

    // Create connection
    $conn = mysqli_connect($host, $user, $pass, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    


?>