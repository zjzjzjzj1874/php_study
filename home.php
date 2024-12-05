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

?>
