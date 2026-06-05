<?php 

$op = $_GET['op']; 

if ($op == "novo") { 

?>

<form class="form-horizontal" method="post" action="Controller/controllerVeiculo.php" >
<h1>Novo Veículo</h1>

<div class="form-group">
    <label for="tipo_brasao" class="col-sm-2 control-label">Tipo de Brasao</label>
    <div class="col-sm-10">
<select name="tipo_brasao" id="tipo_brasao" class="form-control">
<?php
$q = $entityManager->createQuery("select t from TiposBrasao t");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdTipoBrasao();
$nome = $row->getNomeTipoBrasao();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="nr_brasao" class="col-sm-2 control-label">Nr do Brasão</label>
    <div class="col-sm-10">
    <input type="text" name="nr_brasao" class="form-control" id="nr_brasao" placeholder="Nr do Brasão" required="">
    </div>
</div>

<div class="form-group">
    <label for="responsavel" class="col-sm-2 control-label">Responsável</label>
    <div class="col-sm-10">
<select name="responsavel" id="responsavel" class="form-control">
<?php
$q = $entityManager->createQuery("select p from Pessoas p order by p.codPosto ASC, p.nomeCompleto ASC");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdPessoa();
$nome = $row->getNomeCompleto() . " - " . utf8_encode($row->getCodPosto()->getNomePosto());
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

  <div class="form-group">
    <label for="marca" class="col-sm-2 control-label">Marca</label>
    <div class="col-sm-10">
      <input type="text" name="marca" class="form-control" id="marca" placeholder="Marca" required="">
    </div>
  </div>
  
    <div class="form-group">
    <label for="modelo" class="col-sm-2 control-label">Modelo</label>
    <div class="col-sm-10">
      <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Modelo">
    </div>
  </div>
  
  <div class="form-group">
    <label for="cor" class="col-sm-2 control-label">Cor</label>
    <div class="col-sm-10">
      <input type="text" name="cor" class="form-control" id="cor" placeholder="Cor" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="placa" class="col-sm-2 control-label">Placa</label>
    <div class="col-sm-10">
      <input type="text" name="placa" class="form-control" id="placa" placeholder="Placa" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="ano_modelo" class="col-sm-2 control-label">Ano / Modelo</label>
    <div class="col-sm-10">
      <input type="text" name="ano_modelo" class="form-control" id="ano_modelo" placeholder="Ano / Modelo" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="ano_modelo" class="col-sm-2 control-label">Observação</label>
    <div class="col-sm-10">
      <input type="text" name="observacao" class="form-control" id="ano_modelo" placeholder="Observação" required="">
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
$veiculo = $entityManager->find('VeiculosIdentificados', $id_rec);

$id = $veiculo->getIdVeiculoIdentificado();
$cod_tipo_brasao = $veiculo->getCodTipoBrasao()->getIdTipoBrasao();
$tipo_brasao = $veiculo->getCodTipoBrasao()->getNomeTipoBrasao();
$nr_brasao = $veiculo->getNrBrasao();
$cod_responsavel = $veiculo->getCodPessoa()->getIdPessoa();
$responsavel = $veiculo->getCodPessoa()->getNomeCompleto() . " - " . utf8_encode($veiculo->getCodPessoa()->getCodPosto()->getNomePosto());
$marca = $veiculo->getMarca();
$modelo = $veiculo->getModelo();
$cor = $veiculo->getCor();
$placa = $veiculo->getPlaca();
$ano_modelo = $veiculo->getAnoModelo();
$dataCadAlt = $veiculo->getDataCadAlt();
$obs = $veiculo->getObservacao();
?>

<form class="form-horizontal" method="post" action="Controller/controllerVeiculo.php" >
<h1>Edição de Veículo</h1>
  <div class="form-group">
    <label for="tipo_brasao" class="col-sm-2 control-label">Tipo de Brasao</label>
    <div class="col-sm-10">
<select name="tipo_brasao" id="tipo_brasao" class="form-control">
<option value="<?php echo $cod_tipo_brasao; ?>"><?php echo $tipo_brasao; ?></option>
<?php
$q = $entityManager->createQuery("select t from TiposBrasao t");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdTipoBrasao();
$nome = $row->getNomeTipoBrasao();
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="nr_brasao" class="col-sm-2 control-label">Nr do Brasão</label>
    <div class="col-sm-10">
    <input type="text" name="nr_brasao" class="form-control" value="<?php echo $nr_brasao; ?>" id="nr_brasao" placeholder="Nr do Brasão" required="">
    </div>
</div>

<div class="form-group">
    <label for="responsavel" class="col-sm-2 control-label">Responsável</label>
    <div class="col-sm-10">
<select name="responsavel" id="responsavel" class="form-control">
<option value="<?php echo $cod_responsavel; ?>"><?php echo $responsavel; ?></option>
<?php
$q = $entityManager->createQuery("select p from Pessoas p order by p.codPosto ASC, p.nomeCompleto ASC");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdPessoa();
$nome = $row->getNomeCompleto() . " - " . utf8_encode($row->getCodPosto()->getNomePosto());
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

  <div class="form-group">
    <label for="marca" class="col-sm-2 control-label">Marca</label>
    <div class="col-sm-10">
      <input type="text" name="marca" class="form-control" id="marca" value="<?php echo $marca; ?>" placeholder="Marca" required="">
    </div>
  </div>
  
    <div class="form-group">
    <label for="modelo" class="col-sm-2 control-label">Modelo</label>
    <div class="col-sm-10">
      <input type="text" name="modelo" class="form-control" id="modelo" value="<?php echo $modelo; ?>" placeholder="Modelo">
    </div>
  </div>
  
  <div class="form-group">
    <label for="cor" class="col-sm-2 control-label">Cor</label>
    <div class="col-sm-10">
      <input type="text" name="cor" class="form-control" id="cor" value="<?php echo $cor; ?>" placeholder="Cor" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="placa" class="col-sm-2 control-label">Placa</label>
    <div class="col-sm-10">
      <input type="text" name="placa" class="form-control" id="placa" value="<?php echo $placa; ?>" placeholder="Placa" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="ano_modelo" class="col-sm-2 control-label">Ano / Modelo</label>
    <div class="col-sm-10">
      <input type="text" name="ano_modelo" class="form-control" id="ano_modelo" value="<?php echo $ano_modelo; ?>" placeholder="Ano / Modelo" required="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="ano_modelo" class="col-sm-2 control-label">Observação</label>
    <div class="col-sm-10">
      <input type="text" name="observacao" class="form-control" id="ano_modelo" value="<?php echo $obs; ?>" placeholder="Observação" required="">
    </div>
  </div>
  
  <input name="id" type="hidden" id="id" value="<?php echo $veiculo->getIdVeiculoIdentificado(); ?>"/>
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
$veiculo = $entityManager->find('VeiculosIdentificados', $id_rec);
?>

<form class="form-horizontal" method="post" action="Controller/controllerVeiculo.php" >
<h1>Excluir Veículo</h1>
  <div class="alert alert-warning" role="alert">
    Confirma a Exclusão do Veículo <?php echo $veiculo->getMarca() . " " . $veiculo->getModelo() . ", Placa: " . $veiculo->getPlaca(); ?> pertencente ao <?php echo utf8_encode($veiculo->getCodPessoa()->getCodPosto()->getNomePosto()) . " " . $veiculo->getCodPessoa()->getNomeCompleto(); ?>?
  </div>

  <input name="id" type="hidden" id="id" value="<?php echo $veiculo->getIdVeiculoIdentificado(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>

<?php 
if ($op == "upload_imagem") { 
$id = $_GET['id'];

$veiculo = $entityManager->find('VeiculosIdentificados', $id);
$id_veiculo = $veiculo->getIdVeiculoIdentificado();
$nome_veiculo = $veiculo->getMarca() . " " . $veiculo->getModelo() . ", Placa: " . $veiculo->getPlaca() . " pertencente ao " . utf8_encode($veiculo->getCodPessoa()->getCodPosto()->getNomePosto()) . " " . $veiculo->getCodPessoa()->getNomeCompleto(); 

?>
    <form class="form-horizontal" method="post" action="Controller/controllerVeiculo.php" enctype="multipart/form-data">
	<h1>Envio de Documento do Veículo</h1>
    <div class="alert alert-warning" role="alert">
    Enviando Imagem da documentação do Veículo <?php echo $nome_veiculo; ?>.
    </div>
    <div class="form-group">
    <label for="arquivo" class="col-sm-2 control-label">Selecione a Imagem</label>
    <div class="col-sm-10">
    <input type="file" name="arquivo" class="form-control" required="">
    </div>
  </div>
  <input name="id" type="hidden" id="id" value="<?php echo $id_veiculo ?>">
  <input name="acao" type="hidden" id="acao" value="upload_imagem"/>
	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </div>
    </form>
<?php } ?>