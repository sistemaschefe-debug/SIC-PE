<?php

require "../config.php";

function Convert_Data_Port_Ingl($data_nasc){
    $conv1 = explode("/",$data_nasc);
    $conv2 = array_reverse($conv1);
    $saidata = implode("-",$conv2);
    return $saidata;
}



if ($_POST['acao'] == 'cadastrar') { 

$posto = $entityManager->find('Posto', $_POST['posto']);
$arma = $entityManager->find('Arma', $_POST['arma']);
$setor = $entityManager->find('Setor', $_POST['setor']);

$pessoa = new Pessoas();
$pessoa->setCodPosto($posto);
$pessoa->setCodArma($arma);
$pessoa->setNomeCompleto($_POST['nome']);
$pessoa->setNomeGuerra($_POST['nome_guerra']);
$pessoa->setIdentidade($_POST['identidade']);
$pessoa->setTelefoneResidencial($_POST['telefone']);
$pessoa->setCodSetor($setor);
$pessoa->setRamal($_POST['ramal']);
$pessoa->setHabilitacao($_POST['cnh']);
$pessoa->setCategoria($_POST['categoria']);
$pessoa->setValidadeHabilitacao(Convert_Data_Port_Ingl($_POST['validade']));
$pessoa->setEndereco($_POST['endereco']);

$entityManager->persist($pessoa);
$entityManager->flush();
	
header("location:../index.php?pagina=listarPessoas");
}

if ($_POST['acao'] == 'editar') { 

$posto = $entityManager->find('Posto', $_POST['posto']);
$arma = $entityManager->find('Arma', $_POST['arma']);
$setor = $entityManager->find('Setor', $_POST['setor']);

$update = $entityManager->find('Pessoas', $_POST['id']);

$update->setCodPosto($posto);
$update->setCodArma($arma);
$update->setNomeCompleto($_POST['nome']);
$update->setNomeGuerra($_POST['nome_guerra']);
$update->setIdentidade($_POST['identidade']);
$update->setTelefoneResidencial($_POST['telefone']);
$update->setCodSetor($setor);
$update->setRamal($_POST['ramal']);
$update->setHabilitacao($_POST['cnh']);
$update->setCategoria($_POST['categoria']);
$update->setValidadeHabilitacao(Convert_Data_Port_Ingl($_POST['validade']));
$update->setEndereco($_POST['endereco']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../index.php?pagina=listarPessoas");

}

if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('Pessoas', $_POST['id']);

$entityManager->remove($excluir);
$entityManager->flush();
	
header("location:../index.php?pagina=listarPessoas");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

?>