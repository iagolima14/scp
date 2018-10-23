<header>
    <nav class="deep-orange">
        <div class="nav-wrapper container">
            <a href="tela-comum.php" class="brand-logo light">Sistema Patrimonial</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <!--SIDENAV LATERAL COM DADOS DO USUÁRIO-->
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background" style="background-color: #26a69a;">
                    <img src='../../_imagens/office.jpg'>
                </div>
                <a href="../../_paginas/comum/tela-comum.php"><img class="circle" src='../../_imagens/avatar1.png'></a>
                <a href="#"><span class="black-text name"><?php echo "$user_name - $user_code"; ?></span></a>
                <a href="#"><span class="black-text email"><?php echo "$user_email"; ?></span></a>
                <a href="#"><span class="black-text email"><?php echo "$nome_unidade_user"; ?></span></a>
            </div>
        </li>
        <li><a href="#"><i class="material-icons">cloud</i>Endereço teste com link</a></li>
        <li><a href="#"><i class="material-icons"></i></a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader"><i class="material-icons">settings</i>Configurações</a></li>
        <li><a href="alterar-senha.php" class="waves-effect"><i class="material-icons">vpn_key</i>Alterar Senha</a></li>
        <li><a href="#" class="waves-effect"><i class="material-icons">visibility</i>Log de Acesso</a></li>
        <li><a href="../../_paginas/geral/logout.php" class="waves-effect"><i class="material-icons" style="color: red;">cancel</i>Sair</a>
        </li>
    </ul>
    <a href="#" data-target="slide-out" data-activates="slide-out" class="sidenav-trigger  show-on-large">
        <i class="material-icons" style="margin: -55px 0px 0px 20px;position: absolute;font-size: 50px;color: #818181">account_circle</i>
    </a>

</header>
