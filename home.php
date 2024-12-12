<?php

require_once "source/class_student.php";
require_once "source/class_animal.php";

$stu = new student("张三");
echo $stu;
echo "【run】" . $stu->run();


$cat = new Cat(type: AnimalType::CAT);
$dog = new Dog(type: AnimalType::DOG);

makeSound( $dog);
makeSound($cat);

$ani = new Animal(type: AnimalType::CAT);
// echo '实例化访问：',$ani->animal_foo . PHP_EOL; ==> 不能使用这种方式访问
echo '实例化访问：', $ani->getAnimalFoo(), PHP_EOL;

echo '直接访问：' . Animal::$animal_foo . PHP_EOL;
$ani = new Animal(AnimalType::ANIMAL);
makeSound($ani);



// 从请求中获取 Base64 编码的消息
$encodedMessage = "PGZvbnQgY29sb3I9IiNmZjAwZmYiPjxiPuWTiOWTiOWTiOWTiOi/meagt+S4jeihjDwvYj48L2ZvbnQ+PHA+PC9wPjxkaXY+PGZvbnQgY29sb3I9IiNmZjAwZmYiPjxiPuS6sueIseeahOS9oOi/mOWcqOmCo+mHjOWPkeWRhjwvYj48L2ZvbnQ+PC9kaXY+";

// 1. Base64 解码
$decodedMessage = base64_decode($encodedMessage);

// 2. UTF-8 解码
$message = utf8_decode($decodedMessage); // 如果 UTF-8 解码有问题，可以试试 mb_convert_encoding

// 验证解码是否成功
if ($message === false) {
    die("Decoding failed");
}

// 输出解码后的消息（仅供调试）
$encodedHtml = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

$encodedHtml = '&lt;font color=&quot;#ff00ff&quot;&gt;冲冲冲&lt;/font&gt;&lt;br /&gt;
&lt;br /&gt;
&lt;font color=&quot;#ff00ff&quot;&gt;&lt;strong&gt;胖头尼奥&lt;/strong&gt;&lt;/font&gt;&lt;br /&gt;
';

$encodedHtml = '&amp;lt;script&amp;gt;alert(&amp;quot;滚&amp;quot;)&amp;lt;/script&amp;gt;&lt;br /&gt;';

// 解码 HTML 实体
$decodedHtml = html_entity_decode($encodedHtml, ENT_QUOTES, 'UTF-8');

// 输出结果
echo $decodedHtml.PHP_EOL;

$a = 1;
/** 
* test method
* @param null
* @return mixed
* 注意：函数变量对大小写不敏感
*/
function Test() {
  global $a; // 申明是全局变量
  echo "no global a = " . $a . PHP_EOL;
  echo "hello test".PHP_EOL;
}

# 注释
test(); // 注意：函数变量对大小写不敏感
Test();

// 常量定义
define("PI", 3.14159);
printf("pi = %.2f\n", PI);

$var = 1/3;
printf("1/3 = %d\n", $var);
$var = 1/2;
printf("1/2 = %d\n", $var);

// 注意：a[0]=a;a[3]=b,a[1]=c;跳过了a[2];所以d分配到了4，即a[4]=d
$a = array(
  'a',
  3 => 'b',
  1 => 'c',
  'd' // 索引 2
);
printf("a[0] = %s\n", $a[0]);
printf("a[1] = %s\n", $a[1]);
// printf("a[2] = %s\n", $a[2]);
printf("a[3] = %s\n", $a[3]);
printf("a[4] = %s\n", $a[4]);

// 空数组转成null
$a = array();
if ($a == null) {
    echo 'true'.PHP_EOL;
} else {
    echo 'false'.PHP_EOL;
}

// 变量区分大小写
$var = 'a';
$VAR = 'b';
echo "$var$VAR".PHP_EOL; // 输出：ab

// 注：键名将被这样转换：null 转为(空字符串)，true 转为 1，false 转为 0。
$a = array(
  null => 'a',
  true => 'b',
  false => 'c',
  0 => 'd',
  1 => 'e',
  '' => 'f'
);
echo count($a), "\n";
?>
