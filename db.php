<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>