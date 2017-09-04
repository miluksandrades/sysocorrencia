<?php
    include '../connection/conexao.php';
    
    $db = mysql_select_db($database);
    
    $responsavel = $_POST["responsavel"];
    $problema = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $local = $_POST["local"];
    $situacao = $_POST["status"];
    
    $sql = "INSERT INTO ocorrencia (`responsavel`, `problema`, `descricao`, `localidade`, `situacao`) VALUES('$responsavel', '$problema', '$descricao', '$local', '$situacao')";
    
    mysql_query($sql, $conexao);
    
    if(!$conexao){
        echo "<script>alert('Não foi possivel salvar os dados');</scrpit>";
    } else{
        echo "<script>window.location='../index.php'</script>";
    }
    
    mysql_close($conexao);

