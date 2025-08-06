<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
$result = $conn->query("SELECT * FROM items");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>الرئيسية - نظام المخزن</title>
</head>
<body>
<h2>نظام إدارة المخزن</h2>
<p>مرحبًا، <?= $_SESSION['username'] ?></p>
<a href="add_stock.php">➕ إضافة بضاعة</a> |
<a href="remove_stock.php">➖ صرف بضاعة</a> |
<a href="logout.php">🚪 تسجيل الخروج</a>

<table border="1" cellpadding="10">
    <tr><th>الصنف</th><th>الكمية</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['quantity'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>