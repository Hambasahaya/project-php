<?php 
class Produk extends Controller{
    public function index(){
        $data=["prd"=>$this->model('Data_produk')->getdata(),
                "judul"=>"Produk"
    ];
        $this->View('template/header',$data);
        $this->View('page/produk',$data);
        $this->View('template/footer');
    }

        public function add(){
        if ( $this->model('Data_produk')->add_prd($_POST,$_FILES)>0) {
            $this->flas('add_prd',"Data sukes di tambahkan!");
            $this->redierct(''.Base_url."Produk/index");
        }

        }
        public function hapus($id){
            if ($this->model('Data_produk')->hapus($id)>0) {
                $this->flas('add_prd',"Data sukes di Hapus");
                $this->redierct(''.Base_url."Produk/index");
            }
        }
        public function update($id_prd){
            $data=[
                "judul"=>"update Produk",
                "data_produk"=>$this->model('Data_produk')->getid($id_prd)
            ];
            $this->View('template/header',$data);
            $this->View('template/Form_Update',$data);
            $this->View('template/footer');
        }
        public function proses_update(){
            if($this->model("Data_produk")->update($_POST)>0){
                $this->redierct(''.Base_url."Produk/index");
            }

        }
}
