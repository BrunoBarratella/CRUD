<?php
require_once __DIR__ . "/conexao_class.php";

class Usuarios{
public $id;
public $nome;
public $email;
public $senha;

public function set(){
  $conectado = new Conexao();

  $sql = "INSERT INTO teste SET nome='" . $this->nome . "', email='" . $this->email . "', senha='" . $this->senha . "'";

  $qr = $conectado->conn->prepare($sql);
  $qr-> execute();
}


public function get()
{
  $conectado = new Conexao();
  try{
  $sql = "SELECT * FROM teste";

  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM teste WHERE 1=1 AND id=" . $this->id;
  }else{
    $sql = "SELECT * FROM teste";
  }

  $qr = $conectado->conn->prepare($sql);
  $qr->execute();
  return $qr->fetchAll();
  }catch(PDOException $error){
    echo "Whoops, ocorreu um erro ao buscar os dados" . $error;
  }
}

public function put(){
  $conectado = new Conexao();

  $sql = "UPDATE teste SET nome='" . $this->nome . "', email='" . $this->email . "', senha='" . $this->senha . "' WHERE id=". $this->id;

  $qr = $conectado->conn->prepare($sql);
  $qr-> execute();
}

}