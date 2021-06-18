<?php 

require_once('init.php');

try {

    deslogar();
    header('location:../index.php');

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}