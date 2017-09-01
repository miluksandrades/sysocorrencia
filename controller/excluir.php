<?php
    include '../connection/conexao.php';
    
    $db = mysql_select_db($database);
    
    $sql = "DELETE FROM ocorrencia";
    
    $result = mysql_query($sql);
    
    if(!$result){
        die("Falha ao exluir a ocorrência. Erro: ".mysql_error());
    } else{
        echo "<script>window.location='../index.php'</script>";
    }
?>

