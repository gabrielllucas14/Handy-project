<?php 

require_once('init.php');
require_once('models/Usuario.php');


try {

    $nome       = $_POST['nome'];
    $idade      = $_POST['idade'];
    $telefone   = $_POST['telefone'];
    $estado     = $_POST['estado'];
    $cidade     = $_POST['cidade'];
    $genero     = $_POST['genero'];
    $email      = $_POST['email'];
    $senha      = $_POST['senha'];
    $senha2     = $_POST['senha2'];
    $foto       = $_FILES['foto']['name'];

    $usuario = new Usuario($nome, $idade, $telefone, $email, $estado, $cidade, $foto, $genero, $senha);

    if ($senha != $senha2) {
        header('location:../pages/cadastroUser.php?senhasInvalidas=1');
    } else {
        if(cadastrarUsuario($usuario)){
            uploadImage($_FILES['foto']);
            header('location:../pages/login.php?usuarioCadastrado=1');
        }
    }
    

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}