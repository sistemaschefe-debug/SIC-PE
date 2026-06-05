<?php

require "../config.php";

function Convert_Data_Port_Ingl($data_nasc){
    $conv1 = explode("/",$data_nasc);
    $conv2 = array_reverse($conv1);
    $saidata = implode("-",$conv2);
    return $saidata;
}



if ($_POST['acao'] == 'acessar') { 

$usuario  = $_POST['usuario'];
$senha = md5($_POST['senha']);
$q = $entityManager->createQuery("select u from Usuarios u where u.usuario = '$usuario' and u.senha = '$senha' and u.situacao = '1'");
$results = $q->getResult();
$totalResults = count($results);

foreach ($results as $row) { 
$sessionid = $row->getIdUsuario();
$nivel = $row->getNivel();
}

function geraSessao($sessionid,$nivel) {
   session_start();
   
   $_SESSION['idUsuario'] = $sessionid;
   $_SESSION['nivel'] = $nivel;
}



if($totalResults==1){

					geraSessao($sessionid,$nivel);
                    header("location:../index.php");
                          
                    }else{
                    header("location:../logout.php");
                    }                                 

}


if ($_POST['acao'] == 'cadastrar') { 

$posto = $entityManager->find('Posto', $_POST['posto']);

$usuario = new Usuarios();

$usuario->setCodPosto($posto);
$usuario->setNome($_POST['nome']);
$usuario->setNomeGuerra($_POST['nome_guerra']);
$usuario->setIdentidade($_POST['identidade']);
$usuario->setNivel($_POST['nivel']);
$usuario->setSituacao($_POST['situacao']);
$usuario->setUsuario($_POST['usuario']);
$usuario->setSenha(md5($_POST['senha']));

$entityManager->persist($usuario);
$entityManager->flush();
	
header("location:../?pagina=listarUsuarios");
}

if ($_POST['acao'] == 'editar') { 

$posto = $entityManager->find('Posto', $_POST['posto']);

$update = $entityManager->find('Usuarios', $_POST['id']);

$update->setCodPosto($posto);
$update->setNome($_POST['nome']);
$update->setNomeGuerra($_POST['nome_guerra']);
$update->setIdentidade($_POST['identidade']);
$update->setNivel($_POST['nivel']);
$update->setSituacao($_POST['situacao']);
$update->setUsuario($_POST['usuario']);

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarUsuarios");

}

if ($_POST['acao'] == 'editar_senha') { 

$update = $entityManager->find('Usuarios', $_POST['id']);


$update->setSenha(md5($_POST['senha']));

$entityManager->persist($update);
$entityManager->flush();
	
header("location:../?pagina=listarUsuarios");

}

if ($_POST['acao'] == 'excluir') { 

try {

$excluir = $entityManager->find('Usuarios', $_POST['id']);

$entityManager->remove($excluir);
$entityManager->flush();
	
header("location:../?pagina=listarUsuarios");

} catch(Exception $e) {
  echo '<b>Erro:</b> Esse registro n&atilde;o pode ser exclu&iacute;do, pois, existem outros registros que est&atilde;o relacionados com ele.';
}

}

?>