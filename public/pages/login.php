<?php

if (isset($_GET['usuarioCadastrado'])) {
  echo "<script>alert('Usuário cadastrado com sucesso faça seu login!')</script>";
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Handy</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css" />
    <link href="../css/menus.css" rel="stylesheet" type="text/css" />
    <link href="style/footer-Btn.css" rel="stylesheet" type="text/css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cormorant+Upright:wght@700&family=Lora:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">

<link rel="sortcut icon" href="../image/favicon.ico" type="image/x-icon" />

  </head>
  <body>

 
    <?php include_once('menu.php') ?>


    <main>

      

        <section class="bloco1">
          <div id="boxLogin">
            <img class="imagecontato" src="../images/contact.svg" alt="">
          </div>
        </section>

        <section class="bloco2">
          <div id="boxCadastrar">
            <form id="cadastrarForm" action="../backend/autenticacao.php" method="POST">
              <h2 id="loginh2">Login</h2>

              <p>
              <label for="email"> Email </label><br>
              <input type="email" id="emailLog" name="email" class="email" placeholder="usuario@exemplo.com">
              </p>
              <p>
              <label for="senha"> Senha </label><br>
              <input type="password" id="senhaLog" class="senha" name="senha" minlength=6>
              </p>

              <p id="incorreto"></p>

              
              <input type="submit" class="btn-login" value="Entrar">

            </form><br>
            
          </div>
      </section>

      
    </main>

    
    <script src="../js/functions.js"></script>

  </body>
</html>