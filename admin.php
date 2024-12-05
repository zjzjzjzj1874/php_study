<?php

/**
 * curl发送post、get、put、delete等请求。
 * 要使用cURL来发送url请求，具体步骤大体分为以下四步：
    1.初始化
    2.设置请求选项
    3.执行一个cURL会话并且获取相关回复
    4.释放cURL句柄,关闭一个cURL会话
 * @return void
 */
function curl_post() {
    $url = "http://test-newkmsapi.qixincha.com/kms-open/v3/text/sync";

    $headerArray = [
        "Content-type" => "application/json",
        "Accept" => "application/json",
    ];
    // 1.初始化一个curl；
    $curl = curl_init(); 
    // 2.设置请求的选项
    curl_setopt($curl, CURLOPT_URL, $url); // 设置请求的url；
    curl_setopt($curl, CURLOPT_POST, true); // 设置请求方法，不设置默认get
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray); // 设置header
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 不直接输出，而是把结果转成字符串
    echo "send。。。\n";
    // 3.执行curl会话并获取返回值
    $ouput = curl_exec($curl); // 这里返回的会被渲染到界面上
    if ($ouput) {
        echo "output = ", $ouput. PHP_EOL;
    }

    // 检测 HTTP 状态码
    if (!curl_errno($curl)) {
        //  curl_getinfo 更多信息：https://www.php.net/manual/zh/function.curl-getinfo.php
        switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
        case 200:  # OK
            break;
        default:
            echo 'Unexpected HTTP code: ', $http_code, "\n";
        }
    }
    // 4.释放句柄，关闭连接；
    curl_close($curl);
    // 打印返回的参数
    // $response = json_decode($output, true);
    // print_r(json_encode($response));
}

/**
 * curl发送post、get、put、delete等请求。
 * 要使用cURL来发送url请求，具体步骤大体分为以下四步：
    1.初始化
    2.设置请求选项
    3.执行一个cURL会话并且获取相关回复
    4.释放cURL句柄,关闭一个cURL会话
 * @return void
 */
function curl_get() 
{
    $url = "www.baidu.com";

    $headerArray = [
        "Content-type" => "application/json",
        "Accept" => "application/json",
    ];
    // 1.初始化一个curl；
    $curl = curl_init(); 
    // $curl = curl_init($url); // 这里写了，下面就不用再设置URL 
    // 2.设置请求的选项
    curl_setopt($curl, CURLOPT_URL, $url); // 设置请求的url；
    curl_setopt($curl, CURLOPT_HTTPGET, true); // 设置请求方法，不设置默认get
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray); // 设置header
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 不直接输出，返回响应内容
    // 3.执行curl会话并获取返回值
    curl_exec($curl);
    // 检查是否有错误发生
    $errno = !curl_errno($curl);
    if (!$errno) {
        $info = curl_getinfo($curl);
        echo '错误：Took ', $info['total_time'], ' seconds to send a request to ', $info['url'], "errno:" , $errno, "\n";
    }
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($httpCode != 200) {
        echo "http状态码异常：", $httpCode , "\n";
    }

    $info = curl_getinfo($curl); // $info是一个关联的数组
    echo '成功：Took ', $info['total_time'], ' seconds to send a request to ', $info['url'], "\n";

    // 4.释放句柄，关闭连接；
    curl_close($curl);
    // 打印返回的参数
    // $response = json_decode($output, true);
    // print_r(json_encode($response));
}

/**
 * array数组尝试
 * 1.数值型数组；即其他语言的数组、集合、切片
 * 2.key-value数组；类似与hashmap
 * 3.多维数组
 * @return void
 */
function array_try() 
{
    // $brands = array("YY", "Lining", "Victor");
    // 这个可以替代上面的申明，即使用[]替换array();
    $brands = ["YY", "Lining", "Victor"];
    // 遍历一
    foreach ($brands as $brand) {
        echo "brand: ". $brand."\n";
    }
    // 遍历二
    $n = count($brands); // 数组长度
    for ($i = 0; $i < $n; $i++) {
        echo $i.": ".$brands[$i].PHP_EOL;
    }

    echo "I like ". $brands[0].PHP_EOL;

    // key-value类型的数组
    $kv = [
        "a"=>1,
        "b"=>2,
    ];
    // 遍历一
    foreach ($kv as $k => $v) {
        echo "". $k ."=". $v . PHP_EOL;
    }

    // 多维数组
    $md = [
        [1, 'yy'],
        [2, 'victor'],
        [3, 'lining'],
    ];
    foreach ($md as $idx => $v) {
        print_r($v);
        // echo 'md'. $k .'='. $v . PHP_EOL;
    }

    $cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel", "Benz");
    echo "print_r ==== ";
    print_r(array_chunk($cars,2));
    array_push($cars, "su7", "Nio", "xiaopeng");
    print_r($cars);
}

echo "hello world from admin.". PHP_EOL;


// region 数组
// array_try();
// endregion 数组

// region curl
curl_get();
curl_post();
// endregion curl


?>