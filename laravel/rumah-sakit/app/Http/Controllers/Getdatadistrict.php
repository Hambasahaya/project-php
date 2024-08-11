<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class Getdatadistrict extends Controller
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env("RAJAONGKIR_API_KEY");
    }

    public function getProvinces()
    {
        $client = new Client();

        try {
            $response = $client->get('https://api.rajaongkir.com/starter/province', [
                'headers' => [
                    'key' => $this->apiKey,
                ],
            ]);

            return response()->json(json_decode($response->getBody()->getContents(), true));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->input('province_id');

        $client = new Client();

        try {
            $response = $client->get('https://api.rajaongkir.com/starter/city?province=' . $provinceId, [
                'headers' => [
                    'key' => $this->apiKey,
                ],
            ]);

            return response()->json(json_decode($response->getBody()->getContents(), true));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
