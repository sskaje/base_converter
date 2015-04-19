<?php
require(__DIR__ . '/converter.class.php');

function usage() {
    global $argv;
    echo <<<USAGE
Base Converter  1.0
Author: sskaje (http://sskaje.me/)

Usage: php {$argv[0]} COMMAND STRING
    Available commands:

USAGE;
    $methods = get_class_methods('BaseConverter');
    foreach ($methods as $m) {
        echo "        $m.Encode\n        $m.Decode\n";
    }
    echo "\n";
    exit;
}

if (!isset($argv[2])) {
    usage();
}

$command = $argv[1];
$string = $argv[2];

if (strpos($command, '.') === false) {
    usage();
}
list($method, $action) = explode('.', trim($command));

if (!is_callable('BaseConverter', $method)) {
    usage();
}

$action = strtolower($action);
if (!in_array($action, array('encode', 'decode'))) {
    usage();
}

$result = BaseConverter::$method()->$action($string);

echo <<<RESULT
Input:
{$string}

Output:
{$result}


RESULT;
