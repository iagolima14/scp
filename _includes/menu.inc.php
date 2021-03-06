<header>
    <nav class="deep-orange">
        <div class="nav-wrapper container">
            <a href="tela-admin.php" class="brand-logo light">Sistema Patrimonial</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!--<a href="#" data-target="dropdown2" class="sidenav-trigger"><i class="material-icons">menu</i></a>-->

            <!--<a href="../tela-admin.php" style="display:block"></a>
                <div style="width:280px;height:60px;background-color:#2728aa;float: left; !important;" onclick="location.href='tela-admin.php'"></div>
            -->

            <!-- GRUPO DE OPÇÕES DO NAV (CADASTROS) -->
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="cadastrar-usuario.php">Novo Usuário</a></li>
                <li><a href="cadastrar-unidade.php">Nova Unidade</a></li>
                <li class="divider"></li>
                <li><a href="cadastrar-item.php">Novo Item</a></li>
            </ul>
            <!-- GRUPO DE OPÇÕES DO NAV (CADASTROS) QUANDO DIMINUIR A TELA (MOBILE)-->
            <ul class="sidenav" id="mobile-demo">
                <li><a href="cadastrar-usuario.php">Novo Usuário</a></li>
                <li><a href="cadastrar-unidade.php">Nova Unidade</a></li>
                <li class="divider"></li>
                <li><a href="cadastrar-item.php">Novo Item</a></li>
            </ul>

            <!-- GRUPO DE OPÇÕES DO NAV (CONSULTAS) -->
            <ul id="dropdown2" class="dropdown-content ">
                <li><a href="consultar-usuario.php">Usuários</a></li>
                <li><a href="consultar-unidade.php">Unidades</a></li>
                <li class="divider"></li>
                <li><a href="consultar-item.php">Itens</a></li>
            </ul>
            <!-- GRUPO DE OPÇÕES DO NAV (CADASTROS) QUANDO DIMINUIR A TELA (MOBILE)-->
            <ul class="sidenav" id="mobile-demo">
                <li><a href="consultar-usuario.php">Usuários</a></li>
                <li><a href="consultar-unidade.php">Unidades</a></li>
                <li class="divider"></li>
                <li><a href="consultar-item.php">Itens</a></li>
            </ul>

            <!-- CHAMADA DOS GRUPOS DE OPÇÕES -->
            <div class="nav-wrapper">
                <ul class="right hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#" data-target="dropdown2"><i class="material-icons left">search</i>Consultas<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#" data-target="dropdown1"><i class="material-icons left">account_circle</i>Cadastros<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--SIDENAV LATERAL COM DADOS DO USUÁRIO-->
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background" style="background-color: #26a69a;">
                    <img src='_imagens/office.jpg'>
                </div>
                <a href="_paginas/admin/tela-admin.php"><img class="circle" src='_imagens/avatar1.png'></a>
                <a href="#"><span class="black-text name"><?php echo "$user_name - $user_code"; ?></span></a>
                <a href="#"><span class="black-text email"><?php echo "$user_email"; ?></span></a>
            </div>
        </li>
        <li><a href="#"><i class="material-icons">cloud</i>Endereço teste com link</a></li>
        <li><a href="#"><i class="material-icons"></i></a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader"><i class="material-icons">settings</i>Configurações</a></li>
        <li><a href="#" class="waves-effect"><i class="material-icons">vpn_key</i>Alterar Senha</a></li>
        <li><a href="#" class="waves-effect"><i class="material-icons">visibility</i>Log de Acesso</a></li>
        <li><a href="_paginas/geral/logout.php" class="waves-effect"><i class="material-icons" style="color: red;">cancel</i>Sair</a>
        </li>
    </ul>
    <a href="#" data-target="slide-out" data-activates="slide-out" class="sidenav-trigger  show-on-large">
        <i class="material-icons" style="margin: -55px 0px 0px 20px;position: absolute;font-size: 50px;color: #818181">account_circle</i>
    </a>

</header>
<main>