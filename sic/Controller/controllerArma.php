<?php

require "../config.php";

if ($_POST['acao'] == 'cadastrar') { 

$arma = new Arma();

$arma->setNomeArma($_POST['nome']);

$entityManager->persist($arma);
$entityManager->flush();
	
header("location:../?pagina=listarArmas");

}

if ($_POST['acao'] == 'editar') { 

$update = $entityManager->find('Arma', $_POST['id']);

$update->setNomeArma($_POST['nome']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarArmas");

}

if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('Arma', $_POST['id']);

$entityManager->remove($excluir);
$entityManager->flush();
	
header("location:../?pagina=listarArmas");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

?>