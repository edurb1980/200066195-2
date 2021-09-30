<?php
require('../Models/Student.php');
$action = null;
if(isset($_GET['acao']) && !empty($_GET['acao'])) {
    $action = $_GET['acao'];
    $id = $_GET['id'];
    if($action == 'remover') {
        destroyAluno($id);
    }
}


function destroyAluno($id)
{
    $aluno = new Student();
    $remocao = $aluno->excluirStudent($id);
    if($remocao) {
        return header("Location: ../?p=alunos&mensagem=Aluno removido com sucesso!&tipo=success");
    } else {
        return header("Location: ../?p=alunos&mensagem=Falha ao remover o aluno&tipo=error");
    }
}