<?php
class Kasir{
    private $db;
    public function __construct()
    {
     $this->db=new Database;   
    }
    public function Save($data){
        $this->db->query("SELECT harga_produk FROM produk WHERE id_produk=".$data['produk']);
        $data_prd=$this->db->get();
        $subtod=(int)$data['jml']*$data_prd['harga_produk'];
        $this->db->query("INSERT INTO keranjang VALUES('',:id_petugas,:id_produk,:jumlah_beli,:subtotal)");
        $this->db->bind('id_petugas',$data['id_petugas']);
        $this->db->bind('id_produk',$data['produk']);
        $this->db->bind('jumlah_beli',$data['jml']);
        $this->db->bind('subtotal',$subtod);
        $this->db->run();
       return $this->db->cekmasuk();
    }
    public function update_pesanan($data){
        $subtod=(int)$data['harga']*(int)$data['jml'];
        $this->db->query("UPDATE keranjang SET (jumlah_beli=:jumlah_beli,subtotal=:subtotal)WHERE id_pesanan=".$data["id_pesanan"]);
        $this->db->bind('jumlah_beli',$data['jml']);
        $this->db->bind('subtotal',$subtod);
        $this->db->run();
      return $this->db->cekmasuk();
    }
    public function hapus($id_pesanan){
        $this->db->query("DELETE FROM keranjang WHERE id_pesanan=".$id_pesanan);
        $this->db->run();
         return $this->db->cekmasuk();
   }
     public function get_data_pesanan(){
     $this->db->query("SELECT keranjang.jumlah_beli,produk.harga_produk,produk.nama_produk,keranjang.subtotal,keranjang.id_pesanan FROM keranjang INNER JOIN produk ON produk.id_produk=keranjang.id_produk");
     return $this->db->get_all();
   }
   public function get_total(){
     $this->db->query("SELECT SUM(subtotal) FROM keranjang");
    return $this->db->get();
   }
   public function get_data_id($id_pesanan){
    $this->db->query("SELECT keranjang.jumlah_beli,produk.harga_produk,produk.nama_produk,keranjang.subtotal,keranjang.id_pesanan FROM keranjang INNER JOIN produk ON produk.id_produk=keranjang.id_produk WHERE id_pesanan=".$id_pesanan);
    return $this->db->get_all();
  }
}