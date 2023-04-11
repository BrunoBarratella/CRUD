<?php
//faço o requeirmento da classe de conexão
require_once __DIR__ . "/conexao_class.php";

//crio uma classe de usuarios
class Usuarios{
  //crio as variaveis que receberão os valores futuramente na execução do programa
public $id;
public $nome;
public $email;
public $senha;

  //crio uma função para adicionar cadastro no banco de dados
public function set(){
  //instancio a classe de conexão
  $conectado = new Conexao();

  //crio a query que vai ser executada e coloco ela dentro de uma variavel
  $sql = "INSERT INTO teste SET nome='" . $this->nome . "', email='" . $this->email . "', senha='" . $this->senha . "'";

  //crio uma variavel que recebe o preparo da minha query
  $qr = $conectado->conn->prepare($sql);
  //executo a query e pronto... Cadastro adicionado no banco de dados
  $qr-> execute();
}

//crio uma função para mostrar em tela os itens que quero do banco de dados
public function get()
{
  //instancio a clase de conexão
  $conectado = new Conexao();
  
  //tento executar o codigo a seguir
  try{
    //crio uma query para me mostrar os dados que quero e coloco dentro de uma variavel
  $sql = "SELECT * FROM teste";

    //se houver um metodo $_GET com o valor de edit setado ele vai receber a query abaixo
  if(isset($_GET['edit'])){
    $sql = "SELECT * FROM teste WHERE 1=1 AND id=" . $this->id;
    //caso não haja metodo $_GET ele vai receber essa query
  }else{
    $sql = "SELECT * FROM teste";
  }
    
//crio uma variavel que recebe o preparo da query
  $qr = $conectado->conn->prepare($sql);
//executo a query
  $qr->execute();
//retorno o valores que me foram trazidos apartir da execução(Me traz como um array, então quando eu instanciar essa função preciso fazer uma tratativa pra mostrar os valores)
  return $qr->fetchAll();
    //caso ocorrer algo de errado ele capturara o erro e colocara na variavel $error
  }catch(PDOException $error){
    echo "Whoops, ocorreu um erro ao buscar os dados" . $error;
  }
}

  
//crio uma função para atualizar o cadastro
public function put(){
  //instancio a classe de conexão
  $conectado = new Conexao();

  //crio a query para atualizar o cadastro
  $sql = "UPDATE teste SET nome='" . $this->nome . "', email='" . $this->email . "', senha='" . $this->senha . "' WHERE id=". $this->id;

  //crio uma variavel que recebe o preparo da query
  $qr = $conectado->conn->prepare($sql);
  //executo a query
  $qr-> execute();
}

}
