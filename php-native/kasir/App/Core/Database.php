<?php

class Database extends Config{
    protected $dbh,
              $stmt;

    public function __construct()
    {
        $config=''.$this->config_db['Driver'].':host='. $this->config_db['Host'].';dbname='.$this->config_db['Database'];
        try {
            $this->dbh= new PDO($config,$this->config_db['Username'],$this->config_db['Password']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo"koneksi gagal" . $error->getMessage();
            die();
        }
    }
     public function query($query){
        $this->stmt=$this->dbh->prepare($query);
     }
     public function bind($param,$value,$type=NULL){
        if(is_null($type)){
            switch(TRUE){
                case is_int($value):
                    $type=PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type=PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type=PDO::PARAM_NULL;
                    break;
                default:
                $type=PDO::PARAM_STR;
                break;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
     }
     public function run(){
        $this->stmt->execute();
     }
public function get_all(){
    $this->run();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}
  public function get(){
    $this->run();
   return $this->stmt->fetch(PDO::FETCH_ASSOC);
 }
public function cekmasuk(){
  return  $this->stmt->rowCount();
}
}