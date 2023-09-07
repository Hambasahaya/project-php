<?php

class App{
    protected $controller="Home",
               $method="index",
                $param=[];
    public function __construct()
    {
        $url=$this->Parsurl();
        if (is_null($url)) {
            error_reporting(E_ERROR | E_PARSE);
        }
        if(file_exists('../App/Controllers/'.$url[0].'.php')){
            $this->controller=$url[0];
            unset($url[0]);
        }
            require_once'../App/Controllers/'.$this->controller .'.php';
            $this->controller= new $this->controller;
        if (method_exists($this->controller,$url[1])) {
            $this->method=$url[1];
            unset($url[1]);
        }
        if (!empty($url)) {
            $this->param=array_values($url);
        }
        call_user_func_array([$this->controller,$this->method],$this->param);
    }

    public function Parsurl(){
        if (isset($_GET['url'])) {
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode("/",$url);
            return $url;
        }
    }
}