<?php

require_once './login.php';

if(isset($_SESSION['usuario'])){
    session_destroy();
    echo "<script>window.location='.././index.php'</script>";
}

