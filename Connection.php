<?php

class Connection {

    # a underline não é obrigatório, só é utilizada para indicar que é um atributo privado
    private $_dbHostName = "localhost";
    private $_dbName = "cadastro";
    private $_userName = "root";
    private $_dbPassword = "bcd127";
    private $_conn;

    // método construtor - __construct() é uma palavra reservada que indicada que é o método construtor
    public function __construct() {

        try{

            // a classe PDO está sempre disponível no PHP. Portanto, não precisa importá-la
            $this->_conn = new PDO("mysql:host=$this->_dbHostName;dbname=$this->_dbName;",
                                        $this->_userName, $this->_dbPassword);

                                      // o que será feito, como será feito
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $erro){

            echo "Connection error: " . $erro->getMessage();

        }

    }

    public function returnConnection() {

        return $this->_conn;

    }

}