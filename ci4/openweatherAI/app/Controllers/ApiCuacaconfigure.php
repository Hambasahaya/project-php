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

    public function getweatherdays($city = "Jakarta")
    {
        $apiUrl = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=" . $this->apiKey;
        $response = $this->gzl->get($apiUrl);
        $weatherData = json_decode($response->getBody(), true);
        $dailyAverages = [];

        // Periksa apakah properti 'list' ada dalam respons
        if (isset($weatherData["list"])) {
            foreach ($weatherData["list"] as $forecast) {
                // Mendapatkan tanggal dari properti 'dt'
                $timestamp = $forecast['dt'];
                $date = date('Y-m-d', $timestamp);

                // Mendapatkan nama hari dari properti 'dt'
                $dayName = date('l', $timestamp);

                // Mendapatkan suhu maksimum dan minimum dari properti 'main'
                $maxTemperature = $forecast['main']['temp_max'];
                $minTemperature = $forecast['main']['temp_min'];

                // Mendapatkan deskripsi dan icon cuaca dari properti 'weather'
                $weatherDescription = $forecast['weather'][0]['description'];
                $weatherIcon = $forecast['weather'][0]['icon'];
                $feelsLikeTemperature = $forecast['main']['feels_like'];
                $humidity = $forecast['main']['humidity'];
                // Mengelompokkan data berdasarkan tanggal
                $dailyAverages[$date][] = [
                    'day_name' => $dayName,
                    'max_temperature' => $maxTemperature,
                    'min_temperature' => $minTemperature,
                    'weather_description' => $weatherDescription,
                    'weather_icon' => $weatherIcon,
                    "feelslike" => $feelsLikeTemperature,
                    "humidity" => $humidity
                ];
            }

            // Menghitung nilai rata-rata, suhu maksimum, suhu minimum, deskripsi, dan icon untuk setiap tanggal
            foreach ($dailyAverages as $date => $dailyData) {
                $maxTemperature = array_sum(array_column($dailyData, 'max_temperature')) / count($dailyData);
                $minTemperature = array_sum(array_column($dailyData, 'min_temperature')) / count($dailyData);
                $weatherDescriptions = array_column($dailyData, 'weather_description');
                $weatherIcons = array_column($dailyData, 'weather_icon');
                $feelsLikeTemperature = array_column($dailyData, 'feelslike');
                $humidity = array_column($dailyData, 'humidity');
                $dayName = $dailyData[0]['day_name']; // Ambil nama hari dari data pertama

                // Ambil deskripsi dan icon cuaca yang paling umum untuk setiap tanggal
                $commonWeatherDescription = $this->getMostCommonValue($weatherDescriptions);
                $commonWeatherIcon = $this->getMostCommonValue($weatherIcons);

                // Simpan informasi tanggal, nama hari, nilai rata-rata suhu, suhu maksimum, suhu minimum, deskripsi, dan icon
                $result[] = [
                    'date' => $date,
                    'day_name' => $dayName,
                    'max_temperature' => $maxTemperature,
                    'min_temperature' => $minTemperature,
                    'desk' => $commonWeatherDescription,
                    'icon' => $commonWeatherIcon,
                    'felslike' => $feelsLikeTemperature,
                    "humidity" => $humidity
                ];
            }
        }

        return $result ?? [];
    }


    private function getMostCommonValue($array)
    {
        $counts = array_count_values($array);
        arsort($counts);

        return key($counts);
    }



    public function getWeatherTime($city = "Riau")
    {
        $apiKey = "ec3dce31daa407e035408bb76dbccdd4";
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

        // Mendapatkan koordinat kota menggunakan endpoint 'weather'
        $response = $this->gzl->get($apiUrl);
        $weatherData = json_decode($response->getBody(), true);

        // Periksa apakah data koordinat ditemukan
        if (isset($weatherData['coord']['lat']) && isset($weatherData['coord']['lon'])) {
            $latitude = $weatherData['coord']['lat'];
            $longitude = $weatherData['coord']['lon'];

            // Gunakan koordinat untuk mendapatkan prakiraan cuaca per jam menggunakan endpoint 'onecall'
            $onecallUrl = "https://api.openweathermap.org/data/2.5/onecall?lat=$latitude&lon=$longitude&exclude=current,minutely,daily&appid=$apiKey";
            $onecallResponse = $this->gzl->get($onecallUrl);
            $onecallData = json_decode($onecallResponse->getBody(), true);

            $data_cuaca = [];

            // Periksa apakah data per jam ditemukan di dalam 'hourly'
            if (isset($onecallData["hourly"])) {
                foreach ($onecallData["hourly"] as $forecast) {
                    // Mendapatkan tanggal dan waktu dari properti 'dt'
                    $timestamp = $forecast['dt'];
                    $date = date('H:i', $timestamp);

                    // Mendapatkan suhu dari properti 'temp'
                    $temperature = $forecast['temp'];

                    // Mendapatkan kelembapan dari properti 'humidity'
                    $humidity = $forecast['humidity'];

                    // Mendapatkan deskripsi cuaca dari properti 'weather'
                    $weatherDescription = $forecast['weather'][0]['description'];

                    // Mendapatkan suhu yang akan dirasakan dari properti 'feels_like'
                    $feelsLikeTemperature = $forecast['feels_like'];

                    // Mendapatkan ikon cuaca dari properti 'weather'
                    $weatherIcon = $forecast['weather'][0]['icon'];

                    // Menambahkan informasi ke dalam array data cuaca
                    $data_cuaca[] = [
                        'date' => $date,
                        'temperature' => $temperature,
                        'humidity' => $humidity,
                        'desk' => $weatherDescription,
                        'feels_like_temperature' => $feelsLikeTemperature,
                        'icon' => $weatherIcon
                    ];
                }

                return $data_cuaca;
            } else {
                // Jika data per jam tidak ditemukan, berikan respons atau tanggapan yang sesuai
                return ['error' => 'Data per jam tidak ditemukan.'];
            }
        } else {
            // Jika koordinat tidak ditemukan, berikan respons atau tanggapan yang sesuai
            return ['error' => 'Koordinat tidak ditemukan untuk kota ini.'];
        }
    }
}
