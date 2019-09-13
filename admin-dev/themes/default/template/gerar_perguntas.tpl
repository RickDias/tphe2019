<form role="form" action="..\functions\gerar_perguntas_banco.php" method="POST">
    <div class="form-group">
        <label>Selecione um Quiz</label>
          <select class='form-control' name='sel_quiz'>
            {foreach from=$quizes item=$quiz}
              <option value='{$quiz['ID_QUIZ']}'>{$quiz['DESCRICAO']}</option>
            {/foreach}
          </select>

				<input type='hidden' name='opid_quiz' value='{$aux['ID_QUIZ']}'>
    </div>
    <div class="form-group">
        <label>Selecione Turma</label>
				<select class='form-control' name='sel_turma' >
          {foreach from=$turmas item=$turma}
					<option value="{$turma['ID_TURMA']}">{$turma['NOME']} - {$turma['SIGLA']}</option>
          {/foreach}
			</select>

				<input type="hidden" value="{$aux['ID_TURMA']}">
    </div>
	<div class="form-group">
        <label>Selecione a categoria das perguntas</label>

				<select class='form-control' name='sel_categoria' >
          {foreach from=$categorias item=$categoria}
					<option value="{$categoria['ID_CATEGORIA']}">{$categoria['DESCRICAO']}</option>
          {/foreach}
	      </select>

				<input type="hidden" value="{$turma['ID_CATEGORIA']}">
    </div>
    <button type="submit" class="btn btn-default">Gerar perguntas</button>
</form>
