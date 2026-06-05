<?php

require "../config.php";

if ($_POST['acao'] == 'cadastrar') { 

$brasao = new TiposBrasao();

$brasao->setNomeTipoBrasao($_POST['nome']);

$entityManager->persist($brasao);
$entityManager->flush();
	
header("location:../?pagina=listarTiposBrasao");

}

if ($_POST['acao'] == 'editar') { 

$update = $entityManager->find('TiposBrasao', $_POST['id']);

$update->setNomeTipoBrasao($_POST['nome']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarTiposBrasao");

}

if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('TiposBrasao', $_POST['id']);

$entityManager->remove($excluir);
$entityManager->flush();
	
header("location:../?pagina=listarTiposBrasao");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

?>