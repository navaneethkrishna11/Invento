<?php

    //$conn = new mysqli('localhost', 'root', '', 'test');   //db created by kiran and nevin
    $conn = new mysqli('localhost', 'root', '', 'inventory_db');  //db created by athul,albin,navaneeth
    //$conn = new mysqli('sql.freedb.tech', 'freedb_athul', '4KKACx@fBv$epf*', 'freedb_inventory_db');  //remote db
  


    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>