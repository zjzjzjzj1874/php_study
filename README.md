# php_study
php-demo

### curl的使用
[curl_getinfo](https://www.php.net/manual/zh/function.curl-getinfo.php)

### datetime的使用

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


## 参考资料

* [PHP手册](https://www.php.net/manual/zh/)
* [PHP问题与简答](https://github.com/colinlet/PHP-Interview-QA/blob/master/docs/03.PHP/QA.md#%E9%97%AE%E9%A2%98%E4%B8%8E%E7%AE%80%E7%AD%94)