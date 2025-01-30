<?php
namespace App;

echo "<h3 style='background-color:green;'>الفرق بين الـ static و الـ const</h3>";

// الفرق بين const و الـ static ان الاولى لا يمكن تغيرها وقت التنفيذ على عكس الثانية
class Math {
    const PI = 3.14; // ثابت
    public static $counter = 0; // خاصية ثابتة

    public static function increment() {
        self::$counter++; // زيادة قيمة الخاصية الثابتة
    }
}

echo Math::PI; // الإخراج: 3.14
echo "<br>";
echo Math::$counter; // الإخراج: 0
echo "<br>";

Math::increment();
echo Math::$counter; // الإخراج: 1
echo "<br>";

// Math::PI = 3.14159; // خطأ! لا يمكن تغيير قيمة الثابت
Math::$counter = 10; // يمكن تغيير قيمة الخاصية الثابتة
echo Math::$counter; // الإخراج: 10
echo "<br>";
echo "هنا تمت معرفة الفرق بين ال const و static";
echo "<br>";


################################################################################
echo "<h3 style='background-color:green;'>المتغيرات السحرية والتعامل معها</h3>";
echo "<br>";


class MyClass {
    use MyTrait;

    public function getInfo() {
        return [
            'Directory' => __DIR__,
            'File' => __FILE__,
            'Class' => __CLASS__,
            'Method' => __METHOD__,
            'Function' => __FUNCTION__,
            'Line' => __LINE__,
            'Namespace' => __NAMESPACE__,
            'Trait' => __TRAIT__,
        ];
    }
}

trait MyTrait {
    public function getTraitName() {
        return __TRAIT__;
    }
}

$obj = new MyClass();
print_r($obj->getInfo());
echo "<br>__DIR__: مسار الدليل الحالي.

<br>__FILE__: مسار الملف الحالي.

<br>__CLASS__: اسم الكلاس الحالي.

<br>__METHOD__: اسم الدالة الحالية مع الكلاس.

<br>__FUNCTION__: اسم الدالة الحالية.

<br>__LINE__: رقم السطر الحالي.

<br>__NAMESPACE__: اسم النطاق الحالي.

<br>__TRAIT__: اسم الـ trait الحالي.";

echo "<br><br>من الكود السابق نستلخص الفوائد او الاستخدامات التالية
<br> تصحيح الاخطاء عبر تحديد مكان الخطأ ، تسجيل اسم الدالة التي قامت بالتنفيذ ، التعامل مع الملفات ومعرفة مسار الملف بالكامل ، تتبع تنفيذ الكود";
##################################################################################################
echo "<h3 style='background-color:green;'> الدوال السحرية والتعامل معها </h3>";
echo "<br>";

class MagicMethodsDemo {
    private $data = [];
    
    public function __construct() {
        echo "تم إنشاء الكائن!<br>";
    }
    
    public function __destruct() {
        echo "تم تدمير الكائن!<br>";
    }
    
    public function __get($name) {
        return $this->data[$name] ?? "الخاصية '$name' غير موجودة!<br>";
    }
    
    public function __set($name, $value) {
        $this->data[$name] = $value;
        echo "تم تعيين الخاصية '$name' إلى '$value'.<br>";
    }
    
    public function __isset($name) {
        return isset($this->data[$name]);
    }
    
    public function __unset($name) {
        unset($this->data[$name]);
        echo "تم إزالة الخاصية '$name'.<br>";
    }
    
    public function __call($name, $arguments) {
        echo "الدالة '$name' غير موجودة!<br>";
    }
    
    public function __toString() {
        return "هذا كائن من MagicMethodsDemo!<br>";
    }

    public function __invoke($arg) {
        echo "تم استدعاء الكائن كدالة مع المعامل: $arg<br>";
    }
    
    public function __sleep() {
        return ['data'];
    }
    
    public function __wakeup() {
        echo "تم استعادة الكائن من التسلسل!<br>";
    }
    
    public function __clone() {
        echo "تم استنساخ الكائن!<br>";
    }
}

$obj = new MagicMethodsDemo();

// __set و __get
$obj->name = "أحمد";
echo $obj->name;
echo $obj->age;  

// __isset و __unset
var_dump(isset($obj->name)); 
unset($obj->name);          

// __call
$obj->nonExistentMethod();

// __toString
echo $obj; 

// __invoke
$obj("test");

// __sleep و __wakeup
$serialized = serialize($obj);
$unserialized = unserialize($serialized); 
// __clone
$obj2 = clone $obj;



echo "<br>__construct(): يتم استدعاؤها عند إنشاء الكائن.
<br>__destruct(): يتم استدعاؤها عند تدمير الكائن.
<br>__get(): يتم استدعاؤها عند الوصول إلى خاصية غير موجودة.
<br>__set(): يتم استدعاؤها عند تعيين قيمة لخاصية غير موجودة.
<br>__isset(): يتم استدعاؤها عند استخدام isset() على خاصية غير موجودة.
<br>__unset(): يتم استدعاؤها عند استخدام unset() على خاصية غير موجودة.
<br>__call(): يتم استدعاؤها عند استدعاء دالة غير موجودة.
<br>__toString(): يتم استدعاؤها عند تحويل الكائن إلى سلسلة نصية.
<br>__invoke(): يتم استدعاؤها عند استدعاء الكائن كدالة.
<br>__sleep(): يتم استدعاؤها عند تسلسل الكائن.
<br>__wakeup(): يتم استدعاؤها عند استعادة الكائن من التسلسل.
<br>__clone(): يتم استدعاؤها عند استنساخ الكائن.";

echo "<br><br>من الكود السابق نستلخص الفوائد او الاستخدامات التالية
<br> تهيئة الكائن ، تنظيف الموارد ، الوصول إلى الخصائص الديناميكية ، التعامل مع الدوال غير الموجودة ، تحويل الكائن إلى سلسلة نصية ، استدعاء الكائن كدالة ، تسلسل واستعادة الكائن ، استنساخ الكائن.";


?>