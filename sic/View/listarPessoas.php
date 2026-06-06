<?php
$q = $entityManager->createQuery("select p from Pessoas p");
$results = $q->getResult();
?>

<div class="alert alert-success" role="alert">Listagem Geral de Pessoas Cadastradas</div>
<div class="table-responsive" style="padding: 15px">
<table class="table table-hover table-striped table-bordered" id="tabela">
				<thead>
					<tr class="success">
						<th>Pst / Grad</th>
						<th>Arma</th>
						<th>Nome Completo</th>
						<th>Nome de Guerra</th>
						<th>Identidade</th>
						<th>Telefone</th>
						<th>Setor</th>
						<th>Ramal</th>
						<th>CNH</th>
						<th>Cat</th>
						<th>Validade Habilitação</th>
						<th>Endereço</th>
						<th>Ações</th>
					</tr>
					
				</thead>
				<tbody>
<?php

foreach ($results as $row) {	
$id = $row->getIdPessoa();
$posto = $row->getCodPosto()->getNomePosto();
$arma = $row->getCodArma()->getNomeArma();
$nome = $row->getNomeCompleto();
$nomeGuerra = $row->getNomeGuerra();
$identidade = $row->getIdentidade();
$telefone = $row->getTelefoneResidencial();
$setor = $row->getCodSetor()->getNomeSetor();
$ramal = $row->getRamal();
$cnh = $row->getHabilitacao();
$categoria = $row->getCategoria();
$validade = $row->getValidadeHabilitacao();
$endereco = $row->getEndereco();
?>

					<tr>
					    <td><?php echo mb_convert_encoding($posto, 'UTF-8', 'ISO-8859-1'); ?></td>
						<td><?php echo $arma; ?></td>
						<td><?php echo $nome; ?></td>
						<td><?php echo $nomeGuerra; ?></td>
						<td><?php echo $identidade; ?></td>
						<td><?php echo $telefone; ?></td>
						<td><?php echo $setor; ?></td>
						<td><?php echo $ramal; ?></td>
						<td><?php echo $cnh; ?></td>
						<td><?php echo $categoria; ?></td>
						<td><?php echo $validade->format('d/m/Y'); ?></td>
						<td><?php echo $endereco; ?></td>
						<td><center><a class="btn btn-default" title="Editar Cadastro" href="?pagina=formPessoa&op=editar&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
									<a class="btn btn-default" title="Excluir Cadastro" href="?pagina=formPessoa&op=excluir&id=<?php echo $id ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></center></td>
						
					</tr>
					

					
<?php } ?>
</tbody>
</table>
</div>

