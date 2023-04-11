<?php

require_once "./classes/conexao_class.php";
$conexao = new Conexao();

$id = $_GET['deleta'];

if($id){
  $qr = $conexao->conn->prepare("DELETE FROM teste WHERE id = :id");
  $qr->bindValue(':id', $id);
  $qr->execute();
}

header("Location: listaUsuarios.php");

?>