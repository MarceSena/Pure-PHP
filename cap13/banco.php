<?php



// try{
// $conexao = new PDO('mysql:host={$HOST};dbname={$DATABASE}', $USER, $PASSWORD);
// $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo 'ERROR: ' . $e->getMessage();
// }

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if($mysqli->connect_errno) {
  echo "Problama para conectar no banco.";
  die();
}

function gravar_anexo($mysqli, $anexo)
{
  $sqlGravar = "INSERT INTO anexos 
    (tarefa_id, nome, arquivo)
    VALUES
    ( 
      {$anexo['tarefa_id']},
      '{$anexo['nome']}',
      '{$anexo['arquivo']}'
    )
  ";

  $mysqli->query($sqlGravar);
}

function buscar_anexos($mysqli, $tarefa_id)
{
  $sqlBusca = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
  $resultado = $mysqli->query($sqlBusca);
  $anexos = array();

  while ($anexo = mysqli_fetch_assoc($resultado)){
    $anexos[] = $anexo;
  }

  return $anexos;
}