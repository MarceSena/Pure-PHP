<?php

class Tarefas
{
  public $mysqli;
  public $tarefas = array();
  public $tarefa;

  public function __construct($novo_mysqli)
  {
    $this->mysqli = $novo_mysqli;
  }

  function buscar_tarefas()
  {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = $this->mysqli->query( $sqlBusca);

    $this->tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)){
      $this->tarefas[] = $tarefa;
    }
  }

  public function buscar_tarefa($id){
    $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
    $resultado = $this->mysqli->query($sqlBusca);
    
    $this->tarefa = mysqli_fetch_assoc($resultado);
  }


  function gravar_tarefa($tarefa)
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

    $this->mysqli->query($sqlGravar);
  }

  function editar_tarefa($tarefa)
  {
    $sqlEditar = "
      UPDATE tarefas SET
            nome = '{$tarefa['nome']}',
            descricao = '{$tarefa['descricao']}',
            prioridade = '{$tarefa['prioridade']}',
            prazo = '{$tarefa['prazo']}',
            concluida = '{$tarefa['concluida']}'
      WHERE id = '{$tarefa['id']}'
    ";

    $this->mysqli->query($sqlEditar);
  }

  function remover_tarefa($mysqli, $id)
  {
    $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";
    $mysqli->query($sqlRemover);
  }


}