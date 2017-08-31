<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista</title>
        <style>
            tr, th, table{
                border: 2px solid #000;
                text-align: center;
                font-family: sans-serif
            }
            td{
                border: 1px solid #000;
                padding: 5px;
                font-size: 18px
            }
            a{
                text-decoration: none;
                color: mediumblue;
            }
        </style>
    </head>
    <body>
        <br/>
        <br/>
        <a href="../index.php">Inicio</a> < | >
        <a href="lista.php">Atualizar</a>
        <br/>
        <br/>
        <br/>
        
        <table>
            <tr>
                <th>Tipo de Ocorrência</th>
                <th>Responsável</th>
                <th>Local</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
            <?php
                include '../connection/conexao.php';
                
                $db = mysql_select_db("$database");
                $sql = mysql_query("SELECT *FROM ocorrencia");
                
                while($aux = mysql_fetch_assoc($sql)){
                    echo "<tr><td>" . $aux["problema"] . "</td>";
                    echo "<td>" . $aux["responsavel"] . "</td>";
                    echo "<td>" . $aux["localidade"] . "</td>";
                    echo "<td>" . $aux["descricao"] . "</td>";
                    echo "<td>" . "<a href='#'>Excluir</a>" . "</td></tr>";
            }
            ?>
        </table>
    </body>
</html>


