<?php

date_default_timezone_set('Europe/London');
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
$root = dirname(__FILE__);
set_include_path(
        $root . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . PATH_SEPARATOR .
        get_include_path()
);

/**
 * simple autoloader with namespace support
 * @param string $class class name
 */
function __autoload($class)
{
    $parts = explode('\\', $class);
    $classfile = '\\' . array_pop($parts) . '.php';
    $namespace = implode('\\', $parts);
    require $namespace . $classfile;
}

spl_autoload_register('__autoload', true);


//config object to store out config data that we may end up using
$config = new \SplFixedArray();
$config->api_key = 'S9qycqyT4hl3NJjqX2CXP7WmLpJh2L'; //#your api key here - this one is invalid btw
$config->api_url = 'http://api.buto.tv';

//proxy details
$config->proxy_server = 'tcp://192.168.16.3';
$config->proxy_username = 'big';
$config->proxy_password = 'bertha';
$config->proxy_port = '1282';

/**
 * convenience function
 * will error_log data you pass in
 * @param mixed $input the data you want to error log
 * @return void
 */
function vd($input)
{
    error_log(var_export($input, true));
}