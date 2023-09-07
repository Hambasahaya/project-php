<?php

class Karyawan extends Controller{

    protected $data_karyawan;
    public function index(){
        $karyawan=$this->model('Data_produk')->getdata();
        $data=[
            "judul"=>"Karyawan",
            "karyawan"=>$this->model('Data_produk')->getdata()
        ];
        $this->View('template/header',$data);
        $this->View('page/karyawan',$data);
        $this->View('template/footer');
    }
    public function add(){
        $data=[
            "judul"=>"pendaftaran pegawai"
        ];
        $this->View('template/header',$data);
        $this->View('template/Form');
        $this->View('template/footer');
    }
    public function prosess(){
        
    }
}