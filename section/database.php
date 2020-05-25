<?php 
    class Database{
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct(){
            $this->host = 'localgost';
            $this->db = 'blog';
            $this->user = 'root';
            $this->password = '';
            $this->charset ='utf8mb4';
        }
    }
    ?>