<?php
$q = $entityManager->createQuery("select s from Setor s");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem de Setores Cadastrados</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Nome do Setor</th>
						<th>Corpo</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdSetor();
$nome = $row->getNomeSetor();
$corpo = $row->getCodCorpo()->getNomeCorpo();
?>

					<tr>
						<td><?php echo $nome ?></td>
						<td><?php echo $corpo ?></td>
						<td><center><a class="btn btn-default" title="Editar Setor" href="?pagina=formSetor&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Setor" href="?pagina=formSetor&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

