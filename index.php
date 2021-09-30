<?php
    session_start();
    require_once('./routes/routes.php');
    require_once('./functions/logged.php');
    $page = setPage();
    $page_without_login = array('login', '404');
    if(!in_array($page, $page_without_login) && !logged()) {
        header("Location: ?p=login");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>eCursos - Console de Gerenciamento</title>
</head>
<body>
    <header>
    <?php if($page != 'login' && $page != '404'): ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="?p=alunos">Alunos</a>
                    <a class="nav-link" href="?p=cursos">Cursos</a>
                    <a class="nav-link" href="?p=logout">Sair</a>
                </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    </header>

    <main class="container">
        <?php require("./view/$page.php"); ?>
    </main>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</body>
</html>