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
            margin: 20px auto;
        }
    </style>
</head>

<?php

include_once('conexao.php');

$sql = "SELECT * FROM usuario_andrieli WHERE status LIKE 1";

$executa = $conn->prepare($sql);

$executa->execute();

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
                        <a class="nav-item nav-link active" href="http://192.168.1.35/TRILHAS4/Andrieli/pdo_com_php/">Home<span class="sr-only">(Página atual)</span></a>
                        <a class="nav-item nav-link" href="http://192.168.1.35/TRILHAS4/Andrieli/pdo_com_php/usuarios.php">Usuários</a>
                        <a class="nav-item nav-link disabled" href="#">Preços</a>
                        <a class="nav-item nav-link disabled" href="#">Desativado</a>
                    </div>
                </div>
            </nav>
        </header>

        <main id="principal">

            <h4 class="title-prinpipal text-center mt-4">Lista de Usuários</h4>

            <div class="jumbotron">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Senha</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $cont = 1;
                        foreach($resultados as $resultado) {

                            echo '<tr>';
                                echo "<td>$cont</td>";
                                echo "<td>$resultado->nome</td>";
                                echo "<td>$resultado->email</td>";
                                echo "<td>$resultado->senha</td>";
                                echo    '<td class="d-flex flex-row justify-content-around">
                                            <a href="http://192.168.1.35/TRILHAS4/Andrieli/pdo_com_php/usuario_edita.php?id=' . $resultado->cod_usuario . '" class="text-warnig"><i class="far fa-edit"></i></a>

                                            <a href="http://192.168.1.35/TRILHAS4/Andrieli/pdo_com_php/alterastatus.php?id=' . $resultado->cod_usuario . '" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>';
                            echo '</tr>';

                            $cont++;
                        }

                        ?>
                    </tbody>
                </table>

            </div>

        </main>


    </div>
</body>
</html>