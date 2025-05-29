<?php

if($_POST {'bt-salvar'}){

    $cod_usuario          = $_POST {'cod_usuario'};
    $nome                 = $_POS {'nome'};
    $email                = $_POS {'email'};
    $senha                = $_POST {'senha'};

    if (!$_POST { 'modifica-senha'}){

        $querySQL         = " UPDATE usuario_andrieli SET(nome, email) VALUES (?, ?) WHERE cod_usuario 
        LIKE $cod_usuario";
   
 }else {

    $querySQL     =" UPDATE usuario_andrieli SET (nome, email, senha) VALUES ( ?, ?, ?)
 }

}