<?php
if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['idUsuario']) && isset($_SESSION['nivel'])) {

    $sessionid = $_SESSION['idUsuario'];
} else {

    session_unset();
    session_destroy();
    header("Location: login.php");
}
require "config.php";

$usuario_logado = $entityManager->find('Usuarios', $sessionid);
$nivel = $usuario_logado->getNivel();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Cadastro de Veículos</title>


        <!-- Bootstrap -->
        <link href="Libs/css/bootstrap.min.css" rel="stylesheet">
        <link href="View/css/estilo.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="Libs/datatable/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="Libs/datatable/css/dataTables.responsive.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body onLoad="setupZoom()">
        <div class="fundo">
            <div class="row" id="menu">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">



                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Navegação</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php"><img alt="Top Nerds" src="View/img/indice.png"></a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <?php if ($nivel == 2) { ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuários <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarUsuarios">Listar Usuários</a></li>
                                                <li><a href="?pagina=formUsuario&op=novo">Novo Usuário</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Corpos <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarCorpos">Listar Corpos</a></li>
                                                <li><a href="?pagina=formCorpo&op=novo">Novo Corpo</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Setores <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarSetores">Listar Setores</a></li>
                                                <li><a href="?pagina=formSetor&op=novo">Novo Setor</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Armas <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarArmas">Listar Armas</a></li>
                                                <li><a href="?pagina=formArma&op=novo">Nova Arma</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipo de Brasão <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarTiposBrasao">Listar Tipos</a></li>
                                                <li><a href="?pagina=formTiposBrasao&op=novo">Novo Tipo</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pessoas <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarPessoas">Listar Pessoas</a></li>
                                                <li><a href="?pagina=formPessoa&op=nova">Nova Pessoa</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Veículos <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarVeiculos">Listar Veículos</a></li>
                                                <li><a href="?pagina=formVeiculo&op=novo">Novo Veículo</a></li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php if ($nivel != 2) { ?>
                                        <li><a href="?pagina=listarVeiculos">Veículos</a></li>
                                    <?php } ?>
                                    <?php if ($nivel == 3) { ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pessoas <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="?pagina=listarPessoas">Listar Pessoas</a></li>
                                                <li><a href="?pagina=formPessoa&op=nova">Nova Pessoa</a></li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <li><a href="?pagina=listarNotificacoes">Notificações</a></li>
                                    <li><a href="logout.php">Sair</a></li>
                                </ul>
                                <p class="navbar-text navbar-right"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo utf8_encode($usuario_logado->getCodPosto()->getNomePosto()) . " " . $usuario_logado->getNomeGuerra(); ?></p>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- final Navbar -->
            </div><!-- final row menu -->




            <?php
            // Define uma lista com os arquivos que poderão ser chamados na URL

            if ($nivel == 2) {
                $permitidos = array('listarUsuarios', 'listarArmas', 'listarTiposBrasao', 'formTiposBrasao', 'formArma', 'formUsuario', 'listarCorpos', 'formCorpo', 'listarPessoas', 'formPessoa', 'listarVeiculos', 'formVeiculo', 'listarNotificacoes', 'formNotificacao', 'listarSetores', 'formSetor');
            } else if ($nivel == 3) {
                $permitidos = array('listarVeiculos', 'formVeiculo', 'listarNotificacoes', 'formNotificacao', 'listarPessoas', 'formPessoa');
            } else {
                $permitidos = array('listarVeiculos', 'formVeiculo', 'listarNotificacoes', 'formNotificacao');
            }
            // Verifica se a variável $_GET['pagina'] existe e se ela faz parte da lista de arquivos permitidos
            if (isset($_GET['pagina']) AND ( array_search($_GET['pagina'], $permitidos) !== false)) {
                // Pega o valor da variável $_GET['pagina']
                $arquivo = $_GET['pagina'];
            } else {
                // Se não existir variável $_GET ou ela não estiver na lista de permissões, define um valor padrão
                if ($nivel == 2) {
                    $arquivo = 'listarUsuarios';
                } else if ($nivel == 3) {
                    $arquivo = 'listarPessoas';
                } else {
                    $arquivo = 'listarVeiculos';
                }
            }
            include ("View/" . $arquivo . ".php"); // Inclui o arquivo
            ?>

            <div class="row" id="footer">
                <div class="col-md-12">
                    <hr>
                    2013 a <?php echo date("Y"); ?> Desenvolvido por 2º Sgt Fábio Bastos <b>Schneider</b>
                </div> 
            </div>
        </div><!-- final container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="Libs/js/jquery-1.11.2.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="Libs/js/bootstrap.min.js"></script>
        <script src="View/js/scripts.js"></script>

        <!-- Setando JavaScript do FancyZoom -->
        <script src="Libs/fancyzoom/js-global/FancyZoom.js" type="text/javascript"></script>
        <script src="Libs/fancyzoom/js-global/FancyZoomHTML.js" type="text/javascript"></script>

        <!-- DataTables JavaScript -->
        <script src="Libs/datatable/js/jquery.dataTables.min.js"></script>
        <script src="Libs/datatable/js/dataTables.bootstrap.min.js"></script>
        <script src="Libs/datatable/js/date-eu.js"></script>
        <script>
        $(document).ready(function() {
        $('#tabela').DataTable({
        "oLanguage": {
        "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registro(s)",
                "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sSearch": "Pesquisar: ",
                "oPaginate": {
                "sFirst": "Início",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                }
        },
                "aaSorting": [[0, 'desc']],
                "columnDefs": [
<?php if (isset($_GET['pagina']) && ($_GET['pagina'] == 'listarNotificacoes')) { ?>
                    {"sType": "date-eu", "aTargets": [0]}
<?php } else { ?>
                    {"sType": "num-html", "aTargets": [0]}
<?php } ?>
                ],
                responsive: true
        });
        }
        );
        </script>
    </body>
</html>