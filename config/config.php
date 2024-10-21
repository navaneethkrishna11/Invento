<?php
    $conn = new mysqli('p:sql.freedb.tech', 'freedb_athul', '4KKACx@fBv$epf*', 'freedb_inventory_db');
    //$conn = new mysqli('localhost', 'root', '', 'inventory_db');

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>