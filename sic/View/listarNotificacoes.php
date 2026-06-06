<?php
$q = $entityManager->createQuery("select n from Notificacoes n");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem Geral de Notificações</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
					    <th>Data</th>
						<th>Horário</th>
						<th>Veículo</th>
						<th>Responsável</th>
						<th>Local da Notificação</th>
						<th>Motivo</th>
						<th>Apresentou-se?</th>
						<th>Prazo Apresentação</th>
						<th>Anotador</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdNotificacao();
$veiculo = $row->getCodVeiculo()->getMarca() . " - " . $row->getCodVeiculo()->getModelo() . " - " . $row->getCodVeiculo()->getPlaca();
$responsavel = mb_convert_encoding($row->getCodVeiculo()->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $row->getCodVeiculo()->getCodPessoa()->getNomeCompleto();
$local = $row->getLocalNotificacao();
$data = $row->getDataNotificacao()->format('d/m/Y');
$hora = $row->getHoraNotificacao() . "h";
$motivo = $row->getMotivoNotificacao();
$apresentou_se = $row->getSeApresentou();
$prazo_comparecimento = $row->getPrazoComparecimento();
$anotador = $row->getAnotador()->getCodPosto()->getNomePosto() . " " . $row->getAnotador()->getNome();
$despachoCmtPe = $row->getDespachoCmtPe();
$finalizado = $row->getFinalizado();
$imagem = $row->getImagemNotificacao();
$data_atual = date('Y-m-d');
?>

					<tr <?php if ($data_atual >= $prazo_comparecimento->format('Y-m-d') && $finalizado == 1 && $apresentou_se == "N") { ?> class="danger" <?php } ?> >
						<td><?php echo $data; ?></td>
						<td><?php echo $hora; ?></td>
					    <td><?php echo $veiculo; ?></td>
						<td><?php echo $responsavel; ?></td>
						<td><?php echo $local; ?></td>
						<td><?php echo $motivo; ?></td>
						<td><?php if ($apresentou_se == "N") { echo "<b>Não</b>"; } else { echo "Sim"; } ?></td>
						<td><?php echo $prazo_comparecimento->format('d/m/Y'); ?></td>
						<td><?php echo $anotador; ?></td>
						<td><center>
						            <a class="btn btn-default" href="#" title="Visualizar Despachos da Notificação"  data-toggle="modal" data-target="#<?php echo $id ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									<a class="btn btn-default" title="Incluir Imagem da Notificação" href="?pagina=formNotificacao&op=upload_imagem&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></a>
									<?php if ($imagem != null) { ?>
									<a class="btn btn-default" href="<?php echo $imagem; ?>" title="Imagem da Notificação"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a>
									<?php } ?>
									<?php if ($finalizado == "1") { ?>
									<?php if ($nivel == "3") { ?>
									<a class="btn btn-default" title="Emitir Despacho para Notificação" href="?pagina=formNotificacao&op=despachar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a>
									<?php } ?>
									<?php if ($nivel == "3" || $nivel == "2") { ?>
									<a class="btn btn-default" title="Finalizar Notificação" href="?pagina=formNotificacao&op=finalizar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
									<?php } ?>
									<?php if ($nivel == "2") { ?>
									<a class="btn btn-default" title="Editar Notificação" href="?pagina=formNotificacao&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Notificação" href="?pagina=formNotificacao&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center>
									<?php } ?>
									<?php } ?>
						</td>						
					</tr>
<!-- Modal -->
<div class="modal fade" id="<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div align="left"><h4 class="modal-title" id="myModalLabel">Despacho para: <?php echo $veiculo; ?></h4></div>
      </div>
      <div class="modal-body">
      <div align="justify"><?php echo $despachoCmtPe; ?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim -->

					
<?php } ?>
</tbody>
</table>
</div>

