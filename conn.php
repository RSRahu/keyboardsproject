<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalprojectkeyboard"; // แก้ไขเป็นชื่อฐานข้อมูลที่ถูกต้อง

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// ลบการแสดงข้อความเชื่อมต่อสำเร็จเพื่อไม่ให้รบกวนการแสดงผล HTML
?>