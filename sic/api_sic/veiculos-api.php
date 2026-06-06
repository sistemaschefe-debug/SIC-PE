<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=utf-8");

include "config.php";

$postjson = json_decode(file_get_contents('php://input'), true);
$hoje    = date('Y-m-d H:i:s');


if ($postjson['acao'] == 'add') {
  $cod_tipo_brasao = filter_var($postjson['tipo_brasao'], FILTER_SANITIZE_NUMBER_INT);
  $nr_brasao = filter_var($postjson['nr_brasao']);
  $cod_pessoa = filter_var($postjson['cod_pessoa']);
  $marca = filter_var($postjson['marca']);
  $modelo = filter_var($postjson['modelo']);
  $cor = filter_var($postjson['cor']);
  $placa = filter_var($postjson['placa']);
  $ano_modelo = filter_var($postjson['ano_modelo']);
  if (isset($postjson['imagem'])) {
    $imagem = filter_var($postjson['imagem']);
  } else {
    $imagem = "/assets/img/sem_foto.png";
  }
  $observacao = filter_var($postjson['observacao']);

  $query = $conectar->prepare("INSERT INTO veiculos_identificados SET
  cod_tipo_brasao = :cod_tipo_brasao,
  nr_brasao = :nr_brasao,
  cod_pessoa = :cod_pessoa,
  marca = :marca,
  modelo = :modelo,
  cor = :cor,
  placa = :placa,
  ano_modelo = :ano_modelo,
  data_cad_alt= :data_cad_alt,
  imagem = :imagem,
  observacao = :observacao");
  $query->bindParam(":cod_tipo_brasao", $cod_tipo_brasao);
  $query->bindParam(":nr_brasao", $nr_brasao);
  $query->bindParam(":cod_pessoa", $cod_pessoa);
  $query->bindParam(":marca", $marca);
  $query->bindParam(":modelo", $modelo);
  $query->bindParam(":cor", $cor);
  $query->bindParam(":placa", $placa);
  $query->bindParam(":ano_modelo", $ano_modelo);
  $query->bindParam(":data_cad_alt", $hoje);
  $query->bindParam(":imagem", $imagem);
  $query->bindParam(":observacao", $observacao);
  $insert = $query->execute();

  $idveiculo = $conectar->lastInsertId();

  if ($insert) $result = json_encode(array('success' => true, 'idveiculo' => $idveiculo));
  else $result = json_encode(array('success' => false));

  echo $result;
} elseif ($postjson['acao'] == 'getdata') {

  $data = array();

  $query = $conectar->query("SELECT * FROM veiculos_identificados
                            INNER JOIN tipo_brasao ON cod_tipo_brasao = id_tipo_brasao
                            INNER JOIN pessoas ON cod_pessoa = id_pessoa
                            LEFT JOIN posto ON id_posto = cod_posto
                            ORDER BY id_veiculo_identificado DESC LIMIT $postjson[start],$postjson[limit]");

  while ($row = $query->fetch()) {

    $data[] = array(
      'id_veiculo' => $row['id_veiculo_identificado'],
      'id_tipo_brasao' => $row['id_tipo_brasao'],
      'nome_tipo_brasao' => $row['nome_tipo_brasao'],
      'nr_brasao' => $row['nr_brasao'],
      'id_posto' => $row['id_posto'],
      'nome_posto' => $row['nome_posto'],
      'nome_guerra' => $row['nome_guerra'],
      'marca' => $row['marca'],
      'modelo' => $row['modelo'],
      'cor' => $row['cor'],
      'placa' => $row['placa'],
      'ano_modelo' => $row['ano_modelo'],
      'data_cad_alt' => $row['data_cad_alt'],
      'imagem' => $row['imagem'],
      'observacao' => $row['observacao']
    );
  }

  if ($query) $result = json_encode(array('success' => true, 'result' => $data));
  else $result = json_encode(array('success' => false));

  echo $result;
} elseif ($postjson['acao'] == 'carregaSqlite') {

  $data = array();

  $query = $conectar->query("SELECT * FROM veiculos_identificados
                            INNER JOIN tipo_brasao ON cod_tipo_brasao = id_tipo_brasao
                            INNER JOIN pessoas ON cod_pessoa = id_pessoa
                            LEFT JOIN posto ON id_posto = cod_posto
                            ORDER BY id_veiculo_identificado DESC");

  while ($row = $query->fetch()) {

    $data[] = array(
      'id_veiculo' => $row['id_veiculo_identificado'],
      'id_tipo_brasao' => $row['id_tipo_brasao'],
      'nome_tipo_brasao' => $row['nome_tipo_brasao'],
      'nr_brasao' => $row['nr_brasao'],
      'id_posto' => $row['id_posto'],
      'nome_posto' => $row['nome_posto'],
      'nome_guerra' => $row['nome_guerra'],
      'marca' => $row['marca'],
      'modelo' => $row['modelo'],
      'cor' => $row['cor'],
      'placa' => $row['placa'],
      'ano_modelo' => $row['ano_modelo'],
      'data_cad_alt' => $row['data_cad_alt'],
      'imagem' => $row['imagem'],
      'observacao' => $row['observacao']
    );
  }

  if ($query) $result = json_encode(array('success' => true, 'result' => $data));
  else $result = json_encode(array('success' => false));

  echo $result;
} elseif ($postjson['acao'] == 'busca') {

  $termo = filter_var($postjson['termoPesquisado']);
  $data = array();
  $query = $conectar->query("SELECT * FROM veiculos_identificados
  INNER JOIN tipo_brasao ON cod_tipo_brasao = id_tipo_brasao
  INNER JOIN pessoas ON cod_pessoa = id_pessoa
  LEFT JOIN posto ON id_posto = cod_posto
  WHERE (
    nome_guerra LIKE '%$termo%'
    OR nr_brasao LIKE '%$termo%'
    OR modelo LIKE '%$termo%'
    ) ORDER BY id_veiculo_identificado DESC LIMIT 10");

  while ($row = $query->fetch()) {

    $data[] = array(
      'id_veiculo' => $row['id_veiculo_identificado'],
      'id_tipo_brasao' => $row['id_tipo_brasao'],
      'nome_tipo_brasao' => $row['nome_tipo_brasao'],
      'nr_brasao' => $row['nr_brasao'],
      'id_posto' => $row['id_posto'],
      'nome_posto' => $row['nome_posto'],
      'nome_guerra' => $row['nome_guerra'],
      'marca' => $row['marca'],
      'modelo' => $row['modelo'],
      'cor' => $row['cor'],
      'placa' => $row['placa'],
      'ano_modelo' => $row['ano_modelo'],
      'data_cad_alt' => $row['data_cad_alt'],
      'imagem' => $row['imagem'],
      'observacao' => $row['observacao']
    );
  }

  if ($query) $result = json_encode(array('success' => true, 'result' => $data));
  else $result = json_encode(array('success' => false));

  echo $result;
} elseif ($postjson['acao'] == 'update') {

  $id = filter_var($postjson['id_veiculo'], FILTER_SANITIZE_NUMBER_INT);
  $nr_brasao = filter_var($postjson['nr_brasao']);
  $cor = filter_var($postjson['cor']);
  $placa = filter_var($postjson['placa']);
  $marca = filter_var($postjson['marca']);
  $modelo = filter_var($postjson['modelo']);
  $ano_modelo = filter_var($postjson['ano_modelo']);

  if (!isset($postjson['imagem'])) {

    $query = $conectar->prepare("UPDATE veiculos_identificados SET
  nr_brasao = :nr_brasao,
  marca = :marca,
  modelo = :modelo,
  cor = :cor,
  placa = :placa,
  ano_modelo = :ano_modelo,
  data_cad_alt= :data_cad_alt
  WHERE id_veiculo_identificado = :id_veiculo");
    $query->bindParam(":nr_brasao", $nr_brasao);
    $query->bindParam(":marca", $marca);
    $query->bindParam(":modelo", $modelo);
    $query->bindParam(":cor", $cor);
    $query->bindParam(":placa", $placa);
    $query->bindParam(":ano_modelo", $ano_modelo);
    $query->bindParam(":data_cad_alt", $hoje);
    $query->bindParam(":id_veiculo", $id);
    $update = $query->execute();
  } else {
    $imagem = filter_var($postjson['imagem']);

    $query = $conectar->prepare("UPDATE veiculos_identificados SET
    nr_brasao = :nr_brasao,
    marca = :marca,
    modelo = :modelo,
    cor = :cor,
    placa = :placa,
    ano_modelo = :ano_modelo,
    data_cad_alt= :data_cad_alt,
    imagem = :imagem
    WHERE id_veiculo_identificado = :id_veiculo");
    $query->bindParam(":nr_brasao", $nr_brasao);
    $query->bindParam(":marca", $marca);
    $query->bindParam(":modelo", $modelo);
    $query->bindParam(":cor", $cor);
    $query->bindParam(":placa", $placa);
    $query->bindParam(":ano_modelo", $ano_modelo);
    $query->bindParam(":data_cad_alt", $hoje);
    $query->bindParam(":imagem", $imagem);
    $query->bindParam(":id_veiculo", $id);
    $update = $query->execute();
  }

  if ($update) $result = json_encode(array('success' => true, 'result' => 'success'));
  else $result = json_encode(array('success' => false, 'result' => 'error'));

  echo $result;
} elseif ($postjson['acao'] == 'delete') {

  $id = filter_var($postjson['id_veiculo'], FILTER_SANITIZE_NUMBER_INT);

  $query = $conectar->prepare("DELETE FROM veiculos_identificados WHERE id_veiculo_identificado = :id_veiculo");
  $query->bindParam(":id_veiculo", $id);
  $delete = $query->execute();

  if ($delete) $result = json_encode(array('success' => true, 'result' => 'success'));
  else $result = json_encode(array('success' => false, 'result' => 'error'));

  echo $result;
} elseif ($postjson['acao'] == "login") {

  $senha = md5($postjson['senha']);
  $query = $conectar->query("SELECT * FROM usuarios WHERE usuario='$postjson[usuario]' AND senha='$senha'");
  $check = $query->rowCount();

  if ($check > 0) {
    $data = $query->fetch();
    $datauser = array(
      'id_usuario' => $data['id_usuario'],
      'usuario' => $data['usuario'],
      'nome' => $data['nome'],
      'nivel' => $data['nivel']
    );

    $result = json_encode(array('success' => true, 'result' => $datauser));
  } else {
    $result = json_encode(array('success' => false, 'msg' => 'Conta não registrada'));
  }

  echo $result;
} elseif ($postjson['acao'] == 'buscaVeiculo') {

  $id = filter_var($postjson['id'], FILTER_SANITIZE_NUMBER_INT);

  $data = array();
  $query = $conectar->query("SELECT * FROM veiculos_identificados
  INNER JOIN tipo_brasao ON cod_tipo_brasao = id_tipo_brasao
  INNER JOIN pessoas ON cod_pessoa = id_pessoa
  LEFT JOIN posto ON id_posto = cod_posto
  WHERE id_veiculo_identificado = $id");

  $row = $query->fetch();

  $data[] = array(
    'id_veiculo' => $row['id_veiculo_identificado'],
    'id_tipo_brasao' => $row['id_tipo_brasao'],
    'nome_tipo_brasao' => $row['nome_tipo_brasao'],
    'nr_brasao' => $row['nr_brasao'],
    'id_posto' => $row['id_posto'],
    'nome_posto' => $row['nome_posto'],
    'nome_guerra' => $row['nome_guerra'],
    'marca' => $row['marca'],
    'modelo' => $row['modelo'],
    'cor' => $row['cor'],
    'placa' => $row['placa'],
    'ano_modelo' => $row['ano_modelo'],
    'data_cad_alt' => $row['data_cad_alt'],
    'imagem' => $row['imagem'],
    'observacao' => $row['observacao']
  );


  if ($query) $result = json_encode(array('success' => true, 'result' => $data));
  else $result = json_encode(array('success' => false));

  echo $result;
}