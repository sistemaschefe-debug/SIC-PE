<?php 

$op = $_GET['op']; 

if ($op == "novo") { 
?>

<form class="form-horizontal" method="post" action="Controller/controllerSetor.php" >
<h1>Novo Setor</h1>
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required="">
    </div>
  </div>
  
<div class="form-group">
    <label for="corpo" class="col-sm-2 control-label">Corpo</label>
    <div class="col-sm-10">
<select name="corpo" id="corpo" class="form-control">
<?php
$q = $entityManager->createQuery("select c from Corpo c");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdCorpo();
$nome = $row->getNomeCorpo();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
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
$setor = $entityManager->find('Setor', $id_rec);
$nome = $setor->getNomeSetor();
$cod_corpo = $setor->getCodCorpo()->getIdCorpo();
$nome_corpo = $setor->getCodCorpo()->getNomeCorpo();
?>

<form class="form-horizontal" method="post" action="Controller/controllerSetor.php" >
<h1>Edição de Setor</h1>
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $nome ?>" placeholder="Nome" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="corpo" class="col-sm-2 control-label">Corpo</label>
    <div class="col-sm-10">
<select name="corpo" id="corpo" class="form-control">
<option value="<?php echo $cod_corpo; ?>"><?php echo $nome_corpo; ?></option>
<?php
$q = $entityManager->createQuery("select c from Corpo c");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdCorpo();
$nome = $row->getNomeCorpo();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>


  <input name="id" type="hidden" id="id" value="<?php echo $setor->getIdSetor(); ?>"/>
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
$setor = $entityManager->find('Setor', $id_rec);
?>

<form class="form-horizontal" method="post" action="Controller/controllerSetor.php" >
<h1>Excluir Setor</h1>
  <div class="alert alert-warning" role="alert">
    Confirma a Exclusão do Setor <?php echo $setor->getNomeSetor(); ?>?
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $setor->getIdSetor(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>