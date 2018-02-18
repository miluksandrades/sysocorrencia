<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fcontatos
 *
 * @author Lucas-PC
 */
class Fcontatos {

    public function addContato($dados) {
        include '../connection/conexao.php';

        mysql_select_db($database);

        $emp_desc = $dados['emp_desc'];
        $emp_municipio = $dados['emp_municipio'];
        $emp_estado = $dados['emp_estado'];
        $emp_telefone = $dados['emp_telefone'];

        $sql = "INSERT INTO empresa(`emp_desc`, `emp_municipio`, `emp_estado`, `emp_telefone`) VALUES ('$emp_desc','$emp_municipio','$emp_estado','$emp_telefone')";

        mysql_query($sql, $conexao);

        if (!$conexao) {
            echo "<script>alert('Não foi possivel salvar os dados.');</script>";
        } else {
            echo "<script>alert('Contato criado com sucesso!');</script>";
            echo "<script>window.location='../contatos.php'</script>";
        }

        mysql_close($conexao);
    }

    public function altContato($dados) {
        include '../connection/conexao.php';



        $chave = $dados['chave'];

        $emp_desc = $dados['emp_desc'];
        $emp_municipio = $dados['emp_municipio'];
        $emp_estado = $dados['emp_estado'];
        $emp_telefone = $dados['emp_telefone'];

        if (!empty($chave) && $chave > 0) {
            mysql_select_db($database);

            $sql = mysql_query("UPDATE empresa SET emp_desc = '$emp_desc', emp_municipio = '$emp_municipio', emp_estado = '$emp_estado', emp_telefone = '$emp_telefone' WHERE emp_id = $chave");

            if (!$sql) {
                echo "<script>alert('Não foi possivel alterar. Empresa não encontrada');</script> Erro: " . mysql_error();
            } else {
                echo "<script>alert('Alterado com sucesso');</script>";
            }
        } else {
            echo "<script>alert('Não foi possivel alterar. Empresa não encontrada');</script>";
        }
        echo "<script>window.location='../contatos.php'</script>";
    }

    public function remContato($dados) {
        
        include '../connection/conexao.php';
        
        $remocao = $dados['remocao'];
        if(!empty($remocao) && $remocao > 0){
            mysql_select_db($database);
            
            $sql = mysql_query("DELETE FROM empresa WHERE emp_id = $remocao");
            
            if(!$sql){
                echo "<script>alert('Não foi possivel excluir. contato n encontrado');</script> Erro: ". mysql_error();
            }  else{
                echo "<script>alert('Excluído com sucesso');</script>";
            }
        } else{
            echo "<script>alert('Não foi possivel excluir. contato n encontrado');</script>";
        }
        echo "<script>window.location='../contatos.php';</script>";
        
    }

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {
    $method = $_POST['method'];
    if (method_exists('Fcontatos', $method)) {
        $contato = new Fcontatos;
        $contato->$method($_POST);
    } else {
        echo 'Método incorreto';
    }
}
