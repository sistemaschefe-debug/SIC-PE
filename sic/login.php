<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro de Veículos</title>

    <!-- Bootstrap -->
    <link href="Libs/css/bootstrap.min.css" rel="stylesheet">
	<link href="View/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  
</head>
<body>
<div class="container">

<form class="login" action="Controller/controllerUsuario.php" method="post">
        <div align="center"><img src="View/img/logo.png" class="img-responsive"/></div>
		<div class="form-group">
		<input type="text" id="retira_carac_esp" maxlength="15" name="usuario" class="form-control" placeholder="Usuário" required="">
        </div>
        <div class="form-group">
		<input type="password" name="senha" maxlength="15" class="form-control" placeholder="Senha" required="">
        </div>
        <input type="hidden" name="acao" value="acessar" />
        <button type="submit" class="btn btn-danger btn-lg btn-block">Entrar</button>
</form>
</div>  	
<script src="Libs/js/jquery-1.11.2.min.js"></script>
<script src="Libs/js/bootstrap.min.js"></script>
<!-- Setando JavaScript que não permite caracteres especiais nos formulários -->
	<script type="text/javascript" src="View/js/jquery.filter_input.js"></script>
    <script type="text/javascript">
    <!--
    $(document).ready(function() {
    $('#retira_carac_esp').filter_input({regex:'[a-zA-Z0-9_]'});
    });
    -->
    </script>
</body>
</html>
