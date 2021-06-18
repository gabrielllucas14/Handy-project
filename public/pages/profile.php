<?php

session_start();

require_once('../backend/init.php');

if (isset($_GET['cadServico'])) {
  echo "<script>alert('Serviço cadastrado com sucesso!')</script>";
}

if (isset($_GET['deleteServico'])) {
  echo "<script>alert('Serviço removido com sucesso!')</script>";
}

$servicos = arrayServicos();
$servicoUsuario = arrayServicosUsuario();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Handy</title>
  <link href="../css/menus.css" rel="stylesheet" type="text/css" />
  <link href="../css/profile.css" rel="stylesheet" type="text/css" />

  <link rel="sortcut icon" href="../images/favicon.ico" type="image/x-icon" />

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cormorant+Upright:wght@700&family=Lora:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>

<body>

    <?php include_once('menu.php') ?>

    <div class="container">
      <div class="header-div">
        <img src="../fotosUsuarios/<?= $_SESSION["FOTO"] ?>">
        <h2> Bem vindo ao Handy, <?= $_SESSION["NOME"] ?></h2>
      </div>
      
      <div>
        <fieldset class="fieldset">
          <legend>Cadastrar Serviço</legend>
          <form action="../backend/cadastraServico.php" method="POST">
            
            <select name="servico">
                  <option value="" selected>Selecione uma opção de serviços</option>

                  <?php foreach($servicos as $servico) :?>
                    <option value="<?= $servico['idServico'] ?>"><?= utf8_encode($servico['descricao']) ?></option>
                  <?php endforeach; ?>
            </select>
            
            
            <select name="cidade">
                <option value="" selected>Selecione uma opção de cidade</option>
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

            <input type="submit" value="+ Adicionar">
          </form>
        </fieldset>
      </div>

      <div class="lista-servicos">
        <table class="table-servicos" cellspacing=0 cellspadding=0>
          <thead>
            <tr>
              <th>&nbsp;</th>
              <th>Serviço</th>
              <th>Cidade Atendimento</th>
              <th>Remover</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($servicoUsuario as $servicoUser) :?>
              <tr>
                <td>
                  <img class="img-td" src="../fotosUsuarios/<?= $_SESSION["FOTO"] ?>">
                </td>
                <td><?= utf8_encode($servicoUser['descricao']) ?></td>
                <td><?= ($servicoUser['cidade_atendimento']) ?></td>
                <td><a href="../backend/deleteServicosUsuario.php?idServicoUsuario=<?= $servicoUser['idUsuarioServicos'] ?>" style="color:red;text-decoration:none;font-weight:bold">X</a></td>
              </tr>
            <?php endforeach; ?>


          </tbody>
        </table>
      </div>
    <div>
    
    <script src="../js/functions.js"></script>
  </body>
</html>