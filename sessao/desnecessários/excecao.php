<?php
   try {
       $x = 1/0;
       echo $x;
       } catch (Exception $e) {
          echo 'Erro: Divisão por Zero !!! \n';
    }
?>

