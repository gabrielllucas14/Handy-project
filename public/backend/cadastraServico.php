<?php 

require_once('init.php');
require_once('models/UsuarioServico.php');


try {

    $usuario_id = $_SESSION["ID_USUARIO"];
    $servico_id = $_POST['servico'];
    $cidade_atendimento = $_POST['cidade'];

    $servicoUsuario = new UsuarioServico($servico_id, $usuario_id, $cidade_atendimento);
    

    cadastraServicoUsuario($servicoUsuario);
    header('location:../pages/profile.php?cadServico=1');
    

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

