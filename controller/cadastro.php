<?php
    include '../connection/conexao.php';
    
    $db = mysql_select_db($database);
    
    $responsavel = $_POST["responsavel"];
    $problema = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $local = $_POST["local"];
    
    $sql = "INSERT INTO ocorrencia (`responsavel`, `problema`, `descricao`, `localidade`) VALUES('$responsavel', '$problema', '$descricao', '$local')";
    
    mysql_query($sql, $conexao);
    
    if(!$conexao){
        echo "<script>alert('Não foi possivel salvar os dados');</scrpit>";
    } else{
        echo "<script>alert('Cadastro feito com sucesso')</script>";
        echo "<script>window.location='../index.php'</script>";
    }
    
    mysql_close($conexao);

