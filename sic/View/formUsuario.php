<?php 

$op = $_GET['op']; 

if ($op == "novo") { 

?>

<form class="form-horizontal" method="post" action="Controller/controllerUsuario.php" >
<h1>Novo Usuário</h1>

<div class="form-group">
    <label for="posto" class="col-sm-2 control-label">Posto / Grad</label>
    <div class="col-sm-10">
<select name="posto" id="posto" class="form-control">
<?php
$q = $entityManager->createQuery("select p from Posto p order by p.idPosto ASC");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdPosto();
//$nome_p = ($row->getNomePosto());
$nome_p = mb_convert_encoding($row->getNomePosto(), 'UTF-8', 'ISO-8859-1');

?>
<option value="<?php echo $id; ?>"><?php echo $nome_p; ?></option>
<?php } ?>
</select>
    </div>
</div>

  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome Completo</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="nome_guerra" class="col-sm-2 control-label">Nome de Guerra</label>
    <div class="col-sm-10">
      <input type="text" name="nome_guerra" class="form-control" id="nome_guerra" placeholder="Nome de Guerra" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="identidade" class="col-sm-2 control-label">Identidade</label>
    <div class="col-sm-10">
      <input type="text" name="identidade" class="form-control" id="identidade" onkeypress="return SomenteNumero(event)" placeholder="Identidade" required="">
    </div>
  </div>

  <div class="form-group">
  <label for="nivel" class="col-sm-2 control-label">Nivel</label>
  <div class="col-sm-10">
  <label class="radio-inline">
  <input type="radio" name="nivel" id="nivel1" value="1" checked="checked"> Anotador
  </label>
  <label class="radio-inline">
  <input type="radio" name="nivel" id="nivel2" value="2"> Administrador
  </label>
  <label class="radio-inline">
  <input type="radio" name="nivel" id="nivel3" value="3"> Cmdo Cia PE / Cmdo BCSv
  </label>
  </div>
  </div>
  
  <div class="form-group">
  <label for="situacao" class="col-sm-2 control-label">Situação</label>
  <div class="col-sm-10">
  <label class="radio-inline">
  <input type="radio" name="situacao" id="situacao1" value="1" checked="checked"> Ativo
  </label>
  <label class="radio-inline">
  <input type="radio" name="situacao" id="situacao2" value="2"> Inativo
  </label>
  </div>
  </div>

  <div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Usuário</label>
    <div class="col-sm-10">
      <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="senha" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required="">
    </div>
  </div>

  <input name="acao" type="hidden" id="acao" value="cadastrar"/>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>
</form>
<?php } ?>

<?php
if ($op == "editar") { 
$id_rec = $_GET['id'];
$usuario = $entityManager->find('Usuarios', $id_rec);

$cod_posto = $usuario->getCodPosto()->getIdPosto();
$nome_posto = $usuario->getCodPosto()->getNomePosto();
$identidade = $usuario->getIdentidade();
$nome = $usuario->getNome();
$nome_guerra = $usuario->getNomeGuerra();
$nivel = $usuario->getNivel();
$situacao = $usuario->getSituacao();
$user = $usuario->getUsuario();
?>

<form class="form-horizontal" method="post" action="Controller/controllerUsuario.php" >
<h1>Edição de Usuário</h1>

<div class="form-group">
    <label for="posto" class="col-sm-2 control-label">Posto / Grad</label>
    <div class="col-sm-10">
<select name="posto" id="posto" class="form-control">
<option value="<?php echo $cod_posto; ?>"><?php echo mb_convert_encoding($nome_posto, 'UTF-8', 'ISO-8859-1'); ?></option>
<?php
$q = $entityManager->createQuery("select p from Posto p order by p.idPosto ASC");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdPosto();
//$nome_p =	utf8mb4_general_ci($row->getNomePosto());
$nome_p = mb_convert_encoding($row->getNomePosto(), 'UTF-8', 'ISO-8859-1');
//	utf8mb4_general_ci
?>
<option value="<?php echo $id; ?>"><?php echo $nome_p; ?></option>
<?php } ?>
</select>
    </div>
