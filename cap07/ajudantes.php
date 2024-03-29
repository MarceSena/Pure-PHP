<?php

function traduz_prioridade($codigo)
{
  $prioridade = '';
  switch ($codigo) {
    case '1':
      $prioridade = 'Baixa';
      break;
    case '2':
      $prioridade = 'Media';
      break;
    case '3':
      $prioridade = 'Alta';
      break;
  }

  return $prioridade;
}

function traduz_data_para_banco($data)
{
  if($data == ""){
    return "";
  }

  $dados = explode("/", $data);

  $dada_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

  return $dada_mysql;
  
}

function traduz_data_para_exibir($data)
{
  if($data == "" OR $data == "0000-00-00"){
    return "";
  }

  $dados = explode("-", $data);

  $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

  return $data_exibir;
}

function traduz_concluida($concluida)
{
  if($concluida == 1){
    return 'Sim';
  }
  
  return 'Não';
}