<?php

require_once "source/class_student.php";

$stu = new student("张三");
echo $stu;
echo "【run】" . $stu->run();

?>
