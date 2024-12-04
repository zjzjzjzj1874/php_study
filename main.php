<?php

namespace phpStudy;

/**
 * 将$data、$title的内容使用**号替换，有多长就用几个*号
 * @param mixed $apiResponse
 * @param mixed $data
 * @param mixed $title
 * @return array
 */
function replaceTitleAndContent($apiResponse, $data, $title = '')
{
    $result = [
        'newTitle' => $title, // 默认值
        'newData' => $data,   // 默认值
    ];

    // 判断 API 响应是否正常
    if (!isset($apiResponse['code']) || $apiResponse['code'] !== 200) {
        // 可以记录日志
        return $result;
    }

    // 获取 moderationResult
    $moderationResults = $apiResponse['moderationResult'] ?? [];
    if (empty($moderationResults)) {
        return $result;
    }

    // 遍历 moderationResult 并处理 matchedList
    foreach ($moderationResults as $moderationResult) {
        if ($moderationResult['machineSuggestion'] == 1) { // 正常，无需替换
            continue;
        }

        $matchedList = $moderationResult['matchedList'] ?? [];
        foreach ($matchedList as $match) {
            $keyword = $match['keyword'] ?? '';
            if (empty($keyword)) {
                continue;
            }

            // 替换标题中的关键词
            if (!empty($title)) {
                $result['newTitle'] = str_replace($keyword, str_repeat('*', mb_strlen($keyword)), $result['newTitle']);
            }

            // 替换正文中的关键词
            $result['newData'] = str_replace($keyword, str_repeat('*', mb_strlen($keyword)), $result['newData']);
        }
    }

    return $result;
}

/**
 * demo1
 * @return void
 */
function demo1() {
    $jsonString = '{
        "code": 200,
        "message": "OK",
        "moderationType": 3,
        "moderationResult": [
            {
                "code": 200,
                "message": "OK",
                "machineSuggestion": 3,
                "machineTagL1": "涉政",
                "machineTagL2": "",
                "machineTagL3": "",
                "contentId": "content",
                "uniqueId": "674d1bf989b81c0001bf75ea",
                "matchedList": [
                    {
                        "keyword": "习近平",
                        "tag": "涉政:国内领导人及相关",
                        "description": "",
                        "position": [
                            5,
                            8
                        ],
                        "full_position": [
                            [
                                5,
                                8
                            ]
                        ],
                        "customType": 1
                    }
                ]
            }
        ],
        "requestId": "84a3c665-b055-11ef-9d77-fa163e9175ff"
    }';
    
    // 将 JSON 字符串反序列化为 PHP 对象
    $data = json_decode($jsonString, true);
    
    
    $result = replaceTitleAndContent($data, '正文审核：习近平', '标题审核');
}

// 调用demo1函数，因为php中没有main函数；
// demo1();

function generateRandomString($length = 10) {
    return bin2hex(random_bytes($length / 2));
}

echo generateRandomString(16); // 生成长度为 16 的随机字符串


