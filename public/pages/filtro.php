<?php

require_once('../backend/init.php');

$servicos = arrayServicos();

$arrayPrestadores = [];

if (isset($_GET['buscar'])) {

    $arrayPrestadores = arrayPrestadores($_POST['servico'], $_POST['cidade']);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Handy</title>

    <link rel="stylesheet" href="../css/filtro.css">
    <link rel="stylesheet" href="../css/menus.css">
   

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Cormorant+Upright:wght@700&family=Lora:wght@700&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <link rel="sortcut icon" href="../images/favicon.ico" type="image/x-icon" />

</head>

<body>
    
    <?php include_once('menu.php') ?>

    <main>
        <form class="filtro" action="filtro.php?buscar" method="post">
        <div >
            <label for="prof">Profisional</label>
            <select id="prof" name="servico" required>
                <option value="" selected>Selecione ...</option>
                <?php foreach($servicos as $servico) :?>
                    <option value="<?= $servico['idServico'] ?>"><?= utf8_encode($servico['descricao']) ?></option>
                  <?php endforeach; ?>
            </select>

            <label for="cidades">Cidades</label>
            <select id="cidades" name="cidade" required>
            <option value="" selected>Selecione ...</option>
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

            <button class="busca" type="submit" >BUSCAR</button>

            

        </div>

            <?php if(isset($_GET['buscar'])): ?>
                <?php if(sizeof($arrayPrestadores) > 0): ?>

                <?php foreach($arrayPrestadores as $prestador) :?>
                    
                    <div class="user" id="user1">
                        <div>
                            <img class="img-td" src="../fotosUsuarios/<?= $prestador['foto'] ?>">
                        </div>
                        <div>    
                            <p class="name" id="name1">Nome: <?= $prestador['nome'] ?></p>
                            <p class="idade" id="idade1">Idade: <?= $prestador['idade'] ?></p>
                            
                            <p class="serviço" id="servico1">Serviço: <?= $prestador['servico'] ?></p>

                            <p class="coment" id="coment1">Telefone: <?= $prestador['telefone'] ?></p>
                            <p class="coment" id="coment1">Email: <?= $prestador['email'] ?> </p>

                            <p class="cidAt" id="cidAt1">Cidade Atendimento: <?= $prestador['cidade_atendimento'] ?></p>
                            
                        </div>
                    </div>


                <?php endforeach; ?>


                <?php else: ?>
                    <div class="user" id="user1">
                        <div>  
                            <p class="name" id="name1">Prestadores não encontrados</p>                         
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        
        </form>

    </main>

    <script src="../js/functions.js"></script>
</body>

</html>