<?php
$host = "localhost";
$user = "root";       // เปลี่ยนตามของโฮสติ้งคุณ
$pass = "";           // เปลี่ยนตามของโฮสติ้งคุณ
$dbname = "ชื่อฐานข้อมูลของคุณ"; 

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}
?>