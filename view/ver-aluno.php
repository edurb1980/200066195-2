<?php
require('./Models/Student.php');
$aluno = new Student();
if(isset($_GET['id']) && !empty($_GET['id']) ) {
    $id = $_GET['id'];
    $obj = $aluno->getStudent($id);
    $obj = json_decode($obj);
    $created_at = new DateTime($obj->created_at);
    $updated_at = new DateTime($obj->updated_at);($obj->created_at);
    if(empty($obj)) {
        header("Location: ?p=alunos");
    }
}
?>

<h1>Aluno <?= $obj->name; ?></h1>

<div class="content card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label for="">Nome: </label>
                <p><?= $obj->name; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">E-mail: </label>
                <p><?= $obj->email; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Senha: </label>
                <p><?= $obj->password; ?></p>
            </div>
            <div class="col-md-3">
                <label for="">Telefone: </label>
                <p><?= $obj->phone; ?></p>
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