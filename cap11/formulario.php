<form method="POST">
  <input type="hidden" name ="id" 
    value="<?php echo $tarefa["id"]; ?>" />
  <fieldset>
    <legend>Nova Tarefa</legend>
    <label>
      Tarefa:
      <?php if ($tem_erros AND isset($erros_validacao['nome'])) : ?>
        <span class="erro" style="color:brown">
          <?php echo $erros_validacao['nome']; ?>
        </span>
        <?php endif ; ?>
      <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>"/>
    </label>
    <label>
      Descrição (Opcional):
      <input type="text" name="descricao" value="<?php echo $tarefa['descricao']; ?>" />
    </label>
    <label>
      Prazo (Opcional):
      <?php if ($tem_erros AND isset($erros_validacao['prazo'])) : ?>
        <span class="erro" style="color:brown">
          <?php echo $erros_validacao['prazo']; ?>
        </span>
      <?php endif ; ?>
      <input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>" />
    </label>
    <fieldset>
      <legend>Prioridade</legend>
      <label>
        <input type="radio" name="prioridade" value="1"
            <?php echo ($tarefa['prioridade'] == 1)
            ? 'checked'
            : '';
            ?> /> Baixa
        <input type="radio" name="prioridade" value="2"
            <?php echo ($tarefa['prioridade'] == 2)
                ? 'checked'
                : '';
                ?> /> Media
        <input type="radio" name="prioridade" value="3" 
            <?php echo ($tarefa['prioridade'] == 3)
            ? 'checked'
            : '';
            ?> />Alta
      </label>
    </fieldset>
    <label>
      Tarefa Concluida :
      <input type="checkbox" name="concluida" value="1"
      <?php echo ($tarefa['concluida'] == 1)
            ? 'checked'
            : '';
            ?> />
    </label>
    <label>
      Lembrete por e-mail:
      <input type="checkbox" name="lembrete" value="1" />
    </label>
    
      <input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?> "/>
  </fieldset>
</form>