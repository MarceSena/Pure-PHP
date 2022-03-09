<h1>Tarefa: <?php echo $tarefa['nome']; ?> </h1>

<p>
  <strong>Concluida:</strong>
  <?php echo traduz_concluida($tarefa['concluida']); ?>
</p>

<p>
  <strong>Descrição:</strong>
  <?php echo nl2br($tarefa['descricao']); ?>
</p>

<p>
  <strong>Prazo:</strong>
  <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
</p>

<p>
  <strong>Prioridade:</strong>
  <?php echo traduz_prioridade($tarefa['prioridade']); ?>
</p>

<!-- lista de anexos -->
<?php if (count($anexos) > 0) : ?>
  <p>Ateção essa tarefa contém anexos.</p>
<?php endif; ?>