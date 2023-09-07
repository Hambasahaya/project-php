<?php
class Data_produk{
    protected $db;
    protected $foto;
    public function __construct()
    {
        $this->db=new Database;
    }
    public function getdata(){
        $this->db->query("SELECT * FROM produk");
    return  $this->db->get_all();


    }
    public function add_prd($data){
        $this->foto=rand().$_FILES['foto']['name'];
        $tmp_name=$_FILES["foto"]['tmp_name'];
        $get_error=$_FILES['foto']['error'];
        if ($get_error===4) {
            $this->foto="produk.jpg";
        }
        move_uploaded_file($tmp_name,'fp/'.$this->foto);
        $query="INSERT INTO produk VALUES('',:nama_produk,:foto_produk,:harga_produk,:jml_stok)";
        $this->db->query($query);
        $this->db->bind('nama_produk',$data['nama_produk']);
        $this->db->bind('foto_produk',$this->foto);
        $this->db->bind('harga_produk',$data['harga']);
        $this->db->bind('jml_stok',$data['stok']);
        $this->db->run();
        return $this->db->cekmasuk();
         }
         public function hapus($id){
            $this->db->query('DELETE FROM produk WHERE id_produk=:id_produk');
            $this->db->bind('id_produk',$id);
            $this->db->run();
           return $this->db->cekmasuk();
         }
         public function getid($id){
            $this->db->query('SELECT * FROM produk Where id_produk=:id_produk');
            $this->db->bind('id_produk',$id);
            return $this->db->get_all();
         }
         public function update($data){
            $this->foto=rand().$_FILES['foto']['name'];
            $tmp_name=$_FILES["foto"]['tmp_name'];
            $get_error=$_FILES['foto']['error'];
            if ($get_error===4) {
                $this->foto="produk.jpg";
            }
            move_uploaded_file($tmp_name,'fp/'.$this->foto);
            $query = "UPDATE produk SET nama_produk=:nama_produk, foto_produk=:foto_produk, harga_produk=:harga_produk, jml_stok=:jml_stok WHERE id_produk=:id_produk";
            $this->db->query($query);
            $this->db->bind('id_produk',$data['id_produk']);
            $this->db->bind('nama_produk',$data['nama_produk']);
            $this->db->bind('foto_produk',$this->foto);
            $this->db->bind('harga_produk',$data['harga']);
            $this->db->bind('jml_stok',$data['stok']);
            $this->db->run();
            return $this->db->cekmasuk();
         }
    }
