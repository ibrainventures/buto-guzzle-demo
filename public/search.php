<?php

/**
 * 2012-07-23 Buto.tv 
 * PHP API usage demo
 * 
 * Searching for videos based on tag
 */
include '../bootstrap.php';

$search_text = isset($_GET['search']) ? trim($_GET['search']) : 'fishing';

// Create a client and provide a base URL
$client = new Guzzle\Http\Client($config->api_url);

//build search XML (just as text, no need to sling out some crazy XML object
$search_xml = "<search><tags><tag>{$search_text}</tag></tags></search>";

// Create a request with basic Auth (wohoooo method chaining ftw!)
// just a GET request so we'll can send the params (video_id in this case) as part of the URL REST ftw!
$request = $client->post('/videos/search', null, $search_xml)->setAuth($config->api_key, 'x', 'Basic');

// Send the request and get the response
$response = $request->send();

//output resposne
header('Content-type: application/xml');
echo $response->getBody();

