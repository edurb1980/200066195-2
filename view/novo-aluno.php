<?php
require('./Models/Student.php');
$edit = false;
$aluno = new Student();
if(isset($_POST['name']) && !empty($_POST['name']) && empty($_GET['id'])) {
    $result = $aluno->insertStudent(json_encode($_POST));
    if($result) {
        header("Location: ?p=alunos&mensagem=Sucesso&tipo=success");
    } else {
        header("Location: ?p=alunos&mensagem=Erro ao salvar o aluno&tipo=error");
    }
    
}

if(isset($_POST['name']) && isset($_GET['id'])) {
    $result = $aluno->updateStudent(json_encode($_POST), $_GET['id']);
    if($result) {
        header("Location: ?p=alunos&mensagem=Sucesso ao editar aluno&tipo=success");
    } else {
        header("Location: ?p=alunos&mensagem=Erro ao salvar o aluno&tipo=error");
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $obj = $aluno->getStudent($id);
    $obj = json_decode($obj);
    if(empty($obj)) {
        header("Location: ?p=alunos");
    }
    $edit = true;

    
}
?>
<?php if(!$edit): ?>
<h1>Novo Aluno</h1>
<?php else: ?>
<h1>Editar Aluno</h1>
<?php endif; ?>
<div class="content card">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Nome: </label>
                    
                    <input type="text" autofocus name="name" id="name" class="form-control" required value="<?= $obj->name ?? null; ?>">
                </div>
                <div class="col-md-3">
                    <label for="">E-mail: </label>
                    <input type="email" autofocus name="email" id="email" class="form-control" required value="<?= $obj->email ?? null; ?>">
                </div>
                <div class="col-md-3">
                    <label for="">Teleone: </label>
                    <input type="text" autofocus name="phone" id="phone" class="form-control" required value="<?= $obj->phone ?? null; ?>">
                </div>
                <div class="col-md-3">
                    <label for="">Status: </label>
                    <select name="status" id="status" class="form-control" required >
                        <?php if(isset($obj->status)): ?>
                            <option value="<?= $obj->status ?? null; ?>"><?= $obj->status == 1 ? 'Ativo' : 'Inativo';?></option>
                        <?php endif; ?>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="">Senha: </label>
                    <input type="password" autofocus name="password" id="password" class="form-control" required value="<?= $obj->password ?? null; ?>"> 
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary"value="Enviar">
                </div>
                
            </div>
        </form>
    </div>
</div>