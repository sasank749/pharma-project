<?php

$conn = new mysqli('localhost', 'root', '', 'shopee');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
