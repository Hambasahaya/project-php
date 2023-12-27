<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Google\Service\CloudDeploy\Retry;

class OrderList extends BaseController
{
    protected $detail_order;
    protected $transaksi;
    public function __construct()
    {
        $this->detail_order = new DetailTransaksi();
        $this->transaksi = new Transaksi();
    }
    public function index()
    {
        if (isset($this->session->id_user)) {
            $data_order = [
                "order_list" => $this->detail_order->select("nomor_transaksi,total,status_pembayaran,tangal_transaksi,status_pengriman,lnk,transaksi.id_transaksi")->join('transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')->join('product', 'transaksi.id_produk = product.id_product')->where("id_user", $this->session->id_user)->findAll()
            ];
            return view("page/order", $data_order);
        }
    }
    public function detail_order($id)
    {
        $data_tr["order_dt"] = $this->transaksi->join("product", "transaksi.id_produk=product.id_product")->where("id_transaksi", $id)->findAll();
        return view("page/dr_order", $data_tr);
    }
}
