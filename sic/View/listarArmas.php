<?php
$q = $entityManager->createQuery("select a from Arma a");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem de Armas Cadastradas</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Arma</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdArma();
$nome = $row->getNomeArma();
?>

					<tr>
						<td><?php echo $nome ?></td>
						<td><center><a class="btn btn-default" title="Editar Arma" href="?pagina=formArma&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Arma" href="?pagina=formArma&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

