<?php

class Conexao
{
  var $Bhost = "bagre";
  var $Buser = "wise";
  var $Bpass = "#Ws!0zWISEd1o8d0i5%";
  var $Bport = 3306;
  var $Bdb   = "sucos_vendas";

  public $conn;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=" . $this->Bhost . ";port=" . $this->Bport . ";dbname=" . $this->Bdb, $this->Buser, $this->Bpass);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
      echo "Whoops, ocorreu um erro ao conectar no banco de dados: " . $error;
    }


  }
}
