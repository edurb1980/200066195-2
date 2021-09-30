<?php
    require('Config.php');
    class Student extends Config {

        private $id;
        private $name;
        private $email;
        private $password;
        private $phone;
        private $status;
        private $created_at;
        private $updated_at;

        public function __construct() 
        {
            parent::__construct();
        }

        // implementar geters e seters

        private function setDados($dados) 
        {
            $date = new DateTime('America/Sao_Paulo');
            $objDados = json_decode($dados);
            $this->name = $objDados->name;
            $this->email = $objDados->email;
            $this->password = $objDados->password;
            $this->phone = $objDados->phone;
            //$this->status = $objDados->status;
            $this->status = intval($objDados->status);
            $this->created_at = $date->format('Y-m-d H:i:s');
            $this->updated_at = $date->format('Y-m-d H:i:s');
        }

        public function insertStudent($dados) 
        {
            $this->setDados($dados);
            try {
                $sql = "INSERT INTO students(name, email, password, phone, status, created_at, updated_at) 
                        VALUES(:name, :email, :password, :phone, :status, :created_at, :updated_at)";
                $con = $this->pdo->prepare($sql);
                $con->bindParam(':name', $this->name);
                $con->bindParam(':email', $this->email);
                $con->bindParam(':password', $this->password);
                $con->bindParam(':phone', $this->phone);
                $con->bindParam(':status', $this->status);
                $con->bindParam(':created_at', $this->created_at);
                $con->bindParam(':updated_at', $this->updated_at);
                $result = $con->execute();
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            if(!$result) {
                return false;
            }
            return true;
        }

        public function updateStudent($dados, $id)
        {
            $this->setDados($dados);
            try {
                $sql = "UPDATE students SET name = :name, email = :email, password = :password, phone = :phone, status = :status, updated_at = :updated_at WHERE id = :id";
                $con = $this->pdo->prepare($sql);
                $con->bindParam(':name', $this->name);
                $con->bindParam(':email', $this->email);
                $con->bindParam(':password', $this->password);
                $con->bindParam(':phone', $this->phone);
                $con->bindParam(':status', $this->status);
                $con->bindParam(':updated_at', $this->updated_at);
                $con->bindParam(':id', $id);
                $result = $con->execute();
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            if(!$result) {
                return false;
            }
            return true;
        }


        public function getStudents() 
        {
            try {
                $query = "SELECT * FROM students";
                $con = $this->pdo->prepare($query);
                $con->execute();
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            
            
            $result = $con->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }

        public function getStudent($id) 
        {
            $query = "SELECT * FROM students WHERE id = :id";
            $con = $this->pdo->prepare($query);
            $con->bindParam(':id', $id);
            $con->execute();

            $result = $con->fetch(PDO::FETCH_ASSOC);
            return json_encode($result);
        }

        public function deleteStudent($id) 
        {
            $query = "DELETE FROM students WHERE id = :id";
            $con = $this->pdo->prepare($query);
            $con->bindParam(':id', $id);
            $result = $con->execute();
            if(!$result) {
                return false;
            }
            return true;
        }
    }
?>