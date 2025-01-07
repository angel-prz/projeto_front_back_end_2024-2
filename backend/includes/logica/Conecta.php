<?php
    // EXTRAIR ENDEREÇO DE IP DO SERVIDOR HTTP - Manual https://www.php.net/manual/en/reserved.variables.server.php
    $http_host = $_SERVER['HTTP_HOST'];
    //echo "HTTP_HOST = '$http_host'\n";    

    Class Conecta
    {
        private $conexao;
        //função de conexão do banco de dados com PDO
        public function __construct() 
        {  
            //chama variabel para ser acessada aqui dentro
            global $http_host;
            // Checar se a string começa com um texto especifico - Manual https://www.php.net/manual/en/function.str-starts-with.php (apenas php 8+)
            if(str_starts_with($http_host, "192.168.0"))
            {//PC
                try 
                {
                    $this->conexao = new PDO("pgsql:host=$http_host; dbname=prontuario;", "postgres","postgres");
                    $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "CONECTADO";
                }
                catch(PDOException $e) 
                {
                        echo 'Error: ' . $e->getMessage();
                }
            }
            elseif(str_starts_with($http_host, "200.19.243"))
            {//PC LAB 3
                try 
                {
                    $this->conexao = new PDO("pgsql:host=$http_host; dbname=prontuario; ", "postgres","postgres");
                    $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "CONECTADO";
                }
                catch(PDOException $e) 
                {
                        echo 'Error: ' . $e->getMessage();
                }
            }
            else
            {//localhost
                try 
                {
                    $this->conexao = new PDO("mysql:host='127.0.0.1'; dbname=prontuario; ", "postgres","postgres");
                    $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo "CONECTADO";
                }
                catch(PDOException $e) 
                {
                        echo 'Error: ' . $e->getMessage();
                }
            }
        }    
        
        public function getConexao() 
        {
            return $this->conexao;
        }
            
    }
?>