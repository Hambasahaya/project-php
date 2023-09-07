<?php 
class App_Kasir extends Controller{
    protected $kasir;
    public function __construct()
    {
        $this->kasir=new Kasir;
    }
    public function index(){
        $data_pesanan=$this->kasir->get_data_pesanan();
        $data=[
            "judul"=>"App kasir",
            "produk"=>$this->model('Data_produk')->getdata(),
            "pesanan"=>$this->kasir->get_data_pesanan(),
            "total"=>$this->kasir->get_total()
    ];
        $this->View('template/header',$data);
        $this->View('kasir/Kasir',$data);
        $this->View('template/footer');
    }
    public function Add_produk(){
        if($this->kasir->Save($_POST)>0){
            $this->redierct(''.Base_url."App_Kasir/index");
        }
    }
    public function hapus($id_pesanan){
       if ($this->kasir->hapus($id_pesanan)>0);
       $this->redierct(''.Base_url."App_Kasir/index");
    }
    public function update($id_pesanan){
        $data=[
            "judul"=>"update produk",
            "produk_update"=>$this->kasir->get_data_id($id_pesanan)
        ];
        $this->View('template/header',$data);
        $this->View('kasir/update_pesanan',$data);
        $this->View('template/footer');
    }
    public function proses_update(){
        if($this->kasir->update_pesanan($_POST)>0){
            $this->redierct(''.Base_url."App_Kasir/index");
        }
    }

}