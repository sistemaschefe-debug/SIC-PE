<?php

require "../config.php";

function Convert_Data_Port_Ingl($data_nasc){
    $conv1 = explode("/",$data_nasc);
    $conv2 = array_reverse($conv1);
    $saidata = implode("-",$conv2);
    return $saidata;
}



if ($_POST['acao'] == 'cadastrar') { 

$data = date('Y-m-d H:i:s');

$tipo_brasao = $entityManager->find('TiposBrasao', $_POST['tipo_brasao']);
$pessoa = $entityManager->find('Pessoas', $_POST['responsavel']);

$veiculo = new VeiculosIdentificados();
$veiculo->setCodTipoBrasao($tipo_brasao);
$veiculo->setNrBrasao($_POST['nr_brasao']);
$veiculo->setCodPessoa($pessoa);
$veiculo->setMarca($_POST['marca']);
$veiculo->setModelo($_POST['modelo']);
$veiculo->setCor($_POST['cor']);
$veiculo->setPlaca($_POST['placa']);
$veiculo->setAnoModelo($_POST['ano_modelo']);
$veiculo->setObservacao($_POST['observacao']);
$veiculo->setDataCadAlt($data);

$entityManager->persist($veiculo);
$entityManager->flush();
	
header("location:../index.php?pagina=listarVeiculos");
}

if ($_POST['acao'] == 'editar') { 

$data = date('Y-m-d H:i:s');

$tipo_brasao = $entityManager->find('TiposBrasao', $_POST['tipo_brasao']);
$pessoa = $entityManager->find('Pessoas', $_POST['responsavel']);

$update = $entityManager->find('VeiculosIdentificados', $_POST['id']);

$update->setCodTipoBrasao($tipo_brasao);
$update->setNrBrasao($_POST['nr_brasao']);
$update->setCodPessoa($pessoa);
$update->setMarca($_POST['marca']);
$update->setModelo($_POST['modelo']);
$update->setCor($_POST['cor']);
$update->setPlaca($_POST['placa']);
$update->setAnoModelo($_POST['ano_modelo']);
$update->setObservacao($_POST['observacao']);
$update->setDataCadAlt($data);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../index.php?pagina=listarVeiculos");

}

if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('VeiculosIdentificados', $_POST['id']);

$arquivo = "../" . $excluir->getImagemVeiculo();


$entityManager->remove($excluir);
$entityManager->flush();

echo unlink($arquivo);
	
header("location:../index.php?pagina=listarVeiculos");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

if ($_POST['acao'] == 'upload_imagem') { 

include_once ("Redimensiona.php");

$id = $_POST['id'];


$pasta = "../doc_veiculos";
$pasta2 = "doc_veiculos";

// Array com as extensões permitidas


//se existir o arquivo 
if(isset($_FILES["arquivo"])){ 
 
    $extensoes = array('jpg', 'jpeg', 'png', 'gif');
    $img = explode('.', $_FILES['arquivo']['name']);
	$extensao = strtolower(end($img));
if (array_search($extensao, $extensoes) === false) {

echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('O sistema aceita apenas imagens!!!')
    window.location.href='../?pagina=listarVeiculos';
    </SCRIPT>";
	
exit;	

} else {
	
    $imagem = $_FILES['arquivo'];
	$name = $imagem["name"];	
	$redim = new Redimensiona();
	$src=$redim->Redimensionar($imagem, 900, $pasta);
    
$local2="$pasta2/$name";
	 
$update = $entityManager->find('VeiculosIdentificados', $id);

$arquivo = "../" . $update->getImagemVeiculo();
echo unlink($arquivo);

$update->setImagemVeiculo($local2);
$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarVeiculos");

}
}
}

?>