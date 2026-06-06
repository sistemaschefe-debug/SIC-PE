<?php 

$op = $_GET['op']; 

if ($op == "nova") { 

?>

<form class="form-horizontal" method="post" action="Controller/controllerPessoa.php" >
<h1>Nova Pessoa</h1>

<div class="form-group">
    <label for="posto" class="col-sm-2 control-label">Posto / Grad</label>
    <div class="col-sm-10">
<select name="posto" id="posto" class="form-control">
<?php
$q = $entityManager->createQuery("select p from Posto p");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdPosto();
$nome = $row->getNomePosto();
?>
<option value="<?php echo $id; ?>"><?php echo mb_convert_encoding($nome, 'UTF-8', 'ISO-8859-1'); ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="arma" class="col-sm-2 control-label">Arma</label>
    <div class="col-sm-10">
<select name="arma" id="arma" class="form-control">
<?php
$q = $entityManager->createQuery("select a from Arma a");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdArma();
$nome = $row->getNomeArma();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
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
    <label for="nome" class="col-sm-2 control-label">Nome de Guerra</label>
    <div class="col-sm-10">
      <input type="text" name="nome_guerra" class="form-control" id="nome_guerra" placeholder="Nome de Guerra">
    </div>
  </div>
  
  <div class="form-group">
    <label for="identidade" class="col-sm-2 control-label">Identidade</label>
    <div class="col-sm-10">
      <input type="text" name="identidade" class="form-control" id="identidade" placeholder="Identidade" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="data" class="col-sm-2 control-label">Telefone</label>
    <div class="col-sm-10">
      <input type="text" name="telefone" class="form-control" id="telefone" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeTel('telefone')" maxlength="14" placeholder="Telefone" required="">
    </div>
  </div>
  
<div class="form-group">
    <label for="setor" class="col-sm-2 control-label">Setor</label>
    <div class="col-sm-10">
<select name="setor" id="setor" class="form-control">
<?php
$q = $entityManager->createQuery("select s from Setor s");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdSetor();
$nome = $row->getNomeSetor();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="ramal" class="col-sm-2 control-label">Ramal</label>
    <div class="col-sm-10">
      <input type="text" name="ramal" class="form-control" id="ramal" onkeypress="return SomenteNumero(event)" placeholder="Ramal">
    </div>
  </div>
  
<div class="form-group">
    <label for="cnh" class="col-sm-2 control-label">CNH</label>
    <div class="col-sm-10">
      <input type="text" name="cnh" class="form-control" id="cnh" onkeypress="return SomenteNumero(event)" placeholder="CNH" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="categoria" class="col-sm-2 control-label">Categoria</label>
    <div class="col-sm-10">
      <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="validade" class="col-sm-2 control-label">Validade da CNH</label>
    <div class="col-sm-10">
      <input type="text" name="validade" class="form-control" id="validade" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('validade')" maxlength="10" placeholder="Validade da CNH" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="endereco" class="col-sm-2 control-label">Endereço</label>
    <div class="col-sm-10">
      <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" required="">
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
$pessoa = $entityManager->find('Pessoas', $id_rec);

$cod_posto = $pessoa->getCodPosto()->getIdPosto();
$nome_posto = $pessoa->getCodPosto()->getNomePosto();
$cod_arma = $pessoa->getCodArma()->getIdArma();
$nome_arma = $pessoa->getCodArma()->getNomeArma();
$nomeCompleto = $pessoa->getNomeCompleto();
$nome_guerra = $pessoa->getNomeGuerra();
$identidade = $pessoa->getIdentidade();
$telefone = $pessoa->getTelefoneResidencial();
$cod_setor = $pessoa->getCodSetor()->getIdSetor();
$nome_setor = $pessoa->getCodSetor()->getNomeSetor();
$ramal = $pessoa->getRamal();
$cnh = $pessoa->getHabilitacao();
$categoria = $pessoa->getCategoria();
$validade = $pessoa->getValidadeHabilitacao();
$endereco = $pessoa->getEndereco();
?>

<form class="form-horizontal" method="post" action="Controller/controllerPessoa.php" >
<h1>Edição de Pessoa</h1>
  <div class="form-group">
    <label for="posto" class="col-sm-2 control-label">Posto / Grad</label>
    <div class="col-sm-10">
<select name="posto" id="posto" class="form-control">
<option value="<?php echo $cod_posto; ?>"><?php echo mb_convert_encoding($nome_posto, 'UTF-8', 'ISO-8859-1'); ?></option>
<?php
$q = $entityManager->createQuery("select p from Posto p");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdPosto();
$nome = $row->getNomePosto();
?>
<option value="<?php echo $id; ?>"><?php echo mb_convert_encoding($nome, 'UTF-8', 'ISO-8859-1'); ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="arma" class="col-sm-2 control-label">Arma</label>
    <div class="col-sm-10">
<select name="arma" id="arma" class="form-control">
<option value="<?php echo $cod_arma; ?>"><?php echo $nome_arma; ?></option>
<?php
$q = $entityManager->createQuery("select a from Arma a");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdArma();
$nome = $row->getNomeArma();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome Completo</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $nomeCompleto; ?>" placeholder="Nome Completo" required="">
    </div>
  </div>
  
    <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome de Guerra</label>
    <div class="col-sm-10">
      <input type="text" name="nome_guerra" class="form-control" id="nome_guerra" value="<?php echo $nome_guerra; ?>" placeholder="Nome de Guerra">
    </div>
  </div>
  
  <div class="form-group">
    <label for="identidade" class="col-sm-2 control-label">Identidade</label>
    <div class="col-sm-10">
      <input type="text" name="identidade" class="form-control" id="identidade" value="<?php echo $identidade; ?>" placeholder="Identidade" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="data" class="col-sm-2 control-label">Telefone</label>
    <div class="col-sm-10">
      <input type="text" name="telefone" class="form-control" id="telefone" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeTel('telefone')" value="<?php echo $telefone; ?>" maxlength="14" placeholder="Telefone" required="">
    </div>
  </div>
  
<div class="form-group">
    <label for="setor" class="col-sm-2 control-label">Setor</label>
    <div class="col-sm-10">
<select name="setor" id="setor" class="form-control">
<option value="<?php echo $cod_setor; ?>"><?php echo $nome_setor; ?></option>
<?php
$q = $entityManager->createQuery("select s from Setor s");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdSetor();
$nome = $row->getNomeSetor();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="ramal" class="col-sm-2 control-label">Ramal</label>
    <div class="col-sm-10">
      <input type="text" name="ramal" class="form-control" id="ramal" onkeypress="return SomenteNumero(event)" value="<?php echo $ramal; ?>" placeholder="Ramal">
    </div>
  </div>
  
<div class="form-group">
    <label for="cnh" class="col-sm-2 control-label">CNH</label>
    <div class="col-sm-10">
      <input type="text" name="cnh" class="form-control" id="cnh" onkeypress="return SomenteNumero(event)" value="<?php echo $cnh; ?>" placeholder="CNH" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="categoria" class="col-sm-2 control-label">Categoria</label>
    <div class="col-sm-10">
      <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria" value="<?php echo $categoria; ?>" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="endereco" class="col-sm-2 control-label">Endereço</label>
    <div class="col-sm-10">
      <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" value="<?php echo $endereco; ?>" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="validade" class="col-sm-2 control-label">Validade da CNH</label>
    <div class="col-sm-10">
      <input type="text" name="validade" class="form-control" id="validade" onkeypress="return SomenteNumero(event)" value="<?php echo $validade->format('d/m/Y'); ?>" onkeyup="javascript:makeDate('validade')" maxlength="10" placeholder="Validade da CNH" required="">
    </div>
  </div>
  
  <input name="id" type="hidden" id="id" value="<?php echo $pessoa->getIdPessoa(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="editar"/>
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
$pessoa = $entityManager->find('Pessoas', $id_rec);
?>

<form class="form-horizontal" method="post" action="Controller/controllerPessoa.php" >
<h1>Excluir Pessoa</h1>
  <div class="alert alert-warning" role="alert">
    Confirma a Exclusão de <?php echo $pessoa->getNomeCompleto(); ?>?
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $pessoa->getIdPessoa(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>