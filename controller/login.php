<?php

require_once '../connection/conexao.php';

session_start();

$login = $_POST['usuario'];
$senha = $_POST['senha'];

$db = mysql_select_db($database);

$criptsenha = base64_encode($senha);

$sql = mysql_query("SELECT *FROM usuario WHERE usu_username = '$login' AND usu_password = '$criptsenha'");

if(mysql_num_rows($sql) > 0){
    $_SESSION['usuario'] = $login;
    $_SESSION['senha'] = $criptsenha;
    header('location:../home.php');
} else{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:../index.php');
    
}