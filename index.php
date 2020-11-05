<?php
declare(strict_type=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once'vendor/autoload.php';
include 'buttons.html';

use Monolog\Logger;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\StreamHandler;
// create a log channel
$log = new Logger('Loggername');


if(empty($_GET['type']) || $_GET['message']){

    $type = $_GET['type'];
    $message = $_GET['message'];

} else {
    $type = null;
    $message= null;
}

switch ($type){
    case 'WARNING':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/warning.log', Logger::WARNING)); //logger::TYPE (error, info, ...) to define which info to print.
        $log->pushHandler(new BrowserConsoleHandler());
        $log->warning($message);
        break;
    case 'INFO':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/info.log', Logger::INFO));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->info($message);
        break;
    case 'DEBUG':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/debug.log', Logger::DEBUG));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->debug($message);
        break;
    case 'NOTICE':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/notice.log', Logger::NOTICE));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->notice($message);
        break;
    case 'ERROR':
        $log->pushHandler(new BrowserConsoleHandler());
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/error.log', Logger::ERROR));
        $log->error($message);
        break;
    case 'CRITICAL':
        $log->pushHandler(new BrowserConsoleHandler());
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/critical.log', Logger::CRITICAL));
        $log->critical($message);
        break;
    case 'ALERT':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/alert.log', Logger::ALERT));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->alert($message);
        break;
    case 'EMERGENCY':
        $log->pushHandler(new StreamHandler(__DIR__ . '/logs/emergency.log', Logger::EMERGENCY));
        $log->pushHandler(new BrowserConsoleHandler());
        $log->emergency($message);
        break;
}

