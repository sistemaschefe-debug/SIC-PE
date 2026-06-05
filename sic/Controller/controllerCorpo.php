<?php

require "../config.php";

if ($_POST['acao'] == 'cadastrar') { 

$corpo = new Corpo();

$corpo->setNomeCorpo($_POST['nome']);

$entityManager->persist($corpo);
$entityManager->flush();
	
header("location:../?pagina=listarCorpos");

}

if ($_POST['acao'] == 'editar') { 

$update = $entityManager->find('Corpo', $_POST['id']);

$update->setNomeCorpo($_POST['nome']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarCorpos");

}

if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('Corpo', $_POST['id']);

$entityManager->remove($excluir);
$entityManager->flush();
	
header("location:../?pagina=listarCorpos");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

?>