<?php

include_once('conexao.php');

$sqlQuery = 'CREATE TABLE IF NOT EXISTS usuario_neto (cod_usuario INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(250), email VARCHAR(250))';

$exec = $conn->prepare($sqlQuery);

$exec->execute();


?>

