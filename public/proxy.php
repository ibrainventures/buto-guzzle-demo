<?php

/**
 * 2012-02-27 Buto.tv 
 * PHP API usage demo
 * 
 * Connecting via a proxy server
 */
include '../bootstrap.php';

// Create a client and provide a base URL
$client = new Guzzle\Http\Client($config->api_url);

//Create a request with basic Auth
$request = $client->get('/v2/id')->setAuth($config->api_key, 'x', 'Basic');

//route request via proxy server
$options = $request->getCurlOptions();
$options->set(CURLOPT_HTTPPROXYTUNNEL,TRUE)
        ->set(CURLOPT_PROXY, $config->proxy_server)        
        ->set(CURLOPT_PROXYPORT, $config->proxy_port)
        ->set(CURLOPT_PROXYAUTH, $config->proxy_username)
        ->set(CURLOPT_PROXYUSERPWD, $config->proxy_password);

// Send the request and get the response
$response = $request->send();

echo $response->getHeader('Content-Length') . "\n";

//output body
echo $response->getBody();
