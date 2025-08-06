<?php
session_start();
$users = [
    "admin" => "admin123",
    "user" => "user123"
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>تسجيل الدخول</title></head>
<body>
<h2>تسجيل الدخول</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
    <label>اسم المستخدم:</label>
    <input type="text" name="username" required><br><br>
    <label>كلمة المرور:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">دخول</button>
</form>
</body>
</html>