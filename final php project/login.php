<?php
session_start();
require_once "database/dbconn.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (!preg_match('/^[a-zA-Z0-9.]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/', $email)) {
        header("Location: login.php?error= يرجى ادخال ايميل صحيح ");
        exit;
    }

    if ($password === ''){
        header("Location: login.php?error= يرجى ادخال كلمة المرور ");
        exit;   
    }


    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['userpass'])) {
            $_SESSION['user_id']=$user['id'];
            $_SESSION['user_email']=$user['email'];
            $_SESSION['user_name']=$user['username'];
            header("Location: home.php");
            exit;
        } else {
            header("Location: login.php?error=كلمة المرور غير صحيحة");
            exit;
        }
    } else {
        header("Location: login.php?error= البريد الإلكتروني غير مسجل ,يرجى إنشاء حساب أولا");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة تسجيل الدخول</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/docs.css">
</head>

<body dir="rtl" class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>تسجيل الدخول</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($_GET['error']) ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_GET['success'])): ?>
                            <div class="alert alert-success">
                                <?= htmlspecialchars($_GET['success']) ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">البريد الإلكتروني</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="أدخل بريدك الإلكتروني">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="أدخل كلمة المرور">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                                <a href="signup.php" class="btn btn-outline-primary">لا يوجد لديك حساب؟ انقر هنا</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
