<?php 

$op = $_GET['op']; 


if ($op == "anotador_notificar") { 
$id_rec = $_GET['id'];
$veiculo = $entityManager->find('VeiculosIdentificados', $id_rec);

$anotador = $entityManager->find('Usuarios', $sessionid);

?>
<form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" >
<h1>Nova Notificação</h1>

<div class="alert alert-warning" role="alert">
    Cadastrando Notificação para o Veículo <?php echo $veiculo->getMarca() . " " . $veiculo->getModelo() . ", Placa: " . $veiculo->getPlaca(); ?> pertencente ao <?php echo mb_convert_encoding($veiculo->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $veiculo->getCodPessoa()->getNomeCompleto(); ?>?
</div>

<div class="form-group">
    <label for="nr_brasao" class="col-sm-2 control-label">Local da Notificação</label>
    <div class="col-sm-10">
    <input type="text" name="local_notificacao" class="form-control" id="local_notificacao" placeholder="Local da Notificação" required="">
    </div>
</div>

  <div class="form-group">
    <label for="data_hora" class="col-sm-2 control-label">Data da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="data_notificacao" class="form-control" id="data_notificacao" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('data_notificacao')" maxlength="10" placeholder="Data da Notificação" required="">
    </div>
  </div>

<div class="form-group">
    <label for="data_hora" class="col-sm-2 control-label">Horário da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="hora_notificacao" class="form-control" id="hora_notificacao" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeHora('hora_notificacao')" maxlength="5" placeholder="Horário da Notificação" required="">
    </div>
  </div>    
 
  <div class="form-group">
    <label for="motivo" class="col-sm-2 control-label">Motivo da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="motivo" class="form-control" id="motivo" placeholder="Motivo da Notificação">
    </div>
  </div>
  
  <div class="form-group">
    <label for="prazo_comparecimento" class="col-sm-2 control-label">Prazo para Apresentação</label>
    <div class="col-sm-10">
      <input type="text" name="prazo_comparecimento" class="form-control" id="prazo_comparecimento" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('prazo_comparecimento')" maxlength="10" placeholder="Prazo para Comparecimento" required="">
    </div>
  </div>
  
<input name="veiculo" type="hidden" id="veiculo" value="<?php echo $veiculo->getIdVeiculoIdentificado(); ?>"/>
<input name="anotador" type="hidden" id="anotador" value="<?php echo $anotador->getIdUsuario(); ?>"/>   
<input name="acao" type="hidden" id="acao" value="cadastrar"/>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>
</form>
<?php } ?>

<?php
if ($op == "notificar") { 
$id_rec = $_GET['id'];
$veiculo = $entityManager->find('VeiculosIdentificados', $id_rec);

?>
<form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" >
<h1>Nova Notificação</h1>

<div class="alert alert-warning" role="alert">
    Cadastrando Notificação para o Veículo <?php echo $veiculo->getMarca() . " " . $veiculo->getModelo() . ", Placa: " . $veiculo->getPlaca(); ?> pertencente ao <?php echo mb_convert_encoding($veiculo->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $veiculo->getCodPessoa()->getNomeCompleto(); ?>?
</div>

<div class="form-group">
    <label for="anotador" class="col-sm-2 control-label">Anotador</label>
    <div class="col-sm-10">
<select name="anotador" id="anotador" class="form-control">
<?php
$q = $entityManager->createQuery("select u from Usuarios u where u.nivel = '1' order by u.codPosto ASC, u.nome ASC");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdUsuario();
$nome = $row->getNome() . " - " . mb_convert_encoding($row->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1');
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="nr_brasao" class="col-sm-2 control-label">Local da Notificação</label>
    <div class="col-sm-10">
    <input type="text" name="local_notificacao" class="form-control" id="local_notificacao" placeholder="Local da Notificação" required="">
    </div>
</div>

  <div class="form-group">
    <label for="data_hora" class="col-sm-2 control-label">Data da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="data_notificacao" class="form-control" id="data_notificacao" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('data_notificacao')" maxlength="10" placeholder="Data da Notificação" required="">
    </div>
  </div>

<div class="form-group">
    <label for="data_hora" class="col-sm-2 control-label">Horário da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="hora_notificacao" class="form-control" id="hora_notificacao" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeHora('hora_notificacao')" maxlength="5" placeholder="Horário da Notificação" required="">
    </div>
  </div>    
 
  <div class="form-group">
    <label for="motivo" class="col-sm-2 control-label">Motivo da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="motivo" class="form-control" id="motivo" placeholder="Motivo da Notificação">
    </div>
  </div>
  
  <div class="form-group">
    <label for="prazo_comparecimento" class="col-sm-2 control-label">Prazo para Apresentação</label>
    <div class="col-sm-10">
      <input type="text" name="prazo_comparecimento" class="form-control" id="prazo_comparecimento" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('prazo_comparecimento')" maxlength="10" placeholder="Prazo para Comparecimento" required="">
    </div>
  </div>
  
<input name="veiculo" type="hidden" id="veiculo" value="<?php echo $veiculo->getIdVeiculoIdentificado(); ?>"/>   
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
$notificacao = $entityManager->find('Notificacoes', $id_rec);

$id = $notificacao->getIdNotificacao();
$cod_veiculo = $notificacao->getCodVeiculo()->getIdVeiculoIdentificado();
$veiculo = $notificacao->getCodVeiculo()->getMarca() . " " . $notificacao->getCodVeiculo()->getModelo() . ", Placa: " . $notificacao->getCodVeiculo()->getPlaca() . " pertencente ao " . mb_convert_encoding($notificacao->getCodVeiculo()->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $notificacao->getCodVeiculo()->getCodPessoa()->getNomeCompleto();
$se_apresentou = $notificacao->getSeApresentou();
$local_notificacao = $notificacao->getLocalNotificacao();
$data = $notificacao->getDataNotificacao();
$hora = $notificacao->getHoraNotificacao();
$prazo_comparecimento = $notificacao->getPrazoComparecimento();
$cod_anotador = $notificacao->getAnotador()->getIdUsuario();
$anotador = $notificacao->getAnotador()->getCodPosto()->getNomePosto() . " " . $notificacao->getAnotador()->getNome();
$motivo_notificacao = $notificacao->getMotivoNotificacao();

?>

<form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" >
<h1>Edição de Notificação</h1>
    <div class="alert alert-warning" role="alert">
    Editando Notificação para o Veículo <?php echo $veiculo ?>
  </div>

<div class="form-group">
    <label for="anotador" class="col-sm-2 control-label">Anotador</label>
    <div class="col-sm-10">
<select name="anotador" id="anotador" class="form-control">
<option value="<?php echo $cod_anotador; ?>"><?php echo $anotador; ?></option>
<?php
$q = $entityManager->createQuery("select u from Usuarios u where u.nivel = '1' order by u.codPosto ASC, u.nome ASC");
$results = $q->getResult();
foreach ($results as $row) { 
$id = $row->getIdUsuario();
$nome = $row->getNome() . " - " . mb_convert_encoding($row->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1');
?>
<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
<?php } ?>
</select>
    </div>
</div>

<div class="form-group">
    <label for="nr_brasao" class="col-sm-2 control-label">Local da Notificação</label>
    <div class="col-sm-10">
    <input type="text" name="local_notificacao" class="form-control" id="local_notificacao" value="<?php echo $local_notificacao; ?>" placeholder="Local da Notificação" required="">
    </div>
</div>

  <div class="form-group">
    <label for="data_hora" class="col-sm-2 control-label">Data da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="data_notificacao" class="form-control" id="data_notificacao" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('data_notificacao')" maxlength="10" value="<?php echo $data->format('d/m/Y'); ?>" placeholder="Data da Notificação" required="">
    </div>
  </div>

<div class="form-group">
    <label for="data_hora" class="col-sm-2 control-label">Horário da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="hora_notificacao" class="form-control" id="hora_notificacao" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeHora('hora_notificacao')" value="<?php echo $hora; ?>" maxlength="5" placeholder="Horário da Notificação" required="">
    </div>
  </div>
    
  <div class="form-group">
    <label for="motivo" class="col-sm-2 control-label">Motivo da Notificação</label>
    <div class="col-sm-10">
      <input type="text" name="motivo" class="form-control" id="motivo" value="<?php echo $motivo_notificacao; ?>" placeholder="Motivo da Notificação">
    </div>
  </div>
  
  <div class="form-group">
    <label for="prazo_comparecimento" class="col-sm-2 control-label">Prazo para Apresentação</label>
    <div class="col-sm-10">
      <input type="text" name="prazo_comparecimento" class="form-control" id="prazo_comparecimento" onkeypress="return SomenteNumero(event)" onkeyup="javascript:makeDate('prazo_comparecimento')" maxlength="10" value="<?php echo $prazo_comparecimento->format('d/m/Y'); ?>" placeholder="Prazo para Comparecimento" required="">
    </div>
  </div>

<div class="form-group">
<label for="se_apresentou" class="col-sm-2 control-label">Apresentou-se?</label>
<div class="col-sm-10">  
<label class="radio-inline">
  <input type="radio" name="se_apresentou" id="se_apresentou" value="N" <?php echo $se_apresentou == "N" ? "checked=\"checked\"" : ""; ?> > Não
</label>
<label class="radio-inline">
  <input type="radio" name="se_apresentou" id="se_apresentou" value="S" <?php echo $se_apresentou == "S" ? "checked=\"checked\"" : ""; ?> > Sim
</label>
</div>
  
  <input name="id" type="hidden" id="id" value="<?php echo $notificacao->getIdNotificacao(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="editar"/>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>
</form>
<?php } ?>


<?php
if ($op == "despachar") { 
$id_rec = $_GET['id'];
$notificacao = $entityManager->find('Notificacoes', $id_rec);

$id = $notificacao->getIdNotificacao();
$cod_veiculo = $notificacao->getCodVeiculo()->getIdVeiculoIdentificado();
$veiculo = $notificacao->getCodVeiculo()->getMarca() . " " . $notificacao->getCodVeiculo()->getModelo() . ", Placa: " . $notificacao->getCodVeiculo()->getPlaca() . " pertencente ao " . mb_convert_encoding($notificacao->getCodVeiculo()->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $notificacao->getCodVeiculo()->getCodPessoa()->getNomeCompleto();
$se_apresentou = $notificacao->getSeApresentou();
$local_notificacao = $notificacao->getLocalNotificacao();
$data = $notificacao->getDataNotificacao();
$hora = $notificacao->getHoraNotificacao();
$prazo_comparecimento = $notificacao->getPrazoComparecimento();
$cod_anotador = $notificacao->getAnotador()->getIdUsuario();
$anotador = $notificacao->getAnotador()->getCodPosto()->getNomePosto() . " " . $notificacao->getAnotador()->getNome();
$motivo_notificacao = $notificacao->getMotivoNotificacao();
$despachoCmtPe = $notificacao->getDespachoCmtPe();

?>

<form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" >
<h1>Emissão de Despacho para Notificação</h1>
  <div class="alert alert-warning" role="alert">
    Veículo: <?php echo $veiculo ?>
  </div>
  
  <div class="row">
  <div class="col-sm-2"><div align="right"><b>Data da Notificação:</b></div></div><div class="col-sm-10"><?php echo $data->format('d/m/Y') . " às " . $hora; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><div align="right"><b>Local da Notificação:</b></div></div><div class="col-sm-10"><?php echo $local_notificacao; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><div align="right"><b>Motivo da Notificação:</b></div></div><div class="col-sm-10"><?php echo $motivo_notificacao; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><div align="right"><b>Anotador:</b></div></div><div class="col-sm-10"><?php echo $anotador; ?></div>
  </div><br>

<div class="form-group">
    <label for="despacho" class="col-sm-2 control-label">Despacho:</label>
    <div class="col-sm-10">
    <textarea name="despacho" class="form-control" id="despacho"><?php echo $despachoCmtPe; ?></textarea>
    </div>
</div>

  <input name="id" type="hidden" id="id" value="<?php echo $notificacao->getIdNotificacao(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="despachar"/>
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
$notificacao = $entityManager->find('Notificacoes', $id_rec);

$id = $notificacao->getIdNotificacao();
$cod_veiculo = $notificacao->getCodVeiculo()->getIdVeiculoIdentificado();
$veiculo = $notificacao->getCodVeiculo()->getMarca() . " " . $notificacao->getCodVeiculo()->getModelo() . ", Placa: " . $notificacao->getCodVeiculo()->getPlaca() . " pertencente ao " . mb_convert_encoding($notificacao->getCodVeiculo()->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $notificacao->getCodVeiculo()->getCodPessoa()->getNomeCompleto();
$se_apresentou = $notificacao->getSeApresentou();
$local_notificacao = $notificacao->getLocalNotificacao();
$data = $notificacao->getDataNotificacao();
$hora = $notificacao->getHoraNotificacao();
$prazo_comparecimento = $notificacao->getPrazoComparecimento();
$cod_anotador = $notificacao->getAnotador()->getIdUsuario();
$anotador = $notificacao->getAnotador()->getCodPosto()->getNomePosto() . " " . $notificacao->getAnotador()->getNome();
$motivo_notificacao = $notificacao->getMotivoNotificacao();

?>

<form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" >
<h1>Excluir Notificação</h1>
    <div class="alert alert-warning" role="alert">
    Confirma a exclusão da Notificação para o Veículo <?php echo $veiculo ?> ?
  </div>
  
  <div class="row">
  <div class="col-sm-2"><b>Data da Notificação:</b> </div><div class="col-sm-10"><?php echo $data->format('d/m/Y') . " às " . $hora; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><b>Local da Notificação:</b> </div><div class="col-sm-10"><?php echo $local_notificacao; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><b>Motivo da Notificação:</b> </div><div class="col-sm-10"><?php echo $motivo_notificacao; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><b>Anotador:</b> </div><div class="col-sm-10"><?php echo $anotador; ?></div>
  </div><br>

  <input name="id" type="hidden" id="id" value="<?php echo $notificacao->getIdNotificacao(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="excluir"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Excluir</button>
  </div>
</form>
<?php } ?>


<?php
if ($op == "finalizar") { 
$id_rec = $_GET['id'];
$notificacao = $entityManager->find('Notificacoes', $id_rec);

$id = $notificacao->getIdNotificacao();
$cod_veiculo = $notificacao->getCodVeiculo()->getIdVeiculoIdentificado();
$veiculo = $notificacao->getCodVeiculo()->getMarca() . " " . $notificacao->getCodVeiculo()->getModelo() . ", Placa: " . $notificacao->getCodVeiculo()->getPlaca() . " pertencente ao " . mb_convert_encoding($notificacao->getCodVeiculo()->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $notificacao->getCodVeiculo()->getCodPessoa()->getNomeCompleto();
$se_apresentou = $notificacao->getSeApresentou();
$local_notificacao = $notificacao->getLocalNotificacao();
$data = $notificacao->getDataNotificacao();
$hora = $notificacao->getHoraNotificacao();
$prazo_comparecimento = $notificacao->getPrazoComparecimento();
$cod_anotador = $notificacao->getAnotador()->getIdUsuario();
$anotador = $notificacao->getAnotador()->getCodPosto()->getNomePosto() . " " . $notificacao->getAnotador()->getNome();
$motivo_notificacao = $notificacao->getMotivoNotificacao();

?>

<form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" >
<h1>Finalizar Notificação</h1>
    <div class="alert alert-warning" role="alert">
    Confirma a finalização da Notificação para o Veículo <?php echo $veiculo ?> ?<br><b>Após esse procedimento não será possível editar ou excluir a notificação.</b>
  </div>
  
  <div class="row">
  <div class="col-sm-2"><b>Data da Notificação:</b> </div><div class="col-sm-10"><?php echo $data->format('d/m/Y') . " às " . $hora; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><b>Local da Notificação:</b> </div><div class="col-sm-10"><?php echo $local_notificacao; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><b>Motivo da Notificação:</b> </div><div class="col-sm-10"><?php echo $motivo_notificacao; ?></div>
  </div><br>
  <div class="row">
  <div class="col-sm-2"><b>Anotador:</b> </div><div class="col-sm-10"><?php echo $anotador; ?></div>
  </div><br>

  <input name="id" type="hidden" id="id" value="<?php echo $notificacao->getIdNotificacao(); ?>"/>
  <input name="acao" type="hidden" id="acao" value="finalizar"/>
  <div class="col-12">
      <button type="submit" class="btn btn-primary">Finalizar</button>
  </div>
</form>
<?php } ?>

<?php 
if ($op == "upload_imagem") { 
$id = $_GET['id'];

$notificacao = $entityManager->find('Notificacoes', $id);
$id_notificacao = $notificacao->getIdNotificacao();
$veiculo = $notificacao->getCodVeiculo()->getMarca() . " " . $notificacao->getCodVeiculo()->getModelo() . ", Placa: " . $notificacao->getCodVeiculo()->getPlaca() . " pertencente ao " . mb_convert_encoding($notificacao->getCodVeiculo()->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $notificacao->getCodVeiculo()->getCodPessoa()->getNomeCompleto(); 

?>
    <form class="form-horizontal" method="post" action="Controller/controllerNotificacao.php" enctype="multipart/form-data">
	<h1>Envio de Imagem da Notificação</h1>
    <div class="alert alert-warning" role="alert">
    Enviando Imagem da notificação do Veículo <?php echo $veiculo; ?>, cadastrada em <?php echo $notificacao->getDataNotificacao()->format('d/m/Y'); ?>.
    </div>
    <div class="form-group">
    <label for="arquivo" class="col-sm-2 control-label">Selecione a Imagem</label>
    <div class="col-sm-10">
    <input type="file" name="arquivo" class="form-control" required="">
    </div>
  </div>
  <input name="id" type="hidden" id="id" value="<?php echo $id_notificacao ?>">
  <input name="acao" type="hidden" id="acao" value="upload_imagem"/>
	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </div>
    </form>
<?php } ?>