<?php
require_once "./classes/usuarios_class.php";
$usuario = new Usuarios();

if ($_POST) {
  if (isset($_POST['id'])) {
    $usuario->id = $_POST['id'];
  }else{}
  $usuario->nome = $_POST['nome'];
  $usuario->email = $_POST['email'];
  $usuario->senha = $_POST['senha'];

  if (isset($usuario->id)){
    $usuario->put();
  }else{
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
  $lista = $usuario->get();

  foreach ($lista as $key => $value) {
    echo "<a href='index.php?edit=" . $value['id'] . "'>[Editar]</a><a href='excluir.php?deleta=" . $value['id'] . "'> [Deletar]</a>";
    echo "<p>" . $value['nome'] . "</p>";
    echo "<p>" . $value['email'] . "</p>";
    echo "<hr>";
  }
  ?>
</body>

</html>