</div>

  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome Completo</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $nome ?>" placeholder="Nome Completo" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="nome_guerra" class="col-sm-2 control-label">Nome de Guerra</label>
    <div class="col-sm-10">
      <input type="text" name="nome_guerra" class="form-control" id="nome_guerra" value="<?php echo $nome_guerra ?>" placeholder="Nome de Guerra" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="data" class="col-sm-2 control-label">Identidade</label>
    <div class="col-sm-10">
      <input type="text" name="identidade" class="form-control" id="identidade" onkeypress="return SomenteNumero(event)" value="<?php echo $identidade; ?>" placeholder="Identidade" required="">
    </div>
  </div>

  <div class="form-group">
  <label for="nivel" class="col-sm-2 control-label">Nivel</label>
  <div class="col-sm-10">
  <label class="radio-inline">
  <input type="radio" name="nivel" id="nivel1" value="1" <?php echo $nivel == "1" ? "checked=\"checked\"" : ""; ?> > Anotador
  </label>
  <label class="radio-inline">
  <input type="radio" name="nivel" id="nivel2" value="2" <?php echo $nivel == "2" ? "checked=\"checked\"" : ""; ?> > Administrador
  </label>
  <label class="radio-inline">
  <input type="radio" name="nivel" id="nivel3" value="3" <?php echo $nivel == "3" ? "checked=\"checked\"" : ""; ?> > Cmdo Cia PE / Cmdo BCSv
  </label>
  </div>
  </div>
  
  <div class="form-group">
  <label for="nivel" class="col-sm-2 control-label">Situação</label>
  <div class="col-sm-10">
  <label class="radio-inline">
  <input type="radio" name="situacao" id="situacao1" value="1" <?php echo $situacao == "1" ? "checked=\"checked\"" : ""; ?> > Ativo
  </label>
  <label class="radio-inline">
  <input type="radio" name="situacao" id="situacao2" value="2" <?php echo $situacao == "2" ? "checked=\"checked\"" : ""; ?> > Inativo
  </label>
  </div>
  </div>

  <div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Usuário</label>
    <div class="col-sm-10">
      <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $user ?>" placeholder="Usuário" required="">
    </div>
  </div>
  <input name="id" type="hidden" id="id" value="<?php echo $usuario->getIdUsuario(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="editar"/>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>
</form>
<?php } ?>


<?php
if ($op == "editar_senha") { 
$id_rec = $_GET['id'];
$usuario = $entityManager->find('Usuarios', $id_rec);

$senha = $usuario->getSenha();
?>

<form class="form-horizontal" method="post" action="Controller/controllerUsuario.php" >
<h1>Edição de Senha</h1>
<div class="alert alert-warning" role="alert">
    Editando Senha de <?php echo mb_convert_encoding($usuario->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $usuario->getNome(); ?>?
  </div>
  <div class="form-group">
    <label for="senha" class="col-sm-2 control-label">Nova Senha</label>
    <div class="col-sm-10">
      <input type="password" name="senha" class="form-control" id="senha" value="<?php echo $senha ?>" placeholder="Senha" required="">
    </div>
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $usuario->getIdUsuario(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="editar_senha"/>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>
</form>
<?php } ?>


<?php
if ($op == "excluir") { 
$id_rec = $_GET['id'];
$usuario = $entityManager->find('Usuarios', $id_rec);
?>

<form class="form-horizontal" method="post" action="Controller/controllerUsuario.php" >
<h1>Excluir Usuário</h1>
  <div class="alert alert-warning" role="alert">
    Confirma a Exclusão do Usuário <?php echo mb_convert_encoding($usuario->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $usuario->getNome(); ?>?
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $usuario->getIdUsuario(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>