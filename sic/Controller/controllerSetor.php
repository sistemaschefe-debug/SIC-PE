<?php

require "../config.php";

if ($_POST['acao'] == 'cadastrar') { 

$corpo = $entityManager->find('Corpo', $_POST['corpo']);

$setor = new Setor();

$setor->setNomeSetor($_POST['nome']);
$setor->setCodCorpo($corpo);

$entityManager->persist($setor);
$entityManager->flush();
	
header("location:../?pagina=listarSetores");

}

if ($_POST['acao'] == 'editar') { 

$corpo = $entityManager->find('Corpo', $_POST['corpo']);

$update = $entityManager->find('Setor', $_POST['id']);

$update->setNomeSetor($_POST['nome']);
$update->setCodCorpo($corpo);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarSetores");

}

if ($_POST['acao'] == 'excluir') { 

$excluir = $entityManager->find('Setor', $_POST['id']);

try {
$entityManager->remove($excluir);
$entityManager->flush();
} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}
	
header("location:../?pagina=listarSetores");

}

?>