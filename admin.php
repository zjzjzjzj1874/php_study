<?php
require_once __DIR__ . '/source/Test.php';
require_once __DIR__ . '/source/Https.php';
require_once __DIR__ . '/source/logger.php';

use Utils\Test;
use Utils\Https;

Utils\Test::test(); // 注意：这种写法要求FUNCTION是Public static的，否则必须实例化Class之后才能调用
// Utils\Test::test1(); // 这种函数不是public static的，调用不对 => 使用下面的方法调用。
$test = new Test();
$test->test1(); 


// 引入配置
$config = include "config.php";
date_default_timezone_set($config['timezone']);

echo "hello world from admin.". PHP_EOL;


// region 数组
// Test::array_try();

// get、post函数
Https::get("www.baidu.com");
// Https::post("www.baidu.com");

// 日期函数
Test::date_try();

// 文件操作
Test::dir_try();


use Utils\LoggerType;
use function Utils\logger;
logger("测试数据", LoggerType::DEBUG);


?>