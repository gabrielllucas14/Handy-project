<?php 

session_start();

if (isset($_SESSION["ID_USUARIO"])) {
    header('location:../pages/profile.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handy</title>
    <link rel="stylesheet" href="css/home.css" >
    <link rel="stylesheet" href="css/menus.css">
    <link rel="sortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>



<body>

    <header>

        <!--MENU-->

        <section class="menu">
            <img src="images/handy_2.png" alt="" srcset="">

            <section class="nav">

                <a href="../">Home</a>

                <a href="../pages/sobreNos.php">Quem Somos</a>

                <a href="../pages/faq.php">FAQ</a>

                <a href="../pages/filtro.php">Buscar Prestador</a>

                <a href="../pages/cadastroUser.php">Faça seu Cadastro</a>

            </section>

            <button onclick="redirLogin()">Login</button>

        </section>

    </header>
    
    <main>
        <section>
            <img src="images/festa_home.svg" alt="" srcset="">
        </section>
        
        <section class="bemvindo">
            <h2>Bem vindo ao Handy</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <div class="botoes">
                <button onclick="redirPesquisa()">
                   Buscar Prestador
                </button>

                <button class="btn_servico" onclick="redirCadastro()">
                    Divulgar Serviços
                </button>
            </div>
        </section>

    </main>

    <script src="js/functions.js"></script>

</body>

</html>