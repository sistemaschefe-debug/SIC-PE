<?php 

$op = $_GET['op']; 

if ($op == "novo") { 

?>

<form class="form-horizontal" method="post" action="Controller/controllerCorpo.php" >
<h1>Novo Corpo</h1>
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required="">
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
$corpo = $entityManager->find('Corpo', $id_rec);
$nome = $corpo->getNomeCorpo();
?>

<form class="form-horizontal" method="post" action="Controller/controllerCorpo.php" >
<h1>Edição de Corpo</h1>
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $nome ?>" placeholder="Nome" required="">
    </div>
  </div>


  <input name="id" type="hidden" id="id" value="<?php echo $corpo->getIdCorpo(); ?>"/>
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
$corpo = $entityManager->find('Corpo', $id_rec);
?>

<form class="form-horizontal" method="post" action="Controller/controllerCorpo.php" >
<h1>Excluir Corpo</h1>
  <div class="alert alert-warning" role="alert">
    Confirma a Exclusão do Corpo <?php echo $corpo->getNomeCorpo(); ?>?
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $corpo->getIdCorpo(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>