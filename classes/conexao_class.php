<?php
//Crio a classe de conexão com meu banco de dados MySql usando PDO (Poderia usar o Mysqli tambem)
class Conexao
{
  //Crio variaveis que recebem os valores a serem passado para o PDO, para mostrar qual banco de dados ele deve acessar e todas as informações necessarias
  var $Bhost = "bagre";
  var $Buser = "wise";
  var $Bpass = "#Ws!0zWISEd1o8d0i5%";
  var $Bport = 3306;
  var $Bdb   = "sucos_vendas";

  //Crio a variavel publica Conn
  public $conn;

  //Crio a função construct (É executa no momento em que a classe é instanciada) 
  public function __construct()
  {
    //Tento executar o seguinte codigo
    try {
      //Minha variavel Conn cria a conexão com o PDO para acessar o Banco de Dados, e logo depois preencho todos os requisitos do PDO
      $this->conn = new PDO("mysql:host=" . $this->Bhost . ";port=" . $this->Bport . ";dbname=" . $this->Bdb, $this->Buser, $this->Bpass);
      //Seto os atributos de erro
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //Caso ocorra algum erro durante a execução, o catch vai capturar a exception e colocar na variavel $error 
    } catch (PDOException $error) {
      //Mostra uma mensagem mais amigavel de erro e logo apos me mostra o erro
      echo "Whoops, ocorreu um erro ao conectar no banco de dados: " . $error;
      //O indicado é não mostrar o erro para o usuario e sim mostrar em log por exemplo, mas para esse caso de aprendizagem, não tem problema deixar assim, e tambem
      //não aprendi a criar logs
    }


  }
}
