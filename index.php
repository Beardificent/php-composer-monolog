<?php
declare(strict_type=1);

require 'buttons.html';
require_once'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\BrowserConsoleHandler;

// create a log channel
$log = new Logger('BrowserConsoleHandler');

$log->pushHandler(new BrowserConsoleHandler(logger::ALERT)); //logger::TYPE (error, info, ...) to define which info to print.

$type = $_GET['type'];
$message = $_GET['message'];
// add records to the log
$log->info('Foo');
$log->alert('Bar');
$log->debug('This is a log! ^_^ ');
