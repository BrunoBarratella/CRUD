<?php

//Faço o requerimento da classe de conexão e instancio em uma variavel
require_once "./classes/conexao_class.php";
$conexao = new Conexao();

//Minha variavel id recebe o valor vindo via metodo $_GET 
$id = $_GET['deleta'];

//Crio a condição onde se houver um $id ele vai executar os comando abaixo
if($id){
  //Acesso minha conexão PDO e preparo a query(Comando SQL)
  $qr = $conexao->conn->prepare("DELETE FROM teste WHERE id = :id");
  //Seto o valor do :id, como o valor da variavel $id
  $qr->bindValue(':id', $id);
  //Executo a Query que foi preparada
  $qr->execute();
}

//Após toda a função se tudo tiver sido executado corretamente vai me mandar novamente para a pagina de listagem de cadastros
header("Location: listaUsuarios.php");

?>
