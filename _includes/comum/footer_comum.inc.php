</main>





<!--ARQUIVOS JQUERY JAVASCRIPT-->
<script type="text/javascript" src="../../_materialize/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../_materialize/js/materialize.min.js"></script>

<!--INICIALIZAÇÃO JQUERY-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".dropdown-trigger").dropdown();
    })
</script>

<!--FUNÇÃO PARA CHAMAR A PÁGINA RELATÓRIO SETORES-->
<script type="text/javascript">
    function chama_pagina(id) {
        location.href='relatorio-setores.php?id_setor='+id;
    }
</script>
<!--FUNÇÃO PARA IMPRESSÃO DOS RELATÓRIOS-->
<script type="text/javascript">
    function imprimir(para) {
    var conteudo = document.getElementById(para).innerHTML,
    tela_impressao = window.open('about:blank');
    tela_impressao.document.write(conteudo);
    tela_impressao.window.print();
}
</script>
<!--INICIALIZAÇÃO DO JQUERY DO SELECT NO FORM DO CADASTRO DA UNIDADE-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('select').formSelect();
    });
</script>


<!--INICIALIZAÇÃO COLAPSO DE MENU RESPONSIVO-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
    });

    // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
    //var collapsibleElem = document.querySelector('.collapsible');
    //var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

    // Or with jQuery

    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tooltipped');
        var instances = M.Tooltip.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });
</script>

<script>
    $('#textarea1').val('New Text');
    M.textareaAutoResize($('#textarea1'));
</script>

<script>
    M.AutoInit();
</script>

<!--BLOQUEIA O DUPLO ENVIO DO SUBMIT-->
<script>
    var submited = false;
    function checkSubmit() {
        if (!submited) {
            submited = true;
            return true;
        }
        else {
            return false;
        }
    }
</script>

<!--EXIBE A DIV BLOQUEADA-->

<!--INÍCIO DO RODAPÉ-->
<footer class="page-footer deep-orange">

    <div class="footer-copyright">
        <div class="container center">
            © 2018 SEAP - Secretaria de Administração Penitenciária e Ressocialização
        </div>
    </div>
</footer>
<!--FIM DO RODAPÉ-->



</body>
</html>