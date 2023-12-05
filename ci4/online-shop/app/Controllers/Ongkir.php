<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ongkir extends BaseController
{
    protected $url = 'https://api.rajaongkir.com/starter/province';
    protected $apiKey = '55433c14a9d223c0db203ea6d323b54c';
    protected $rajaOngkir;
    public function __construct()
    {
        $this->rajaOngkir = \Config\Services::rajaOngkir();
    }
    public function getProvinces()
    {

        $response = $this->request('GET', $this->url, [
            'headers' => [
                'key' => $this->apiKey,
            ],
        ]);

        return $response->getJSON();
    }
    public function getCities($province_id)
    {
        $url = 'https://api.rajaongkir.com/starter/city?province=' . $province_id;
        $apiKey = 'YOUR_RAJAONGKIR_API_KEY';

        $response = $this->request('GET', $this->url, [
            'headers' => [
                'key' => $this->apiKey,
            ],
        ]);

        return $response->getJSON();
    }
    public function getOngkir($origin, $destination, $weight, $courier)
    {
        // Lakukan kalkulasi ongkir
        $ongkir = $this->rajaOngkir->ongkosKirim([
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ]);

        // Tampilkan hasil
        print_r($ongkir);
    }
}
