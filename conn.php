<?php
$conn = new PDO("mysql:host=localhost;dbname=budg","root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "conn ok";

?>