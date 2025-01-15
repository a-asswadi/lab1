<?php
require_once "database/dbconn.php";

$name = $email = $password = $confirm_password = $gender = $phone = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $gender = htmlspecialchars(trim($_POST['gender']));


    function validatePassword($password) {
        if (
            preg_match('/^(?=(?:[^a-z]*[a-z]){3})(?=(?:[^A-Z]*[A-Z]){3})(?=(?:[^0-9]*[0-9]){3})(?=(?:[^!@#$%^&*()\-\_=+\[\]{}<>?\/|]*[!@#$%^&*()\-\_=+\[\]{}<>?\/|]){3}).{12}$/', $password) &&
            !preg_match('/(?i)([a-z]).*\1/i', $password)
        ) {
            return TRUE;
        }
        return FALSE;
    }
    
    if ($name === ''){
        header("Location: signup.php?error= يرجى عدم ترك الاسم فارغا ");
        exit;   
    }
    if (!preg_match('/^[a-zA-Z0-9.]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/', $email)) {
        header("Location: signup.php?error= يرجى ادخال ايميل صحيح ");
        exit;
    }

    $sql = "SELECT * FROM users WHERE username = :name OR email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        header("Location: signup.php?error=الاسم أو البريد الإلكتروني موجود مسبقًا.");
        exit;
    }

    if ($password === ''){
        header("Location: signup.php?error= لا يمكنك انشاء حساب بدون كلمة مرور ");
        exit;   
    }
    
    if (validatePassword) {
        header("Location: signup.php?error=كلمة المرور يجب أن تكون 12 حرفًا، تتضمن 3 أحرف صغيرة، 3 أحرف كبيرة، 3 أرقام، و3 رموز.");
        exit;
    }
    

    if ($confirm_password === ''){
        header("Location: signup.php?error= يرجى تاكيد كلمة المرور ");
        exit;   
    }

    if ($password !== $confirm_password) {
        header("Location: signup.php?error=كلمة المرور غير متطابقة");
        exit;
    }

    if (!preg_match('/^(70|71|73|77|78)\d{7}$/', $phone)) {
        header("Location: signup.php?error=الرقم يجب أن يبدأ بـ70 أو 71 أو 73 أو 77 أو 78 ويتكون من 9 أرقام");
        exit;
    }

    if ($gender === ''){
        header("Location: signup.php?error= من الضروري تحديد جنسك يا غالي (ذكر , أنثى) ");
        exit;   
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, userpass, email, gender, phone) 
              VALUES (:name, :password, :email, :gender, :phone)";
    $add = $pdo->prepare($query);

    try {
        $add->execute([
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'phone' => $phone,
            'password' => $hashed_password,
        ]);
        header("Location: signup.php?success= تم انشاء الحساب بنجاح , يرجى الرجوع الى صفحة تسجيل الدخول ");
        exit;
    } catch (PDOException $e) {
        header("Location: signup.php?error=حدث خطأ أثناء إنشاء الحساب");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة إنشاء الحساب</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/docs.css">
</head>

<body dir="rtl" class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h4>أدخل بياناتك لإنشاء حساب</h4>
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
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">الاسم</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="أدخل اسمك">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">الإيميل</label>
                            <input type="text" name="email" class="form-control" id="inputEmail" placeholder="أدخل إيميلك">
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">كلمة المرور</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="أدخل كلمة المرور">
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="تأكيد كلمة المرور">
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">الهاتف</label>
                            <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="أدخل رقم هاتفك">
                        </div>
                        <div class="col-md-6">
                            <label for="inputGender" class="form-label">النوع</label>
                            <select id="inputGender" name="gender" class="form-select">
                                <option selected disabled>يرجى اختيار الجنس...</option>
                                <option value="0">ذكر</option>
                                <option value="1">أنثى</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">إنشاء الحساب</button>
                        <a href="login.php" class="btn btn-outline-primary">الرجوع إلى صفحة تسجيل الدخول</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

