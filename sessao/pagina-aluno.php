<?php
    
	session_start();
    echo 'Bem vindo à página do Aluno <br/>';
    echo 'Nome: '.$_SESSION['UsuarioNome']."<br/>"; 
    echo 'Nivel: '.$_SESSION['UsuarioNivel']."<br/>";
	echo 'ID: '.$_SESSION['UsuarioID']."<br/>";
	echo 'E-mail: '.$_SESSION['UsuarioEmail']."<br/>";
	
    //echo strtoupper(session_id());	
    echo '<a href="..\pagina-painel-jogador\tphe\_aluno.php"> Seguir no sistema</a>';
    
?>

