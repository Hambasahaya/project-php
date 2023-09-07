<?php
class Controller{
    public $error;
    public function View($filename,$data=[]){
        if(file_exists('../App/Views/'.$filename .'.php')){
            require_once'../App/Views/'.$filename.'.php';
        }else{
            require_once'../App/Views/Not_found.php';
            return $error="this file not_foud".$filename;
        }
    }
    public function model($model_name){
        if (file_exists('../App/Model/'.$model_name.'.php')) {
            require_once'../App/Model/'.$model_name.'.php';
            return new $model_name;
        }else{
            return $error="this file not_foud".$model_name;
        }
    }
        public function redierct($url){
            header("Location:".$url);
        }
        public function flas($name,$mesege){
          return $_SESSION["".$name]="".$mesege;
        }
    
}