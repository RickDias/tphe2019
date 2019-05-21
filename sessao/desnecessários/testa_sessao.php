<?php
    session_start();
    if((!isset($_SESSION['login'])&&(!isset($_SESSION['senha']))))
    {
       echo 'Você não está logado'; 
    }
    else
    {
       echo "Você está logado, seus dados são:<br/>";    
       echo $_SESSION['login']."<br/>"; 
       echo $_SESSION['senha'];
    }
    
?>
