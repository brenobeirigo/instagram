<?php

/**
 * Description of ConnectionFactory
 *
 * @author BBEIRIGO
 */
class ConnectionFactory {

    // recebe a conexão
    public $con;
    // qual o banco de dados?
    public $dbType;
    // parâmetros de conexão
    // quando não for necessário deixe em branco apenas com as aspas duplas ""
    public $host;
    public $user;
    public $password;
    public $db;
    // seta a persistência da conexão
    public $persistent;

    function __construct($dbType="", $host="", $user="", $password="", $db="", $persistent=false) {
        echo "Connection Factory: <br>";
        $this->dbType = $dbType;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->persistent = $persistent;
        $this->con = null;        
    }

        public function getConnection() {
        try {
            // realiza a conexão
            $this->con = new PDO($this->dbType . ":host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->password, array(PDO::ATTR_PERSISTENT => $this->persistent));
            // realizado com sucesso, retorna conectado
            return $this->con;
            // caso ocorra um erro, retorna o erro;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    // desconecta
    public function closeConnection() {
        if ($this->con != null) {
            $this->con = null;
        }
    }

    public function __destruct() {
        echo "Close connection:";
        $this->closeConnection();
    }
}

?>