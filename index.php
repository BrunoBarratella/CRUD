<?php
//Faço o requerimento do da classe de usuarios e log após crio uma variavel que instanciara a classe
require_once "./classes/usuarios_class.php";
$usuario = new Usuarios;

//Crio uma condição onde verifico se o valor do edit no $_GET esta setado, caso esteja atribuo a variavel id que esta dentro da classe, antes sem valor nenhum
if (isset($_GET['edit'])) {
  $usuario->id = $_GET['edit'];

//Crio uma variavel que vai receber uma função da classe 
  $mostra = $usuario->get();
  
//Caso a condição seja verdadeira vai executar todo o codigo acima e vai me mostrar em tela a mensagem abaixo
  echo "<h1>Edição de Usuario</h1>";
} else {
//Em caso negativo(caso a condição não seja cumprida, ira me mostrar essa mensagem)
  echo "<h1>Cadastro de Usuario</h1>";
}

?>

<!-- Fecho meu documento php acima e inicio meu codigo HTML -->
<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
</head>

<body>
  <form action="listaUsuarios.php" method="post">
<?php 
//Abro um espaço php dentro do html onde faço a função que sera utilizada para atualizar o cadastro, onde caso o [$_GET edit] esteja setado ira me mostrar o campo de Id
  //passado via metodo $_GET, caso não esteja setado nenhum metodo via $_GET não ira me mostrar nada e seguira com o cadastro de usuario normalmente
if(isset($_GET['edit'])){
  echo "<label for='id'>Id</label><br>";
  echo "<input type='text' name='id' value='{$mostra[0][0]}' readonly><br><br>";

}else{

}
?>


    <label for="nome">Nome</label><br>
    
    <!-- Caso a função PhP no começo seja cumprida o meu input sera preenchido com a informação do usuario vinda do banco de dados para atualizar os dados, 
          caso contrario ficara vazia para seguir o cadastro normalmente-->
           
    <input type="text" name="nome" value="<?= $mostra[0][1] ?>"><br><br>

    <label for="email">E-mail</label><br>
    <input type="text" name="email" value="<?= $mostra[0][2] ?>"><br><br>

    <label for="senha">Senha</label><br>
    <input type="password" name="senha" value="<?= $mostra[0][3] ?>"><br><br>

    <button type="submit">
      <?php
  //Crio uma pequena condição para que se houver um id de usuario setado vai mostrar no botão Editar ou Cadastrar
if (isset($usuario->id)) {
  echo "Editar";
}else{
  echo "Cadastrar";
}
      ?></button>
  </form>
</body>

</html>
