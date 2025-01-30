<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    $hashedFileName = md5(uniqid()) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

    $uploadDir = 'uploads/';
    $filePath = $uploadDir . $hashedFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmpName, $filePath)) {
        echo "تم رفع الصورة بنجاح!";
    } else {
        echo "حدث خطأ أثناء رفع الصورة.";
    }
}

$images = glob('uploads/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>رفع وعرض الصور</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .upload-form {
            margin-bottom: 20px;
        }
        .image-list img {
            max-width: 200px;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>رفع وعرض الصور</h1>

    <form class="upload-form" action="" method="post" enctype="multipart/form-data">
        <label for="image">اختر صورة:</label>
        <input type="file" name="image" id="image" required>
        <br><br>
        <input type="submit" value="رفع الصورة">
    </form>

    <h2>الصور المحفوظة:</h2>
    <div class="image-list">
        <?php if (!empty($images)): ?>
            <?php foreach ($images as $image): ?>
                <img src="<?php echo $image; ?>" alt="صورة">
            <?php endforeach; ?>
        <?php else: ?>
            <p>لا توجد صور محفوظة.</p>
        <?php endif; ?>
    </div>
</body>
</html>