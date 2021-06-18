<?php if(!isset($_SESSION["ID_USUARIO"])) :?>
    <header>

            <!--MENU-->

            <section class="menu">
                <img src="../images/handy_2.png" alt="" srcset="">

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
<?php else: ?>

    <header>

        <!--MENU-->

        <section class="menu">
                <img src="../images/handy_2.png" alt="" srcset="">

                <section class="nav">

                   
                </section>

            
                <a href='../backend/logout.php'> Sair</a>
            

        </section>

    </header>

<?php endif ?>