<?php

include_once('conexao.php');

$id = $_GET['id'];

$querySQL = "UPDATE usuario_andrieli SET status = ? WHERE cod_usuario LIKE $id";

$exec = $conn->prepare($querySQL);

$exec->execute(['0']);

header('Location: http://192.168.1.35/TRILHAS4/Andrieli/pdo_com_php/usuarios.php');

?>