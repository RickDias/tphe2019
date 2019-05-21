<?php
	echo "teste<br/>";
	// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
	if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) { header("Location: index.html"); exit; }

	// Tenta se conectar ao servidor MySQL
	$cx = mysqli_connect("localhost", "root", "");
	//$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

	// Tenta se conectar a um banco de dados MySQL
	$db = mysqli_select_db($cx, "tphe");
	//$db = mysqli_select_db($cx, "karlise");
	
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	// Validação do usuário/senha digitados
	$sql = "SELECT `ID_USUARIO`, `NOME`, `EMAIL`, `SENHA`, `ID_TIPO_USUARIO` FROM `usuario` WHERE (`EMAIL` = '". $email ."') AND (`senha` = '". sha1($senha) ."') LIMIT 1";
	
			/* DICA: Também buscamos apenas por registros de usuários que estejam ativos, assim quando você precisar remover um usuário do sistema, 
			mas não pode simplesmente excluir o registro é só trocar o valor da coluna ativo pra zero. 
			Para isso, precisamos criar o atributo ATIVO na tabela usuario e incluir no SQL acima a verificação "AND (`ativo` = 1) LIMIT 1" 
			
			DICA 2: usar sha1 para inserir os usuarios no banco. Depois alterar o select da linha 26*/						
	echo "teste: ".$sql."<br/>";
	
	$query = mysqli_query($cx, $sql) or die(mysqli_error($cx)); //caso haja um erro na consulta

	if (mysqli_num_rows($query) != 1) {
	  // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
	  echo "Login inválido!"; exit;
	} else {
	  // Salva os dados encontados na variável $resultado
	  $resultado = mysqli_fetch_assoc($query);
	}
	
	// Se a sessão não existir, inicia uma
	if (!isset($_SESSION)) session_start();
	
	// Salva os dados encontrados na sessão
	$_SESSION['UsuarioID'] = $resultado['ID_USUARIO'];
	$_SESSION['UsuarioNome'] = $resultado['NOME'];
	$_SESSION['UsuarioEmail'] = $resultado['EMAIL'];
	$_SESSION['UsuarioNivel'] = $resultado['ID_TIPO_USUARIO'];
	
	// Redireciona o visitante
	header("Location: restrito.php"); exit;


?>
