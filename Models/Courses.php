<?php
require('Config.php');
class  Courses extends Config {

    private $id, $nameCourse, $description, $dateStart, $dateFinish, $status, $created_at, $updated_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCourse()
    {
        $query = "SELECT * FROM courses";
        $con = $this->pdo->prepare($query);
        $con->execute();
        
        $result = $con->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    public function getCourse($id)
    {
        $query = "SELECT * FROM courses WHERE id = :id";
        $con = $this->pdo->prepare($query);
        $con->bindParam(':id', $id);
        $con->execute();
        
        $result = $con->fetch(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    private function setDados($dados) 
    {
        $date = new DateTime('America/Sao_Paulo');
        $objDados = json_decode($dados);
        $this->nameCourse = $objDados->nameCourse;
        $this->description = $objDados->description;
        $this->dateStart = $objDados->dateStart;
        $this->dateFinish = $objDados->dateFinish;
        $this->status = intval($objDados->status);
        $this->created_at = $date->format('Y-m-d H:i:s');
        $this->updated_at = $date->format('Y-m-d H:i:s');
    }


    public function insertCourse($dados)
    {
        $this->setDados($dados);
        try {
            $sql = "INSERT INTO courses(nameCourse, description, dateStart, dateFinish, status, created_at, updated_at) VALUES(:nameCourse, :description, :dateStart, :dateFinish, :status, :created_at, :updated_at)";
            $con = $this->pdo->prepare($sql);
            $con->bindParam(':nameCourse', $this->nameCourse);
            $con->bindParam(':description', $this->description);
            $con->bindParam(':dateStart', $this->dateStart);
            $con->bindParam(':dateFinish', $this->dateFinish);
            $con->bindParam(':status', $this->status);
            $con->bindParam(':created_at', $this->created_at);
            $con->bindParam(':updated_at', $this->updated_at);
            $result = $con->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        return $result;

    }

    public function updateCourse($dados, $id)
    {
        $this->setDados($dados);
        try {
            $sql = "UPDATE courses SET nameCourse = :nameCourse, description = :description, dateStart = :dateStart, dateFinish = :dateFinish, status = :status, updated_at = :updated_at WHERE id = :id";
            $con = $this->pdo->prepare($sql);
            $con->bindParam(':nameCourse', $this->nameCourse);
            $con->bindParam(':description', $this->description);
            $con->bindParam(':dateStart', $this->dateStart);
            $con->bindParam(':dateFinish', $this->dateFinish);
            $con->bindParam(':status', $this->status);
            $con->bindParam(':updated_at', $this->updated_at);
            $con->bindParam(':id', $id);
            $result = $con->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function excluirCourse($id) 
    {
        try {
            $query = "DELETE FROM courses WHERE id = :id";
            $con = $this->pdo->prepare($query);
            $con->bindParam(':id', $id);
            $result = $con->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        return $result;
    }
}