<?php
    include '../connection/conexao.php';
    
    $chave = $_POST["chave"];
    if(!empty($chave) && $chave > 0){
        $db = mysql_select_db($database);
    
        $sql = "DELETE FROM ocorrencia WHERE id = $chave";
    
        $result = mysql_query($sql);
    
        if(!$result){
            echo "<script>alert('Não foi possivel excluir. cliente n encontrado')</script> Erro: ".mysql_error();
        } else{
            echo "<script>alert('Excluido com sucesso');</script>";
        }
    } else{
        echo "<script>alert('Não foi possivel excluir. cliente n encontrado')</script>";
    }
    
    echo "<script>window.location='../index.php'</script>";
    
    
?>

