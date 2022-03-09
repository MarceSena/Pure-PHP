<?php

include "config.php";
include "banco.php";
include "classes/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tarefas->remover_tarefa($mysqli, $_GET['id']);

header('Location: tarefas.php');