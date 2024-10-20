<?php
    $conn = new mysqli('sql.freedb.tech', 'freedb_athul', '4KKACx@fBv$epf*', 'freedb_inventory_db');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>