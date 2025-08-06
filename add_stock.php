<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $amount = (int)$_POST["amount"];
    $conn->query("UPDATE items SET quantity = quantity + $amount WHERE name = '$item'");
    header("Location: index.php");
    exit();
}
$result = $conn->query("SELECT name FROM items");
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>إضافة بضاعة</title></head>
<body>
<h2>إضافة بضاعة</h2>
<form method="post">
    <label>اختر الصنف:</label>
    <select name="item">
        <?php while($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['name'] ?>"><?= htmlspecialchars($row['name']) ?></option>
        <?php endwhile; ?>
    </select><br><br>
    <label>الكمية:</label>
    <input type="number" name="amount" required><br><br>
    <button type="submit">إضافة</button>
</form>
<a href="index.php">↩️ رجوع</a>
</body>
</html>