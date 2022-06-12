<?php

    class DB {
        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPassword = DB_PASSWORD;
        private $dbName = DB_NAME;
        
        private $statement;
        private $dbHandler;
        private $error;
        
        public function __construct() {
            $connection = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
            
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            
            try {
                $this->dbHandler = new PDO($connection, $this->dbUser, $this->dbPassword, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        
        // allows us to write queries
        public function query($sql) {
            $this->statement = $this->dbHandler->prepare($sql);
        }
        
        // bind values
        public function bind($parameter, $value, $type = null) {
            switch (is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($parameter, $value, $type);
        }
        
        // execute prepared statement
        public function execute() {
            return $this->statement->execute();
        }
        
        // return an array
        public function resultSet() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        
        // return single row as an object
        public function getRow() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }
        
        public function rowCount() {
            return $this->statement->rowCount();
        }
    }