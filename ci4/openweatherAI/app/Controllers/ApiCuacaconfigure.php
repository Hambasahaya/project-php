<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class Apicuacaconfigure extends BaseController
{
    protected $gzl;
    protected $apiKey;
    public function __construct()
    {
        $this->gzl = new Client();
        $this->apiKey = "ec3dce31daa407e035408bb76dbccdd4";
    }

    public function getweatherdays($city)
    {
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=" . $this->apiKey;
        $response = $this->gzl->get($apiUrl);
        $weatherData = json_decode($response->getBody(), true);
        $data_cuaca = [];

        foreach ($weatherData["list"] as $forecast) {
            $data_cuaca[] = $forecast;
        }
        return $data_cuaca;
    }
    public function getweathertime($city)
    {
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast/hourly?q=$city&appid=" . $this->apiKey;
        $response = $this->gzl->get($apiUrl);
        $weatherData = json_decode($response->getBody(), true);
        $data_cuaca = [];

        foreach ($weatherData["list"] as $forecast) {
            $data_cuaca[] = $forecast;
        }
        return $data_cuaca;
    }
}
