<?php
require('./Models/Courses.php');
$curso = new Courses();
$edit = false;
if(isset($_POST['nameCourse']) && !empty($_POST['nameCourse']) && empty($_GET['id'])) {
    $result = $curso->insertCourse(json_encode($_POST));
    if($result) {
        header("Location: ?p=cursos&mensagem=Sucesso&tipo=success");
    } else {
        header("Location: ?p=cursos&mensagem=Erro ao salvar o curso&tipo=error");
    }
}

if(isset($_POST['nameCourse']) && isset($_GET['id'])) {
    $result = $curso->updateCourse(json_encode($_POST), $_GET['id']);
    if($result) {
        header("Location: ?p=cursos&mensagem=Sucesso ao editar o curso&tipo=success");
    } else {
        header("Location: ?p=cursos&mensagem=Erro ao editar o curso&tipo=error");
    }
}


if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $obj = $curso->getCourse($id);
    $obj = json_decode($obj);
    if(empty($obj)) {
        header("Location: ?p=cursos");
    }
    $edit = true;

    
}


?>

<?php if(!$edit): ?>
<h1>Novo Curso</h1>
<?php else: ?>
<h1>Editar Curso</h1>
<?php endif; ?>
<div class="content card">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Nome do Curso: </label>
                    <input type="text" autofocus name="nameCourse" id="nameCourse" class="form-control" required value="<?= $obj->nameCourse ?? null; ?>">
                </div>
                <div class="col-md-3">
                    <label for="">Descrição: </label>
                    <input type="text"  name="description" id="description" class="form-control" required value="<?= $obj->description ?? null; ?>"> 
                </div>
                <div class="col-md-3">
                    <label for="">Data de Início: </label>
                    <input type="date"  name="dateStart" id="dateStart" class="form-control" required value="<?= $obj->dateStart ?? null; ?>">
                </div>
                <div class="col-md-3">
                    <label for="">Data de Fim: </label>
                    <input type="date"  name="dateFinish" id="dateFinish" class="form-control" required value="<?= $obj->dateFinish ?? null; ?>">
                </div>
           
                <div class="col-md-3 mt-3">
                    <label for="">Status: </label>
                    <select name="status" id="status" class="form-control" required >
                        <?php if(isset($obj->status)): ?>
                            <option value="<?= $obj->status ?? null; ?>"><?= $obj->status == 1 ? 'Ativo' : 'Inativo'; ?></option>
                        <?php endif; ?>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
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