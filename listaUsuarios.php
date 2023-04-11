<?php
//Faço o requerimento da classe de usuarios e em seguida crio a variavel para instanciar a classe
require_once "./classes/usuarios_class.php";
$usuario = new Usuarios();

//Crio uma condição onde se houver um $_POST vou executar todo o codigo abaixo
if ($_POST) {
  //Crio a condição onde se houver um $_POST que me traga o id, o id do usuario vai receber o valor passado pelo post caso contrario não vai passar o id
  if (isset($_POST['id'])) {
    $usuario->id = $_POST['id'];
  }else{}
  //Atribuo os valores do $_POST recebido do index, para as variaveis correspondentes
  $usuario->nome = $_POST['nome'];
  $usuario->email = $_POST['email'];
  $usuario->senha = $_POST['senha'];

  //Crio outra condição onde se o id do usuario estiver setado o cadastro sera atualizado, caso contrario ira criar um novo cadastro
  if (isset($usuario->id)){
    //Uso a variavel onde instancio a classe e chamo uma função que esta dentro dela no caso a put(Função para atualizar) 
    $usuario->put();
  }else{
    //Função para adicionar novo cadastro
    $usuario->set();
  }

} else {

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios Cadastrados</title>
</head>

<body>
  <h1>Lista de Usuarios</h1>
  <hr>
  <?php
  //Crio um variavel que vai receber o valor retornado da função vinda da classe
  $lista = $usuario->get();

  //Faço um foreach onde percorro cada valor recebido
  foreach ($lista as $key => $value) {
    //Crio links para me enviar via metodo $_GET para atualizar ou excluir um cadastro
    echo "<a href='index.php?edit=" . $value['id'] . "'>[Editar]</a><a href='excluir.php?deleta=" . $value['id'] . "'> [Deletar]</a>";
    //Mostro o nome e o email que esta salvo no banco de dados
    echo "<p>" . $value['nome'] . "</p>";
    echo "<p>" . $value['email'] . "</p>";
    echo "<hr>";
  }
  ?>
</body>

</html>
