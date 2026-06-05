<?php 

$op = $_GET['op']; 

if ($op == "novo") { 

?>

<form class="form-horizontal" method="post" action="Controller/controllerTiposBrasao.php" >
<h1>Novo Tipo de Brasão</h1>
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
$brasao = $entityManager->find('TiposBrasao', $id_rec);
$nome = $brasao->getNomeTipoBrasao();
?>

<form class="form-horizontal" method="post" action="Controller/controllerTiposBrasao.php" >
<h1>Edição de Tipo de Brasão</h1>
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $nome ?>" placeholder="Nome" required="">
    </div>
  </div>


  <input name="id" type="hidden" id="id" value="<?php echo $brasao->getIdTipoBrasao(); ?>"/>
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
$brasao = $entityManager->find('TiposBrasao', $id_rec);
?>

<form class="form-horizontal" method="post" action="Controller/controllerTiposBrasao.php" >
<h1>Excluir Tipo de Brasão</h1>
  <div class="alert alert-warning" role="alert">
    Confirma a Exclusão do Tipo de Brasão: <?php echo $brasao->getNomeTipoBrasao(); ?>?
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $brasao->getIdTipoBrasao(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>