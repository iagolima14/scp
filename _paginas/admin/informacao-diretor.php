<?php include_once ("../../banco_de_dados/conexao.php"); ?>
<?php include_once ("../../_includes/geral/header.inc.php"); ?>
<?php include_once ("../../_includes/admin/controle_acesso_admin.php"); ?>
<?php include_once ("../../_includes/admin/menu_admin.inc.php"); ?>


<?php $opc_anterior = filter_input(INPUT_GET, 'opc_anterior', FILTER_SANITIZE_SPECIAL_CHARS);?>

    <!--INFORMAÇÕES DO DIRETOR DA UNIDADE-->
    <div class="row container">
        <div class="col s12">
            <h5 class="light">Informações do Diretor</h5>
            <hr>
            <p>&nbsp;</p>
            <div class="container">
                <fieldset class="formulario center-align" id="info_diretor" style="padding: 15px; width: 700px; alignment: center; background-color: rgba(235,235,235,0.8)">
                    <legend><img src="../../_imagens/avatar1.png" alt="[imagem]" width="90"></legend>

                    <?php
                        include_once ('../../banco_de_dados/admin/read-info-diretor.php');
                    ?>

                    <!-- BTN com ação VOLTAR para pag de CONSULTA -->
                    <div class="col s12 toolt">
                        <a href="consultar-unidade.php?select_unidades=<?php echo $opc_anterior ?>" class="btn-large tooltipped" data-position="left" data-tooltip="Voltar">
                            <p class="texto_icone">
                                <i class="material-icons" style="font-size: 20px;">reply_all</i>
                                Voltar
                            </p>
                        </a>
                    </div>

                </fieldset>
            </div>



        </div>
    </div>

<?php include_once ("../../_includes/geral/footer.inc.php"); ?>