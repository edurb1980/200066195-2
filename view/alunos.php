<?php
    require('./Models/Student.php');
    $mensagem = '';
    $aluno = new Student();
    $alunos = $aluno->getStudents();
    $alunos = json_decode($alunos);

    if(isset($_GET['mensagem']) && !empty($_GET['mensagem'])) {
        $mensagem = $_GET['mensagem'];
    }
?>

    <h1>Listagem de Alunos</h1>
    <div class="content">
        <a href="?p=novo-aluno" class="btn btn-primary">+ Novo</a>
        <?php if($mensagem != ''): ?>
            <div class="alert alert-<?=$_GET['tipo'];?>">
                <?= $mensagem; ?>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alunos as $a): ?>
                <tr>
                    <td><?= $a->id; ?></td>
                    <td><?= $a->name; ?></td>
                    <td><?= $a->email; ?></td>
                    <td>
                        <a href="?p=ver-aluno&id=<?= $a->id;?>" class="btn btn-sm btn-info">Visualizar</a>
                        <a href="?p=novo-aluno&id=<?=$a->id;?>" class="btn btn-sm btn-warning">Editar</a>
                        <a onclick="return confirm('Tem certeza que deseja excluir o aluno?');" href="controller/studentController.php?acao=remover&id=<?=$a->id;?>" class="btn btn-sm btn-danger">
                            Excluir
                        </a>
                    </td>
                </tr>
                

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
