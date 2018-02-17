<?php

class operacao {

    public function addTask($dados) {
        include '../connection/conexao.php';

        $db = mysql_select_db($database);

        $responsavel = $dados["responsavel"];
        $status = $dados["status"];
        $problema = $dados["tipo"];
        $descricao = $dados["descricao"];
        $local = $dados["local"];
        $usuario = $dados["usuario"];

        $sql = "INSERT INTO ocorrencia (`responsavel`, `problema`, `descricao`, `localidade`, `status`, `usuario`) VALUES('$responsavel', '$problema', '$descricao', '$local', '$status', '$usuario')";

        mysql_query($sql, $conexao);

        if (!$conexao) {
            echo "<script>alert('Não foi possivel salvar os dados.');</script>";
        } else {
            echo "<script>alert('Ocorrência criada com sucesso!');</script>";
            echo "<script>window.location='../home.php'</script>";
        }

        mysql_close($conexao);
    }

    public function addContato($dados) {
        include '../connection/conexao.php';

        mysql_select_db($database);

        $emp_desc = $dados['emp_desc'];
        $emp_municipio = $dados['emp_municipio'];
        $emp_estado = $dados['emp_estado'];
        $emp_telefone = $dados['emp_telefone'];

        $sql = "INSERT INTO empresa(`emp_desc`, `emp_muncipio`, `emp_estado`, `emp_telefone`) VALUES ('$emp_desc','$emp_municipio','$emp_estado','$emp_telefone')";

        mysql_query($sql, $conexao);

        if (!$conexao) {
            echo "<script>alert('Não foi possivel salvar os dados.');</script>";
        } else {
            echo "<script>alert('Contato criado com sucesso!');</script>";
            echo "<script>window.location='../home.php'</script>";
        }

        mysql_close($conexao);
    }

    public function addUser($dados) {
        include '../connection/conexao.php';

        mysql_select_db($database);

        $nome = $dados['usu_nome'];
        $username = $dados['usu_username'];
        $senha = $dados['usu_senha'];
        $depart = $dados['usu_depart'];

        $criptsenha = base64_encode($senha);

        $sql = "INSERT INTO usuario (`usu_nome`, `usu_username`, `usu_password`, `usu_depart`) VALUES ('$nome', '$username', '$criptsenha', '$depart')";

        mysql_query($sql, $conexao);

        if (!$conexao) {
            echo "<script>alert('Não foi possivel salvar os dados.');</script>";
        } else {
            echo "<script>alert('Usuário criado com sucesso!');</script>";
            echo "<script>window.location='../home.php'</script>";
        }

        mysql_close($conexao);
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {
    $method = $_POST['method'];
    if (method_exists('operacao', $method)) {
        $contato = new operacao;
        $contato->$method($_POST);
    } else {
        echo 'Método incorreto';
    }
}
