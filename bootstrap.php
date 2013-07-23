<?php

date_default_timezone_set('Europe/London');
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');


/**
 * include composer libraries
 */
require_once 'vendor/autoload.php';


//config object to store out config data that we may end up using
$config = new \SplFixedArray();
$config->api_key = 'S9qycqyT4hl3NJjqX2CXP7WmLpJh2L'; //#your api key here - this one is INVALID btw
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