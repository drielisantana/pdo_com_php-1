<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDO com PHP - Usuários</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <style>
        .jumbotron {
            width: 900px;
            margin: 30px auto;
        }
    </style>
</head>

<?php

include_once('conexao.php');


$sql = "SELECT * FROM usuario_andrieli WHERE status LIKE 1";

$executa = $conn->prepare($sql);

$resultados = $executa->fetchAll(PDO::FETCH_OBJ);

?>

<body>
    <div id="interface">

        <header class="cabecalho">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="http://192.168.1.25/TRILHAS4/Andrieli/pdo_com_php/">Home<span class="sr-only">(Página atual)</span></a>
                        <a class="nav-item nav-link" href="http://192.168.1.25/TRILHAS4/Andrieli/pdo_com_php/usuarios.php">Usuários</a>
                        <a class="nav-item nav-link disabled" href="#">Preços</a>
                        <a class="nav-item nav-link disabled" href="#">Desativado</a>
                    </div>
                </div>
            </nav>
        </header>

        <main id="principal">

            <h4 class="title-prinpipal text-center mt-4">Lista de Usuários</h4>

           <div class="jumbotron">

            <?php

            include_once('conexao.php');

            $id = $_GET['id'];

            $querySQL = "SELECT * FROM usuario_igor WHERE cod_usuario LIKE $id";

            $executa = $conn->prepare($querySQL);

            $executa->execute();

            $usuario = $executa->fetch(PDO::FETCH_OBJ);

            // echo '<pre>';

            // var_dump($usuario);

            // echo '</pre>';

            ?>

                <form action="" method="POST">

                    <div class="row form-group">
                        <div class="col-3">
                            <label for="txt-nome">Nome:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" name="txt-nome" id="txt-nome" class="form-control" value="<?= $usuario->nome; ?>" >
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-3">
                            <label for="txt-email">E-Mail:</label>
                        </div>
                        <div class="col-9">
                            <input type="email" name="txt-email" id="txt-email" class="form-control" value="<?= $usuario->email; ?>" >
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-3">
                            <label for="txt-senha">Senha:</label>
                        </div>
                        <div class="col-3">
                            <input type="password" name="txt-senha" id="txt-senha" class="campo-senha form-control" >
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-3">
                            <label for="txt-con-senha">Confirma Senha:</label>
                        </div>
                        <div class="col-3">
                            <input type="password" name="txt-con-senha" id="txt-con-senha" class="campo-senha form-control" >
                        </div>
                    </div>

                    <div class="row form-group">
                        <a href="javascript: void()" onclick="history.back()" class="btn btn-danger col-3 m-2">Cancelar</a>
                        <input type="submit" name="bt-salvar" id="bt-salvar" class="btn btn-success col-3 m-2" value="Salvar" disabled/>
                    </div>

                </form>

                <script>
                
                $(document).ready(function() {

                    $('input').change(function() {

                        $('#bt-salvar').attr('disabled', false);

                    });

                    $('.campo-senha').change(function() {

                        if( $('#txt-con-senha').val() != $('#txt-senha').val() || $('#txt-con-senha').val() == '' || $('#txt-senha').val()== '' ) {

                            $(this).addClass('is-invalid');
                            $(this).removeClass('is-valid');
                            $('.campo-senha').addClass('is-invalid');
                            $('.campo-senha').removeClass('is-valid');
                            $('#bt-salvar').attr('disabled', true);

                        } else {

                            $(this).addClass('is-valid');
                            $(this).removeClass('is-invalid');
                            $('.campo-senha').addClass('is-valid');
                            $('.campo-senha').removeClass('is-invalid');
                            $('#bt-salvar').attr('disabled', false);

                        }

                    });

                });

                </script>

            </div>

        </main>


    </div>
</body>
</html>