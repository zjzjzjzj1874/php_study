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



## 参考资料

* [PHP手册](https://www.php.net/manual/zh/)