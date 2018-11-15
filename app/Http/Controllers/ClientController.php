<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameters = [])
    {
    	$client = new Client(['curl'=> [CURLOPT_CAINFO => base_path('resources/certs/cacert.pem')]]);

    	$response = $client->request($method, $url, $parameters);

    	return $response->getBody()->getContents();
    }

    protected function performGetRequest($url)
    {
    	$contents = $this->performRequest('GET', $url);

    	$decodedContents = json_decode($contents, true);

    	return $decodedContents;
    }

    //geting all weather index
    protected function currentGroupWeather()
    {
    	$appid = '758fd34bdea7255914d3cd6d216fe560';

    	$locOne = '2298890,2306104,2295021,2302357,2299522,2294877,2302821,2295458,2300379,2294206';

    	return $this->performGetRequest('api.openweathermap.org/data/2.5/group?id='.$locOne.'&appid='.$appid.'&units=metric');
    }

    //getting weather forecast for locations

    protected function forecastWeather()
    {
        
    	$q = 'Accra';
        //$q= Input::get('searchCity');
      	$appid = '758fd34bdea7255914d3cd6d216fe560';

    	return $this->performGetRequest('api.openweathermap.org/data/2.5/forecast?q='.$q.'&appid='.$appid.'&units=metric');
    }
}
