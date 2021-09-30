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

<h1>Listagem de Cursos</h1>
<div class="content">
    <a href="?p=novo-curso" class="btn btn-primary">+ Novo</a>
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
                <th>Início</th>
                <th>Fim</th>
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
                <td><?= date('d/m/Y', strtotime($c->dateFinish)); ?></td>
                <td><?= $c->status == 1 ? 'Ativo' : 'Inativo'; ?></td>
                <td>
                    <a href="?p=ver-curso&id=<?= $c->id;?>" class="btn btn-sm btn-info" title="Visualizar">Visualizar</a>
                    <a href="?p=novo-curso&id=<?=$c->id;?>" class="btn btn-sm btn-warning" title="Editar">Editar</a>
                    <a onclick="return confirm('Confirma a exclusão do curso?')" href="controller/courseController.php?acao=remover&id=<?=$c->id;?>" class="btn btn-sm btn-danger" title="Excluir">
                        Excluir
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>