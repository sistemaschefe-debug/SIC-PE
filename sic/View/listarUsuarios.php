<?php
$q = $entityManager->createQuery("select u from Usuarios u");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem de Usuários Cadastrados</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Nome</th>
						<th>Nome de Guerra</th>
						<th>Identidade</th>
						<th>Função</th>
						<th>Situação</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdUsuario();
$identidade = $row->getIdentidade();
$nivel = $row->getNivel();
$situacao = $row->getSituacao();
$nome = utf8_encode($row->getCodPosto()->getNomePosto()) . " " . $row->getNome();
$nomeGuerra = $row->getNomeGuerra();
?>

					<tr>
						<td><?php echo $nome ?></td>
						<td><?php echo $nomeGuerra ?></td>
						<td><?php echo $identidade ?></td>
						<td><?php if ($nivel == 1) { echo "Anotador"; } else if ($nivel == 2) { echo "Administrador"; } else if ($nivel == 3) { echo "Cmdo Cia PE / Cmdo BCSv"; }  ?></td>
						<td><?php if ($situacao == 1) { echo "Ativo"; } else if ($nivel == 2) { echo "Inativo"; } ?></td>
						<td><center><a class="btn btn-default" title="Editar Cadastro" href="?pagina=formUsuario&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
										<a class="btn btn-default" title="Editar Senha" href="?pagina=formUsuario&op=editar_senha&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a>
										<?php if ($id != 1) { ?> 
										<a class="btn btn-default" title="Excluir Cadastro" href="?pagina=formUsuario&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						                <?php } ?>
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

