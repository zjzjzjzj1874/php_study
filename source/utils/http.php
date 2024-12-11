<?php

// php utils

namespace Source\Utils;

/**
 * get请求 Source\Utils\get
 * @param mixed $url
 * @param mixed $params
 * @throws \Exception
 * @return mixed
 */
function get($url , $params = array())
{
    $headerArray = [
        "Content-type" => "application/json",
        "Accept" => "application/json",
    ];
    try {
        // 如果存在参数，将其拼接到 URL 上
        if (!empty($params)) {
            $queryString = http_build_query($params);
            $url .= '?' . $queryString;
        }

        // 1. 初始化 cURL 会话
        $curl = curl_init($url);

        // 2. 设置请求的选项
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray); // 设置 Header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);     // 返回字符串而不是直接输出
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);             // 设置超时时间，防止长时间无响应

        echo "Sending GET request to: $url\n";

        // 3. 执行 cURL 会话并获取返回值
        $output = curl_exec($curl);

        // 检查 cURL 错误
        if (curl_errno($curl)) {
            throw new \Exception("cURL error: " . curl_error($curl));
        }

        // 获取 HTTP 状态码
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($http_code !== 200) {
            throw new \Exception("Unexpected HTTP code: $http_code");
        }

        // 解析返回数据
        $response = json_decode($output, true);

        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("JSON decode error: " . json_last_error_msg());
        }

        echo "Response: " . json_encode($response, JSON_PRETTY_PRINT) . "\n";
    } catch (\Exception $e) {
        // 捕获异常并打印错误信息
        echo "Error occurred: " . $e->getMessage() . "\n";
    } finally {
        // 4. 释放资源
        if (isset($curl)) {
            curl_close($curl);
        }
    }

    return $response;
}

/**
 * post Source\Utils\post
 * @param mixed $url
 * @param mixed $params
 * @throws \Exception
 * @return mixed
 */
function post($url , $params = array()) 
{

    $headerArray = [
        "Content-type" => "application/json",
        "Accept" => "application/json",
    ];
    try {
        // 1.初始化一个 curl 会话
        $curl = curl_init($url);

        // 2.设置请求的选项
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray); // 设置 Header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);     // 不直接输出，返回字符串
        curl_setopt($curl, CURLOPT_POST, true);               // 设置为 POST 请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params)); // 设置 Body 参数
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);              // 设置超时时间，避免请求卡死

        echo "Sending request to: $url\n";

        // 3.执行 curl 会话并获取返回值
        $output = curl_exec($curl);

        // 检测 HTTP 状态码
        if (!curl_errno($curl)) {
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($http_code !== 200) {
                throw new \Exception("Unexpected HTTP code: $http_code");
            }
        } else {
            throw new \Exception("cURL error: " . curl_error($curl));
        }

        // 解析返回数据
        $response = json_decode($output, true);

        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("JSON decode error: " . json_last_error_msg());
        }

        echo "Response: " . json_encode($response, JSON_PRETTY_PRINT) . "\n";
    } catch (\Exception $e) {
        // 捕获异常并打印错误信息
        echo "Error occurred: " . $e->getMessage() . "\n";
    } finally {
        // 4.释放资源
        if (isset($curl)) {
            curl_close($curl);
        }
    }

    return $response;
}


?>