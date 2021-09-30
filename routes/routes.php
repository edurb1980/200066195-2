<?php
    const ROUTES = [
        'cursos',
        'novo-curso',
        'ver-curso',
        'alunos',
        'novo-aluno',
        'ver-aluno',
        'login',
        'logout'
    ];


    function setPage() {
        $page = 'alunos';
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $page = $_GET['p'];
            if(!in_array($page, ROUTES)) {
                $page = '404';
            }
        }
        return $page;
    }
?>