<?php
class Configuration
{
    public $dir_env;

    public function __construct($dir_env)
    {
        global $smarty;
        // as duas linhas que carregam as variáveis do .env para variáveis de ambiente
        $dt = $this->configureDotEnv($dir_env);
    }

    private function configureDotEnv($dir_env){
        $dotenv = Dotenv\Dotenv::create($dir_env);
        $dotenv->load(true);
    }

    public function get($campo){

      $con = conecta_db();
      $query = "SELECT $campo FROM configuration";
      $resultado = mysqli_query($con, $query);
      while ($rs = mysqli_fetch_array($resultado))
      {
          $return =$rs[$campo];
      }
      return $return;
    }

}
