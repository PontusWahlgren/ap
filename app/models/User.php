<?php

    class User {
        private $db;
        
        public function __construct() {
            $this->db = new DB();
        }
        
        public function getUsers() {
            $this->db->query("SELECT * FROM customers");
            $result = $this->db->resultSet();
            
            return $result;
        }
    }
