<?php
    function logged() {
        if(!isset($_SESSION['logged']) && empty($_SESSION['logged'])) {
            return false;
        }

        return true;
    }
?>