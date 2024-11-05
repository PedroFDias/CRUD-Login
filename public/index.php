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
    <link rel="stylesheet" href="assets/css/Login.css">
    <title>Login</title>
</head>
<body>
    <?php require "navbar.php"?>
    <div class="container pt-3">
        <?php include 'mensagem.php'?>        
        <div id="Login">
            <form class="shadow card p-5" id="form" action="acoes.php" method="POST">
                <h1>Cadastro</h1>
                <div>
                    <label>E-mail</label><br>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Senha</label><br>
                    <input type="text" name="senha"><br>
                </div>
                <input type="submit" name="criar_usuario" value="cadastrar">
                <a href="view.php" class="btn btn-success">Ver Usuários</a>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>