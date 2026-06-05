<?php

require "../config.php";

function Convert_Data_Port_Ingl($data_nasc){
    $conv1 = explode("/",$data_nasc);
    $conv2 = array_reverse($conv1);
    $saidata = implode("-",$conv2);
    return $saidata;
}



if ($_POST['acao'] == 'cadastrar') { 



$veiculo = $entityManager->find('VeiculosIdentificados', $_POST['veiculo']);
$anotador = $entityManager->find('Usuarios', $_POST['anotador']);


$notificacao = new Notificacoes();
$notificacao->setCodVeiculo($veiculo);
$notificacao->setAnotador($anotador);
$notificacao->setSeApresentou("N");
$notificacao->setLocalNotificacao($_POST['local_notificacao']);
$notificacao->setDataNotificacao(Convert_Data_Port_Ingl($_POST['data_notificacao']));
$notificacao->setHoraNotificacao($_POST['hora_notificacao']);
$notificacao->setPrazoComparecimento(Convert_Data_Port_Ingl($_POST['prazo_comparecimento']));
$notificacao->setMotivoNotificacao($_POST['motivo']);
$notificacao->setDespachoCmtPe("Nada a registrar.");
$notificacao->setFinalizado("1");

$entityManager->persist($notificacao);
$entityManager->flush();
	
header("location:../index.php?pagina=listarNotificacoes");
}

if ($_POST['acao'] == 'editar') { 

$anotador = $entityManager->find('Usuarios', $_POST['anotador']);

$update = $entityManager->find('Notificacoes', $_POST['id']);

$update->setAnotador($anotador);
$update->setSeApresentou($_POST['se_apresentou']);
$update->setLocalNotificacao($_POST['local_notificacao']);
$update->setDataNotificacao(Convert_Data_Port_Ingl($_POST['data_notificacao']));
$update->setHoraNotificacao($_POST['hora_notificacao']);
$update->setPrazoComparecimento(Convert_Data_Port_Ingl($_POST['prazo_comparecimento']));
$update->setMotivoNotificacao($_POST['motivo']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../index.php?pagina=listarNotificacoes");

}

if ($_POST['acao'] == 'despachar') { 

$update = $entityManager->find('Notificacoes', $_POST['id']);

$update->setDespachoCmtPe($_POST['despacho']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../index.php?pagina=listarNotificacoes");

}


if ($_POST['acao'] == 'finalizar') { 

$update = $entityManager->find('Notificacoes', $_POST['id']);

$update->setFinalizado("2");

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../index.php?pagina=listarNotificacoes");

}


if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('Notificacoes', $_POST['id']);

$arquivo = "../" . $excluir->getImagemNotificacao();
echo unlink($arquivo);

$entityManager->remove($excluir);
$entityManager->flush();
	
header("location:../index.php?pagina=listarNotificacoes");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

if ($_POST['acao'] == 'upload_imagem') { 

include_once ("Redimensiona.php");

$id = $_POST['id'];


$pasta = "../imagens_notificacoes";
$pasta2 = "imagens_notificacoes";

// Array com as extensões permitidas


//se existir o arquivo 
if(isset($_FILES["arquivo"])){ 
 
    $extensoes = array('jpg', 'jpeg', 'png', 'gif');
    $img = explode('.', $_FILES['arquivo']['name']);
	$extensao = strtolower(end($img));
if (array_search($extensao, $extensoes) === false) {

echo "<SCRIPT LANGUAGE='JavaScript'>
    window.alert('O sistema aceita apenas imagens!!!')
    window.location.href='../?pagina=listarNotificacoes';
    </SCRIPT>";
	
exit;	

} else {
	
    $imagem = $_FILES['arquivo'];
	$name = $imagem["name"];	
	$redim = new Redimensiona();
	$src=$redim->Redimensionar($imagem, 650, $pasta);
    
$local2="$pasta2/$name";
	 
$update = $entityManager->find('Notificacoes', $id);

$arquivo = "../" . $update->getImagemNotificacao();
echo unlink($arquivo);

$update->setImagemNotificacao($local2);
$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarNotificacoes");

}
}
}

?>