<?php
    class Config {
        protected $pdo;
        public function __construct() {
            return $this->connection();
        }

        private function connection() {
            $dns = 'mysql:dbname=ra200546375;host=localhost';
            $userName = 'root';
            $password = '';
            try {
                $this->pdo = new PDO($dns, $userName, $password);
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>