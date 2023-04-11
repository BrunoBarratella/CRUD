<?php
require_once "./classes/usuarios_class.php";
$usuario = new Usuarios;

if (isset($_GET['edit'])) {
  $usuario->id = $_GET['edit'];

  $mostra = $usuario->get();

  echo "<h1>Edição de Usuario</h1>";
} else {
  echo "<h1>Cadastro de Usuario</h1>";
}

?>

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
if(isset($_GET['edit'])){
  echo "<label for='id'>Id</label><br>";
  echo "<input type='text' name='id' value='{$mostra[0][0]}' readonly><br><br>";

}else{

}
?>


    <label for="nome">Nome</label><br>
    <input type="text" name="nome" value="<?= $mostra[0][1] ?>"><br><br>

    <label for="email">E-mail</label><br>
    <input type="text" name="email" value="<?= $mostra[0][2] ?>"><br><br>

    <label for="senha">Senha</label><br>
    <input type="password" name="senha" value="<?= $mostra[0][3] ?>"><br><br>

    <button type="submit">
      <?php
if (isset($usuario->id)) {
  echo "Editar";
}else{
  echo "Cadastrar";
}
      ?></button>
  </form>
</body>

</html>