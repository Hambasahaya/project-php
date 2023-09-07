<?php
class Home extends Controller{
    public function index(){
        $data=[
            "judul"=>"Home",
            "data_prd"=>$this->model('Data_produk')->getdata()
        ];
        $this->View('template/header',$data);
        $this->View('page/home',$data);
        $this->View('template/footer');
    }
}