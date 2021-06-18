<?php 

require_once('init.php');
require_once('models/Usuario.php');

try {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = emailCadastrado($email, md5($senha));

    if ($usuario) {

        sessionUsuarioLogin($usuario->email, $usuario->senha);
        header('location:../pages/profile.php');

    } else {
        header('location:../pages/login.php?credenciaisInvalidas=1');
    }

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}