<?php
require('./Models/Courses.php');
$mensagem = '';
$curso = new Courses();
$cursos = $curso->getAllCourse();
$cursos = json_decode($cursos);
if(isset($_GET['mensagem']) && !empty($_GET['mensagem'])) {
    $mensagem = $_GET['mensagem'];
}
?>


<h1>Cursos</h1>
<div class="content">
    <a href="?p=novo-curso" class="btn btn-primary">Adicionar novo Curso</a>
    <?php if($mensagem != ''): ?>
        <div class="alert alert-<?=$_GET['tipo'];?>">
            <?= $mensagem; ?>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Curso</th>
                <th>Data de Início</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $c): ?>
            <tr>
                <td><?= $c->id; ?></td>
                <td><?= $c->nameCourse; ?></td>
                <td><?= date('d/m/Y', strtotime($c->dateStart)); ?></td>
                <td><?= $c->status == 1 ? 'Ativo' : 'Inativo'; ?></td>
                <td>
                    <a href="?p=ver-curso&id=<?= $c->id;?>" class="btn btn-sm btn-info" title="Visualizar">Visualizar</a>
                    <a href="?p=novo-curso&id=<?=$c->id;?>" class="btn btn-sm btn-warning" title="Editar">Editar</a>
                    <a onclick="return confirm('Tem certeza que deseja excluir o curso?')" href="controller/courseController.php?acao=remover&id=<?=$c->id;?>" class="btn btn-sm btn-danger" title="Excluir">
                        Excluir
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>