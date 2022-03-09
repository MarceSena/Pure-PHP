<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../tarefas.css" type="text/css" />
  <title>Gerenciador de Tarefas</title>
</head>
<body>
  <h1>Tarefa: <?php echo $tarefas->tarefa['nome']; ?> </h1>
  <p>
    <a href="tarefas.php">Volta para a lista de tarefas</a>
  </p>

  <p>
    <strong>Concluida:</strong>
      <?php echo traduz_concluida( $tarefas->tarefa['concluida']); ?>
  </p>
  <p>
    <strong>Descrição:</strong>
    <?php echo nl2br( $tarefas->tarefa['descricao']); ?>
  </p>
  <p>
    <strong>Prazo:</strong>
    <?php echo traduz_data_para_exibir( $tarefas->tarefa['prazo']); ?>
  </p>
  <p>
    <strong>Prioridade:</strong>
    <?php echo traduz_prioridade( $tarefas->tarefa['prioridade']); ?>
  </p>

  <h2>Anexos</h2>
  <!-- lista de anexos -->
  <?php if(count($anexos) > 0) : ?>
    <table>
      <tr>
        <th>Arquivos</th>
        <th>Opções</th>
      </tr>
   
      <?php foreach ($anexos as $anexo) : ?>
        <tr>
          <td><?php echo $anexo['nome']; ?> </td>
          <td>
            <a href="anexos/<?php echo $anexo['arquivo']; ?>">
            Download
            </a>
          </td>
        </tr>
      <? endforeach; ?>
    </table>
  <?php else : ?>
    <p>Não ha anexos para esta tarefa.</p>
  <?php endif ; ?>

  <!-- formulario para anexo -->
  <form action="" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Nova Anexo</legend>

      <input type="hidden"
        name="tarefa_id" value="<?php echo $tarefa['id']; ?>" />
      
      <label>
        <?php if ($tem_erros AND isset($erros_validacao['anexo'])):?>
          <span class='erro'>
            <?php echo $erros_validacao['anexo']; ?>
          </span>
        <?php endif ; ?>

        <input type="file" name="anexo" />
      </label>

      <input type="submit" value="Cadastrar" />
    </fieldset>
  </form>
</body>
</html>