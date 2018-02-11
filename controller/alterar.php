<?php

include '../connection/conexao.php';

$chave = $_POST["alteracao"];
$responsavel = $_POST["responsavel"];
$problema = $_POST["tipo"];
$descricao = $_POST["descricao"];
$local = $_POST["local"];

if (!empty($chave) && $chave > 0) {
    $db = mysql_select_db($database);

    $sql = "UPDATE ocorrencia SET responsavel='$responsavel', problema='$problema', descricao='$descricao', localidade='$local' WHERE id = $chave";

    $result = mysql_query($sql);

    if (!$result) {
        echo "<script>alert('Não foi possivel alterar. Ocorrência não encontrada');</script> Erro: " . mysql_error();
    } else {
        echo "<script>alert('Alterado com sucesso');</script>";
    }
} else {
    echo "<script>alert('Não foi possivel alterar. Ocorrência não encontrada');</script>";
}
echo "<script>window.location='../home.php'</script>";


