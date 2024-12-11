<?php

require_once "source/class_student.php";
require_once "source/class_animal.php";

$stu = new student("张三");
echo $stu;
echo "【run】" . $stu->run();


$cat = new Cat(AnimalType::CAT);
$dog = new Dog(type: AnimalType::DOG);

makeSound( $dog);
makeSound($cat);

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

/** 
* test method
* @param null
* @return mixed
*
*/
function test() {
  echo "hello test".PHP_EOL;
}

test();

?>
