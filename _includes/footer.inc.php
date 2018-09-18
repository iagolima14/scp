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
    M.AutoInit();
</script>



<!--INÍCIO DO RODAPÉ-->
<footer class="page-footer deep-orange">

    <div class="footer-copyright">
        <div class="container">
            © 2018 SEAP - Secretaria de Administração Penitenciária e Ressocialização
            <a class="grey-text text-lighten-4 right" href="_paginas/admin/tela-admin.php"><i class="material-icons"></i>Home</a>
        </div>
    </div>
</footer>
<!--FIM DO RODAPÉ-->



</body>
</html>