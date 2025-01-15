<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=يرجى تسجيل الدخول أولاً");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body dir="rtl" class="bg-light">
    <div class="container mt-5">
    <h1>مرحبًا، <?= htmlspecialchars($_SESSION['user_name']); ?></h1>
        <p>الإيميل الخاص بك: <?= htmlspecialchars($_SESSION['user_email']); ?></p>
        <a href="logout.php" class="btn btn-danger">تسجيل الخروج</a>
    </div>
</body>

</html>


---