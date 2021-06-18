<?php 

// Modelo da base de dados da tabela Usuarios
class Usuario {

    var $nome;
    var $idade;
    var $telefone;
    var $email;
    var $estado;
    var $cidade;
    var $foto;
    var $senha;
    var $genero;

    function __construct($nome, $idade, $telefone, $email, $estado, $cidade, $foto, $genero, $senha) {
        $this->nome     = $nome;
        $this->idade    = $idade;
        $this->telefone = $telefone;
        $this->email    = $email;
        $this->estado   = $estado;
        $this->cidade   = $cidade;
        $this->foto     = $foto;
        $this->senha    = $senha;
        $this->genero   = $genero;
    }

}