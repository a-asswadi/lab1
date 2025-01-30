<?php
// تعريف استثناء مخصص (Custom Exception)
class MyCustomException extends Exception {
    // يمكن تخصيص الرسالة هنا إذا أردت
    public function errorMessage() {
        // إرجاع رسالة الاستثناء المخصصة
        return "خطأ مخصص: " . $this->getMessage();
    }
}

try {
    // محاكاة عملية قد تسبب استثناء
    $age = 17;
    
    // استثناء عند التحقق من العمر
    if ($age < 18) {
        throw new Exception("عذراً، يجب أن يكون عمرك 18 سنة أو أكثر.");
    }
    
    // استثناء مخصص
    if ($age == 17) {
        throw new MyCustomException("العمر يجب أن يكون 18 أو أكثر.");
    }
    
    echo "عمرك مناسب!";
} catch (MyCustomException $e) {
    // معالجة الاستثناء المخصص
    echo $e->errorMessage(); // استخدام دالة errorMessage لعرض رسالة الاستثناء المخصص
} catch (Exception $e) {
    // معالجة الاستثناء العام
    echo "استثناء عام: " . $e->getMessage(); // عرض رسالة الاستثناء العام
} finally {
    // كود سيتم تنفيذه دائماً سواء حدث استثناء أو لا
    echo "\nتم تنفيذ الكود النهائي دائماً!";
}
?>
