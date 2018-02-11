<?php

include '../connection/conexao.php';

$db = mysql_select_db($database);

$nome = $_POST['usu_nome'];
$username = $_POST['usu_username'];
$senha = $_POST['usu_senha'];
$depart = $_POST['usu_depart'];

$criptsenha = base64_encode($senha);

$sql = "INSERT INTO usuario (`usu_nome`, `usu_username`, `usu_password`, `usu_depart`) VALUES ('$nome', '$username', '$criptsenha', '$depart')";

mysql_query($sql, $conexao);

if (!$conexao) {
    echo "<script>alert('Não foi possivel salvar os dados.');</script>";
} else {
    echo "<script>alert('Usuario criado com sucesso!');</script>";
    echo "<script>window.location='../home.php'</script>";
}

mysql_close($conexao);
