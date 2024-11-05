<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/view.css">
    <title>Document</title>
</head>
<body>
<?php require "navbar.php"?>

    <div class="tabela-total">
        <div class="card">
            <div class="card-header">
                <h1 >Listagem de Usuários</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <td>ID</td>
                        <td>email</td>
                        <td>Senha</td>
                        <td>Ações</td>
                    </thead>
                    <tbody>
                    
                        <?php
                            $sql = 'SELECT * FROM usuario';
                            $usuarios = mysqli_query($conexao, $sql);
                            if (mysqli_num_rows($usuarios) > 0){
                                foreach($usuarios as $usuario){
                        ?>
                        <tr>
                            <td><?=$usuario['id'] ?></td>
                            <td><?=$usuario['email']?></td>
                            <td><?=$usuario['senha']?></td>
                            <td>
                                <a href="edit.php?id=<?=$usuario['id']?>" class="btn btn-success" >Editar</a>
                                <form action="acoes.php" class="d-inline" method="POST">
                                    <button type="submit" class="btn btn-danger" name="delete_usuario" value="<?=$usuario['id']?>" >Deletar</button>

                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                            }else{print 'Nenhum usuario encontrado!';}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>