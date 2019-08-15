<form role="form" action="..\functions\gerar_perguntas_banco.php" method="POST">
    <div class="form-group">
        <label>Selecione um Quiz</label>
          <select class='form-control' name='sel_quiz'>
            <option value='{$aux['ID_QUIZ']}'>{$aux['DESCRICAO']}</option>
			    </select>

				<input type='hidden' name='opid_quiz' value='{$aux['ID_QUIZ']}'>
    </div>
    <div class="form-group">
        <label>Selecione Turma</label>

				<select class='form-control' name='sel_turma' >

					<option value="{$auxturma['ID_TURMA']}">{$auxturma['NOME']} - {$auxturma['SIGLA']}</option>
			</select>

				<input type="hidden" value="{$aux['ID_TURMA']}">
    </div>
	<div class="form-group">
        <label>Selecione a categoria das perguntas</label>

				<select class='form-control' name='sel_categoria' >
					<option value="{$auxcategoria['ID_CATEGORIA']}">{$auxcategoria['DESCRICAO']}</option>
	      </select>

				<input type="hidden" value="{$auxcategoria['ID_CATEGORIA']}">
    </div>
    <button type="submit" class="btn btn-default">Gerar perguntas</button>
</form>
