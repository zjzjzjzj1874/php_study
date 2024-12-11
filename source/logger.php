<?php

namespace Utils;

enum LoggerType: string {
    case DEBUG = "debug";
    case INFO = "info";
    case WARNING = "warning";
    case ERROR = "error";
    case FATAL = "fatal";
}

/**
 * 日志打印 Source\Logger\logger
 * @param mixed $message
 * @param mixed $level
 * @return void
 */
function logger($message, $level = LoggerType::INFO) 
{
    // 调试回溯，获取调用点信息
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
    $callerFile = $backtrace['file'] ?? 'unknown file';
    $callerLine = $backtrace['line'] ?? 'unknown line';

    $logMessage = [
        "timestamp"=> date(DATE_RFC3339),
        "level" => $level,
        "msg"=> $message,
        "caller" => "{$callerFile}:{$callerLine}",
    ];

    echo json_encode($logMessage, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).PHP_EOL;
}

?>