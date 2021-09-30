<?php
require('./Models/Courses.php');
$curso = new Courses();
if(isset($_GET['id']) && !empty($_GET['id']) ) {
    $id = $_GET['id'];
    $obj = $curso->getCourse($id);
    $obj = json_decode($obj);
    $created_at = new DateTime($obj->created_at);
    $updated_at = new DateTime($obj->updated_at);
    if(empty($obj)) {
        header("Location: ?p=cursos");
    }
}
?>


<h1>Curso <?= $obj->nameCourse; ?></h1>
<div class="content card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label for="">Nome do Curso:</label>
                <p><?= $obj->nameCourse; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Descrição:</label>
                <p><?= $obj->description; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Data de Início:</label>
                <p><?= date('d/m/Y', strtotime($obj->dateStart)); ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Data de Fim:</label>
                <p><?= date('d/m/Y', strtotime($obj->dateFinish)); ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Status: </label>
                <p><?= $obj->status == 1 ? 'Ativo' : 'Inativo'; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Criado em: </label>
                <p><?= $created_at->format('d/m/Y H:i:s') ; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Atualizado em: </label>
                <p><?= $updated_at->format('d/m/Y H:i:s') ; ?></p>
            </div>
        </div>
    </div>
    
</div>