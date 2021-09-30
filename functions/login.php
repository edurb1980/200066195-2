<?php
    const RA = '200066195';
    const SENHA = 'Eduardo';

    function login($ra, $senha) : bool  
    {
        if($ra == RA && $senha == SENHA) {
            $_SESSION['logged'] = true;
            return true;
        }
        return false;
    }
?>