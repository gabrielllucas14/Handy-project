<?php 

// Modelo da base de dados da tabela UsuarioServico

class UsuarioServico {

    var $servico_id;
    var $usuario_id;
    var $cidade_atendimento;

    function __construct($servico_id, $usuario_id, $cidade_atendimento) {
        $this->servico_id = $servico_id;
        $this->usuario_id = $usuario_id;
        $this->cidade_atendimento = $cidade_atendimento;
    }

}