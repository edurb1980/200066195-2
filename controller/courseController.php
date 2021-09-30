<?php
require('../Models/Courses.php');
$action = null;
if(isset($_GET['acao']) && !empty($_GET['acao'])) {
    $action = $_GET['acao'];
    $id = $_GET['id'];
    if($action == 'remover') {
        apagaCurso($id);
    }
}

function apagaCurso($id)
{
    $curso = new Courses();
    $result = $curso->deleteCourse($id);
    if($result) {
        return header("Location: ../?p=cursos&mensagem=Curso removido com sucesso!&tipo=success");
    } else {
        return header("Location: ../?p=cursos&mensagem=Falha ao remover o curso&tipo=error");
    }
}