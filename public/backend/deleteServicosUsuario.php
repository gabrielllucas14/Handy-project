<?php 

require_once('init.php');
require_once('models/Usuario.php');


try {

    $idServicoUsuario = $_GET['idServicoUsuario'];
    
    deleteServicoUsuario($idServicoUsuario);
    header('location:../pages/profile.php?deleteServico=1');    

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}