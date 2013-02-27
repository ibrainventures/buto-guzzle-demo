<?php 
/**
 * 2012-02-27 Buto.tv 
 * PHP API usage demo using the guzzle library
 * http://guzzlephp.org/ - guzzle is a proper job way of doing things
 * 
 * BASIC and simple connection to our api
 */
include '../bootstrap.php';

// Create a client and provide a base URL
$client = new Guzzle\Http\Client($config->api_url);

// Create a request with basic Auth (wohoooo method chaining ftw!)
// just a GET request so we'll can send the params (video_id in this case) as part of the URL REST ftw!
$request = $client->get('/v2/id')->setAuth($config->api_key, 'x', 'Basic');

// Send the request and get the response
$response = $request->send();

//output resposne
echo $response->getHeader('Content-Length') . "\n";

//output body
echo $response->getBody();
