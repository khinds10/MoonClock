<?php
// weather API
$weatherAPIURL = 'http://api.forecast.io/';
$weatherAPIKey = 'MY API KEY HERE';
$latitude = '42.512000';
$longitude = '-71.151510';

// temperature color API
$temperatureColorAPI = 'http://my-temperature.api.net';

/**
 * get the response from the API to send to the JS 
 * @param strong $URL
 * @return string, JSON encoded webservice response
 */
function cURL($URL) {

    // is cURL installed yet?
    if (!function_exists('curl_init')) die('Sorry cURL is not installed!');
    
    // download response from URL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
