<?php 
session_start();
require "conexao.php"?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="edit.css">
    <title>Editar</title>
</head>
<body>
    <?php require "navbar.php"?>
    <div class="container pt-3">
        <?php include 'mensagem.php'?>        
        <div id="Editar">
            <?php
                if(isset($_GET['id'])){
                    $usuario_id = mysqli_real_escape_string($conexao,$_GET['id']);
                    $sql = "Select * from usuario WHERE id='$usuario_id'";
                    $query = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($query) > 0){
                        $usuario = mysqli_fetch_array($query);
            ?>
            <form class="shadow card p-5" id="form" action="acoes.php" method="POST">
                <input type="hidden" name="usuario_id" value="<?=$usuario['id']?>"></input>
                <h1 class="">Editar Usuário</h1>
                <div>
                    <label>E-mail</label><br>
                    <input class="w-100" type="email" name="email" value="<?=$usuario['email']?>">
                </div>
                <div>
                    <label>Senha</label><br>
                    <input class="w-100" type="text" name="senha" value="<?=$usuario['senha']?>"><br>
                </div>
                <input class="btn btn-success sm-2" type="submit" name="update_usuario" value="Salvar">
                <?php
                    }
                }else
                    print "usuario não encontrado!";
                ?>
            </form>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>