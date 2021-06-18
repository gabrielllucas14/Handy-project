<?php 

    /**
     * Arquivo que possuirá funções comuns a todo sistema
     * na parte do backend.
     */

session_start();

function conexao() // Realiza a conexão com o banco de dados Mysql
{
    $conexao = new PDO('mysql:host=localhost;dbname=Handy', 'id16934917_lucas', ' %H5iY=Row|/K~Bq{');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    return $conexao;
}


function cadastrarUsuario($usuario) // Criar Função de Cadastrar Usuarios na base de dados
{
    try {

        $pdo = conexao();
    
        $stmt = $pdo->prepare('INSERT INTO 
                                usuarios (nome, idade, telefone, genero,  foto, estado, cidade, email, senha) 
                                VALUES(:nome, :idade, :telefone, :genero, :foto, :estado, :cidade, :email, :senha)');
        
        $stmt->execute(array(
            ':nome' => $usuario->nome, 
            ':idade' => $usuario->idade,  
            ':telefone' => $usuario->telefone, 
            ':genero' => $usuario->genero, 
            ':foto' => $usuario->foto, 
            ':estado' => $usuario->estado, 
            ':cidade' => $usuario->cidade, 
            ':email' => $usuario->email, 
            ':senha' => md5($usuario->senha) 
        ));
        
        return true ;

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function emailCadastrado($email, $senha) // Verificar se já existe email cadastrado na base de dados
{
    
    try {

        $pdo = conexao();

        $stmt = $pdo->query("select email, senha from usuarios where email = '$email' and senha = '$senha'");
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);

        return $usuario;
    
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function sessionUsuarioLogin($email, $senha) // Função para Criar uma sessão de Login (Identificar que existe um usuario logado)
{
    try {

        $pdo = conexao();
        
        $stmt = $pdo->query("select * from usuarios where email = '$email' and senha = '$senha'");
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);

        $_SESSION["ID_USUARIO"] = $usuario->idUsuario;
        $_SESSION["EMAIL"]      = $usuario->email;
        $_SESSION["NOME"]       = $usuario->nome;
        $_SESSION["FOTO"]       = $usuario->foto;

    
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function deslogar() // Função para Deslogar do sistema
{
    unset($_SESSION["ID_USUARIO"]);
    unset($_SESSION["EMAIL"]);
    unset($_SESSION["NOME"]);
    unset($_SESSION["FOTO"]);
}

function cadastraServicoUsuario($servicoUsuario) // Função para cadastrar Serviços dos Prestadores
{
    try {

        $pdo = conexao();
    
        $stmt = $pdo->prepare('INSERT INTO 
                                usuario_servicos(idUsuario, idServico, cidade_atendimento) 
                                VALUES(:idUsuario, :idServico, :cidade_atendimento)');
        
        $stmt->execute(array(
            ':idUsuario' => $servicoUsuario->usuario_id, 
            ':idServico' => $servicoUsuario->servico_id,  
            ':cidade_atendimento' => $servicoUsuario->cidade_atendimento) 
        );
        
        return true ;

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function deleteServicoUsuario($idServicoUsuario) // Função para deletar os serviços cadastrados dos prestadores
{
    try {

        $pdo = conexao();
    
        $stmt = $pdo->prepare('delete from usuario_servicos where idUsuarioServicos = '.$idServicoUsuario);
        $stmt->execute();
        
        return true ;

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function arrayServicos() // Função que retorna todos os serviços cadastrados
{
    
    try {

        $pdo = conexao();
        
        $stmt = $pdo->query("select * from servicos");

        $arrayServicos = [];

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $arrayServicos[] = [ 'idServico' => $linha['idServico'], 'descricao' => $linha['descricao'] ];
        }

        return $arrayServicos;
    
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    
}

function arrayServicosUsuario() // Trazer os serviços dos prestadores ao realizarem o login
{
    try {

        $pdo = conexao();
        
        $stmt = $pdo->query("select 
                                us.idUsuarioServicos as idUsuarioServicos,
                                us.cidade_atendimento as cidade_atendimento,
                                s.descricao as descricao
                            from 
                                usuario_servicos as us
                                inner join servicos as s
                                    on s.idServico = us.idServico
                            where us.idUsuario = ".$_SESSION['ID_USUARIO']);

        $arrayServicosUsuario = [];

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $arrayServicosUsuario[] = [ 'idUsuarioServicos' => $linha['idUsuarioServicos'], 'descricao' => $linha['descricao'], 'cidade_atendimento' => $linha['cidade_atendimento'] ];
        }

        return $arrayServicosUsuario;
    
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function arrayPrestadores($servico, $cidade) // Função que trás os resultados na aba Buscar prestadores trazendo os prestadores cadastrados que possuem a profissão e atendem na cidade que foram passadas como parametros de busca
{
    try {

        $pdo = conexao();
        
        $stmt = $pdo->query("select 
                                u.nome as nome,
                                u.idade as idade,
                                s.descricao as descricao,
                                u.telefone as telefone,
                                u.email as email,
                                us.cidade_atendimento as cidade_atendimento,
                                u.foto as foto
                            from 
                                usuario_servicos as us
                            join 
                                usuarios as u
                            on u.idUsuario = us.idUsuario
                            join 
                                servicos as s
                            on s.idServico = us.idServico
                            where s.idServico = $servico and us.cidade_atendimento = '$cidade'");

        $prestadores = [];

        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            $prestadores[] = [ 
                                'nome' => $linha['nome'], 
                                'idade' => $linha['idade'], 
                                'descricao' => $linha['descricao'], 
                                'telefone' => $linha['telefone'], 
                                'email' => $linha['email'], 
                                'cidade_atendimento' => $linha['cidade_atendimento'], 
                                'foto' => $linha['foto'], 
                            ];

        }

        return $prestadores;
    
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function uploadImage($dadosImage) // Função para anexar/salvar imagem no cadastro e salvar na pasta 'FotosUsuarios
{
    $diretorioUploads =  '../fotosUsuarios/';
    $arquivoUpload    = $diretorioUploads . basename($dadosImage['name']);

    move_uploaded_file($dadosImage['tmp_name'], $arquivoUpload);
}

