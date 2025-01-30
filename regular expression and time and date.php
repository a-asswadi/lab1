<?php
$article = <<<EOD
PHP is a popular general-purpose scripting language that is especially suited to web development. 
Created by Rasmus Lerdorf in 1994, PHP is now used on millions of websites worldwide. 
PHP code is executed on the server, and it supports a wide range of databases and frameworks.
EOD;

echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>من المقالة التالية قم بالاتي:</div>";
echo '<br>';
echo $article;
echo '<br><br>';


echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>1. البحث عن كلمة 'PHP':</div>";
echo '<br>';
if (preg_match("/PHP/", $article)) {
    echo "Found 'PHP' in the article.\n";
} else {
    echo "'PHP' not found.\n";
}
echo '<br><br>';
echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>2. استخراج جميع الأرقام:</div>";
echo '<br>';
preg_match_all("/\d+/", $article, $matches);
print_r($matches[0]);
echo '<br><br>';
echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>3. استبدال كلمة 'PHP' بـ 'PHP (Hypertext Preprocessor)':</div>";
echo '<br>';
$updatedArticle = preg_replace("/PHP/", "PHP (Hypertext Preprocessor)", $article);
echo $updatedArticle;
echo '<br><br>';


echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>4. تقسيم النص إلى جمل:</div>";
echo '<br>';
$sentences = preg_split("/\.\s*/", $article);
print_r($sentences);
echo '<br><br>';

echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>5. الكلمات التي تبدأ بحرف كبير:</div>";
echo '<br>';
preg_match_all("/\b[A-Z][a-z]*\b/", $article, $matches);
print_r($matches[0]);
echo '<br><br>';


echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>6. الكلمات التي تحتوي على الحرف 'e':</div>";
echo '<br>';
preg_match_all("/\b\w*e\w*\b/", $article, $matches);
print_r($matches[0]);
echo '<br><br>';


echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>7. حذف جميع علامات الترقيم:</div>";
echo '<br>';
$cleanedArticle = preg_replace("/[.,]/", "", $article);
echo $cleanedArticle;
echo '<br><br>';

echo "<div style='font-family: Arial, sans-serif; font-size: 25px; color: red;'>8. التحقق من طول النص بعد حذف الكلمات التي تحتوي على أرقام:</div>";
echo '<br>';
$shortenedArticle = preg_replace("/\b\w*\d\w*\b/", "", $article);
echo "Original Length: " . strlen($article) . "\n";
echo "Shortened Length: " . strlen($shortenedArticle) . "\n";

echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';

?>

<?php
// تحديد المنطقة الزمنية
date_default_timezone_set("Asia/Riyadh");


// 1. التاريخ والوقت الحالي بتنسيق معين
$currentDateTime = date("Y-m-d H:i:s");

// 2. الطابع الزمني الحالي (Unix Timestamp)
$currentTimestamp = time();

// 3. إنشاء طابع زمني معين (15 يناير 2025 الساعة 15:30:00)
$specificTimestamp = mktime(15, 30, 0, 1, 15, 2025);

// 4. تحويل سلسلة نصية إلى طابع زمني
$convertedTimestamp = strtotime("2025-01-15 15:30:00");

// 5. التحقق من صحة تاريخ معين (29 فبراير 2024 - سنة كبيسة)
$isDateValid = checkdate(2, 29, 2024);

// 6. الحصول على تفاصيل التاريخ الحالي
$dateDetails = getdate();

// 7. عرض الوقت الحالي حسب المنطقة الزمنية
$timezoneTime = date("Y-m-d H:i:s");

// 8. تنسيق التاريخ بشكل مفصل
$formattedDate = date("l, d F Y", strtotime("2025-01-15"));

// 9. حساب الفرق بين تاريخين
$date1 = strtotime("2025-01-01");
$date2 = strtotime("2025-01-15");
$dateDiff = ($date2 - $date1) / (60 * 60 * 24); // الفرق بالأيام

// 10. إضافة أيام إلى تاريخ معين
$addedDaysDate = date("Y-m-d", strtotime("+10 days", strtotime("2025-01-01")));

// 11. طرح أيام من تاريخ معين
$subtractedDaysDate = date("Y-m-d", strtotime("-5 days", strtotime("2025-01-15")));

// عرض النتائج
echo "1. التاريخ والوقت الحالي: $currentDateTime\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "2. الطابع الزمني الحالي: $currentTimestamp\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "3. طابع زمني معين (15 يناير 2025 الساعة 15:30): $specificTimestamp\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "4. تحويل نص إلى طابع زمني (2025-01-15 15:30): $convertedTimestamp\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "5. هل 29 فبراير 2024 تاريخ صحيح؟: " . ($isDateValid ? "نعم" : "لا") . "\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "6. تفاصيل التاريخ الحالي:\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
print_r($dateDetails);
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "7. الوقت الحالي في المنطقة الزمنية (الرياض): $timezoneTime\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "8. التاريخ بصيغة مفصلة: $formattedDate\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "9. الفرق بين 1 يناير 2025 و 15 يناير 2025: $dateDiff يوم\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "10. إضافة 10 أيام إلى 1 يناير 2025: $addedDaysDate\n";
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo "11. طرح 5 أيام من 15 يناير 2025: $subtractedDaysDate\n";
?>

