<?php

$conn = new mysqli("localhost", "root", "43906838", "sesionprueba");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
?>