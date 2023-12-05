<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cart;
use App\Models\DetailTransaksi;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;

class Chekout extends BaseController
{
    protected $user;
    protected $transaksi;
    protected $dtltr;
    protected $productModel;
    protected $checkoutData = [];
    protected $dataprov = [];
    protected $link_pymt;
    protected $cart;
    public function __construct()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-vpLt1KhXJYOqt7Gt82jROEPl';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $this->user = new User();
        $this->transaksi = new Transaksi();
        $this->productModel = new Product();
        $this->session = session();
        $this->dtltr = new DetailTransaksi();
        $this->cart = new Cart();
    }
    public function getCities()
    {
        $provinceId = $this->request->getPost('provinceId');
        $cities = $this->getCityData($provinceId);
        return $this->response->setJSON($cities);
    }
    private function getCityData($provinceId)
    {
        $apiKey = '55433c14a9d223c0db203ea6d323b54c';
        $url = 'https://api.rajaongkir.com/starter/city?province=' . $provinceId;
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $url, [
            'headers' => [
                'key' => $apiKey,
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        $cityData = [];
        foreach ($data['rajaongkir']['results'] as $city) {
            $cityData[] = [
                'id' => $city['city_id'],
                'name' => $city['city_name'],
            ];
        }

        return $cityData;
    }

    protected function getProvincedata()
    {
        $apiKey = '55433c14a9d223c0db203ea6d323b54c';
        $url = 'https://api.rajaongkir.com/starter/province';

        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $url, [
            'headers' => [
                'key' => $apiKey,
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        foreach ($data['rajaongkir']['results'] as $province) {
            $this->dataprov[] = [
                'id_province' => $province['province_id'],
                'province' => $province['province'],
            ];
        }
    }
    public function getCheckoutData()
    {
        if ($this->session->id_user != null) {
            $selectedProducts = $this->request->getPost('selectedProducts');
            if (is_string($selectedProducts)) {
                $selectedProducts = json_decode($selectedProducts, true);

                if ($selectedProducts === null && json_last_error() !== JSON_ERROR_NONE) {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal mendekode JSON.']);
                }
            } elseif (is_object($selectedProducts)) {
                $selectedProducts = json_decode(json_encode($selectedProducts), true);
            }
            if (!is_array($selectedProducts)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Data produk tidak valid.']);
            }
            foreach ($selectedProducts as $selectedProduct) {
                $productId = $selectedProduct['id'];
                $product = $this->productModel->find($productId);

                if ($product) {
                    $this->checkoutData[] = [
                        'id_user' => $this->session->id_user,
                        'id'       => $product['id_product'],
                        'name'     => $product['name_product'],
                        'price'    => $product['price'],
                        'qty' => $selectedProduct['qty'],
                        'subtotal' => $selectedProduct['qty'] * $product['price'],
                        "gambar" => $product['photo_prd'],
                        "stok" => $product['stok'],
                        "des" => $product['description']
                    ];
                }
            }
            $this->session->set('data_prd', $this->checkoutData);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Checkout berhasil!', 'products' => $this->session->data_prd]);
        } else {
            redirect()->to('/login');
        }
    }
    public function index()
    {
        $data_prdd = [];
        $total = 0;
        foreach ($this->session->data_prd as $get_total) {
            $total += intval($get_total['subtotal']);
            $data_prdd = $this->productModel->where('id_product', $get_total['id'])->findAll();
        }

        $this->getProvincedata();
        $data_ckh = [
            "prov" => $this->dataprov,
            "total" => $total,
            "data_prd" => $data_prdd
        ];
        return view('page/chk_page', $data_ckh);
    }

    public function getchk()
    {
        $data_user = $this->user->find($this->session->id_user);
        $total = intval($this->request->getPost('total'));
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'email' => $data_user['email'],
            ),
        );
        $this->link_pymt = \Midtrans\Snap::getSnapToken($params);
        foreach ($this->session->data_prd as $dataa) {
            $data_ckhnew = [
                "id_transaksi" => rand(),
                "id_user" => $dataa['id_user'],
                'id_produk' => $dataa['id'],
                'price' => $dataa['price'],
                'qty' => $dataa['qty'],
                'subtotal' => $dataa['subtotal'],
            ];
            $insertResult = $this->transaksi->insert($data_ckhnew);
            if ($insertResult) {
                return redirect()->to('/');
            } else {
                $data_sks_save = [
                    "nomor_transaksi" => rand(),
                    "id_transaksi" => $data_ckhnew["id_transaksi"],
                    "total" => $total,
                    "status_pembayaran" => 1,
                    "metode_pengririman" => $this->request->getPost("mtd_pengriman"),
                    "alamat_pengriman" => $this->request->getPost('province') . "," . $this->request->getPost('kota') . "," . "," . $this->request->getPost("alamat"),
                    "nama_penerima" => $this->request->getPost("nama_penerima"),
                    "status_pengriman" => 1,
                    "lnk" => $this->link_pymt,
                ];
                if ($this->dtltr->insert($data_sks_save)) {
                    if ($this->cart->where("id_user", $this->session->id_user)->where("id_produk", $data_ckhnew['id_produk'])->delete()) {
                        return redirect()->to("https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $this->link_pymt);
                    }
                } else {
                    echo "gagal";
                }
            }
        }
    }
}
