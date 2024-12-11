<?php
require_once __DIR__ . '/source/Test.php';
require_once __DIR__ . '/source/Https.php';
require_once __DIR__ . '/source/logger.php';

use Utils\Test;
use Utils\Https;


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