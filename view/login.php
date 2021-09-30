<?php
    $error = '';
    require('./functions/login.php');
    if(isset($_POST['ra']) && !empty($_POST['ra'])) {
        $ra = filter_input(INPUT_POST, 'ra');
        $senha = filter_input(INPUT_POST, 'senha');
        if(login($ra, $senha)) {
            header("Location: ?p=alunos");
        } else {
            $error = 'Login e/ou senha inválidos!';
        }
    }
?>


    <h1 class="mt-5">eCursos - Console de Gerenciamento</h1>

    <div class="content-login justify-content-center">
        <h5 class="text-center">Login:</h5>
        <?php if($error && !empty($error)): ?>
            <div class="alert alert-danger" ><?= $error; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">RA:</label>
                <input type="text" name="ra" autofocus id="ra" placeholder="" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Senha:</label>
                <input type="password" name="senha" class="form-control" required placeholder="" id="senha">
            </div>
            <div class="form-group">
                <input type="submit" value="Entrar" class="btn btn-primary">
            </div>
        </form>
    </div>
