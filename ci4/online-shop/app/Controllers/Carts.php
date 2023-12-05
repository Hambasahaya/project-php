<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;

class Carts extends BaseController
{
    protected $produk_models;
    protected $cart;
    protected $chekout;
    protected $user;
    protected $transaksi;
    protected $data_produk = [];
    public function __construct()
    {
        $this->produk_models = new Product();
        $this->cart = new Cart();
        $this->user = new User();
        $this->transaksi = new Transaksi();
        $this->chekout = \Config\Services::cart();
    }


    public function index()
    {
        if (isset($this->session->id_user)) {

            $data = [
                "produk_data" => $this->cart->join('product', 'product.id_product=cart.id_produk')->join('user', 'user.id_user=cart.id_user')->where('cart.id_user', $this->session->id_user)->where("status", 1)->findAll()
            ];
            return view('page/cart_page', $data);
        } else {
?>
            <script>
                window.location.href = '/login';
            </script>
        <?php
        }
    }
    private function add_to_cart($data = [])
    {
        if ($this->cart->save($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function cart_add()
    {
        if (isset($this->session->id_user)) {
            $data_produk = $this->produk_models->find($this->request->getPost('prd'));
            if ($chek = $this->cart->where('id_user', $this->session->id_user)->where('id_produk', $this->request->getPost('prd'))->findAll()) {
                $qty = intval($chek[0]['qty']);
                $qty += 1;
                $this->cart->where('id_user', $this->session->id_user)->where('id_produk', $this->request->getPost('prd'))->update(['qty' => $qty]);
                $this->session->setFlashdata('cart_add_qty', "produk sudah ada di keranjang belanja");
            } else {
                $save_produk = [
                    'id_produk' => $this->request->getPost('prd'),
                    'id_user' => $this->session->id_user,
                    'price' => $data_produk['price'],
                    'qty' => 1,
                    'subtotal' => 1 * $data_produk['price'],
                    'status' => 1
                ];
                if ($this->cart->save($save_produk)) {
                    $this->session->setFlashdata("add_cart sukses", "berhasil menambahkan prosuk");
                }
            }
        } else {
        ?>
            <script>
                window.location.href = '/login';
            </script>
<?php
        }
    }
    public function delete_cart()
    {
        $id_produk = $this->request->getPost('id_prdd');
        if ($this->cart->where('id_user', $this->session->id_user)->where('id_produk', $id_produk)->delete()) {
            $this->session->setFlashdata('cart_delete', "produk berhasil di hapus");
        }
    }
}
