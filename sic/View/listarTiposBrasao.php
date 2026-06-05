<?php
$q = $entityManager->createQuery("select t from TiposBrasao t");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem de Tipos de Brasão Cadastrados</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Tipo de Brasão</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdTipoBrasao();
$nome = $row->getNomeTipoBrasao();
?>

					<tr>
						<td><?php echo $nome ?></td>
						<td><center><a class="btn btn-default" title="Editar Tipo de Brasão" href="?pagina=formTiposBrasao&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Tipo de Brasão" href="?pagina=formTiposBrasao&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

