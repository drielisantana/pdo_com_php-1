<?php

include_once('conexao.php');

$executa = $conn->prepare('SELECT * FROM usuario_igor');

$executa->execute();

$resultados = $executa->fetchAll(PDO::FETCH_OBJ);

foreach($resultados as $resultado) {

    echo $resultado->nome . '<br />';

}



?>

