<?php 
  if (isset($_GET['senhasInvalidas'])) {
      echo "<script>alert('As senhas não correspodem!')</script>";
  } 
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Handy</title>
	<link href="../css/cadP.css" rel="stylesheet" type="text/css" />
	<link href="../css/menus.css" rel="stylesheet" type="text/css" />
 

    <link rel="sortcut icon" href="../images/favicon.ico" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cormorant+Upright:wght@700&family=Lora:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include_once('menu.php') ?>

    <main>
      <section class="cadastro">

        <div class="cadastro-prest">
          <form class="forms-prest" action="../backend/cadastraUsuario.php" method="POST" enctype='multipart/form-data'>
          <h2 class="titulo">Cadastro Prestador</h2>
            <div class="bloco">
                <div class="b1 nome">
                    <label for="nome" class="nome"> Nome: </label><br>
                    <input type="text" id="nome" name="nome" class="nome" placeholder="Ex.:Lucas Gabriel " required>
              </div>

                
            </div>

            <div class="bloco">
                <section class="b1">
                  <label for="telefone1" class="telefone"> Telefone: </label><br>
                  <input type="tel" id="telefone1" class="telefone" name="telefone" placeholder="Ex.: (99) 9999-9999">
                </section>

                <div class="b2">
                    <label for="telefone1" class="telefone"> Idade: </label><br>
                    <input type="number" id="telefone1" class="telefone" name="idade" placeholder="EX.: 20">
                </div>
            </div>


              
              <div class="bloco">
                <section class="b1">
                  <label for="estado" class="estado">Estado</label><br>
                  <select id="estado" class="estado" name="estado" required>
                    <option value="" selected>Selecione um estado</option>
                    <option value="pernambuco">Pernambuco</option>
                  </select>
                </section>
                
                <section class="b2 b2-right">
                  <label for="cidades" class="cidades" id="cidade1">Cidades</label><br>
                  <select id="cidades2" class="cidades" name="cidade" required>
                    <option value="" selected>Selecione uma cidade</option>
                    <option value="Recife">Recife</option>
                    <option value="Jaboatão">Jaboatão dos Guararapes</option>
                    <option value="Olinda">Olinda</option>
                    <option value="Camaragibe" >Camaragibe</option>
                    <option value="Paulista" >Paulista</option>
                    <option value="Igarassu">Igarassu</option>
                    <option value="Abreu">Abreu e Lima</option>
                    <option value="Caruaru">Caruaru</option>
                    <option value="Vitoria">Vitoria de Santo</option>
                    <option value="Gravata">Gravatá</option>
                  </select>

                </section>
              </div>
            
              <br>
              <div class="bloco">

                <section>
                  <label for="img" class="upfoto">Select image:</label><br>
                    <input type="file" id="img" name="foto" class="upfoto" accept="image/*">
                </section>

              </div>

              <div class="bloco">

              <section class="b1">

                <label for="genero" class="genero" id="genero">Gênero</label><br>
                <select id="genero1" class="genero" name="genero" required>
                  <option value="" selected>Selecione uma opção</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Drag-Queen">Drag-Queen</option>
                  <option value="Transsexual">Transsexual</option>
                  <option value="Outro" >Outro</option>
                  <option value="nãoIndormado">Prefiro não informar</option>
                </select>

              </section>
                
                <section class="b2">
                  <label for="celular" class="telefone"> Email: </label><br>
                  <input type="email" id="celular" class="telefone" name="email" placeholder="exemplo@gmail.com">
                </section>

               
               
              </div>

              <div class="bloco">
                <section class="b1">
                  <label for="telefone1" class="telefone"> Senha </label><br>
                  <input type="password" id="telefone1" class="telefone" name="senha">
                </section>

                <section class="b2">
                  <label for="celular" class="telefone"> Confirmar senha: </label><br>
                  <input type="password" id="celular" class="telefone" name="senha2">
                </section>
            </div>

             <br>
                  
        <center>
        <div class="botoes">
      
          <input type="submit" value="Cadastrar" class="botaoCadastra" id="enviar">

          <input type="reset" class="botaoLimpar" value="Limpar">

        </div>

          </form>
        </div>
</center>

        
      
      </section>

    </main>
    
    <script src="../js/functions.js"></script>
  </body>
</html>