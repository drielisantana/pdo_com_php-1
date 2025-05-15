<?php

$serverName         = 'localhost';
$userName           = 'root';
$passWd             = '';
$dbname             = 'meu_primeiro_banco';

try {

    $conn = new PDO("mysql:host=$serverName;dbname=$dbname", $userName, $passWd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {

    echo 'Conexão falhou: ' . $erro->getMessage();

}



?>