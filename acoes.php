<?php
session_start();
require 'conexao.php';

if(isset($_POST['criar_usuario'])){

    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']),PASSWORD_DEFAULT)) : '' ;

    if($email<>null){
        $sql = "INSERT INTO usuario (email, senha) VALUES ('$email','$senha')";
        mysqli_query($conexao, $sql);
    }    
    if(mysqli_affected_rows($conexao) >0){
        $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
        header('Location: index.php');
        exit;
    }else{
        $_SESSION['mensagem'] = 'Usuário não foi criado!';
        header('Location: index.php');
        exit;
    }
}
if(isset($_POST['update_usuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql = "UPDATE usuario set email='$email'" ;
   

    if(empty(!$senha)){
        $sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'";
    }
    $sql .= " WHERE id ='$usuario_id'";

    mysqli_query($conexao, $sql);
    
    if(mysqli_affected_rows($conexao) >0){
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso!';
        header('Location: index.php');
        exit;
    }else{
        $_SESSION['mensagem'] = 'Usuário não atualizado!';
        header('Location: index.php');
        exit;
    }
}
if(isset($_POST['delete_usuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    $sql = "DELETE FROM usuario WHERE id='$usuario_id'";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao)){
        $_SESSION['mensagem'] = 'Usuario deletado com sucesso!';
        header('Location: view.php');
        exit;
    }
    else{
        $_SESSION['mensagem'] = 'Usuário não deletado!';
        header('Location: view.php');
        exit;
    }

    
}

