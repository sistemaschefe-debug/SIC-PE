<?php
$q = $entityManager->createQuery("select c from Corpo c");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem de Corpos Cadastrados</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Nome do Corpo</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdCorpo();
$nome = $row->getNomeCorpo();
?>

					<tr>
						<td><?php echo $nome ?></td>
						<td><center><a class="btn btn-default" title="Editar Corpo" href="?pagina=formCorpo&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Corpo" href="?pagina=formCorpo&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

