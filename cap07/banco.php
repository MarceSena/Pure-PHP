<?php

$HOST = 'mysql';
$USER = 'root';
$PASSWORD = 'secret';
$DATABASE = 'estudo';

// try{
// $conexao = new PDO('mysql:host={$HOST};dbname={$DATABASE}', $USER, $PASSWORD);
// $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo 'ERROR: ' . $e->getMessage();
// }

$conexao = mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);

if(mysqli_connect_errno()) {
  echo "Problama para conectar no banco.";
  die();
}

function buscar_tarefas($conexao)
{
  $sqlBusca = 'SELECT * FROM tarefas';
  $resultado = mysqli_query($conexao, $sqlBusca);

  $tarefas = array();

  while ($tarefa = mysqli_fetch_assoc($resultado)){
    $tarefas[] = $tarefa;
  }

  return $tarefas;
}

function gravar_tarefa($conexao , $tarefa)
{
  $sqlGravar = "INSERT INTO tarefas
  (nome, descricao, prioridade, prazo, concluida) VALUE
  (
    '{$tarefa['nome']}',
    '{$tarefa['descricao']}',
    '{$tarefa['prioridade']}',
    '{$tarefa['prazo']}',
    '{$tarefa['concluida']}'
  )
  ";

  mysqli_query($conexao, $sqlGravar);
}