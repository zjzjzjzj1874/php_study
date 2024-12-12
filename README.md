# php_study
php-demo

### curl的使用
[curl_getinfo](https://www.php.net/manual/zh/function.curl-getinfo.php)

### datetime的使用

### 魔术常量
> 程序异常时可以根据魔术常量打印出具体的位置。
* __LINE__: 文件中的当前行号
* __FILE__: 文件的完整路径和文件名
* __DIR__: 文件所在目录
* __FUNCTION__: 函数内调用，返回函数名
* __CLASS__: 类的函数内调用，返回类名
* __TRAIT__: // TODO 等待学习
* __METHOD__: 类的方法名
* __NAMESPACE__: 当前命名空间

```php
// 获取当前执行的php文件名
echo substr(__FILE__,strlen(__DIR__)-strlen(__FILE__)+1);
```

### 命名空间下函数package最佳实践
> 类中定义的函数，可见性是public。（其他可见性：public、private、protected），注意：final是防止子类重写的。
* 如果函数数量少，直接 use function 是[最佳方式](./source/logger.php)。
* 如果数量多且逻辑相关，推荐封装为[类的静态方法](./source/Test.php)。
* 如果需要全局可用，使用 require 或手动导出命名空间函数。

### 超全局变量
* $GLOBALS：引用全局作用域中可用的全部变量
* $_SERVER：服务器和执行环境信息
* $_GET：Http Get变量
* $_POST：Http Post变量
* $_FILES：Http上传文件变量
* $_REQUEST：Http Request变量
* $_SESSION：session变量
* $_ENV：环境变量
* $_COOKIE：Http Cookies
* $php_errormsg：前一个错误信息
* $HTTP_RAW_POST_DATA：原生Post数据
* $http_response_header：Http响应头
* $argc：传递给脚本的参数数目
* $argv：传递给脚本的参数数组

## 面向对象

### 魔术方法
* __construct()：构造函数，创建时自动调用
* __destruct()：析构函数，销毁时自动调用
* __call()：调用一个未定义或不可访问的方法时自动调用
* __callStatic()：调用一个未定义或不可访问的静态方法时自动调用
* __get()：访问未定义或不可访问的属性时自动调用
* __set()：设置未定义或不可访问的属性时自动调用
* __isset()：使用isset或者empty检查未定义或不可访问的属性时自动调用
* __unset()：调用unset试图删除未定义或不可访问的属性时自动调用
* __sleep()：对象序列化时自动调用，返回需要序列化的属性数组
* __wakeup()：反序列化是自动调用
* __toString()：对象被当做字符串使用时自动调用
* __invoke()：尝试调用一个对象作为函数时自动调用

### 接口
使用接口，可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容；不实现的话会报一个致命错误。
接口中定义的所有方法必须是公有的。
类可以实现多个接口，用逗号分隔解耦名称。
```php
interface iAnimal
{
    public function setName($name);
    public function makeSound($msg);
}
interface iColor
{
    public function setColor($color);
}

class Cat implements iAnimal, iColor
{
    private $name;
    private $color;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function makeSound($msg)
    {
        echo "hello:".$msg.PHP_EOL;
    }

    public function setColor($color)
    {
    $this->color = $color;
    }
}
```

### Static关键字
申明类属性或方法为static，可以不实例化类而直接访问；
静态属性不能通过一个类已实例化的对象来访问，但静态方法可以。

## 注意事项
* 函数体内引用全局变量，必须在内部使用`global`关键字；
```php
<?php
$a = 1;
function Test() {
    global $a;
    echo "a = ". $a . PHP_EOL;
}
?>
```
* php注释
```php
// 注释1
/* 注释2 */
# 注释3
```
* php变量不能含有`-`
* php常量申明 `define("PI", 3.14);`

* php中，函数对大小写不敏感
```php
function Test() {
    echo "Hello World";
}
test(); // 这样可以调用
```
* 但是变量大小写敏感
```php
$var = 'a';
$VAR = 'b';
echo "$var$VAR"; // 输出：ab
```
* 空数组会转化为null `$a = array(); 其实$a == null;`
* 一个类只能实现一个基类，但是可以实现多个接口
* include文件时，对引入的文件个数没有限制，同一个文件可以引入两次，但是如果有类重复定义的话，可能会报错。


## 参考资料

* [PHP手册](https://www.php.net/manual/zh/)
* [PHP问题与简答](https://github.com/colinlet/PHP-Interview-QA/blob/master/docs/03.PHP/QA.md#%E9%97%AE%E9%A2%98%E4%B8%8E%E7%AE%80%E7%AD%94)