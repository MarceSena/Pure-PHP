<?php

include "config.php";
include "banco.php";
include "ajudantes.php";
include "classes/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tem_erros = false;
$erros_validacao = array();

if(tem_post()){
  $tarefa_id = $_POST['tarefa_id'];

  if(! isset($_FILES['anexo'])){
    $tem_erros = true;
    $erros_validacao ['anexo'] = 'voce deve selecionar um arquivo para anexar';
  }else{
    if(tratar_anexo($_FILES['anexo'])){
      $anexo = array();
      $anexo['tarefa_id'] = $tarefa_id;
      $anexo['nome'] = $_FILES['anexo']['name'];
      $anexo['arquivo'] = $_FILES['anexo']['name'];
    }else{
      $tem_erros = true;
      $erros_validacao['anexo'] = 'Envie apenas anexos nos formatos zip e pdf';
    }
  }

  if(! $tem_erros){
    gravar_anexo($conexao, $anexo);
  }


}

$tarefas->buscar_tarefa($_GET['id']);
$anexos = buscar_anexos($mysqli, $_GET['id']);

include "template_tarefa.php";