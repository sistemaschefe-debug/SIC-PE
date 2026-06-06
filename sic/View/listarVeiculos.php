<?php
$q = $entityManager->createQuery("select v from VeiculosIdentificados v");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem Geral de Veículos Cadastrados</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Tipo de Brasão</th>
						<th>Nr do Brasão</th>
						<th>Responsável</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Cor</th>
						<th>Placa</th>
						<th>Ano / Modelo</th>
						<th>Data Cadastro / Atualização</th>
						<th>Observação</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdVeiculoIdentificado();
$tipo_brasao = $row->getCodTipoBrasao()->getNomeTipoBrasao();
$nr_brasao = $row->getNrBrasao();
$responsavel = mb_convert_encoding($row->getCodPessoa()->getCodPosto()->getNomePosto(), 'UTF-8', 'ISO-8859-1') . " " . $row->getCodPessoa()->getNomeCompleto();
$marca = $row->getMarca();
$modelo = $row->getModelo();
$cor = $row->getCor();
$placa = $row->getPlaca();
$ano_modelo = $row->getAnoModelo();
$dataCadAlt = $row->getDataCadAlt();
$obs = $row->getObservacao();
$imagem = $row->getImagemVeiculo();
?>

					<tr>
					    <td><?php echo $tipo_brasao; ?></td>
						<td><?php echo $nr_brasao; ?></td>
						<td><?php echo $responsavel; ?></td>
						<td><?php echo $marca; ?></td>
						<td><?php echo $modelo; ?></td>
						<td><?php echo $cor; ?></td>
						<td><?php echo $placa; ?></td>
						<td><?php echo $ano_modelo; ?></td>
						<td><?php echo $dataCadAlt->format('d/m/Y - H:i:s'); ?></td>
						<td><?php echo $obs; ?></td>
						<td><center>
						            <?php if ($nivel == 2) { ?>
									<a class="btn btn-default" title="Incluir Imagem da Documentação do Veículo" href="?pagina=formVeiculo&op=upload_imagem&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></a>
									<?php if ($imagem != null) { ?>
									<a class="btn btn-default" href="<?php echo $imagem; ?>" title="Documentação do Veículo"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></a>
									<?php } ?>
						            <a class="btn btn-default" title="Notificar Veículo" href="?pagina=formNotificacao&op=notificar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
									<a class="btn btn-default" title="Editar Cadastro" href="?pagina=formVeiculo&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Cadastro" href="?pagina=formVeiculo&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
									<?php } else { ?>
									
									<a class="btn btn-default" title="Notificar Veículo" href="?pagina=formNotificacao&op=anotador_notificar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
									<?php } ?>
							</center>
						</td>						
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

